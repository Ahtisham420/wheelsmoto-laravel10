<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notifications\Appnotify;
use Illuminate\Support\Str;
use App\Package;
use App\UserPackage;
use App\User_car;
use Illuminate\Support\Facades\Crypt;
class AuthController extends Controller
{

    public function __construct()
    {

        $this->middleware('alreadyloggedin')->except('userLogout','UserEmailVerify','confirm_email');
    }

    public function userLogin($id=null)
    {

     //   $id =base64_decode($id);
       // $id =Crypt::decrypt($id);
       $package=null;
//       if(!empty($id)){
//        $id =base64_decode(base64_decode($id));
//    }
//    if($id && is_numeric($id)){
//
//          $package=Package::find($id);
//    }
        if ($id == "register"){
            return view('frontend.user-login',["id"=>$id]);
        }elseif ($id == "favourite"){
            return view('frontend.user-login',["id"=>$id]);
        }else{
            return view('frontend.user-login');
        }


    }
    public  function  garageLogin($gr){

        return view('frontend.user-login',["gr"=>$gr]);

    }
    public  function  swapLogin($sw,$s_id){

        return view('frontend.user-login',["sw"=>$sw,"swap_id"=>$s_id]);

    }

    public function social_login(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'email' => 'required',

            'username' => 'required',

            'profile_pic' => 'required',

            'first_name' => 'required',

            'last_name' => 'required',

            'social_id' => 'required',

        ]);

        if ($validator->fails()) {

            return response()->json(['status' => 0, 'result' => $validator->errors()->all()[0]]);


        }

        $user = User::where('email', '=', $request->email)->first();

        $user_detail = ["email" => $request->email,

            "username" => $request->username,

            "first_name" => $request->first_name,

            "last_name" => $request->last_name,

            "avatar" => $request->profile_pic,

            "social_id" => $request->social_id,

            "enabled" => 1,

            "status" => User::active];


        if (!empty($user)) {

            if ($user->enabled == 1) {

                $user_c = User::where("id", "=", $user->id)->update($user_detail);

            } else {

                return response()->json(["status" => 0, "result" => "user has been suspended"]);

            }

        } else {

            $user_c = User::create($user_detail);

        }

        $user = User::where('email', '=', $request->email)->first();

        if (!empty($user)) {

            $package = UserPackage::create([

                'user_id' => $user->id,

                'package_id' => 2,

            ]);

        }

        if ($user_c) {

            session()->put("userDetails", $user);

            session()->put("usertype", "simple");

            session()->put("userLoggedIn", true);

            session()->put("socialid", $request->social_id);

            session()->save();

            $tab = 'packages';

            if (session()->has('product')) {

                $tab = 'findcar';

            } else {

                if ($request->package_id != 0) {

                    if (UserPackage::where('user_id', $user->id)->exists()) {

                        $package = UserPackage::where('user_id', $user->id)->update(['package_id' => $request->package_id]);

                    } else {

                        $package = UserPackage::create([

                            'user_id' => $user->id,

                            'package_id' => $request->package_id

                        ]);

                    }

                }

                if ($request->package_id != 0) {

                    $tab = 'my adverts';

                    //   dd($tab);

                } else {

                    $tab = 'packages';

                    //    dd($tab);

                }


            }

//            return response()->json(["status" => 1, "result" => route("user-dashboard", ['tab' => $tab]), "g_route" => $request->garage_input, "w_route" => $request->swap_input, "s_id" => base64_decode($request->swap_id), "blog_route" => $request->blog_id]);
            return response()->json(["status" => 1, "result" => route("user-dashboard", ['tab' => $tab]), "g_route" => $request->garage_input, "w_route" => $request->swap_input, "s_id" => base64_decode($request->swap_id), "blog_route" => $request->blog_id]);

        } else {

            return response()->json(["status" => 0, "result" => "try again"]);

        }


    }

    public function userRegisterPhone(Request $request){
        $check = User::where("phone",$request->phone)->first();
        if(empty($check)){
            return response()->json( array('status' =>1,"num"=>$request->phone));
        }else{
            return response()->json( array('status' =>0));
        }
    }
    public function userLoginSubmit(Request $request)
    {

$request->validate([
          'phone' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('phone', '=', $request->full_number)->first();
        if (!empty($user)) {
            if ($user->status == User::active && $user->enabled == 1) {
                $check = Hash::check($request->password, $user->password);
                if ($check) {
                    session()->put("userDetails", $user);
                    session()->put("usertype", "simple");
                    session()->put("userLoggedIn", true);
                    session()->save();
                    $tab = 'myadverts';
                    if(session()->has('product')){
                        $tab = 'findcar';
                    }
                    else{
                        if($request->package_id!=0){
                    if (UserPackage::where('user_id', $user->id)->exists()) {
                            $package = UserPackage::where('user_id', $user->id)->update(['package_id' => $request->package_id]);
                         } else {
                        $package = UserPackage::create([
                       'user_id' => $user->id,
                        'package_id' => $request->package_id
                        ]);
                         }
                         }
                         if($request->package_id!=0){
                             $tab = 'myadverts';
                               //   dd($tab);
                              }else{
                             $tab = 'myadverts';
                              //    dd($tab);
                              }

                    }
                    return response()->json(["status"=>1,"result"=>route("my-advert"),"g_route"=>$request->garage_input,"w_route"=>$request->swap_input,"s_id"=>base64_decode($request->swap_id),"blog_route"=>$request->blog_id,'fav_login'=>$request->like_login]);
                }
                else {
                    return response()->json(["status"=>0,"result"=>"These credentials do not match our records."]);
                }
            }else if ($user->status == User::unverfied){
                $id=base64_encode($user->id);
                $token = $user->email_token;
                $tab = 'findcar';
                $url=route('confirm_email')."?id=".$id."&token=".$token."&tab=".$tab;
              //  $user->notify(new Appnotify(null,null,$url));
                return response()->json(["status"=>3,"result"=>"Please Verify your Phone Number."]);
              }else {
                return response()->json(["status"=>0,"result"=>"user has been suspended"]);
            }
        } else {
            return response()->json(["status"=>0,"result"=>"These credentials do not match our records."]);
        }

    }

    public function userLogout()
    {
        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true) {
            session()->flush();
            session()->save();
        }
        return redirect()->route('frontend-home');
    }

    public function userRegisterSubmit(Request $request)
    {

//        $tab=null;

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'result'=>$validator->errors()->all()[0]]);

        }
        $token=Str::random(10);
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => strstr($request->email, '@', true),
            'phone'=>$request->phone,
            'email_token'=>$token,
            'status'=>User::active
        ]);
        $user = User::where('phone', '=', $request->phone)->first();
      if ($user){
          $user_n=User::find($user->id);
        session()->put("userDetails", $user_n);
        session()->put("usertype", "simple");
        session()->put("userLoggedIn", true);
        session()->save();
return response()->json(['status'=>1,'result'=>'You Register Successfully.']);



        // return redirect()->route('user-dashboard',["tab"=>"my advert"]);
     //   return redirect()->route('frontend-home');
      }
        return response()->json(['status'=>0,'result'=>"Please try again","tab"=>""]);
    }

    public  function  UserEmailVerify(){

        if (!empty(session("userLoggedIn")) && session("userLoggedIn") == true) {
                    $user = User::where('id', '=',session('userDetails')->id)->first();
                    if ($user->status == User::active && $user->enabled == 1) {
                        return response()->json(['status'=>1,'result'=>"Your email Verified"]);
                    }else if ($user->status == User::unverfied){
                        $id=base64_encode($user->id);
                        $token = $user->email_token;
                        $tab = 'findcar';
                        $url=route('confirm_email')."?id=".$id."&token=".$token."&tab=".$tab;
                        $user->notify(new Appnotify(null,null,$url));
                        return response()->json(['status'=>1,'result'=>"Please Check Your email and Verify"]);
                    }else{
                        return response()->json(['status'=>0,'result'=>"Please try again","tab"=>""]);
                    }





//            $url=route('confirm_email')."?id=".$id."&token=".$token."&tab=".$tab;
//            $user->notify(new Appnotify(null,null,$url));
//            return response()->json(['status'=>1,'result'=>"user has been register,Please Verify Your email"]);
        } else {
            return response()->json(['status'=>0,'result'=>"Please try again","tab"=>""]);
        }
    }
    public function confirm_email(Request $request){
        $id=$request->id;
        $token=$request->token;
        $tab=$request->tab;
        $id=base64_decode($id);
        $user=User::where("id",'=',$id)->where("email_token","=",$token)->first();
        if($user){
            $user->status=User::active;
            if($user->save()){
                $user_n=User::find($id);
                session()->put("userDetails", $user_n);
                session()->put("usertype", "simple");
                session()->put("userLoggedIn", true);
                session()->save();
               // return redirect()->route('user-dashboard',["tab"=>"my advert"]);
                return redirect()->route('frontend-home');
               
            }
              }
    }
    public  function  forgottPassword(Request $request){
        $user = User::where('phone','=',$request->user_phone)->first();
        if ($user){
            $u_id=$user->id;
            $token=Str::random(10);
            $user->reset_token=$token;
            $num=$user->phone;
             $user->save();
            // if($user->save()){
            //     $tab = 'packages';
            //     if(session()->has('product')){
            //         $tab = 'findcar';
            //     }
            //     $url=route('new-password')."?id=".$u_id."&token=".$token."&tab=".$tab;
            //     $user->notify(new Appnotify(null,null,$url,true));
            // }
            // return redirect()->route("user-login")->with('message', 'Please check your email and reset your password.');
             return response()->json(['status'=>1,'token'=>$token,'user_id'=>$u_id,'num'=>$num]);

        }else{
            return response()->json(['status'=>0,'token'=>""]);
          //  return redirect()->back()->with('message_red', 'Email is not recognized.');
        }

    }
    public  function  newPassword($token,Request $request){
        
        $token=$token;
        $user=User::where("reset_token","=",$token)->first();
        $id=$user->id;
        if($user){
            return view('frontend.new-password',['id'=>$id]);
        }else{
             return "there is mismatch your token";
        }

    }
    public  function  BlogLogin($bg){

        return view('frontend.user-login',["bg"=>$bg]);

    }
}
