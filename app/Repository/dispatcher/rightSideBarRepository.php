<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 08/09/2019
 * Time: 7:27 PM
 */

namespace App\Repository\dispatcher;


use App\Job;
use Carbon\Carbon;

class rightSideBarRepository
{

    public function getJobStatus($data)
    {
        if ($data['job_status'] == Job::complete) {
            $jobStatus = "<span class=\"badge badge-success\">Completed</span>";
        } elseif ($data['job_status'] == Job::leave_for_job) {
            $jobStatus = "<span class=\"badge badge-secondary\">Going</span>";
        } elseif ($data['job_status'] == Job::pending) {
            $jobStatus = "<span class=\"badge badge-warning\">Pending</span>";
        } elseif ($data['job_status'] == Job::cancel) {
            $jobStatus = "<span class=\"badge badge-danger\">Cancel</span>";
        } elseif ($data['job_status'] == Job::accept) {
            $jobStatus = "<span class=\"badge badge-secondary\">Accept</span>";
        } elseif ($data['job_status'] == Job::working) {
            $jobStatus = "<span class=\"badge badge-secondary\">Working</span>";
        } elseif ($data['job_status'] == Job::timeOut) {
            $jobStatus = "<span class=\"badge badge-secondary\">TimeOut</span>";
        } elseif ($data['job_status'] == Job::arrived) {
            $jobStatus = "<span class=\"badge badge-secondary\">Arrived</span>";
        } elseif ($data['job_status'] == Job::requestApproval) {
            $jobStatus = "<span class=\"badge badge-secondary\">Approval</span>";
        }
        return ucfirst($jobStatus);
    }

    public static function getBookingRequest($request)
    {
        $repo = new rightSideBarRepository();
        $jobs = Job::with('provider')
            ->with('user')
            ->with('service')
            ->orderBy('id','desc')
            ->paginate(10);
        $createBooking = "";
        foreach ($jobs as $data):
//            dd($data);
            $jobStatus = $repo->getJobStatus($data);
            $route = route('edit-jobs',['id' => $data['id']]);
            $provider = !empty($data['provider']) ? $data['provider']['first_name'] . " " . $data['provider']['last_name'] : "NA";
            $createBooking .= "<li class=\"list-group-item dipatcher-rightbar-list\">\n" .
                "                <table>" .
                "                    <tbody>" .
                "                    <tr>" .
                "                        <td colspan='2'>ID:<a target='_blank' href='".$route."'>" . $data['id'] . "</a></td>" .
                                         "<td colspan='3'>" . Carbon::createFromTimestamp($data['job_schedual_time'], "UTC")->tz('PKT')->format("d/m/Y").
                                         " " . Carbon::createFromTimestamp($data['job_schedual_time'], "UTC")->tz('PKT')->format("h:m A") .
                                        "</td>" .
                "                    </tr>" .
                "                    <tr>" .
                "                        <td><i class=\"fa fa-map-pin icons dipatcher-rightbar-icons\" style='color: black;padding: 10% !important;'></i></td>" .
                "                        <td colspan=\"4\">" . $data['location_address'] . "</td>" .
                "                    </tr>" .
                "                    <tr>" .
                "                        <td><i class=\"fa fa-briefcase icons dipatcher-rightbar-icons\" style='color: brown;padding: 10% !important;'></i></td>" .
                "                        <td>" . $data['service']['title'] . "</td>" .
                "                        <td><i class=\"fa fa-money icons dipatcher-rightbar-icons\" style='color: green;padding: 10% !important;'></i> " . $data['service']['price'] . "$</td>" .
                "                        <td colspan='2'>" .
                "                            <span>".$jobStatus."</span></i>" .
                "                        </td>" .
                "                    </tr>" .
                "                    <tr>" .
                "                        <td><i class=\"fa fa-user icons dipatcher-rightbar-icons\" style='padding: 10% !important;'></i></td>" .
                "                        <td colspan=\"4\">" . $data['user']['first_name'] . " " . $data['user']['last_name'] . "</td>" .
                "" .
                "                    </tr>" .
                "                    <tr>" .
                "                        <td><i class=\"fa fa-bus icons dipatcher-rightbar-icons\" style='color: #9C27B0;padding: 10% !important;'></i></td>" .
                "                        <td colspan=\"4\">" . $provider . "</td>" .
                "                    </tr>" .
                "                    </tbody>" .
                "                </table>" .
                "            </li>";
        endforeach;
        return $createBooking;
    }

}