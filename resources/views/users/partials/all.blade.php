<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> {{ __('admin/pages/users_list.card_title') }}
                <a href="{{ route('create-users') }}"
                   class="btn btn-block btn-primary float-right icon-user-follow add-btn">
                    {{ __('admin/pages/users_list.add_user') }}
                </a>
            </div>
            @include('partials.validation')
            <div class="card-body" style="overflow: auto;">
                @include('users.partials.filter')
                <div class="js-index-table">
                    @include('users.partials.table',$users)
                </div>
                <br>
                <div id="usersFilterDiv" style="display: none;">
                    <div class="d-inline-flex">
                        <div id="reportrange">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span></span> <i class="fa fa-caret-down"></i>
                        </div>
                        <form action="{{route('users-report')}}" method="get" id="usersReport">
                            {{ csrf_field() }}
                            <input value="View Report" type="submit" onclick="usersReport()" class="btn btn-primary" />
                        </form>
                        <form action="{{route('users-report-csv')}}" method="get" id="usersReportCsv">
                            {{ csrf_field() }}
                            <input value="Download Report" type="submit" onclick="usersReportCsv()" class="btn btn-primary ml-1" />
                        </form>
                    </div>
                </div><br>
                {{--alerts start here--}}
                {{--@include('partials.validation')--}}
                {{--alerts ends here--}}
                {{--<table class="table table-responsive-sm table-bordered" id="users-table">--}}
                {{--<thead>--}}
                {{--<tr>--}}
                {{--<th>ID</th>--}}
                {{--<th>Name</th>--}}
                {{--<th>Phone</th>--}}
                {{--<th>Enabled</th>--}}
                {{--<th>Status</th>--}}
                {{--<th>Action</th>--}}
                {{--</tr>--}}
                {{--</thead>--}}
                {{--<tbody id="users-tbody">--}}
                {{--@foreach ($users as $user)--}}
                {{--<tr>--}}
                {{--<td>{{ $user->id }}</td>--}}
                {{--<td>{{ $user->first_name." ".$user->last_name }}</td>--}}
                {{--<td>{{ $user->phone }}</td>--}}
                {{--<td>--}}
                {{--<!-- Default switch -->--}}
                {{--<div class="custom-control custom-switch">--}}
                {{--<input type="checkbox" {{ $user->enabled ? 'checked' : '' }} class="custom-control-input" onclick="userEnable('{{ $user->id }}')" id="userEnable{{ $user->id }}">--}}
                {{--<label class="custom-control-label" for="userEnable{{ $user->id }}"></label>--}}
                {{--</div>--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--<div class="btn-group">--}}
                {{--<div class="dropdown">--}}
                {{--@if(APP\User::active == $user->status)--}}
                {{--<button class="btn btn-secondary  badge-success dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--Active--}}
                {{--</button>--}}
                {{--@elseif(APP\User::inactive == $user->status)--}}
                {{--<button class="btn btn-secondary badge-secondary dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--Inactive--}}
                {{--</button>--}}
                {{--@elseif(APP\User::banned == $user->status)--}}
                {{--<button class="btn btn-secondary badge-danger dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--Banned--}}
                {{--</button>--}}
                {{--@elseif(APP\User::pending == $user->status)--}}
                {{--<button class="btn btn-secondary badge-warning dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                {{--Pending--}}
                {{--</button>--}}
                {{--@endif--}}
                {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                {{--<a class="dropdown-item" data-value="{{ APP\User::active }}" href="{{ route('status-users',['status' => APP\User::active ,'id' => $user->id]) }}">Active</a>--}}
                {{--<a class="dropdown-item" data-value="{{ APP\User::inactive }}" href="{{ route('status-users',['status' => APP\User::inactive ,'id' => $user->id]) }}">Inactive</a>--}}
                {{--<a class="dropdown-item" data-value="{{ APP\User::banned }}" href="{{ route('status-users',['status' => APP\User::banned ,'id' => $user->id]) }}">Banned</a>--}}
                {{--<a class="dropdown-item" data-value="{{ APP\User::pending }}" href="{{ route('status-users',['status' => APP\User::pending ,'id' => $user->id]) }}">Pending</a>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</td>--}}
                {{--<td>--}}
                {{--<a href="{{ route('edit-users',['id' => $user->id]) }}" class="btn btn-block btn-primary col action-btn">--}}
                {{--<i class="fa fa-pencil fa-1x-size"></i>--}}
                {{--</a>--}}
                {{--<a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn" data-route="all-users" data-model="setting" data-id="{{$user->id}}">--}}
                {{--<i class="fa fa-trash fa-1x-size"></i>--}}
                {{--</a>--}}
                {{--</td>--}}
                {{--</tr>--}}
                {{--@endforeach--}}
                {{--</tbody>--}}
                {{--</table>--}}
                {{--{{ $users->links() }}--}}
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
