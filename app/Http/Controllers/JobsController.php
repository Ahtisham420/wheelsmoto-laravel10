<?php

namespace App\Http\Controllers;

use App\Classes\PushNotifications;
use App\Job;
use App\Provider;
use App\Repository\DispatchJobRepository;
use App\Service;
use App\User;
use Illuminate\Http\Request;

class JobsController extends Controller
{
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
        $jobs = Job::with('user')->with('provider')->orderBy('id', 'desc')
            ->paginate();
//        dd($jobs);
        $services = Service::all();
        return view('jobs.index', compact('jobs', 'services'));
    }

    public function form(Request $request)
    {
        $services = Service::all();
        $customers = User::where('type', '=', User::customer)->get();
        if (isset($request->id) && $request->id != 0) {
            $results = Job::with('user')->with('provider')->where('id', '=', $request->id)->first();
            if ($results instanceof Job) {
                $page_title = "Edit";
//                dd($results);
                return view('jobs.form', compact('page_title', 'results', 'services', 'customers'));
            }
            return $results;
        } else {
            $page_title = "Add";
            return view('jobs.form', compact('page_title', 'services', 'customers'));
        }
    }

    public function cancelJob(Request $request)
    {
        $modelValue = Job::find($request->id);
        if ($modelValue->update(["job_status" => Job::cancel])) {
            DispatchJobRepository::emptyQueuedJob($request->id);
            $response = ['success_msg' => trans('alert.job_cancel')];
        } else {
            $response = ['error_msg' => trans('alert.job_unable_to_cancel')];
        }
        if (!empty($modelValue->provider_id)) {
            $provider = User::find($modelValue->provider_id);
            if (!empty($provider->fcm_token)) {
                PushNotifications::sendJobPushNotification("Job Canceled", "checkCurrentJob", "Job is canceled.", $provider->fcm_token);
            }
            $pro = Provider::where('user_id', '=', $modelValue->provider_id)->first();
            if($pro->job_count == '1'){
                $pro->update([
                    "job_status" => Provider::free
                ]);
                Provider::where('user_id', '=', $modelValue->provider_id)->decrement("job_count");
            }else{
                Provider::where('user_id', '=', $modelValue->provider_id)->decrement("job_count");
            }
        }
        if (!empty($modelValue->customer_id)) {
            $customer = User::find($modelValue->customer_id);
            if (!empty($customer->fcm_token)) {
                PushNotifications::sendJobPushNotification("Job Canceled", "checkCurrentJob", "Job is canceled.", $customer->fcm_token);
            }
        }
        return redirect(route('all-jobs'))->withErrors($response);
//         $response;
    }
    public function search(Request $request)
    {
        
        $users = User::select('id')->where('first_name','LIKE','%'.$request->job.'%')->orWhere('last_name','LIKE','%'.$request->job.'%')->get();
        $users = $users->pluck('id');
        $jobs = Job::whereIn('customer_id',$users)->orWhereIn('provider_id',$users)->with('user')->with('provider')->orderBy('id', 'desc')
                ->paginate();
        $services = Service::all();
        return view('jobs.partials.result', compact('jobs', 'services'));
    }
}
