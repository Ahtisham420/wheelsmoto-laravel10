<html>
<head>
    <title>Jobs Report</title>
    <style>
    table {
        border-spacing: 0;
        border: 0.3px solid black;
    }
    th,td {
        border: 0.3px solid black;
        text-align: left;
        padding: 5px;
    }
    .pdf-logo {
        float: left;
        width: 50px;
    }
    .pdf-text {
        text-align: center;
        display: inline-block;
    }
    .pdf-small{
        font-size: 16px;
    }
    </style>
</head>
<body>


<img class="pdf-logo" src="{{ config('app.coure_ui_asset_url').'images/defaults/logo.png' }}" alt="instatask Logo">
<h2 class="pdf-text">Jobs Report<br><span class="pdf-small">From {{ $from }} to {{ $to }}</span></h2>

<table width="100%">
    <thead>
    <tr>
        <th>ID</th>
        <th>Customer Name</th>
        <th>Provider Name</th>
        <th>Service Name</th>
        <th>Customer Approval</th>
        <th>Created At</th>
        <th>Location</th>
        <th>Feedback</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($jobs as $job)
        <tr>
            <td>{{ $job->id }}</td>
            <td>{{ !empty($job['user']) ? $job['user']->first_name." ".$job['user']->last_name : "-Na-" }}</td>
            <td>{{ !empty($job['provider']) ? $job['provider']->first_name." ".$job['provider']->last_name : "-Na-" }}</td>
            <td>{{ $job->service_name }}</td>
            <td>{{ $job->customer_approval == 0 ? "No" : "Yes" }}</td>
            <td>{{ \Carbon\Carbon::createFromTimestamp($job->job_schedual_time,"UTC")->tz(config('app.app_timezone')) }}</td>
            <td>{{ $job->location_address }}</td>
            <td>{{ empty($job->feedback) ? "-Na-" : $job->feedback }}</td>
            <td>
                @if(APP\Job::pending == $job->job_status)
                    Pending
                @elseif(APP\Job::complete == $job->job_status)
                    Completed
                @elseif(APP\Job::leave_for_job == $job->job_status)
                    Leave For Job
                @elseif(APP\Job::accept == $job->job_status)
                    Accept
                @elseif(APP\Job::working == $job->job_status)
                    Working
                @elseif(APP\Job::timeOut == $job->job_status)
                    timeOut
                @elseif(APP\Job::arrived == $job->job_status)
                    Arrived
                @elseif(APP\Job::requestApproval == $job->job_status)
                    Request Approval
                @else(APP\Job::cancel == $job->job_status)
                    Cancel
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>