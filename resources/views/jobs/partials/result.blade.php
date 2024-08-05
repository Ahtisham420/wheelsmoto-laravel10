@foreach ($jobs as $job)
    <tr>
        <td>{{ $job->id }}</td>
        <td>{{ !empty($job['user']) ? $job['user']->first_name." ".$job['user']->last_name : "-Na-" }}</td>
        <td>{{ !empty($job['provider']) ? $job['provider']->first_name." ".$job['provider']->last_name : "-Na-" }}</td>
        <td>{{ \Carbon\Carbon::createFromTimestamp($job->job_schedual_time,"UTC")->tz(config('app.app_timezone')) }}</td>
        <td>
            @if(APP\Job::pending == $job->job_status)
                <span class="badge badge-warning">Pending</span>
            @elseif(APP\Job::complete == $job->job_status)
                <span class="badge badge-success">Completed</span>
            @elseif(APP\Job::leave_for_job == $job->job_status)
                <span class="badge badge-secondary">Leave For Job</span>
            @elseif(APP\Job::accept == $job->job_status)
                <span class="badge badge-secondary">Accept</span>
            @elseif(APP\Job::working == $job->job_status)
                <span class="badge badge-secondary">Working</span>
            @elseif(APP\Job::timeOut == $job->job_status)
                <span class="badge badge-secondary">timeOut</span>
            @elseif(APP\Job::arrived == $job->job_status)
                <span class="badge badge-secondary">Arrived</span>
            @elseif(APP\Job::requestApproval == $job->job_status)
                <span class="badge badge-secondary">Request Approval</span>
            @else(APP\Job::cancel == $job->job_status)
                <span class="badge badge-danger">Cancel</span>
            @endif
        </td>
        <td>
            <a href="{{ route('edit-jobs',['id' => $job->id]) }}"
                class="btn btn-block btn-primary col action-btn">
                <i class="fa fa-pencil fa-1x-size"></i>
            </a>
            @if(!empty($job->job_status != APP\Job::cancel))
                <a href="javascript:void(0)"
                    class="btn btn-block btn-danger col action-btn {{ $job->job_status != APP\Job::cancel ? 'js-cancel-job' : '' }}"
                    data-route="all-jobs" data-model="JOB"
                    data-id="{{ $job->id }}">
                    <i class="fa fa-ban fa-1x-size"></i>
                </a>
            @endif
        </td>
    </tr>
@endforeach