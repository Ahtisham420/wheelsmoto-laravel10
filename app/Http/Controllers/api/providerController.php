<?php

namespace App\Http\Controllers\api;

use App\Bank;
use App\Classes\PushNotifications;
use App\Job;
use App\Provider;
use App\Repository\ProviderWorkerLogRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\defaultNotify;
use App\Notification;
use App\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class providerController extends Controller
{

    public function rating(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->setRating($request);
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

    public function earning(Request $request)
    {
        $response = [];
        if ($request->isMethod('post') && !empty($request->user_id)) {
            $response = $this->getEarning($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    protected function getEarning($request)
    {
        $response = [];
        $data = [];

        // Overall
        $overallWhere = [
            ["job_status", Job::complete],
            ["customer_approval", Job::customer_approved],
            ["provider_id", $request->user_id]
        ];

        $overallEarning = Job::where($overallWhere)->sum("service_price");

        // Current Day
        $todayWhere = [
            ["job_status", Job::complete],
            ["customer_approval", Job::customer_approved],
            ["provider_id", $request->user_id],
            ['created_at', Carbon::today()]
        ];

        $todayEarning = Job::where($todayWhere)->sum("service_price");

        // Earning after withdraw todo
        $remainingWhere = [
            ["job_status", Job::complete],
            ["customer_approval", Job::customer_approved],
            ["provider_id", $request->user_id]
        ];

        $remainingEarning = Job::where($remainingWhere)->sum("service_price");

        if ($overallEarning >= 0 && $todayEarning >= 0 && $remainingEarning >= 0) {
            $obj = new \stdClass();
            $obj->overallEarning = $overallEarning;
            $obj->todayEarning = $todayEarning;
            $obj->remainingEarning = $remainingEarning;
            $response = [
                'code' => 200,
                'data' => $obj,
                'msg' => trans('Earning fetched (Remaining not complete)')
            ];
        } else {
            $response = [
                'code' => 500,
                'data' => new \stdClass(),
                'msg' => trans('Error in data'),
                'error_msg' => trans('Error in data'),
            ];
        }
        return $response;
    }

    public function checkLastRating($request)
    {
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

        $job = Job::where('provider_id', $request->user_id)
            ->whereIn('job_status', $whereStatus)
            ->orderBy('updated_at', 'desc')
            ->first();

        if (count($job) > 0) {
            if ($job->driver_rating == 0) {
                $response = [
                    'code' => 200,
                    'data' => true,
                    'msg' => trans('Rating Required')
                ];
            } else {
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

    public function getNearByProviders(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->nearByProviders($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function requestJobApproval(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->requestApproval($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
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
                    if (!$this->checkUserExistByFcmToken($request)) {
                        $response = $this->registerUser($request);
                    } else {
                        $response = [
                            'code' => 405,
                            'data' => [],
                            'error_msg' => trans($this->checkUserExistByFcmToken($request)) // invalid fcm or same fcm using different account
                        ];
                    }
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

    protected
    function nearByProviders($request)
    {
        $response = [];
        $km = $request->circle_radius / 1000;
        //        $users = DB::select("SELECT * FROM
        //                                (
        //                                SELECT usr.id as usr_id, first_name, last_name, address, phone, lat, lng, provdr.job_status, provdr.overall_rating,
        //                                ($request->circle_radius
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
                                                    COS(RADIANS(" . $request->lat . ")) * COS(RADIANS(lat)) * COS(
                                                        RADIANS(lng) - RADIANS(" . $request->lng . ")
                                                    ) + SIN(RADIANS(" . $request->lat . ")) * SIN(RADIANS(lat))
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
                                            HAVING DISTANCE < " . $km . "
                                    ) AS distances
                                    ORDER BY
                                        DISTANCE";
        $users = DB::select($query);
        //        dd($query,$users,$request->all());
        if ($users) {
            $response = [
                'code' => 200,
                'data' => $users,
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

    //
    public
    function updateWorkStatus(Request $request)
    {
        /*
         * check provider model for all status of job status
         */
        $response = [];
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), [
                'job_status' => 'required',
                'user_id' => 'required',
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
                    $response = $this->updateWorkStatusUser($request);
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
                'radius' => 'required',
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

    public
    function checkPendingJob(Request $request)
    {
        $response = [];
        if ($request->isMethod('get')) {
            $response = $this->pendingJobs();
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function pendingJobs()
    {
        // get the oldest of pending job
        // send response
        $response = [];
        $job = [];
        $whereStatus = [
            // Job::leave_for_job,
            Job::pending,
            // Job::accept,
            // Job::working,
            // Job::arrived,
            // Job::requestApproval,
        ];

        $job = Job::whereIn('job_status', $whereStatus)
            ->orderBy('created_at', 'asc')
            ->limit(1)
            ->get();

        if (count($job) > 0) {
            $obj = new \stdClass();
            $obj->job = $job;
            $response = [
                'code' => 200,
                'data' => $obj,
                'msg' => trans('alert.job_found')
            ];
        } else {
            $obj = new \stdClass();
            $response = [
                'code' => 500,
                'data' => $obj,
                'msg' => trans('alert.job_not_found'),
                'error_msg' => trans('alert.job_not_found')
            ];
        }
        return $response;
    }

    public function bankInfo(Request $request)
    {
        $response = [];

        if ($request->isMethod('post')) {
            $request->validate([
                'user_id' => 'required',
                'bank_name' => 'required',
                'swift_code' => 'required',
                'IBAN' => 'required',
                'account_no' => 'required',
                'country' => 'required',
                'withdraw_amount' => 'required'
            ]);
            // Check if data exists against user_id
            // if yes than update
            // if no than create
            if (Bank::where('user_id', '=', $request->user_id)->exists()) {
                $retaliation = Bank::where('user_id', '=', $request->user_id)->update($request->except('withdraw_amount'));
            } else {
                $retaliation = Bank::create($request->except('withdraw_amount'));
            }

            if ($retaliation) {
                $response = [
                    'code' => 200,
                    'data' => [],
                    'error_msg' => trans('alert.no_error')
                ];
            } else {
                $response = [
                    'code' => 500,
                    'data' => [],
                    'error_msg' => trans('alert.record_unable_to_save')
                ];
            }
            // Check deposit amount
            if (!empty($request->withdraw_amount)) {
                $overallEarningWhere = [
                    ["job_status", Job::complete],
                    ["customer_approval", Job::customer_approved],
                    ["provider_id", $request->user_id]
                ];
                $overallWithdrawnWhere = [
                    ["status", "1"],
                    ["user_id", $request->user_id]
                ];

                $overallEarning = Job::where($overallEarningWhere)->sum("service_price");
                $overallWithdrawn = Transaction::where($overallWithdrawnWhere)->sum("amount");
                if ($request->withdraw_amount <= ($overallEarning - $overallWithdrawn)) {
                    $retaliation = Transaction::create([
                        'user_id' => $request->user_id,
                        'amount' => $request->withdraw_amount,
                        'status' => "0"
                    ]);

                    $obj = new \stdClass();
                    $obj->url = "admin/withdrawrequests";
                    Notification::create([
                        "title" => "Withdraw requested",
                        "type" => Notification::withdraw,
                        "data" => json_encode($obj),
                        "viewed" => Notification::not_viewed
                    ]);
                    $response['code'] = 200;
                    $response['error_msg'] = " Request sent to admin.";
                } else {
                    $response['code'] = 500;
                    $response['error_msg'] = " Amount exceeds balance.";
                }
            }
        } elseif ($request->isMethod('get')) {
            $request->validate([
                'user_id' => 'required'
            ]);
            $retaliation = Bank::where('user_id', '=', $request->user_id)->first();
            if ($retaliation) {
                $response = [
                    'code' => 200,
                    'data' => $retaliation,
                    'error_msg' => trans('alert.no_error')
                ];
            } else {
                $response = [
                    'code' => 200,
                    'data' => $obj = new \stdClass(),
                    'error_msg' => trans('alert.record_not_found')
                ];
            }
        } else {
            $response = [
                'code' => 400,
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

    public function weeklyEarning(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $data = [];
        $price_week_year = DB::select(
            'SELECT 
            WEEK(created_at) weeks,
            YEAR(created_at) years,
            sum(service_price) as amount
            FROM system_jobs 
            WHERE job_status = ?
            AND customer_approval = ?
            AND provider_id = ?
            AND created_at >= (select MIN(created_at) from system_jobs where provider_id = ?)
            GROUP BY WEEK(created_at),YEAR(created_at)',
            [Job::complete, Job::customer_approved, $request->user_id, $request->user_id]
        );
        $job_count = DB::select(
            'SELECT 
            Count(id) as job_count
            FROM system_jobs 
            WHERE job_status = ?
            AND customer_approval = ?
            AND provider_id = ?
            AND created_at >= (select MIN(created_at) from system_jobs where provider_id = ?)
            GROUP BY WEEK(created_at),YEAR(created_at)',
            [Job::complete, Job::customer_approved, $request->user_id, $request->user_id]
        );
        if (count($price_week_year) >= 0 && count($job_count) >= 0) {
            for ($i = count($price_week_year) - 1; $i >= 0; $i--) {

                $obj = new \stdClass();
                $obj->dates = startEndDateOfWeek($price_week_year[$i]->weeks, $price_week_year[$i]->years);
                $obj->amount = $price_week_year[$i]->amount;
                $obj->job_count = $job_count[$i]->job_count;

                array_push($data, $obj);
            }
            $response = [
                'code' => 200,
                'data' => $data,
                'error_msg' => trans('alert.no_error')
            ];
        } else {
            $response = [
                'code' => 300,
                'data' => [],
                'error_msg' => 'An error occured!'
            ];
        }
        return response()->json($response);
    }

    protected
    function getUser($request)
    {
        $response = [];
        $user = User::where('email', '=', $request->email)
            ->where('type', '=', User::provider)
            ->first();
        if (!empty($user)) {
            if ($user->status == User::active || $user->status == User::pending) {
                $check = Hash::check($request->password, $user->password);
                if ($check) {
                    //                    if (empty($user->fcm_token)) {
                    $updtUsr = User::find($user->id);
                    $updateChk = $updtUsr->update(['fcm_token' => $request->fcm_token]);
                    if ($updateChk) {
                        $provideData = Provider::where("user_id", "=", $user->id)->first();
                        $response = [
                            'code' => 200,
                            'data' => [
                                "status" => trans("alert.account_data_successfully_reterived"),
                                'userProfile' => $updtUsr,
                                'ProviderDetails' => $provideData,
                            ],
                            'error_msg' => trans('alert.no_error')
                        ];
                    } else {
                        $response = [
                            'code' => 500,
                            'data' => [],
                            'error_msg' => trans('alert.schema_error')
                        ];
                    }
                    //                    } else { //
                    //                        $response = [
                    //                            'code' => 201,
                    //                            'data' => [],
                    //                            'error_msg' => trans('alert.already_login')
                    //                        ];
                    //                    } //
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
                $provider = Provider::where('user_id', '=', $user->id)->first();
                Provider::where('id', '=', $provider->id)->update(['job_status' => Provider::signedout]);
                ProviderWorkerLogRepository::updateProviderLogged($provider);
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
            ->where('type', '=', User::provider)
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
            ->where('type', '=', User::provider)
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
            ->where('type', '=', User::provider)
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
            ->where('type', '=', User::provider)
            ->first();
        if (!empty($user)) {
            $response = true;
        } else {
            $response = false;
        }
        return $response;
    }

    protected
    function registerUser($request)
    {
        $response = [];
        $data = [
            'username' => $request->username, //
            'first_name' => !empty($request->first_name) ? $request->first_name : "",
            'last_name' => !empty($request->last_name) ? $request->last_name : "",
            'email' => $request->email, //
            'phone' => $request->phone, //
            'address' => !empty($request->address) ? $request->address : "",
            'status' => User::pending,
            'type' => User::provider,
            'password' => !empty($request->password) ? Hash::make($request->password) : Hash::make($request->phone)
        ];
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
        //        dd($insertData,$data);
        if ($insertData) {
            $provideData = [
                'user_id' => $insertData->id,
                'radius' => !empty($request->radius) ? $request->radius : 3, //
                'approval_status' => Provider::unApprove,
                'job_status' => Provider::signedout,
            ];
            if ($request->hasFile('license_img')) {
                $provideData['license_img'] = $request->file('license_img')->store('license_img');
            }
            $insertProvideData = Provider::create($provideData);
            if ($insertProvideData) {
                $provideData = Provider::where("user_id", "=", $insertData->id)->first();
                $response = [
                    'code' => 200,
                    'data' => [
                        "status" => trans("alert.account_created"),
                        "userProfile" => $insertData,
                        "ProviderDetails" => $provideData
                    ],
                    'error_msg' => trans('alert.no_error')
                ];
            } else {
                $response = [
                    'code' => 500,
                    'data' => [],
                    'error_msg' => trans('alert.schema_error')
                ];
            }
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
    function updateWorkStatusUser($request)
    {
        $response = [];
        $status = Provider::signedout;
        if (Provider::free == $request->job_status) {
            $status = Provider::free;
            $providerDetails = Provider::where('user_id', '=', $request->user_id)->first();
            ProviderWorkerLogRepository::createProviderLogged($providerDetails);
        } else if (Provider::busy == $request->job_status) {
            $status = Provider::busy;
        } else if (Provider::waiting == $request->job_status) {
            $status = Provider::waiting;
        } else if (Provider::signedout == $request->job_status) {
            $status = Provider::signedout;
            $providerDetails = Provider::where('user_id', '=', $request->user_id)->first();
            ProviderWorkerLogRepository::updateProviderLogged($providerDetails);
        } else {
            return $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('alert.invalid_user')
            ];
        }

        $data = [
            'job_status' => $request->job_status
        ];
        $userUpdate = Provider::where('user_id', '=', $request->user_id)->update($data);
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
        $user = "";
        if (!empty($request->social_id)) {
            $user = User::where('social_id', '=', $request->social_id)
                ->where('type', '=', User::provider)
                ->first();
        } else {
            $user = User::where('fcm_token', '=', $request->fcm_token)
                ->where('type', '=', User::provider)
                ->first();
        }
        //dd($user);
        if (empty($user)) {
            return $response = [
                'code' => 405,
                'data' => [],
                'error_msg' => trans('alert.invalid_user')
            ];
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
        if (!empty($request->fcm_token)) {
            $data['fcm_token'] = $request->fcm_token;
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
        if ($request->hasFile('avatar_file')) {
            $data['avatar'] = $request->file('avatar_file')->store('avatar_file');
        }
        $userUpdate = User::where('id', '=', $user->id)->update($data);
        if ($userUpdate) {
            $provideData = [];
            if (!empty($request->radius)) {
                $provideData = [
                    'radius' => $request->radius,
                ];
            }
            if ($request->hasFile('license_img')) {
                $provideData['license_img'] = $request->file('license_img')->store('license_img');
            }
            $providerUpdate = Provider::where('user_id', '=', $user->id)->update($provideData);
            //            dd($request,$userUpdate,$provideData,$providerUpdate);
            if ($providerUpdate) {
                $userData = User::find($user->id);
                $providerData = Provider::where("user_id", "=", $user->id)->first();
                $response = [
                    'code' => 200,
                    'data' => [
                        "status" => trans("alert.account_data_successfully_reterived"),
                        'userProfile' => $userData,
                        'ProviderDetails' => $providerData,
                    ],
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

    protected
    function requestApproval($request)
    {
        $response = [];
        $data = [];
        $validation_rules = [
            'job_id' => 'required',
        ];
        $request->validate($validation_rules);
        $job = Job::find($request->job_id);
        if (!empty($job)) {
            $data["job_status"] = Job::requestApproval;
            if ($request->hasFile('after_work_img')) {
                $data['after_work_img'] = $request->file('after_work_img')->store('after_work_img');
            }
            $data = $job->update($data);
            $job_data = Job::find($request->job_id);
            $customer = User::find($job_data->customer_id);
            if (!empty($customer->fcm_token)) {
                PushNotifications::sendJobPushNotification("Job Approval Request", "checkCurrentJob", "Job is updated!.", $customer->fcm_token);
            }
            $response = [
                'code' => 200,
                'data' => $job_data,
                'msg' => trans('Updated')
            ];
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
    function setRating($request)
    {
        $response = [];
        $data = [];
        $validation_rules = [
            'job_id' => 'required',
        ];
        $request->validate($validation_rules);
        $job = Job::find($request->job_id);
        if (!empty($job)) {
            $data["customer_rating"] = $request->customer_rating;
            $data = $job->update($data);
            $job_data = Job::find($request->job_id);
            $customer = User::find($job->customer_id);
            //                        dd($request->all(),$data,$customer);
            $c_rating = $customer->rating;
            if ($c_rating != 0) {
                $c_rating = !empty($request->customer_rating) ? $c_rating + $request->customer_rating : $c_rating + 0;
                $c_rating = $c_rating / 2;
            } else {
                $c_rating = !empty($request->customer_rating) ? $c_rating + $request->customer_rating : $c_rating + 0;
                //                $c_rating = $c_rating / 2;
            }
            $customer->update([
                'rating' => $c_rating,
            ]);
            if (!empty($customer->fcm_token)) {
                PushNotifications::sendJobPushNotification("Thanks for Using Instatask", "checkCurrentJob", "Job is Completed!.", $customer->fcm_token);
            }
            $response = [
                'code' => 200,
                'data' => $job_data,
                'msg' => trans('Updated')
            ];
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
}
