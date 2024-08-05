<?php

namespace App\Http\Controllers;

use App\Classes\PushNotifications;
use App\Mail\defaultNotify;
use App\Provider;
use App\Repository\ProviderWorkerLogRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProviderController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $providers = Provider::whereHas('userDetails')->orderBy('id', 'desc')->paginate();
        return view('providers.index', compact('providers'));
    }

    public function form(Request $request)
    {
        if (isset($request->id) && $request->id != 0) {
            $results = $this->edit($request->id);
            if ($results instanceof User) {
                $page_title = "Edit";
                $providerData = Provider::where('user_id', '=', $request->id)->first();
//                dd($providerData);
                return view('providers.form', compact('page_title', 'results', 'providerData'));
            }
            return $results;
        } else {
            $page_title = "Add";
            return view('providers.form', compact('page_title'));
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
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
            'radius' => 'required',
        ];
        $request->validate($validation_rules);
        $request->password = generateRandomString();
        $response = [];
        $data = [
            'username' => $request->username,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'type' => User::provider,
            'password' => Hash::make($request->password)
        ];
//            if ($request->password) {
//                $user->password = Hash::make($request->password);
//            }

        if ($request->hasFile('avatar_file')) {
            $data['avatar'] = $request->file('avatar_file')->store('avatar_file');
        }
        $insertData = User::create($data);
        if ($insertData) {
            $provideData = [
                'user_id' => $insertData->id,
                'radius' => $request->radius,
                'approval_status' => $request->approval_status,
                'job_status' => $request->job_status,
            ];
            if ($request->hasFile('license_img')) {
                $provideData['license_img'] = $request->file('license_img')->store('license_img');
            }
            if (Provider::insert($provideData)) {
                $body = "<p>Thanks for joining.</p>
                    we are pleased to inform you of the your account is created successfully and move toward approval process by company. Kindly use this
                    password: " . $request->password . " to login to the application and change this password by going to update profile from application menu.</p>
                    <br><br><p>
                    Regards Instatask</p>";
                Mail::to($request->email)->send(new defaultNotify("Welcome to instatask", $body));
                $response = ['success_msg' => trans('alert.record_updated')];
            } else {
                $response = ['error_msg' => trans('alert.record_unable_to_save')];
            }
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }
        return redirect(route('all-providers'))->withErrors($response);
    }

    public function update($request)
    {
        $validation_rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
//            'address' => 'required',
            'radius' => 'required',
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
//        dd($user);
        if ($user->update($data)) {
            $provideData = [
                'radius' => $request->radius,
                'approval_status' => $request->approval_status,
                'job_status' => $request->job_status,
            ];
            if ($request->hasFile('license_img')) {
                $provideData['license_img'] = $request->file('license_img')->store('license_img');
            }
            $providerObj = Provider::where('user_id', '=', $request->id)->update($provideData);
            if ($providerObj) {
                if ($request->status == User::banned) {
                    $body = "<p>Your profile is banned by company!.</p>
                    we are hereby to inform you that the your account is banned by company. Kindly inform this
                    to our help center if this is mistake by company.</p>
                    <br><br><p>
                    Regards Instatask</p>";
                    Mail::to($user->email)->send(new defaultNotify("Profile Banned!", $body));
                } elseif ($request->job_status == Provider::unApprove) {
                    $body = "<p>Your profile is rejected by company!.</p>
                    we are hereby to inform you that the your account is rejected by company. Kindly inform this
                    to our help center if this is mistake by company.</p>
                    <br><br><p>
                    Regards Instatask</p>";
                    Mail::to($user->email)->send(new defaultNotify("Profile Rejected!", $body));
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
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }

        return redirect(route('edit-providers', ['id' => $user->id]))->withErrors($response);
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

        return redirect(route('all-providers'))->withErrors($response);
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
        return redirect(route('all-providers'))->withErrors($response);
    }

    public function approval(Request $request)
    {
        $response = [];
        $provider = Provider::find($request->id);
        $data['approval_status'] = $request->status;
//        dd($provider);
        $p_user = User::find($provider->user_id);
        if ($provider->update($data)) {
            $response = ['success_msg' => trans('alert.record_updated')];
//            var_dump($request->status);exit();
            if ($request->status == 0) {
//                var_dump($request->status);
//                var_dump($p_user->fcm_token);
//                exit();
                PushNotifications::sendStatusPushNotification($p_user->fcm_token);
            }
            if ($request->status == 1){
                PushNotifications::sendStatusPushNotificationNo($p_user->fcm_token);
            }
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }
        return redirect(route('all-providers'))->withErrors($response);
    }

    public function job(Request $request)
    {
//        dd($request->status);
        $response = [];
        $provider = Provider::find($request->id);
        $user = User::find($provider->user_id);
        $data['job_status'] = $request->status;
        if ($provider->update($data)) {
            if($request->status == Provider::free){
                ProviderWorkerLogRepository::createProviderLogged($provider);
            }
            if($request->status == Provider::signedout){
                ProviderWorkerLogRepository::updateProviderLogged($provider);
            }
            $response = ['success_msg' => trans('alert.record_updated')];
        } else {
            $response = ['error_msg' => trans('alert.record_unable_to_save')];
        }
        return redirect(route('all-providers'))->withErrors($response);
    }
}
