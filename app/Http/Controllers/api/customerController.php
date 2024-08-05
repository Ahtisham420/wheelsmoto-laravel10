<?php

namespace App\Http\Controllers\api;

use App\Provider;
use App\Repository\UserStripeRepository;
use App\User;
use App\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\defaultNotify;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class customerController extends Controller
{
    public function nearByProviders(Request $request)
    {
//        dd($request->lat);
        $response = [];
        $circle_radius = 5000;
        $validator = Validator::make($request->all(), [
            'lat' => 'required',
            'lng' => 'required',
        ]);
        if ($validator->fails()) {
            $response = [
                'code' => 400,
                'data' => new \stdClass(),
                'error_msg' => $validator->errors()
            ];
        } else {
            $km = $circle_radius / 1000;
//            $users = DB::select("SELECT * FROM
//                                (
//                                SELECT usr.id as usr_id, first_name, last_name, address, phone, lat, lng, provdr.job_status, provdr.overall_rating,
//                                ($circle_radius
//                                * acos(cos(radians(  $request->lat  ))
//                                * cos(radians(lat)) * cos(radians(lng) - radians(  $request->lng  )) + sin(radians(  $request->lat  ))
//                                * sin(radians(lat)))) AS distance
//                                 FROM users
//                                 as usr
//                                 left JOIN
//                                 providers as provdr
//                                 ON provdr.user_id = usr.id
//                                 WHERE usr.status = '0'
//                                 AND
//                                 usr.type = '1'
//                                 AND
//                                 provdr.approval_status = '0'
//                                 AND
//                                 provdr.job_status <> '3'
//                                 ) AS distances
//                                  ORDER BY distance ");
            $query = "SELECT
                                        *
                                    FROM
                                        (
                                        SELECT
                                            usr.id AS usr_id,
                                            first_name,
                                            last_name,
                                            address,
                                            phone,
                                            lat,
                                            lng,
                                            provdr.job_status,
                                            provdr.overall_rating,
                                            (
                                                6371 * ACOS(
                                                    COS(RADIANS(".$request->lat.")) * COS(RADIANS(lat)) * COS(
                                                        RADIANS(lng) - RADIANS(".$request->lng.")
                                                    ) + SIN(RADIANS(".$request->lat.")) * SIN(RADIANS(lat))
                                                )
                                            ) AS DISTANCE
                                        FROM
                                            users AS usr
                                        LEFT JOIN
                                            providers AS provdr
                                        ON
                                            provdr.user_id = usr.id
                                        WHERE
                                            usr.status = '0' AND usr.type = '1' AND provdr.approval_status = '0' AND provdr.job_status <> '3'
                                            HAVING DISTANCE < ".$km."
                                    ) AS distances
                                    ORDER BY
                                        DISTANCE";
            $users = DB::select($query);
//        print_r($users);exit();
            if ($users) {
                $response = [
                    'code' => 200,
                    'data' => $users,
                    'error_msg' => trans('alert.no_error')
                ];
            } else {
                $response = [
                    'code' => 500,
                    'data' => new \stdClass(),
                    'error_msg' => trans('alert.providers_not_found')
                ];
            }
        }
        return $response;
    }

    public function getUserDetailById(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->userDetailById($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function addCard(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'token' => 'required',
            ]);

            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => new \stdClass(),
                    'error_msg' => $validator->errors()
                ];
            } else {
                $response = UserStripeRepository::addUserCard($request->all());

            }
        } else {
            $response = [
                'code' => 401,
                'data' => new \stdClass(),
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function getUserStripDetails(Request $request)
    { // user_id param
//        dd($request->user_id);
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
//                'token' => 'required',
            ]);

            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => new \stdClass(),
                    'error_msg' => $validator->errors()
                ];
            } else {
                $response = UserStripeRepository::getUserStripeProfile($request->all());
                if(empty($response)){
                    $response = [
                        'code' => 500,
                        'data' => new \stdClass(),
                        'error_msg' => trans('alert.invalid_request')
                    ];
                }

            }
        } else {
            $response = [
                'code' => 401,
                'data' => new \stdClass(),
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function setDefaultStripCard(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'card_id' => 'required',
            ]);

            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => new \stdClass(),
                    'error_msg' => $validator->errors()
                ];
            } else {
                $response = UserStripeRepository::userStripeDefaultCard($request->all());

            }
        } else {
            $response = [
                'code' => 401,
                'data' => new \stdClass(),
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function removeStripCard(Request $request){
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required',
                'card_id' => 'required',
            ]);

            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => new \stdClass(),
                    'error_msg' => $validator->errors()
                ];
            } else {
                $response = UserStripeRepository::removeStripeCard($request->all());

            }
        } else {
            $response = [
                'code' => 401,
                'data' => new \stdClass(),
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function updatePassword(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validation = [
                'fcm_token' => 'required',
                'user_id' => 'required',
                'new_password' => 'required',
            ];

            if (!$request->has('no_old')) {
                $validation['old_password'] = 'required';
            }

            $validator = Validator::make($request->all(), $validation);

            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                $response = $this->updatePasswordUser($request);
            }
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function updateProfile(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'fcm_token' => 'required',
                'user_id' => 'required',
            ]);

            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                $response = $this->updateDataUser($request);
            }
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    //

    public function socialLogin(Request $request)
    {
        /*
        * social login provider api
        */
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
//                'email' => 'required',
                'social_id' => 'required',
                'username' => 'required',
                'fcm_token' => 'required',
            ]);
            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                if ($this->checkUserExistBySocialId($request)) {
                    $response = $this->updateDataUser($request);
                } else {
                    $response = $this->registerUser($request);
                }
            }
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public
    function updateLatLng(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'lat' => 'required',
                'lng' => 'required',
                'fcm_token' => 'required',
            ]);
            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                if ($this->checkUserExistByFcmToken($request)) {
                    $response = $this->updateLatLngUser($request);
                } else {
                    $response = [
                        'code' => 405,
                        'data' => [],
                        'error_msg' => trans('alert.invalid_user')
                    ];
                }
            }
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public
    function register(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'username' => 'required|unique:users',
//                'first_name' => 'required',
//                'last_name' => 'required',
                'email' => 'required|unique:users,email',
                'phone' => 'required|unique:users',
//                'radius' => 'required',
            ]);
            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                if ($this->checkUser($request)) {
                    $response = $this->registerUser($request);
                } else {
                    $response = [
                        'code' => 405,
                        'data' => [],
                        'error_msg' => trans('alert.already_exists')
                    ];
                }
            }
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public
    function logout(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'fcm_token' => 'required',
            ]);

            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                $response = $this->logoutUser($request);
            }
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public
    function login(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'email' => 'required',
                'password' => 'required',
                'fcm_token' => 'required',
            ]);

            if ($validator->fails()) {
                $response = [
                    'code' => 400,
                    'data' => [],
                    'error_msg' => $validator->errors()
                ];
            } else {
                $response = $this->getUser($request);
            }
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }
    public function checkRating(Request $request)
    {
        $response = [];
        if ($request->isMethod('post') && !empty($request->user_id)) {
            $response = $this->checkLastRating($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }
    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            // 'user_type' => 'required'
        ]);
        $user_validity = User::where('email', '=', $request->email)->first();
        if ($user_validity) {
            // Email found
            $random_string = generateRandomString();
            $update_random = User::where('email', '=', $request->email)->update(['forgot_password' => $random_string]);
            if ($update_random) {
                // $link = env('APP_URL') . 'provider/resetpassword' . '?random=' . $random_string . '?type=' . $request->user_type . '?email=' . $request->user_email;

                // Send in email to the requested email
                $subject = "Password reset request recieved";
                $body = "
                We have recieved a request for resetting password of your account.<br>
                If you have requested it than please use the code for password reset procedure:
                    <br> " . $random_string . "<br> Regards";

                Mail::to($request->email)->send(new defaultNotify($subject, $body));

                $response = [
                    'code' => 200,
                    'data' => $obj = new \stdClass(),
                    'error_msg' => trans('alert.no_error')
                ];
            } else {
                $response = [
                    'code' => 500,
                    'data' => $obj = new \stdClass(),
                    'error_msg' => 'An error occured. Please try again.'
                ];
            }
        } else {
            $response = [
                'code' => 200,
                'data' => $obj = new \stdClass(),
                'error_msg' => trans('alert.record_not_found')
            ];
        }
        return response()->json($response);
    }

    public function getForgetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            // 'user_type' => 'required',
            'code' => 'required'
        ]);
        $user = User::where([['email', '=', $request->email], ['forgot_password', '=', $request->code]])->first();
        if ($user) {
            $obj = new \stdClass();
            $obj->validity = true;
            $obj->user_id = $user->id;
            $response = [
                'code' => 200,
                'data' => $obj,
                'error_msg' => trans('alert.record_found')
            ];
        } else {
            $obj = new \stdClass();
            $obj->validity = false;
            $obj->user_id = 0;
            $response = [
                'code' => 200,
                'data' => $obj,
                'error_msg' => trans('alert.record_not_found')
            ];
        }
        return response()->json($response);
    }

    protected function checkLastRating($request){
        $response = [];
        $data = [];
        $whereStatus = [
            Job::complete,
            // Job::leave_for_job,
            // Job::pending,
            // Job::accept,
            // Job::working,
            // Job::arrived,
            // Job::requestApproval,
        ];
        
        $job = Job::where('customer_id',$request->user_id)
                    ->whereIn('job_status', $whereStatus)
                    ->orderBy('updated_at', 'desc')
                    ->first();

        if (count($job) > 0) {
            if($job->customer_rating == 0){
                $response = [
                    'code' => 200,
                    'data' => true,
                    'msg' => trans('Rating Required')
                ];
            }else{
                $response = [
                    'code' => 200,
                    'data' => false,
                    'msg' => trans('Rating Exists')
                ];
            }
        } else {
            $response = [
                'code' => 500,
                'data' => new \stdClass(),
                'msg' => trans('alert.job_not_found'),
                'error_msg' => trans('alert.job_not_found'),
            ];
        }
        return $response;
    }

    protected
    function getUser($request)
    {
        $response = [];
        $user = User::where('email', '=', $request->email)
            ->where('type', '=', User::customer)
            ->first();
        if (!empty($user)) {
            if ($user->status == User::active) {
                $check = Hash::check($request->password, $user->password);
                if ($check) {
                    if (empty($user->fcm_token)) {
                        $updtUsr = User::find($user->id);
                        $updateChk = $updtUsr->update(['fcm_token' => $request->fcm_token]);
                        if ($updateChk) {
                            $nearbyProviders = new \stdClass();
                            if (!empty($request->lat) && !empty($request->lng)) {
                                $nearbyProviders = $this->getNearByProviders($request);
                            }
                            $data = [
                                'userDetails' => $updtUsr,
                                'nearbyProviders' => $nearbyProviders,
                            ];
                            $response = [
                                'code' => 200,
                                'data' => collect($data),
                                'error_msg' => trans('alert.no_error')
                            ];
                        } else {
                            $response = [
                                'code' => 500,
                                'data' => [],
                                'error_msg' => trans('alert.schema_error')
                            ];
                        }
                    } else {
                        $response = [
                            'code' => 201,
                            'data' => [],
                            'error_msg' => trans('alert.already_login')
                        ];
                    }
                } else {
                    $response = [
                        'code' => 300,
                        'data' => [],
                        'error_msg' => trans('alert.invalid_pass')
                    ];
                }
            } else {
                $response = [
                    'code' => 402,
                    'data' => [],
                    'error_msg' => trans('alert.account_suspended')
                ];
            }
        } else {
            $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('auth.failed')
            ];
        }
        return $response;
    }

    protected
    function logoutUser($request)
    {
        $response = [];
        $user = User::where('fcm_token', '=', $request->fcm_token)->first();
        if (!empty($user)) {
            $updtUsr = User::find($user->id);
            $updateChk = $updtUsr->update(['fcm_token' => ""]);
            if ($updateChk) {
                $response = [
                    'code' => 200,
                    'data' => ["status" => "Logout successfully."],
                    'error_msg' => trans('alert.no_error')
                ];
            } else {
                $response = [
                    'code' => 500,
                    'data' => [],
                    'error_msg' => trans('alert.schema_error')
                ];
            }
        } else {
            $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('auth.failed')
            ];
        }
        return $response;
    }

    protected
    function checkUser($request)
    {
        $response = [];
        $user = User::where('email', '=', $request->email)
            ->where('type', '=', User::customer)
            ->first();
        if (empty($user)) {
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }

    protected
    function checkUserExistByFcmToken($request)
    {
        $response = [];
        $user = User::where('fcm_token', '=', $request->fcm_token)
            ->where('type', '=', User::customer)
            ->first();
        if (!empty($user)) {
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }

    protected
    function checkPhoneExists($request)
    {
        $response = [];
        $user = User::where('phone', '=', $request->phone)
            ->where('type', '=', User::customer)
            ->first();
        if (empty($user)) {
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }

    protected
    function checkUserExistBySocialId($request)
    {
        $response = [];
        $user = User::where('social_id', '=', $request->social_id)
            ->where('type', '=', User::customer)
            ->first();
        if (!empty($user)) {
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }

    protected
    function userDetailById($request, $type = User::customer)
    {
        $response = [];
        $user = User::where('type', '=', $type)
            ->where('id', '=', $request->id)
            ->first();
        if (!empty($user)) {
            $response = [
                'code' => 200,
                'data' => $user,
                'error_msg' => trans('alert.no_error')
            ];
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return $response;
    }

    protected
    function registerUser($request)
    {
        $response = [];
        $data = [
            'username' => $request->username,
            'first_name' => !empty($request->first_name) ? $request->first_name : "",
            'last_name' => !empty($request->last_name) ? $request->last_name : "",
            'email' => $request->email,
            'address' => !empty($request->address) ? $request->address : "",
            'status' => User::active,
            'type' => User::customer,
            'time_zone' => !empty($request->timezone)? $request->timezone : config('app.app_timezone'),
            'password' => !empty($request->password) ? Hash::make($request->password) : Hash::make($request->phone)
        ];
        if (!empty($request->phone)) {
            $data['phone'] = $request->phone;
        }
        if (!empty($request->social_id)) {
            $data['social_id'] = $request->social_id;
        }
        if (!empty($request->lat)) {
            $data['lat'] = $request->lat;
        }
        if (!empty($request->lng)) {
            $data['lng'] = $request->lng;
        }
        if (!empty($request->fcm_token)) {
            $data['fcm_token'] = $request->fcm_token;
        }
        if ($request->hasFile('avatar_file')) {
            $data['avatar'] = $request->file('avatar_file')->store('avatar_file');
        }
        $insertData = User::create($data);
        if ($insertData) {
            $nearbyProviders = new \stdClass();
            if (!empty($request->lat) && !empty($request->lng)) {
                $nearbyProviders = $this->getNearByProviders($request);
            }
            $data = [
                'userDetails' => $insertData,
                'nearbyProviders' => $nearbyProviders,
                "status" => trans("alert.account_created"),
            ];
            $response = [
                'code' => 200,
                'data' => collect($data),
//                'nearbyProviders' => $nearbyProviders,
                'error_msg' => trans('alert.no_error')
            ];
        } else {
            $response = [
                'code' => 500,
                'data' => [],
                'error_msg' => trans('alert.schema_error')
            ];
        }
        return $response;
    }

    protected
    function updateLatLngUser($request)
    {
        $response = [];
        $data = [
            'lat' => $request->lat,
            'lng' => $request->lng
        ];
        $userUpdate = User::where('fcm_token', '=', $request->fcm_token)->update($data);
        if ($userUpdate) {
            $response = [
                'code' => 200,
                'data' => ["status" => trans("alert.record_updated")],
                'error_msg' => trans('alert.no_error')
            ];
        } else {
            $response = [
                'code' => 500,
                'data' => [],
                'error_msg' => trans('alert.schema_error')
            ];
        }
        return $response;
    }

    protected
    function updateDataUser($request)
    {
        $response = [];
        $data = [];
        $user = collect();
        if(!empty($request->social_id)){
            $user = User::where('type', '=', User::customer)
            ->where('social_id', '=', $request->social_id)
                ->first();
        }else{
            $user = User::where('type', '=', User::customer)
                ->where('id', '=', $request->user_id)
                ->first();
        }
        if (empty($user)) {
            return $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('alert.invalid_user')
            ];
        }
        if (!empty($request->fcm_token)) {
            $data['fcm_token'] = $request->fcm_token;
        }
        if (!empty($request->lat)) {
            $data['lat'] = $request->lat;
        }
        if (!empty($request->lng)) {
            $data['lng'] = $request->lng;
        }
        if (!empty($request->phone)) {
            if ($this->checkPhoneExists($request) || $user->phone == $request->phone) {
                $data['phone'] = $request->phone;
            } else {
                return $response = [
                    'code' => 405,
                    'data' => [],
                    'error_msg' => trans('alert.phone_already_exists')
                ];
            }
        }
        if (!empty($request->first_name)) {
            $data['first_name'] = $request->first_name;
        }
        if (!empty($request->last_name)) {
            $data['last_name'] = $request->last_name;
        }
        if (!empty($request->address)) {
            $data['address'] = $request->address;
        }
        if (!empty($request->timezone)) {
            $data['time_zone'] = $request->timezone;
        }
        if ($request->hasFile('avatar_file')) {
            $data['avatar'] = $request->file('avatar_file')->store('avatar_file');
        }
//        dd($request->all(),$data,$user);
        $userUpdate = User::where('id', '=', $user->id)->update($data);
        $userData = User::find($user->id);
        if ($userUpdate) {
            $nearbyProviders = new \stdClass();
            if (!empty($request->lat) && !empty($request->lng)) {
                $nearbyProviders = $this->getNearByProviders($request);
            }
            $data = [
                'userDetails' => $userData,
                'nearbyProviders' => $nearbyProviders,
            ];
            $response = [
                'code' => 200,
                'data' => collect($data),
                'error_msg' => trans('alert.no_error')
            ];
        } else {
            $response = [
                'code' => 500,
                'data' => [],
                'error_msg' => trans('alert.schema_error')
            ];
        }
        return $response;
    }

    protected
    function updatePasswordUser($request)
    {
        $response = [];
        $data = [
            'password' => Hash::make($request->new_password)
        ];
        $user = User::find($request->user_id);
        if ($request->has('no_old')) {
            $check = true;
        } else {
            $check = Hash::check($request->old_password, $user->password);
        }
        if ($check) {
            if ($request->has('no_old')) {
                $userUpdate = User::where('id', '=', $request->user_id)
                ->update($data);
            } else {
                $userUpdate = User::where('fcm_token', '=', $request->fcm_token)
                ->where('id', '=', $request->user_id)
                ->update($data);
            }
            if ($userUpdate) {
                $response = [
                    'code' => 200,
                    'data' => ["status" => trans("alert.record_updated")],
                    'error_msg' => trans('alert.no_error')
                ];
            } else {
                $response = [
                    'code' => 500,
                    'data' => [],
                    'error_msg' => trans('alert.schema_error')
                ];
            }
        } else {
            $response = [
                'code' => 300,
                'data' => [],
                'error_msg' => trans('alert.invalid_pass')
            ];
        }

        return $response;
    }

    public function getNearByProviders($request, $circle_radius = 5000)
    {
//        $users = DB::select("SELECT * FROM
//                                (
//                                SELECT usr.id as usr_id, first_name, last_name, address, phone, lat, lng, provdr.job_status, provdr.overall_rating,
//                                ($circle_radius
//                                * acos(cos(radians(  $request->lat  ))
//                                * cos(radians(lat)) * cos(radians(lng) - radians(  $request->lng  )) + sin(radians(  $request->lat  ))
//                                * sin(radians(lat)))) AS distance
//                                 FROM users
//                                 as usr
//                                 left JOIN
//                                 providers as provdr
//                                 ON provdr.user_id = usr.id
//                                 WHERE usr.status = '0'
//                                 AND
//                                 usr.type = '1'
//                                 AND
//                                 provdr.approval_status = '0'
//                                 AND
//                                 provdr.job_status <> '3'
//                                 ) AS distances
//                                  ORDER BY distance ");

        $km = $circle_radius / 1000;
        $query = "SELECT
                                        *
                                    FROM
                                        (
                                        SELECT
                                            usr.id AS usr_id,
                                            first_name,
                                            last_name,
                                            address,
                                            phone,
                                            lat,
                                            lng,
                                            provdr.job_status,
                                            provdr.overall_rating,
                                            (
                                                6371 * ACOS(
                                                    COS(RADIANS(".$request->lat.")) * COS(RADIANS(lat)) * COS(
                                                        RADIANS(lng) - RADIANS(".$request->lng.")
                                                    ) + SIN(RADIANS(".$request->lat.")) * SIN(RADIANS(lat))
                                                )
                                            ) AS DISTANCE
                                        FROM
                                            users AS usr
                                        LEFT JOIN
                                            providers AS provdr
                                        ON
                                            provdr.user_id = usr.id
                                        WHERE
                                            usr.status = '0' AND usr.type = '1' AND provdr.approval_status = '0' AND provdr.job_status <> '3'
                                            HAVING DISTANCE < ".$km."
                                    ) AS distances
                                    ORDER BY
                                        DISTANCE";
        $users = DB::select($query);

        if ($users) {
            $response = $users;
        } else {
            $response = collect([]);
        }
        return $response;
    }
}
