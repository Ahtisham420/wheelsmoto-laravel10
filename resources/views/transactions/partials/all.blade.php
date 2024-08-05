<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <i class="fa fa-align-justify"></i> All Transaction Requests
            </div>
            <div class="card-body">
                <!-- <div class="row">
                    <div class="col-lg-4">
                    <form id="search-user">
                        <div class="input-group">
                            <input type="text" class="form-control form-rounded" required="required" name="user" id="user" placeholder="Search User">
                            <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-search"></i>
                            </button>
                            <button type="button" class="btn btn-default" onclick="usersReset()">
                                <i class="fa fa-refresh"></i>
                            </button>
                            <button type="button" class="btn btn-default" onclick="usersFilterBox()">
                                <i class="fa fa-filter"></i>
                            </button>
                            </span>
                        </div>
                    </form>
                    </div>
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
                        <input value="View Report" type="submit" onclick="usersReport()" class="btn btn-primary"/>
                        </form>
                        <form action="{{route('users-report-csv')}}" method="get" id="usersReportCsv">
                        {{ csrf_field() }}
                        <input value="Download Report" type="submit" onclick="usersReportCsv()" class="btn btn-primary ml-1"/>
                        </form>
                    </div>
                </div><br> -->
                {{--alerts start here--}}
                @include('partials.validation')
                {{--alerts ends here--}}
                <table class="table table-responsive-sm table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User ID</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="users-tbody">
                        @foreach ($transactions as $transaction)
                        <tr>
                            <td>{{ $transaction->id }}</td>
                            <td>{{ $transaction->user_id }}</td>
                            <td>{{ $transaction->amount }}</td>
                            <td>
                                <div class="btn-group">
                                    <div class="dropdown">
                                        @if($transaction->status == 0)
                                        <button class="btn btn-secondary  badge-success dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Pending
                                        </button>
                                        @elseif($transaction->status == 1)
                                        <button class="btn btn-secondary badge-secondary dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Accepted
                                        </button>
                                        @elseif($transaction->status == 2)
                                        <button class="btn btn-secondary badge-danger dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Rejected
                                        </button>
                                        @endif
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" data-value="0" href="{{ route('status-transaction',['status' => 0 ,'id' => $transaction->id]) }}">Pending</a>
                                            <a class="dropdown-item" data-value="1" href="{{ route('status-transaction',['status' => 1 ,'id' => $transaction->id]) }}">Accepted</a>
                                            <a class="dropdown-item" data-value="2" href="{{ route('status-transaction',['status' => 2 ,'id' => $transaction->id]) }}">Rejected</a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $transactions->links() }}
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