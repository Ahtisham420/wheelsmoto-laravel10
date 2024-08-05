<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Jobs
                <a href="{{ route('create-jobs') }}"
                   class="btn btn-block btn-primary float-right fa fa-plus add-btn">
                    {{--<i class=""></i>--}}
                    Request Job
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                    <form id="search-job">
                        <div class="input-group">
                            <input type="text" class="form-control form-rounded" required="required" name="job" id="job" placeholder="Search Job by Customer/Provider Name">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                            <button type="button" class="btn btn-default" onclick="jobsReset()">
                                <i class="fa fa-refresh"></i>
                            </button>
                            <button type="button" class="btn btn-default" onclick="jobsFilterBox()">
                                <i class="fa fa-filter"></i>
                            </button>
                            </span>
                        </div>
                    </form>
                    </div>
                </div>
                <br>
                <div id="jobsFilterDiv" style="display: none;">
                    <div class="d-inline-flex">
                        <div id="reportrange">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                        <form action="{{ route('jobs-report') }}" method="get" id="jobsReport">
                        {{ csrf_field() }}
                        <input value="View Report" type="submit" onclick="jobsReport()" class="btn btn-primary"/>
                        </form>
                        &nbsp
                        <form action="{{route('jobs-report-csv')}}" method="get" id="jobsReportCsv">
                        {{ csrf_field() }}
                        <input value="Download Report" type="submit" onclick="jobsReportCsv()" class="btn btn-primary ml-1"/>
                        </form>
                        <form action="{{ route('jobs-complete-report') }}" method="get" id="jobsCompleteReport">
                        {{ csrf_field() }}
                        <input value="Complete Report" type="submit" onclick="jobsCompleteReport()" class="btn btn-primary ml-1"/>
                        </form>
                    </div>
                </div>
                <br>

                <table class="table table-responsive-sm table-bordered" id="jobs-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Provider Name</th>
                        <th>Job Created At</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="job-tbody">
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
                    </tbody>
                </table>
                {{ $jobs->links() }}
            </div>
        </div>
    </div>
</div>