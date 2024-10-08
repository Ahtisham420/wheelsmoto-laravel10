<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-header">
                <i class="fa fa-align-justify"></i> All Packages
                <!-- <a href="{{ route('create-packages') }}" class="btn btn-block btn-primary float-right icon-user-follow add-btn">
                    Add Package
                </a> -->
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
                            <input value="View Report" type="submit" onclick="usersReport()" class="btn btn-primary" />
                        </form>
                        <form action="{{route('users-report-csv')}}" method="get" id="usersReportCsv">
                            {{ csrf_field() }}
                            <input value="Download Report" type="submit" onclick="usersReportCsv()" class="btn btn-primary ml-1" />
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
                            <th>Name</th>
                            <th>Tagline</th>
                            <th>Price</th>
                            <th>Duration</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="users-tbody">
                        @foreach ($packages as $package)
                        @php
                        $package_duration = "";
                        switch($package->duration){
                        case 1:
                        $package_duration = "Per Day";
                        break;
                        case 2:
                        $package_duration = "Per Month";
                        break;
                        case 3:
                        $package_duration = "Per Year";
                        break;
                        default:
                        $package_duration = "N/A";
                        break;
                        }
                        @endphp
                        <tr>
                            <td>{{ $package->id }}</td>
                            <td>{{ $package->name }}</td>
                            <td>{{ $package->tagline }}</td>
                            <td>{{ $package->price }}</td>
                            <td>{{ $package_duration }}</td>
                            <td>
                                <a href="{{ route('edit-packages',['id' => $package->id]) }}" class="btn btn-block btn-primary col action-btn">
                                    <i class="fa fa-pencil fa-1x-size"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn" data-route="all-packages" data-model="package" data-id="{{$package->id}}">
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $packages->links() }}
            </div>
        </div>
    </div>
</div>