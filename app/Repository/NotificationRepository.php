<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 14/06/2019
 * Time: 6:09 PM
 */

namespace App\Repository;


use App\Job;
use App\Notification;
use Carbon\Carbon;

class NotificationRepository
{
    public static function getNofications()
    {
        $repository = new NotificationRepository();
        $notifications = $repository->getJobExeedingNotifications();
        return $notifications;
    }

    public function getJobExeedingNotifications(){
        return Notification::where('viewed','=',Notification::not_viewed)
            ->get();
    }

    public function setNotification(){
        $whereStatus = [
            Job::leave_for_job,
            Job::pending,
            Job::accept,
            Job::working,
            Job::arrived,
            Job::requestApproval
        ];
        $exeed_limit_jobs = Job::whereIn('job_status', $whereStatus)
            ->where('admin_notify','=',Job::admin_not_notified)
            ->get();
        if (!empty($exeed_limit_jobs)) {
            $seconds = 10800; // 3 hours
//            $seconds = 720; // 12 mins for testing time
            foreach ($exeed_limit_jobs as $job):
                $thresholdTime = Carbon::createFromTimestamp($job->job_schedual_time, "UTC")->addSeconds($seconds)->getTimestamp();
                $currenctTimeStamp = Carbon::now("UTC")->getTimestamp();
                if ($thresholdTime <= $currenctTimeStamp) {
                    Job::where('id', '=', $job->id)->update(['admin_notify' => Job::admin_notified]);
                    $obj = new \stdClass();
                    $obj->job_id = $job->id;
                    $obj->url = "admin/jobs/edit/".$job->id;
                    Notification::create([
                        "title" => "Job ID #".$job->id." Time Exeeds",
                        "type" => Notification::exeed_job_time_limit,
                        "data" => json_encode($obj),
                        "viewed" => Notification::not_viewed
                    ]);
                }
            endforeach;
        }
    }

    public static function markViewd($id){
        return Notification::where('id','=',$id)->update([
            'viewed' => Notification::viewed
        ]);
    }
}