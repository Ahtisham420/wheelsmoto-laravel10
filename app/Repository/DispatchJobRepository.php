<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 15/05/2019
 * Time: 5:08 PM
 */

namespace App\Repository;


use App\Classes\PushNotifications;
use App\Job;
use App\JobDispatchLog;
use App\Jobs\addDispatchLogsDb;
use App\Provider;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DispatchJobRepository
{

    public function dispatchJob()
    {
        $unDispatechedJobs = Job::with('user')
            ->where('job_status', '=', Job::pending)
            ->where('auto_dispatch', '=', Job::auto_dispatched_not)
            ->get();
        if (!empty($unDispatechedJobs)) {
//            dd($unDispatechedJobs);
            foreach ($unDispatechedJobs as $job):
//                Job::where('id', '=', $job->id)->update(['auto_dispatch' => Job::auto_dispatched]); need to open it
                $dispatchTime = Carbon::createFromTimestamp($job->job_schedual_time, "UTC")->getTimestamp();
                $currenctTimeStamp = Carbon::now("UTC")->getTimestamp();
                if ($currenctTimeStamp >= $dispatchTime) {
                    $providers = $this->getNearByProviders($job->lat, $job->lng);
                    foreach ($providers as $provider):
                        if (!empty($provider->fcm_token)) {
                            PushNotifications::dispatchNewJobPushNotification("New Job Request", "A new job has been created!", "checkJobById_".$job->id, "New Job Request", $provider->fcm_token);
                            JobDispatchLog::create([
                                'job_id' => $job->id,
                                'provider_id' => $provider->usr_id,
                                'customer_id' => $job->customer_id,
                                'provider_fcm_token' => $provider->fcm_token
                            ]);
                            Job::where('id', '=', $job->id)->update(['auto_dispatch' => Job::auto_dispatched]);
                            Provider::where('user_id', '=', $provider->usr_id)->update(['queued_job' => $job->id]);
                        }
                    endforeach;
                }
            endforeach;
        }
//        echo "ok";
    }

    public static function dissmisJob($job_id)
    {
        $jobDispatchLogs = JobDispatchLog::where('job_id', '=', $job_id)->get();
        $job = Job::find($job_id);
        foreach ($jobDispatchLogs as $log):
            if (!empty($log->provider_fcm_token) && $log->job_accept_status == JobDispatchLog::job_dispatched_init) {
                if ($job->provider_id != $log->provider_id) {
                    PushNotifications::dispatchDismissJobSilentNotification($log->job_id, $log->provider_fcm_token);
                    JobDispatchLog::where('id', '=', $log->id)->update([
                        'job_accept_status' => JobDispatchLog::job_dispatched_dismiss
                    ]);
                } else {
                    JobDispatchLog::where('id', '=', $log->id)->update([
                        'job_accept_status' => JobDispatchLog::job_dispatched_accept
                    ]);
                }
            }
            Provider::where('user_id', '=', $log->provider_id)->update(['queued_job' => 0]);
        endforeach;
    }

    public function timeOutJob()
    {
        $dispatechedJobs = Job::where('job_status', '=', Job::pending)
            ->where('auto_dispatch', '=', Job::auto_dispatched)
            ->get();
        if (!empty($dispatechedJobs)) {
            $seconds = 1.5;
            foreach ($dispatechedJobs as $job):
                $thresholdTime = Carbon::createFromTimestamp($job->job_schedual_time, "UTC")->addSeconds($seconds * 60)->getTimestamp();
                $currenctTimeStamp = Carbon::now("UTC")->getTimestamp();
                if ($thresholdTime <= $currenctTimeStamp) {
                    Job::where('id', '=', $job->id)->update(['job_status' => Job::timeOut]);
                    $customer = User::find($job->customer_id);
                    $body = "<p>Job canceled!.</p>
                    we are hereby to inform you that your job is unable to dispatch as all providers are busy please try later. Kindly inform this
                    to our help center if this is mistake by company.</p>
                    <br><br><p>
                    Regards Instatask</p>";
                    if (!empty($customer->fcm_token)) {
                        PushNotifications::sendJobPushNotification("time Out Job", "checkCurrentJob", "Job is dismised.", $customer->fcm_token);
                    }
                    DispatchJobRepository::emptyQueuedJob($job->id);
                }
            endforeach;
        }
    }

    public static function emptyQueuedJob($job_id)
    {
        Provider::where('queued_job', '=', $job_id)
            ->update([
                'queued_job' => 0
            ]);
    }

    public function cancelJob()
    {
        $dispatechedJobs = Job::where('job_status', '=', Job::pending)
            ->where('auto_dispatch', '=', Job::auto_dispatched)
            ->get();
        if (!empty($dispatechedJobs)) {
            $seconds = 60;
            foreach ($dispatechedJobs as $job):
                $thresholdTime = Carbon::createFromTimestamp($job->job_schedual_time, "UTC")->addSeconds($seconds * 60 * 60)->getTimestamp();
                $currenctTimeStamp = Carbon::now("UTC")->getTimestamp();
                if ($thresholdTime <= $currenctTimeStamp) {
                    Job::where('id', '=', $job->id)->update(['job_status' => Job::cancel]);
                    $customer = User::find($job->customer_id);
                    if (!empty($customer->fcm_token)) {
                        PushNotifications::sendJobPushNotification("Cancel Job", "checkCurrentJob", "Job is canceled.", $customer->fcm_token);
                    }
                }
            endforeach;
        }
    }

    public static function getCurrentDispatchedJob($provider)
    {
        return Job::with('user')
            ->with('service')
            ->where('id', '=', $provider->queued_job)
            ->where('job_status', '=', Job::pending)
            ->first();
    }

    public function getNearByProviders($lat, $lng, $circle_radius = 50000)
    {
//        return DB::select("SELECT * FROM
//                                (
//                                SELECT usr.id as usr_id,usr.fcm_token as fcm_token, first_name, last_name, address, phone, lat, lng, provdr.job_status, provdr.overall_rating,
//                                ($circle_radius
//                                * acos(cos(radians(  $lat  ))
//                                * cos(radians(lat)) * cos(radians(lng) - radians(  $lng  )) + sin(radians(  $lat  ))
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
//                                 ) AS distances
//                                  ORDER BY distance ");
        $km = $circle_radius / 1000;
        $query = "SELECT
                        *
                    FROM
                        (
                        SELECT
                            usr.id AS usr_id,
                            usr.fcm_token as fcm_token,
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
                                    COS(RADIANS(" . $lat . ")) * COS(RADIANS(lat)) * COS(
                                        RADIANS(lng) - RADIANS(" . $lng . ")
                                    ) + SIN(RADIANS(" . $lat . ")) * SIN(RADIANS(lat))
                                )
                            ) AS DISTANCE
                        FROM
                            users AS usr
                        LEFT JOIN
                            providers AS provdr
                        ON
                            provdr.user_id = usr.id
                        WHERE
                            usr.status = '0' 
                        AND 
                            usr.type = '1' 
                        AND provdr.approval_status = '0'  
                        AND  NOT provdr.job_status = '3'                     
                        AND provdr.queued_job = '0'   
                        AND provdr.radius <= " . $km . "                  
                        HAVING
                         DISTANCE < " . $km . "
                    ) AS distances
                    ORDER BY
                        DISTANCE";
        return DB::select($query);
    }
}