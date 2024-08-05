<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Job;
use App\Service;
use PDF; // at the top of the file
use File;
use Response;


class ReportsController extends Controller
{
    public function usersReport(Request $request)
    {
        $users = User::whereBetween('created_at', [$request->from, $request->to])->get();
        $data = [
            'users' => $users,
            'from' => $request->from,
            'to'   => $request->to
        ];

        $pdf = PDF::loadView('reports.users',$data);

        // Make directory if not exists
        $directory = public_path('storage/reports/users');
        if(!File::exists($directory)) {
            // path does not exist
            File::makeDirectory($directory, 0777, true, true);
        }        
        
        $filename = "users-report.pdf";
        $path = public_path('storage/reports/users/'.$filename);
        
        $pdf->save($path);

        // Header content type 
        header("Content-type: application/pdf"); 
        header("Content-Length: " . filesize($path)); 

        // Send the file to the browser. 
        readfile($path);
    }

    public function usersReportCsv(Request $request)
    {
        $users = User::all()->whereBetween('created_at', [$request->from, $request->to]);
        $filename = "users-report(".date("Y-m-d").")".".csv";
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        $columns = array('ID','Username','Email','Name','Phone','Address','Status','Created','Updated');
        $status = "";
    
        $callback = function() use ($users, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
    
            foreach($users as $user) {
                switch ($user->status) {
                    case 0:
                        $status = "Active";
                        break;
                    case 1:
                        $status = "Inactive";
                        break;
                    case 2:
                        $status = "Banned";
                        break;
                    case 3:
                        $status = "Pending";
                        break;
                    default:
                        $status = "N/A";
                        break;
                }
                fputcsv($file, array(
                                        $user->id,
                                        $user->username,
                                        $user->email,
                                        $user->first_name." ".$user->last_name,
                                        $user->phone,
                                        $user->address,
                                        $status,
                                        $user->created_at,
                                        $user->updated_at));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    public function jobsReport(Request $request)
    {
        $jobs = Job::whereBetween('created_at', [$request->from, $request->to])->get();

        $data = [
            'jobs' => $jobs,
            'from' => $request->from,
            'to'   => $request->to
        ];

        $pdf = PDF::loadView('reports.jobs',$data);
        
        // Make directory if not exists
        $directory = public_path('storage/reports/jobs');
        if(!File::exists($directory)) {
            // path does not exist
            File::makeDirectory($directory, 0777, true, true);
        }

        $filename = "jobs-report.pdf";
        $path = public_path('storage/reports/jobs/'.$filename);
        
        $pdf->save($path);

        // Header content type 
        header("Content-type: application/pdf"); 
        header("Content-Length: " . filesize($path)); 

        // Send the file to the browser. 
        readfile($path);
    }

    public function jobsReportCsv(Request $request)
    {
        $jobs = Job::all()->whereBetween('created_at', [$request->from, $request->to]);
        $filename = "jobs-report(".date("Y-m-d").")".".csv";
        $headers = array(
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename",
            "Pragma" => "no-cache",
            "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
            "Expires" => "0"
        );
        $columns = array(
                        'ID',
                        'Service',
                        'Price',
                        'Provider',
                        'Customer',
                        'Approval',
                        'Status',
                        'Created',
                        'Updated',
                        'Location Address',
                        'Customer Rating',
                        'Driver Rating',
                        'Feedback');
        $status = "";
        $customer_approval = "";
    
        $callback = function() use ($jobs, $columns)
        {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);
    
            foreach($jobs as $job) {
                switch ($job->job_status) {
                    case 0:
                        $status = "Complete";
                        break;
                    case 1:
                        $status = "Leave for job";
                        break;
                    case 2:
                        $status = "Pending";
                        break;
                    case 3:
                        $status = "Cancel";
                        break;
                    case 4:
                        $status = "Accept";
                        break;
                    case 5:
                        $status = "Working";
                        break;
                    case 6:
                        $status = "Timeout";
                        break;
                    case 7:
                        $status = "Arrived";
                        break;
                    case 8:
                        $status = "Request Approval";
                        break;
                    default:
                        $status = "N/A";
                        break;
                }

                switch ($job->customer_approval) {
                    case 0:
                        $customer_approval = "Not Complete";
                        break;
                    case 1:
                        $customer_approval = "Approved";
                        break;
                    
                    default:
                        # code...
                        break;
                }
                fputcsv($file, array(
                                        $job->id,
                                        $job->service_name,
                                        $job->service_price,
                                        $provider = (!empty($job->provider_id) && isset($job->user)) ? $job->user->username : '-NA-',
                                        $customer = (!empty($job->customer_id) && isset($job->user)) ? $job->user->username : '-NA-',
                                        $customer_approval,
                                        $status,
                                        $job->created_at,
                                        $job->updated_at,
                                        $job->location_address,
                                        $job->customer_rating,
                                        $job->driver_rating,
                                        $job->feedback));
            }
            fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

    public function jobsCompleteReport(Request $request)
    {
        $jobs = Job::whereBetween('created_at', [$request->from, $request->to])->get();

        $data = [
            'jobs' => $jobs,
            'from' => $request->from,
            'to'   => $request->to
        ];

        $pdf = PDF::loadView('reports.jobs-complete',$data);
        
        // Make directory if not exists
        $directory = public_path('storage/reports/jobs');
        if(!File::exists($directory)) {
            // path does not exist
            File::makeDirectory($directory, 0777, true, true);
        }

        $filename = "jobs-complete-report.pdf";
        $path = public_path('storage/reports/jobs/'.$filename);
        
        $pdf->save($path);

        // Header content type 
        header("Content-type: application/pdf"); 
        header("Content-Length: " . filesize($path)); 

        // Send the file to the browser. 
        readfile($path);
    }
}
