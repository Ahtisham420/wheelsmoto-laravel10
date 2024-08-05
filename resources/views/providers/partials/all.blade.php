<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Service Providers
                <a href="{{ route('create-providers') }}"
                   class="btn btn-block btn-primary float-right icon-user-follow add-btn">
                    {{--<i class=""></i>--}}
                    Add Provider
                </a>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>License Approved</th>
                        <th>Job Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($providers as $provider)
                        <tr>
                            <td>{{ $provider['userDetails']->id }}</td>
                            <td>{{ $provider['userDetails']->first_name." ".$provider['userDetails']->last_name}}</td>
                            <td>{{ $provider['userDetails']->phone }}</td>
                            <td>
                                <div class="btn-group">
                                    <div class="dropdown">
                                        @if(APP\User::active == $provider['userDetails']->status)
                                            <button class="btn btn-secondary  badge-success dropdown-toggle"
                                                    id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Active
                                            </button>
                                        @elseif(APP\User::inactive == $provider['userDetails']->status)
                                            <button class="btn btn-secondary badge-secondary dropdown-toggle"
                                                    id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Inactive
                                            </button>
                                        @elseif(APP\User::banned == $provider['userDetails']->status)
                                            <button class="btn btn-secondary badge-danger dropdown-toggle"
                                                    id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Banned
                                            </button>
                                        @elseif(APP\User::pending == $provider['userDetails']->status)
                                            <button class="btn btn-secondary badge-warning dropdown-toggle"
                                                    id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Pending
                                            </button>
                                        @endif
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" data-value="{{ APP\User::active }}"
                                               href="{{ route('status-providers',['status' => APP\User::active ,'id' => $provider['userDetails']->id]) }}">Active</a>
                                            <a class="dropdown-item" data-value="{{ APP\User::inactive }}"
                                               href="{{ route('status-providers',['status' => APP\User::inactive ,'id' => $provider['userDetails']->id]) }}">Inactive</a>
                                            <a class="dropdown-item" data-value="{{ APP\User::banned }}"
                                               href="{{ route('status-providers',['status' => APP\User::banned ,'id' => $provider['userDetails']->id]) }}">Banned</a>
                                            <a class="dropdown-item" data-value="{{ APP\User::pending }}"
                                               href="{{ route('status-providers',['status' => APP\User::pending ,'id' => $provider['userDetails']->id]) }}">Pending</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <div class="dropdown">
                                        @if(APP\Provider::approve == $provider->approval_status)
                                            <button class="btn btn-secondary  badge-success dropdown-toggle"
                                                    id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Approve
                                            </button>
                                        @elseif(APP\Provider::unApprove == $provider->approval_status)
                                            <button class="btn btn-secondary badge-secondary dropdown-toggle"
                                                    id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Un-Approve
                                            </button>
                                        @endif
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" data-value="{{ APP\Provider::approve }}"
                                               href="{{ route('approval-providers',['status' => APP\Provider::approve ,'id' => $provider->id]) }}">Approve</a>
                                            <a class="dropdown-item" data-value="{{ APP\Provider::unApprove }}"
                                               href="{{ route('approval-providers',['status' => APP\Provider::unApprove ,'id' => $provider->id]) }}">Un-Approve</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <div class="dropdown">
                                        @if(APP\Provider::free == $provider->job_status)
                                            <button class="btn btn-secondary  badge-success dropdown-toggle"
                                                    id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Free
                                            </button>
                                        @elseif(APP\Provider::busy == $provider->job_status)
                                            <button class="btn btn-primary badge-secondary dropdown-toggle busy-btn"
                                                    id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Busy
                                            </button>
                                        @elseif(APP\Provider::signedout == $provider->job_status)
                                            <button class="btn btn-secondary badge-danger dropdown-toggle"
                                                    id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Signedout
                                            </button>
                                        @elseif(APP\Provider::waiting == $provider->job_status)
                                            <button class="btn btn-secondary badge-warning dropdown-toggle"
                                                    id="dropdownMenuButton" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                Waiting
                                            </button>
                                        @endif
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" data-value="{{ APP\Provider::free }}"
                                               href="{{ route('job-providers',['status' => APP\Provider::free ,'id' => $provider->id]) }}">Free</a>
                                            <a class="dropdown-item" data-value="{{ APP\Provider::busy }}"
                                               href="{{ route('job-providers',['status' => APP\Provider::busy ,'id' => $provider->id]) }}">Busy</a>
                                            <a class="dropdown-item" data-value="{{ APP\Provider::signedout }}"
                                               href="{{ route('job-providers',['status' => APP\Provider::signedout ,'id' => $provider->id]) }}">Signed
                                                out</a>
                                            <a class="dropdown-item" data-value="{{ APP\Provider::waiting }}"
                                               href="{{ route('job-providers',['status' => APP\Provider::waiting ,'id' => $provider->id]) }}">Waiting</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="{{ route('edit-providers',['id' => $provider['userDetails']->id]) }}"
                                   class="btn btn-block btn-primary col action-btn">
                                    <i class="fa fa-pencil fa-1x-size"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn"
                                   data-route="all-providers" data-model="user"
                                   data-id="{{$provider['userDetails']->id}}">
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $providers->links() }}
                {{--<ul class="pagination">--}}
                {{--<li class="page-item">--}}
                {{--<a class="page-link" href="#">Prev</a>--}}
                {{--</li>--}}
                {{--<li class="page-item active">--}}
                {{--<a class="page-link" href="#">1</a>--}}
                {{--</li>--}}
                {{--<li class="page-item">--}}
                {{--<a class="page-link" href="#">2</a>--}}
                {{--</li>--}}
                {{--<li class="page-item">--}}
                {{--<a class="page-link" href="#">3</a>--}}
                {{--</li>--}}
                {{--<li class="page-item">--}}
                {{--<a class="page-link" href="#">4</a>--}}
                {{--</li>--}}
                {{--<li class="page-item">--}}
                {{--<a class="page-link" href="#">Next</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
            </div>
        </div>
    </div>
</div>