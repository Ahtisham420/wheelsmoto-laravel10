<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> All Settings
                <a href="{{ route('form-settings') }}" class="btn btn-block btn-primary float-right fa fa-cog add-btn">
                    Add Setting
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <form id="search-user">
                            <div class="input-group">
                                <input type="text" class="form-control form-rounded" required="required" name="user" id="user" placeholder="Search Setting ">
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
                </div><br>
                {{--alerts start here--}}
                @include('partials.validation')
                {{--alerts ends here--}}
                <table class="table table-responsive-sm table-bordered" id="users-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Meta description</th>
                            <th>logo</th>
                            <th>fevicon</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="users-tbody">
                        @foreach ($settings as $setting)
                        <tr>
                            <td>{{ $setting->id }}</td>
                            <td>{{ $setting->meta_description }}</td>
                            <td>
                                <img src="{{ asset('storage/app').'/'.$setting->logo }}" height="50px" width="50px" alt="" title="" />
                            </td>
                            <td>
                                <img src="{{ asset('storage/app').'/'.$setting->fevicon }}" height="50px" width="50px" alt="" title="" />
                            </td>
                            <td>
                                <!-- Default switch -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" {{ $setting->enabled ? 'checked' : '' }} class="custom-control-input" onclick="userEnable('{{ $setting->id }}')" id="userEnable{{ $setting->id }}">
                                    <label class="custom-control-label" for="userEnable{{ $setting->id }}"></label>
                                </div>
                            </td>
                            
                            <td>
                                <a href="{{ route('edit-settings',['id' => $setting->id]) }}" class="btn btn-block btn-primary col action-btn">
                                    <i class="fa fa-pencil fa-1x-size"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-block btn-danger col action-btn js-del-btn" data-route="all-settings" data-model="Settings" data-id="{{$setting->id}}">
                                    <i class="fa fa-trash fa-1x-size"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>