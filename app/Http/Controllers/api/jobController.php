<?php

namespace App\Http\Controllers\api;

use App\Classes\PushNotifications;
use App\Classes\timeZone;
use App\Job;
use App\JobDispatchLog;
use App\Jobs\addDispatchLogsDb;
use App\Jobs\DissmisSystemJobs;
use App\Mail\defaultNotify;
use App\Provider;
use App\Repository\dispatcher\BottomBarRepository;
use App\Repository\dispatcher\rightSideBarRepository;
use App\Repository\DispatchJobRepository;
use App\Repository\ProviderWorkerLogRepository;
use App\Repository\TimeLoggerRepository;
use App\Repository\UserStripeRepository;
use App\Service;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;


class jobController extends Controller
{

    public function getDrivers(Request $request){
        $response = [];
        if ($request->isMethod('get')) {
            $response = BottomBarRepository::getDriversRequest($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function getBookings(Request $request){
        $response = [];
        if ($request->isMethod('get')) {
            $response = rightSideBarRepository::getBookingRequest($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function jobEditRequest(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->EditRequest($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function editRequestStatus(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->EditJobStatus($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function checkJobById(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->getJobById($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function checkPreviousJob(Request $request) // for customer and sp both users
    {
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->previousJobs($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    //    customerApprove
    public function customerApprove(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->customerApproveJob($request);
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
    public function checkCurrentJob(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $data = [
                'user_id' => $request->user_id,
                'type' => $request->type,
            ];
            $response = $this->currentJob($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function checkPendingJob(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $data = [
                'user_id' => $request->user_id,
                'type' => $request->type,
            ];
            $response = $this->pendingJobs($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function acceptJob(Request $request)
    {
//        dd($request->all());
        $response = [];
        if ($request->isMethod('post')) {
            $data = [
                'provider_id' => $request->driver_id,
                'job_status' => Job::accept
            ];
            $response = $this->driverUpdateJob($request, $data);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function rejectJob(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $data = [
                'provider_id' => $request->provider_id,
                'job_id' => $request->job_id,
            ];
            $response = $this->driverRejectJob($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function driverRejectJob($request)
    {
        $response = [];
        $validation_rules = [
            'provider_id' => 'required',
            'job_id' => 'required',
        ];
        $request->validate($validation_rules);
        Provider::where('user_id', '=', $request->provider_id)->update(['queued_job' => 0]);
        $response = JobDispatchLog::where('job_id', '=', $request->job_id)
            ->where('provider_id', '=', $request->job_id)
            ->update([
                'job_accept_status' => JobDispatchLog::job_dispatched_dismiss
            ]);
        $resp = new \stdClass();
//        if ($response) {
            $status = new \stdClass();
            $status->status = $response;
            $resp->data = $status;
            $resp->code = 200;
            $resp->error_msg = "No Error!";
//        }else{
//            $status = new \stdClass();
//            $status->status = $response;
//            $resp->data = $status;
//            $resp->code = 500;
//            $resp->error_msg = "Error!";
//        }
        return $resp;
    }

    public function storeJob(Request $request)
    {
//        dd($request->all());
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->store($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    public function updateStatus(Request $request)
    {
        $response = [];
        if ($request->isMethod('post')) {
            $response = $this->updateJobStatus($request);
        } else {
            $response = [
                'code' => 401,
                'data' => [],
                'error_msg' => trans('alert.invalid_request')
            ];
        }
        return response()->json($response);
    }

    protected function store($request)
    {
//        dd("tallal");
        $response = [];
        $services = Service::where('title', '=', $request->title)->first();
        if (!empty($services)) {
            $data = [
                'service_id' => $services->id,
                'service_name' => $services->title,
                'service_price' => $request->service_price
            ];
            if (!empty($request->lat)) {
                $data['lat'] = $request->lat;
            }
            if (!empty($request->lng)) {
                $data['lng'] = $request->lng;
            }
            if (!empty($request->location_address)) {
                $data['location_address'] = $request->location_address;
            }
            if (!empty($request->customer_id)) {
                $data['customer_id'] = $request->customer_id;
//                $customer = User::find($request->customer_id);
//                if (!empty($request->timeStamp)) {
//                    $data['job_schedual_time'] = timeZone::getSchadualTimeToUtc($customer, $request->timeStamp);
//                }else{
//                    $data['job_schedual_time'] = timeZone::getSchadualTimeToUtc($customer, $request->timeStamp);
//                }
            }
            if ($request->hasFile('current_situation_img')) {
                $data['current_situation_img'] = $request->file('current_situation_img')->store('current_situation_img');
            }
            if ($request->hasFile('after_work_img')) {
                $data['after_work_img'] = $request->file('after_work_img')->store('after_work_img');
            }
//            var_dump($data);exit();
            if (empty($request->id) || $request->id == 0) {
                return $this->create($request, $data);
            } else {
                return $this->update($request, $data);
            }
        } else {
            return ['error_msg' => trans('alert.record_unable_to_save')];
        }
    }

    public function create($request, $data)
    {
        if (!empty($request->customer_id)) {
            $customer = User::find($request->customer_id);
            if (!empty($request->timeStamp)) {
                $data['job_schedual_time'] = timeZone::getSchadualTimeToUtc($customer, $request->timeStamp); // to schadual job user need to send future time stamp
            } else {
                $data['job_schedual_time'] = timeZone::getSchadualTimeToUtc($customer); // for instant dispatch system will run this
            }
        }
        $data['job_status'] = empty($data['provider_id']) ? Job::pending : Job::accept;
        $data['customer_approval'] = Job::customer_not_complete;
        $validation_rules = [
            'service_price' => 'required',
        ];
        $request->validate($validation_rules);
        $response = [];
        $created = Job::create($data);

        if (!empty($request->payment_card_token)) {
            $dataArr = [
                'user_id' => $request->customer_id,
//                'token' => $request->payment_card_token,
                'job_id' => $created->id,
            ];
            $payment = UserStripeRepository::chargeCustomer($request, $dataArr);
            if (!$payment) {
                return $response = [
                    'code' => 500,
                    'error_msg' => trans('alert.payment_not_done'),
                    'last_insert_id' => 0,
                    'data' => [
                        'success_msg' => "",
                        'last_insert_id' => 0,
                    ]
                ];
            }
        }

        $customer = User::find($created->customer_id);
        $body = "<p>Job Created successfully!.</p>
                    we are hereby to inform you that your job is created. Kindly inform this
                    to our help center if this is mistake by company.</p>
                    <br><br><p>
                    Regards Instatask</p>";
        if (!empty($customer->email)) {
            if (!empty($data['provider_id'])) {
                $provider = User::find($data['provider_id']);
//                PushNotifications::sendJobPushNotification("New Job", "checkCurrentJob", "Job is assigned.", $provider->fcm_token);
            }
            $this->notify($customer->email, "Job is created", $body);
        }
        if ($created) {
            $response = [
                'code' => 200,
                'success_msg' => trans('alert.record_updated'),
                'last_insert_id' => $created->id,
                'data' => [
                    'success_msg' => trans('alert.record_updated'),
                    'job_status' => 2,
                    'last_insert_id' => $created->id,
                ]
            ];
        } else {
            $response = [
                'code' => 500,
                'error_msg' => trans('alert.record_unable_to_save'),
                'last_insert_id' => 0,
                'data' => [
                    'success_msg' => "",
                    'last_insert_id' => 0,
                ]
            ];
        }
        $this->dispatch(new addDispatchLogsDb());
        return $response;
    }

    public function update($request, $data)
    {
        $data['job_status'] = empty($data['provider_id']) ? Job::pending : Job::accept;
        if ($request->job_status != Job::pending || $request->job_status != Job::accept) {
            $data['job_status'] = $request->job_status; // force updating
        }
        $data['customer_approval'] = $request->customer_approval;
        $validation_rules = [
            'service_price' => 'required',
        ];
        $request->validate($validation_rules);

        $response = [];
        $job = Job::find($request->id);
        if ($job->update($data)) {
            $body = "<p>Job Updated successfully!.</p>
                    we are hereby to inform you that your job is updated successfully. Kindly inform this
                    to our help center if this is mistake by company.</p>
                    <br><br><p>
                    Regards Instatask</p>";
            $customer = User::find($job->customer_id);
            $provider = User::find($job->provider_id);
            if (!empty($customer->email)) {
                $this->notify($customer->email, "Job is updated", $body);
            }
            if (!empty($provider->email)) {

                // in case of cancel
                if (
                    $request->job_status == Job::cancel ||
                    $request->job_status == Job::complete ||
                    $request->job_status == Job::pending ||
                    $request->job_status == Job::timeOut
                ) {
                    if ($provider->job_count == '1') {
                        $provider->update([
                            "job_status" => Provider::free
                        ]);
                        Provider::where('user_id', '=', $job->provider_id)->decrement("job_count");
                    } else {
                        Provider::where('user_id', '=', $job->provider_id)->decrement("job_count");
                    }
                }
                // in case of cancel
                $this->notify($provider->email, "Job is updated", $body);
            }
            $response = [
                'success_msg' => trans('alert.record_updated'),
                'last_insert_id' => $request->id
            ];
        } else {
            $response = [
                'error_msg' => trans('alert.record_unable_to_save'),
                'last_insert_id' => 0
            ];
        }
        if (!empty($provider->fcm_token)) {
            $provider = User::find($provider->id);
            PushNotifications::sendJobPushNotification("Job updates", "checkCurrentJob", "Job is updated!.", $provider->fcm_token);
        }
        if (!empty($customer->fcm_token)) {
//            dd($customer->fcm_token);
            $customer = User::find($customer->id);
            PushNotifications::sendJobPushNotification("Job updates", "checkCurrentJob", "Job is updated!.", $customer->fcm_token);
        }
        return $response;
    }

    public function driverAcceptJob($request, $data)
    {
        $response = [];
        $validation_rules = [
            'driver_id' => 'required',
            'job_id' => 'required',
        ];
        $request->validate($validation_rules);
        $job = Job::find($request->job_id);
        if ($job->update($data)) {
            Provider::where('user_id', '=', $request->driver_id)->update(["job_status" => Provider::busy]);
            $response = [
                'code' => 200,
                'data' => [
                    'job_id' => $request->job_id
                ],
                'msg' => trans('alert.record_updated')
            ];
        } else {
            $response = [
                'code' => 500,
                'data' => [],
                'msg' => trans('alert.record_unable_to_save'),
                'error_msg' => trans('alert.record_unable_to_save'),
            ];
        }
        return $response;
    }

    public function driverUpdateJob($request, $data)
    {
//        PushNotifications::dispatchDismissJobSilentNotification("123","fAvLiy_aGnU:APA91bEPsnC9ZwHnsh_5kOUaVUl_HEtZ0jIVymZt6jmAlsnIbWMqOj1P-oY2NAlkdCCIEpIx0mbHxglHnSMYWTHVCN68D5fjcfPWJ8cRQMvkZokAPpFYcbbA4yH9Y0lyLrr4MIcV2nsJ");
//        exit();
        $response = [];
        $validation_rules = [
            'driver_id' => 'required',
            'job_id' => 'required',
        ];
        $request->validate($validation_rules);
        $job = Job::find($request->job_id);
        if ($job->provider_id != 0) {
            Provider::where('user_id', '=', $job->provider_id)->update(["job_status" => Provider::free]);
            $provider = User::find($job->provider_id);
            PushNotifications::sendJobPushNotification("Provider is free", "checkCurrentJob", "Job is updated!.", $provider->fcm_token);
        }
        if ($job->update($data)) {
            Provider::where('user_id', '=', $request->driver_id)->update(["job_status" => Provider::busy]);
            Provider::where('user_id', '=', $request->driver_id)->increment("job_count");
            $job_data_details = Job::with('user')->where("id", '=', $request->job_id)->first();
            $response = [
                'code' => 200,
                'data' => $job_data_details,
                'msg' => trans('alert.record_updated')
            ];
            $provider = User::find($request->driver_id);
            PushNotifications::sendJobPushNotification("Job updates", "checkCurrentJob", "Job is assigned!.", $provider->fcm_token);

            $customer = User::find($job->customer_id);
            PushNotifications::sendJobPushNotification("Job updates", "checkCurrentJob", "Job is assigned!.", $customer->fcm_token);

//            PushNotifications::dispatchDismissJobSilentNotification($request->job_id,"fGXQmlYZnG4:APA91bHIlW_R4PWWsW24NyYefYculu1V-T6mZar3WmfqZix01BPWpmLtUIQdgSB2CWd2xNE-ARIkJaCy9vwgzcwk6UqR-RN6q3P9Ve7snKAWmPFIuZR5_zSxdOIiEXQOUWN2HFG5FYjB");
//            PushNotifications::dispatchDismissJobSilentNotification($request->job_id,"fVGGXd0nYew:APA91bFK2SaXlBaavYf2bLm0nD5tyvIuZxcnjO5T6YtjXdSjzM1SHXxkTmSDaNvVthZgRPdMrPDmadCHEq1jsB5N-C29oPC45MsM1R-LMkUFsl-wDgD0lnUfjkLTggOzwxJSzMvhVMs8");
//            DispatchJobRepository::dissmisJob($request->job_id);
//            DissmisSystemJobs::dispatch($request->job_id);
            $this->dispatch(new DissmisSystemJobs($request->job_id));
        } else {
            $response = [
                'code' => 500,
                'data' => [],
                'msg' => trans('alert.record_unable_to_save'),
                'error_msg' => trans('alert.record_unable_to_save')
            ];
        }
        return $response;
    }

    public function currentJob($request)
    {
        $response = [];
        $providerLastCompleteJob = false;
        $timeObj = false;
        $jobCount = false;
        $earnings = false;
        $currentDispatchedJob = false;
        $providerDetails = new \stdClass();
        $validation_rules = [
            'user_id' => 'required',
            'type' => 'required',
        ];
        $request->validate($validation_rules);
        $job = [];
        $whereStatus = [
            Job::leave_for_job,
            Job::pending,
            Job::accept,
            Job::working,
            Job::arrived,
            Job::requestApproval,
        ];
        if ($request->type == User::customer) {
            $job = Job::with('user')->with('provider')
                ->where('customer_id', '=', $request->user_id)
                ->whereIn('job_status', $whereStatus)
                ->where('customer_approval', '=', Job::customer_not_complete)
                ->first();
        }
        if ($request->type == User::provider) {
            $job = Job::with('user')
                ->with('provider')
                ->where('provider_id', '=', $request->user_id)
                ->whereIn('job_status', $whereStatus)
                ->where('customer_approval', '=', Job::customer_not_complete)
                ->first();
            $providerDetails = Provider::where('user_id', '=', $request->user_id)->first();
            $providerLastCompleteJob = Job::with('user')
                ->with('provider')
                ->where('provider_id', '=', $request->user_id)
                ->where('job_status', '=', Job::complete)
                ->where('customer_approval', '=', Job::customer_approved)
                ->orderBy("job_schedual_time", 'desc')
                ->first();
            $timeObj = new \stdClass();
            $timeObj->important = "values are in seconds and last login should be converted into client side timezone then use further";
            $timeObj->todayWorkingHours = TimeLoggerRepository::getTodayDuration($providerDetails->id); // fetch from db and create sum of first > yesterday logged_in time with last > yesterday logged_out time
            $timeObj->lastLoginTime = ProviderWorkerLogRepository::getLastLoggedInTime($providerDetails); // client side need to convert this into time with current timezone
            $jobCount = ProviderWorkerLogRepository::getTodayTrips($providerDetails);
            $earnings = ProviderWorkerLogRepository::getTodayEarnings($providerDetails);
            $currentDispatchedJob = DispatchJobRepository::getCurrentDispatchedJob($providerDetails);
        }

        if (!empty($job)) {
            $obj = new \stdClass();
            $obj->providerDetails = $providerDetails;
            $obj->job = $job;
            $providerLastCompleteJob ? $obj->lastJob = $providerLastCompleteJob : $obj->lastJob = new \stdClass();
            $currentDispatchedJob ? $obj->currentDispatchedJob = $currentDispatchedJob : $obj->currentDispatchedJob = new \stdClass();
            $timeObj ? $obj->providerTimeLogs = $timeObj : $obj->providerTimeLogs = new \stdClass();
            $jobCount ? $obj->todayJobCount = $jobCount : $obj->todayJobCount = 0;
            $earnings ? $obj->todayJobEarnings = $earnings : $obj->todayJobEarnings = 0;
            $response = [
                'code' => 200,
                'data' => $obj,
                'msg' => trans('alert.job_found')
            ];
        } else {
            // on job not found this will always send 3 status in checkcurrent api to make the app move in default mode
            $obj = new \stdClass();
            $obj->job_status = 3;
            $obj->providerDetails = $providerDetails;
            $providerLastCompleteJob ? $obj->lastJob = $providerLastCompleteJob : $obj->lastJob = new \stdClass();
            $currentDispatchedJob ? $obj->currentDispatchedJob = $currentDispatchedJob : $obj->currentDispatchedJob = new \stdClass();
            $timeObj ? $obj->providerTimeLogs = $timeObj : $obj->providerTimeLogs = new \stdClass();
            $jobCount ? $obj->todayJobCount = $jobCount : $obj->todayJobCount = 0;
            $earnings ? $obj->todayJobEarnings = $earnings : $obj->todayJobEarnings = 0;
            $obj->providerTimeLogs = $timeObj;
            $obj->user = User::find($request->user_id);
            $response = [
                'code' => 200,
                'data' => $obj,
                'msg' => trans('alert.job_not_found'),
                'error_msg' => trans('alert.job_not_found')
            ];
        }
        return $response;
    }

    public function pendingJobs($request)
    {
        $response = [];
        $providerDetails = new \stdClass();
        $validation_rules = [
            'user_id' => 'required',
            'type' => 'required',
        ];
        $request->validate($validation_rules);
        $job = [];
        $whereStatus = [
//            Job::leave_for_job,
//            Job::pending,
            Job::accept,
//            Job::working,
//            Job::arrived,
//            Job::requestApproval,
        ];
        if ($request->type == User::customer) {
            $job = Job::with('user')->with('provider')
                ->where('customer_id', '=', $request->user_id)
                ->whereIn('job_status', $whereStatus)
                ->where('customer_approval', '=', Job::customer_not_complete)
                ->get();
        }
        if ($request->type == User::provider) {
            $job = Job::with('user')
                ->with('provider')
                ->where('provider_id', '=', $request->user_id)
                ->whereIn('job_status', $whereStatus)
                ->where('customer_approval', '=', Job::customer_not_complete)
                ->get();
            $providerDetails = Provider::where('user_id', '=', $request->user_id)->first();
        }
        if (!empty($job)) {
            $obj = new \stdClass();
            $obj->providerDetails = $providerDetails;
            $obj->job = $job;
            $response = [
                'code' => 200,
                'data' => $obj,
                'msg' => trans('alert.job_found')
            ];
        } else {
            // on job not found this will always send 3 status in checkcurrent api to make the app move in default mode
            $obj = new \stdClass();
            $obj->job_status = 3;
            $obj->providerDetails = $providerDetails;
            $obj->user = User::find($request->user_id);
            $response = [
                'code' => 200,
                'data' => $obj,
                'msg' => trans('alert.job_not_found'),
                'error_msg' => trans('alert.job_not_found')
            ];
        }
        return $response;
    }

    public function cancelJob(Request $request)
    {
        $response = [];
        $validation_rules = [
            'job_id' => 'required'
        ];
        $request->validate($validation_rules);
        $modelValue = Job::find($request->job_id);
        if ($modelValue->update(["job_status" => Job::cancel])) {
            $job = Job::find($request->job_id);
            $pro = Provider::where('user_id', '=', $job->provider_id)->first();
//            dd(!empty($pro) &&);
            if (!empty($pro) && $pro->job_count == '1') {
                $pro->update([
                    "job_status" => Provider::free
                ]);
                Provider::where('user_id', '=', $job->provider_id)->decrement("job_count");
            } elseif (!empty($pro) && $pro->job_count > '1') {
                Provider::where('user_id', '=', $job->provider_id)->decrement("job_count");
            }
            DispatchJobRepository::emptyQueuedJob($request->job_id);
            $response = [
                'code' => 200,
                'data' => ["status" => 200],
                'msg' => trans('alert.job_cancel'),
                'success_msg' => trans('alert.job_cancel')
            ];
        } else {
            $response = [
                'code' => 500,
                'data' => [],
                'msg' => trans('alert.job_not_found'),
                'error_msg' => trans('alert.job_unable_to_cancel')
            ];
        }
        if (!empty($modelValue->provider_id)) {
            $provider = User::find($modelValue->provider_id);
            PushNotifications::sendJobPushNotification("Job Canceled", "checkCurrentJob", "Job is canceled.", $provider->fcm_token);
        }
        if (!empty($modelValue->customer_id)) {
            $customer = User::find($modelValue->customer_id);
            PushNotifications::sendJobPushNotification("Job Canceled", "checkCurrentJob", "Job is canceled.", $customer->fcm_token);
        }
        return $response;
    }

    protected
    function customerApproveJob($request)
    {
        /**
         * job_status will be true
         * need to add rating column in db and need to add here
         */
//        dd($request->all());
        $response = [];
        $responseStatus = "";
        if ($request->approve == Job::customer_approved) {
            $data = [
                'job_status' => Job::complete,
                'customer_approval' => Job::customer_approved,
                'feedback' => !empty($request->feedback) ? $request->feedback : "",
            ];
            $responseStatus = trans("alert.job_approve");
        }
        if ($request->approve == Job::customer_not_complete) {
            $data = [
                'job_status' => Job::working,
                'customer_approval' => Job::customer_not_complete,
                'feedback' => !empty($request->feedback) ? $request->feedback : "",
            ];
            $responseStatus = trans("alert.job_disapprove");
        }
        $job = Job::where('id', '=', $request->job_id)
            ->update($data);
        if ($job) {
            $job = Job::find($request->job_id);
            $pro = Provider::where('user_id', '=', $job->provider_id)->first();
            if (!empty($pro) && $pro->job_count == '1') {
                $pro->update([
                    "job_status" => Provider::free
                ]);
                Provider::where('user_id', '=', $job->provider_id)->decrement("job_count");
            } elseif (!empty($pro) && $pro->job_count > '1') {
                Provider::where('user_id', '=', $job->provider_id)->decrement("job_count");
            }
            $response = [
                'code' => 200,
                'data' => [
                    "status" => $responseStatus
                ],
                'error_msg' => trans('alert.no_error')
            ];
        } else {
            $response = [
                'code' => 500,
                'data' => [
                    "status" => $responseStatus
                ],
                'error_msg' => trans('alert.schema_error')
            ];
        }
        $body = "<p>Job completed successfully!.</p>
                    we are hereby to inform you that your job is completed successfully. Kindly inform this
                    to our help center if this is mistake by company.</p>
                    <br><br><p>
                    Regards Instatask</p>";
        $job = Job::find($request->job_id);
        if (!empty($request->driver_rating)) {
            $job->update(['driver_rating' => $request->driver_rating]);
        }
        $customer = User::find($job->customer_id);
        if (!empty($customer->email) && $request->approve == Job::customer_approved) {
            $this->notify($customer->email, "Job is completed successfully", $body);
            if (!empty($customer->fcm_token)) {
                PushNotifications::sendJobPushNotification("Job completed successfully", "checkCurrentJob", "Job is Completed.", $customer->fcm_token);
            }
        }

        $provider = User::find($job->provider_id);
        if (!empty($provider->email) && $request->approve == Job::customer_approved && !empty($request->driver_rating)) {
            $p_rating = $provider->rating;
            if ($p_rating != 0) {
                $p_rating = !empty($request->driver_rating) ? $p_rating + $request->driver_rating : $p_rating + 0;
                $p_rating = $p_rating / 2;
            } else {
                $p_rating = !empty($request->driver_rating) ? $p_rating + $request->driver_rating : $p_rating + 0;
            }
            $provider->update([
                'rating' => $p_rating,
            ]);
            $this->notify($provider->email, "Job is completed successfully", $body);
            if (!empty($provider->fcm_token)) {
                PushNotifications::sendJobPushNotification("Job completed successfully", "rating/$request->job_id", "Job is Completed.", $provider->fcm_token);
            }
        }

        if (!empty($provider->email) && $request->approve == Job::customer_not_complete) {
            if (!empty($provider->fcm_token)) {
                PushNotifications::sendJobPushNotification("Job Not Approved", "checkCurrentJob", "Job Not Approved.", $provider->fcm_token);
            }
        }

        return $response;
    }

    public function jobDispatch(Request $request)
    {
        $jobs = new DispatchJobRepository();
        return $jobs->dispatchJob();
    }

    public function timeout(Request $request)
    {
        $jobs = new DispatchJobRepository();
        $jobs->timeOutJob();
    }

    public function previousJobs($request)
    {
        $response = [];
        $validation_rules = [
            'user_id' => 'required',
            'type' => 'required',
        ];
        $request->validate($validation_rules);
        $job = [];
        $whereStatus = [
            Job::complete,
            Job::timeOut,
            Job::cancel,
        ];

        if ($request->type == User::provider) {
            $job = Job::with('user')->with('provider')
                ->where('provider_id', '=', $request->user_id)
                ->whereIn('job_status', $whereStatus)
                ->get();
        }
        if ($request->type == User::customer) {
            $job = Job::with('user')->with('provider')
                ->where('customer_id', '=', $request->user_id)
                ->whereIn('job_status', $whereStatus)
                ->get();
        }
//        dd($job);
        if (!empty($job) && $job->count() > 0) {
            $response = [
                'code' => 200,
                'data' => $job,
                'msg' => trans('alert.job_found')
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

    public function getJobById($request)
    {
        $response = [];
        $validation_rules = [
            'job_id' => 'required',
        ];
        $request->validate($validation_rules);
        $job = Job::find($request->job_id);
        if (!empty($job)) {
            $data = Job::with('user')->where("id", '=', $request->job_id)->first();
            $response = [
                'code' => 200,
                'data' => $data,
                'msg' => trans('alert.job_found')
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

    public function updateJobStatus($request)
    {
        $response = [];
        $data = [];
        $validation_rules = [
            'job_id' => 'required',
            'job_status' => 'required',
        ];
        $request->validate($validation_rules);
        $job = Job::find($request->job_id);
        if (!empty($job)) {
            $data["job_status"] = $request->job_status;
            if ($request->hasFile('current_situation_img')) {
                $data['current_situation_img'] = $request->file('current_situation_img')->store('current_situation_img');
            }
            if ($request->hasFile('after_work_img')) {
                $data['after_work_img'] = $request->file('after_work_img')->store('after_work_img');
            }
            $data = $job->update($data);
            $job_data = Job::find($request->job_id);
            $job_data_details = "";
            $provider = User::find($job_data->provider_id);
            if (!empty($provider->fcm_token)) {
                $job_data_details = Job::with('user')->where("id", '=', $request->job_id)->first();
                PushNotifications::sendJobPushNotification("Job updates", "checkCurrentJob", "Job is updated!.", $provider->fcm_token);
            }
            $customer = User::find($job_data->customer_id);
            if (!empty($customer->fcm_token)) {
                $job_data_details = Job::with('provider')->where("id", '=', $request->job_id)->first();
                PushNotifications::sendJobPushNotification("Job updates", "checkCurrentJob", "Job is updated!.", $customer->fcm_token);
            }
            $response = [
                'code' => 200,
                'data' => $job_data_details,
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

    public function EditRequest($request)
    {
        $response = [];
        $data = [];
        $validation_rules = [
            'job_id' => 'required',
        ];
        $request->validate($validation_rules);
        $job = Job::find($request->job_id);
        if (!empty($job)) {
            $data["edit_job"] = 1;

            $data = $job->update($data);
            $job_data = Job::find($request->job_id);
            $job_data_details = "";
            $provider = User::find($job_data->provider_id);
            if (!empty($provider->fcm_token)) {
                $job_data_details = Job::with('user')->where("id", '=', $request->job_id)->first();
                PushNotifications::sendJobPushNotification("Job Edit Request", "editRequestStatus", "Job Edit Request!.", $provider->fcm_token);
            }
            $response = [
                'code' => 200,
                'data' => $job_data_details,
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

    public function EditJobStatus($request)
    {
        $response = [];
        $data = [];
        $validation_rules = [
            'job_id' => 'required',
            'status' => 'required',
        ];
        $request->validate($validation_rules);
        $job = Job::find($request->job_id);
        if (!empty($job)) {
            $data["edit_job"] = $request->status; // 0 | 1

            $data = $job->update($data);
            $job_data = Job::find($request->job_id);
            $job_data_details = new \stdClass();;
//            $provider = User::find($job_data->provider_id);
            $customer = User::find($job->customer_id);
            if (!empty($customer->fcm_token)) {
                if ($request->status == 1) {
                    PushNotifications::sendJobPushNotification("Job Edit Enable", "Job_Edit_Enable", "Job Edit Request Enable!.", $customer->fcm_token);
                } else {
                    PushNotifications::sendJobPushNotification("Job Edit Cancel", "Job_Edit_Cancel", "Job Edit Request Cancel!.", $customer->fcm_token);
                }
            }

            $response = [
                'code' => 200,
                'data' => $job_data_details,
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


    public function notify($email, $subject, $body)
    {
        Mail::to($email)->send(new defaultNotify($subject, $body));
    }
}
