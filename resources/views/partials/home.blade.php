<div class="animated fadeIn">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">Power Car Statistics</h4>
                    <div class="small text-muted"></div>
                </div>
                <!-- /.col-->
                <div class="col-sm-7 d-none d-md-block">
                </div>
                <!-- /.col-->
            </div>
            <br>
            <!-- /.row-->
            <div class="row">
            <div class="col-sm-6 col-lg-2">
                <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                        <div class="text-value">
                        @if(isset($jobStats["totalJobs"]))
                        {{ $jobStats["totalJobs"] }}
                        @else
                        0
                        @endif
                        </div>
                        <div>American Muscle</div>
                    </div><br><br>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-2">
                <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                        <div class="text-value">
                        @if(isset($jobStats["cancelledJobs"]))
                        {{ $jobStats["cancelledJobs"] }}
                        @else
                        0
                        @endif
                        </div>
                        <div>Auctions</div>
                    </div><br><br>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-2">
                <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                        <div class="text-value">
                        @if(isset($jobStats["acceptedJobs"]))
                        {{ $jobStats["acceptedJobs"] }}
                        @else
                        0
                        @endif
                        </div>
                        <div>Lease Cars</div>
                    </div><br><br>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-2">
                <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                        <div class="text-value">
                        @if(isset($jobStats["acceptedJobs"]))
                        {{ $jobStats["acceptedJobs"] }}
                        @else
                        0
                        @endif
                        </div>
                        <div>Rental</div>
                    </div><br><br>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-2">
                <div class="card text-white bg-success">
                    <div class="card-body pb-0">
                        <div class="text-value">
                        @if(isset($jobStats["completedJobs"]))
                        {{ $jobStats["completedJobs"] }}
                        @else
                        0
                        @endif
                        </div>
                        <div>Classified</div>
                    </div><br><br>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-2">
                <div class="card text-white bg-success">
                    <div class="card-body pb-0">
                        <div class="text-value">
                        @if(isset($jobStats["completedJobs"]))
                        {{ $jobStats["completedJobs"] }}
                        @else
                        0
                        @endif
                        </div>
                        <div>Swaps</div>
                    </div><br><br>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
        </div>
    </div>
    <!-- /.card-->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">Services Statistics</h4>
                    <div class="small text-muted"></div>
                </div>
                <!-- /.col-->
                <div class="col-sm-7 d-none d-md-block">
                </div>
                <!-- /.col-->
            </div>
            <br>
            <!-- /.row-->
            <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-primary">
                    <div class="card-body pb-0">
                        <div class="text-value">
                        @if(isset($driverStats["totalDrivers"]))
                        {{ $driverStats["totalDrivers"] }}
                        @else
                        0
                        @endif
                        </div>
                        <div>Events</div>
                    </div><br><br>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-success">
                    <div class="card-body pb-0">
                        <div class="text-value">
                        @if(isset($driverStats["onlineDrivers"]))
                        {{ $driverStats["onlineDrivers"] }}
                        @else
                        0
                        @endif
                        </div>
                        <div>Garage Service</div>
                    </div><br><br>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-warning">
                    <div class="card-body pb-0">
                        <div class="text-value">
                        @if(isset($driverStats["offlineDrivers"]))
                        {{ $driverStats["offlineDrivers"] }}
                        @else
                        0
                        @endif
                        </div>
                        <div>Events</div>
                    </div><br><br>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-danger">
                    <div class="card-body pb-0">
                        <div class="text-value">
                        @if(isset($driverStats["bannedDrivers"]))
                        {{ $driverStats["bannedDrivers"] }}
                        @else
                        0
                        @endif
                        </div>
                        <div>Miscellaneous</div>
                    </div><br><br>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
        </div>
    </div>
    <!-- /.card-->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">User Statistics</h4>
                    <div class="small text-muted"></div>
                </div>
                <!-- /.col-->
                <div class="col-sm-7 d-none d-md-block">
                </div>
                <!-- /.col-->
            </div>
            <br>
            <!-- /.row-->
            <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="callout callout-info callout-bordered"><br>
                    <small class="text-muted">Active Users</small>
                    <br>
                    <strong class="h4">
                    @if(isset($userStats["totalUsers"]))
                        {{ $userStats["totalUsers"] }}
                    @else
                    0
                    @endif
                    </strong><br><br>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-4">
                <div class="callout callout-success callout-bordered"><br>
                    <small class="text-muted">Active Financers </small>
                    <br>
                    <strong class="h4">
                    @if(isset($userStats["activeUsers"]))
                        {{ $userStats["activeUsers"] }}
                    @else
                    0
                    @endif
                    </strong><br><br>
                </div>
            </div>
            <!-- /.col-->
            <div class="col-sm-6 col-lg-4">
                <div class="callout callout-danger callout-bordered"><br>
                    <small class="text-muted">Active Dealers</small>
                    <br>
                    <strong class="h4">
                    @if(isset($userStats["bannedUsers"]))
                        {{ $userStats["bannedUsers"] }}
                    @else
                        0
                    @endif
                    </strong><br><br>
                </div>
            </div>
            <!-- /.col-->
        </div>
        <!-- /.row-->
        </div>
    </div>
    <!-- /.card-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <h4 class="card-title mb-0">Other Statistics</h4>
                            <div class="small text-muted"></div>
                        </div>
                        <!-- /.col-->
                        <div class="col-sm-7 d-none d-md-block">
                        </div>
                        <!-- /.col-->
                    </div><br>
                    <table class="table table-responsive-sm table-hover table-outline mb-0">
                        <thead class="thead-light">
                        <tr>
                            <th>Name</th>
                            <th>Value</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                Active Tickets
                            </td>
                            <td>
                                <div>
                                <button class="btn" >View</button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Active Advertisments
                            </td>
                            <td>
                                <div>
                                    <button class="btn" >View</button>
                                </div>
                            </td>
                        </tr>
                        <!-- <tr>
                            <td>
                                Total Earned Money
                            </td>
                            <td>
                                <div>
                                    0
                                </div>
                            </td>
                        </tr> -->
                        <tr>
                            <td>
                                Total Earning
                            </td>
                            <td>
                                <div>
                                    <button class="btn" >View</button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
</div>