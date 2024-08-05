<?php
/**
 * Created by PhpStorm.
 * User: BlackWolf
 * Date: 08/09/2019
 * Time: 10:43 PM
 */

namespace App\Repository\dispatcher;


use App\Provider;

class BottomBarRepository
{

    public function getJobStatus($data)
    {
        if ($data['job_status'] == Provider::free) {
            $jobStatus = " <span class=\"btn btn-secondary  badge-success \">
                                                Free
                                            </span>";
        } elseif ($data['job_status'] == Provider::busy) {
            $jobStatus = " <span class=\"btn btn-secondary badge-secondary busy-btn\">
                                                Busy
                                            </span>";
        } elseif ($data['job_status'] == Provider::waiting) {
            $jobStatus = " <span class=\"btn btn-secondary badge-warning busy-btn\">
                                                Waiting
                                            </span>";
        }
        return ucfirst($jobStatus);
    }

    public static function getDriversRequest($request)
    {
        $repo = new BottomBarRepository();
        $providers = Provider::with('userDetails')
            ->where('job_status', '<>', Provider::signedout)
            ->orderBy('id', 'desc')
            ->paginate(10);
        $createProviders = "";
        foreach ($providers as $data):
        $jobStatus = $repo->getJobStatus($data);
        if(!empty($data['userDetails'])) {
            $route = route('edit-providers',['id' => $data['user_id']]);
            $createProviders .= "<tr>
                    <td>" . $data['id'] . "</td>
                    <td>" . $data['userDetails']['first_name'] . " " . $data['userDetails']['last_name'] . "</td>
                    <td>" . $data['userDetails']['phone'] . "</td>
                    <td>" . $data['job_count'] . "</td>
                    <td>" . $jobStatus . "</td>
                    <td><a target='_blank' href='".$route."'>View</a> </td>
                </tr>";
        }
        endforeach;
        return $createProviders;
    }
}