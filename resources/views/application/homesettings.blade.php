@extends('layouts.app')

@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">Home Screen Settings</li>
</ol>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Home Screen Settings
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <form id="homeSettingForm">
                                <div class="input-group">
                                    <select name="homeSetting" id="homeScreen" class="form-control">
                                        <option value="none">--Select One--</option>
                                        <option value="trendingnow">Trending Now</option>
                                        <option value="topvendors">Top Vendors</option>
                                        <option value="toprented">Top Rented Products</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br>
                    {{--alerts start here--}}
                    @include('partials.validation')
                    {{--alerts ends here--}}
                    <table class="table table-responsive-sm table-bordered" id="trendingnow" style="display:none;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Trending</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>DSLR 1</td>
                                <td>Category 1</td>
                                <td><input type="checkbox" name="trending" id="trending"></td>
                                <td>2019-10-10 12:00:00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>DSLR 2</td>
                                <td>Category 2</td>
                                <td><input type="checkbox" name="trending" id="trending"></td>
                                <td>2019-10-10 12:00:00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>DSLR 3</td>
                                <td>Category 3</td>
                                <td><input type="checkbox" name="trending" id="trending"></td>
                                <td>2019-10-10 12:00:00</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-responsive-sm table-bordered" id="topvendors" style="display:none;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Top Vendor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3</td>
                                <td>test1@test.com</td>
                                <td>923351234567</td>
                                <td><input type="checkbox" name="vendor" id="vendor"></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>test2@test.com</td>
                                <td>923351234567</td>
                                <td><input type="checkbox" name="vendor" id="vendor"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-responsive-sm table-bordered" id="toprented" style="display:none;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Top Rented</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>5</td>
                                <td>DSLR 5</td>
                                <td>Category 5</td>
                                <td><input type="checkbox" name="rented" id="rented"></td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>DSLR 6</td>
                                <td>Category 6</td>
                                <td><input type="checkbox" name="rented" id="rented"></td>
                            </tr>
                            <tr>
                                <td>7</td>
                                <td>DSLR 7</td>
                                <td>Category 7</td>
                                <td><input type="checkbox" name="rented" id="rented"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection