<?php

namespace App\Http\Controllers;

use App\Mail\defaultNotify;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\UserPackage;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{


    public function index(Request $request)
    {
        $users = User::where('type', '=', User::customer)->orderBy('id', 'desc')->paginate(8);
        if($request->has('key')){
            return self::filterdData($request);
        }
        return view('users.index', compact('users'));
    }
 public  function  ApiCallData(Request $request){

       $n =  User::first();
         return
        [
            'id'=>$n->id,
            'title'=>$n->username,
            'body'=>$n->email,
            'created_at' => $n->created_at,
            'updated_at' => $n->updated_at,

        ];          
    }
    public static function filterdData($request){
        $users = [];
        $filters = [];
        $results = false;

        if(!empty($request->filter_status && $request->filter_status != "false")) {
            $filters[] = [
                "status", '=',$request->filter_status
            ];
        }
        if(!empty($request->filter_country && $request->filter_country != "false")) {
            $filters[] = [
                "CountryCode" , '=', $request->filter_country
            ];
        }
        if(!empty($request->filter_age && $request->filter_age != "false")) {
            $filters[] = [
                "age" , '=', $request->filter_age
            ];
        }
        if(!empty($request->filter_id_type && $request->filter_id_type != "false")) {
            $filters[] = [
                "id_type" , '=', $request->filter_id_type
            ];
        }
        if(!empty($request->filter_id_verification && $request->filter_id_verification != "false")) {
            $filters[] = [
                "identity_verification" , '=', $request->filter_id_verification
            ];
        }
        if($request->filter_user_types >= 0 && $request->filter_user_types != null) {
            $filters[] = [
                "type" , '=', $request->filter_user_types
            ];
        }
        if(!empty($request->filter_gender && $request->filter_gender != "false")) {
            $filters[] = [
                "gender" , '=', $request->filter_gender
            ];
        }
        if(!empty($request->filter_from_date)) {
            $filters[] = ['created_at', '>=', $request->filter_from_date];
        }
        if(!empty($request->filter_to_date)) {
            $filters[] = ['created_at', '<=', $request->filter_to_date];
        }
        if(!empty($request->filter_search)) {
            $columns = array('email','phone','first_name','last_name');
            $users = User::search($request->filter_search,$columns);
//            dd($request->filter_search);
        }else {
            $users = User::where($filters);
        }
//        dump($filters);
        $users = $users->where($filters)->orderBy('id', 'desc')->paginate(10);

        if($request->has('filter_reset')){
            $users = User::orderBy('id', 'desc')->paginate(10);
        }
        if(!$request->has('filter_csv_export')) {
            $html = View::make('users.partials.table')->with('users', $users)->render();
            $results = response()->json($html);
        }else{
            return (new UsersExport($filters))->download('users.xlsx');
        }
        return $results;
    }

    public function form(Request $request)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        if (isset($request->id) && $request->id != 0) {
            $results = $this->edit($request->id);
            if ($results instanceof User) {
                $page_title = "Edit";
                return view('users.form', compact('page_title', 'results','roles', 'permissions'));
            }
            return $results;
        } else {
            $page_title = "Add";
            return view('users.form', compact('page_title','roles', 'permissions'));
        }
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->with('roles')->first();
        if (!$id || !$user) {
            return redirect()->back();
        } else {
            return $user;
        }
    }

    public function create($request)
    {
        $validation_rules = [
            'username' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'address' => 'required',
        ];
        $request->validate($validation_rules);

        $request->password = generateRandomString();
        $hash_pass = Hash::make($request->password);
        $response = [];
        $data = [
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'password' => $hash_pass
        ];
        //            if ($request->password) {
        //                $user->password = Hash::make($request->password);
        //            }

        if ($request->hasFile('avatar_file')) {
            $data['avatar'] = $request->file('avatar_file')->store('avatar_file');
        }

        $usr = User::create($data);
        $body = "<p>Thanks for joining.</p>
                    we are pleased to inform you of the your account is approved and created successfully. Kindly use this
                    password: " . $request->password . " to login to the application and change this password by going to update profile from application menu.</p>
                    <br><br><p>
                    Regards Instatask</p>";
        if ($usr) {
            Mail::to($request->email)->send(new defaultNotify("Welcome to instatask", $body));
            $response = ['success_msg' => trans('alert.record_updated')];
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }
        return redirect(route('all-users'))->withErrors($response);
    }

    public function update($request)
    {

        $validation_rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ];
        $request->validate($validation_rules);

        $response = [];
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status
        ];
        if ($request->hasFile('avatar_file')) {
            $data['avatar'] = $request->file('avatar_file')->store('avatar_file');
        }
        $user = User::find($request->id);
        if ($user->update($data)) {
            if ($request->status == User::banned) {
                $body = "<p>Your profile is banned by company!.</p>
                    we are hereby to inform you that the your account is banned by company. Kindly inform this
                    to our help center if this is mistake by company.</p>
                    <br><br><p>
                    Regards Instatask</p>";
                Mail::to($user->email)->send(new defaultNotify("Profile Banned!", $body));
            } else {
                $body = "<p>Your profile is recently updated!.</p>
                    we are hereby to inform you of the your account is recently updated. Kindly inform this
                    to our help center if this is not done by you.</p>
                    <br><br><p>
                    Regards Instatask</p>";
                Mail::to($user->email)->send(new defaultNotify("Profile update", $body));
            }
            $response = ['success_msg' => trans('alert.record_updated')];
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }

        return redirect(route('edit-users', ['id' => $user->id]))->withErrors($response);
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('post')) {
            if ($request->id == 0) {
                return $this->create($request);
            } else {
                return $this->update($request);
            }
        }

        $response = ['error_msg' => trans('alert.invalid_request')];

        return redirect(route('all-users'))->withErrors($response);
    }

    public function status(Request $request)
    {
        $response = [];
        $user = User::find($request->id);
        $data['status'] = $request->status;
        if ($user->update($data)) {
            if ($request->status == User::banned) {
                $body = "<p>Your profile is banned by company!.</p>
                    we are hereby to inform you that the your account is banned by company. Kindly inform this
                    to our help center if this is mistake by company.</p>
                    <br><br><p>
                    Regards Instatask</p>";
                Mail::to($user->email)->send(new defaultNotify("Profile Banned!", $body));
            }
            $response = ['success_msg' => trans('alert.record_updated')];
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }
        return redirect(route('all-users'))->withErrors($response);
    }

    public function search(Request $request)
    {
        $users = User::where('first_name', 'LIKE', '%' . $request->user . '%')->orWhere('last_name', 'LIKE', '%' . $request->user . '%')->get();
        return view('users.partials.result', compact('users'));
    }

               public function changePassword(Request $request){
                 $id =$request->id;
                 $user = User::where('id','=',$id)->first();
                   $user->password= Hash::make($request->password);
                   if ($user->save()){
                       session()->put("userDetails", $user);
                       session()->put("usertype", "simple");
                       session()->put("userLoggedIn", true);
                       session()->save();

                           $redirect = route("frontend-home");
                           return response()->json(['status'=>1,'result'=>$redirect,'msg'=>'Password change Successfully.']);
                       }
                           return response()->json(['status'=>0,'msg'=>'Something was wrong.']);


                   }




}
