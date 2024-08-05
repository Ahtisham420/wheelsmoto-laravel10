@extends('layouts.app')

@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('all-jobs') }}">Jobs</a>
        </li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
    <style>
        #description {
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
        }

        #infowindow-content .title {
            font-weight: bold;
        }

        #infowindow-content {
            display: none;
        }

        #map #infowindow-content {
            display: inline;
        }

        .pac-card {
            margin: 10px 10px 0 0;
            border-radius: 2px 0 0 2px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            outline: none;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            background-color: #fff;
            font-family: Roboto;
        }

        #pac-container {
            padding-bottom: 12px;
            margin-right: 12px;
        }

        .pac-controls {
            display: inline-block;
            padding: 5px 11px;
        }

        .pac-controls label {
            font-family: Roboto;
            font-size: 13px;
            font-weight: 300;
        }

        #pac-input:focus {
            border-color: #4d90fe;
        }

        #title {
            color: #fff;
            background-color: #4d90fe;
            font-size: 25px;
            font-weight: 500;
            padding: 6px 12px;
        }
    </style>
    <div class="container-fluid">
        <form method="post" action="#" id="job-form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" value="{{ !empty($results) ? $results->id : 0 }}" name="id" id="id">
            <input type="hidden" value="{{ !empty($results) ? $results->lat : 0 }}" name="lat" id="lat">
            <input type="hidden" value="{{ !empty($results) ? $results->lng : 0 }}" name="lng" id="lng">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ $page_title }} Job Details</strong>
                            {{--<small>Form</small>--}}
                            <div class="float-right">
                                <button class="btn btn-sm btn-primary js-save-action-btn" type="submit">
                                    <i class="fa fa-bolt"></i> {{!empty($results) ? "Edit" : "Dispatch"}} Job
                                </button>
                                @if(!empty($results) && !empty($results->job_status != APP\Job::cancel))
                                    <a href="javascript:void(0)"
                                       class="btn btn-sm btn-danger col action-btn  {{ $results->job_status != APP\Job::cancel ? 'js-cancel-job' : '' }}"
                                       data-route="all-jobs" data-model="JOB"
                                       data-id="{{  !empty($results) ? $results->id : 0  }}">
                                        <i class="fa fa-ban"></i> Cancel Job
                                    </a>
                                @endif
                                <a class="btn btn-sm btn-primary" href="{{route('all-jobs')}}">
                                    <i class="fa fa-location-arrow"></i> View all Jobs
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                {{--alerts start here--}}
                                @if(!empty($_GET['msg']))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ $_GET['msg'] }}
                                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                @endif
                                {{--alerts ends here--}}
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="service">Service*</label>
                                                    <select class="select2 form-control {{ $errors->has('service') ? 'is-invalid' : '' }}"
                                                            id="service" name="service">
                                                        @foreach($services as $service)
                                                            <option value="{{ $service->id }}" {{ (!empty($results) ? $results->service_id : 0) == $service->id ? 'selected' : "" }}>
                                                                {{ $service->title }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('service'))
                                                        <div class="invalid-feedback">{{ $errors->first('service') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="service_price">Service Price*</label>
                                                    <input class="form-control {{ $errors->has('service_price') ? 'is-invalid' : '' }}"
                                                           id="service_price" name="service_price" type="number"
                                                           placeholder="Enter service price"
                                                           value="{{ !empty($results) ? $results->service_price : "" }}">
                                                    {{--@if ($errors->has('service_price'))--}}
                                                    <div class="invalid-feedback service-price-feebdback"
                                                         style="display: none"></div>
                                                    {{--@endif--}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="postal-code">Current Situation Image</label>
                                                    <input class="form-control" id="current_situation_img"
                                                           name="current_situation_img"
                                                           type="file">
                                                </div>
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="postal-code">After Work Image</label>
                                                    <input class="form-control" id="after_work_img"
                                                           name="after_work_img"
                                                           type="file">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="city">Preview</label>
                                                    <img id="preview_current_situation_img"
                                                         src="{{ !empty($results->current_situation_img) ? asset("/storage/app/".$results->current_situation_img) : config('app.coure_ui_asset_url').'/images/defaults/placeholder-img.png' }}"
                                                         class="form-control preview-img"/>
                                                </div>
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="city">Preview</label>
                                                    <img id="preview_after_work_img"
                                                         src="{{ !empty($results->after_work_img) ? asset("/storage/app/".$results->after_work_img) : config('app.coure_ui_asset_url').'/images/defaults/placeholder-img.png' }}"
                                                         class="form-control preview-img"/>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="status">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="{{ App\Job::pending }}" {{ (!empty($results) ? $results->job_status : -1) == App\Job::pending ? 'selected' : "" }}>
                                                            Pending
                                                        </option>
                                                        @if( !empty($results) && !empty($results['provider']))
                                                            <option value="{{ App\Job::complete }}" {{ (!empty($results) ? $results->job_status : -1) == App\Job::complete ? 'selected' : "" }}>
                                                                Complete
                                                            </option>
                                                            <option value="{{ App\Job::leave_for_job }}" {{ (!empty($results) ? $results->job_status : -1) == App\Job::leave_for_job ? 'selected' : "" }} >
                                                                Leave For Job
                                                            </option>
                                                            <option value="{{ App\Job::accept }}" {{ (!empty($results) ? $results->job_status : -1) == App\Job::accept ? 'selected' : "" }} >
                                                                Accept
                                                            </option>
                                                            <option value="{{ App\Job::working }}" {{ (!empty($results) ? $results->job_status : -1) == App\Job::working ? 'selected' : "" }} >
                                                                Working
                                                            </option>
                                                            <option value="{{ App\Job::arrived }}" {{ (!empty($results) ? $results->job_status : -1) == App\Job::arrived ? 'selected' : "" }} >
                                                                Arrived
                                                            </option>
                                                            <option value="{{ App\Job::requestApproval }}" {{ (!empty($results) ? $results->job_status : -1) == App\Job::requestApproval ? 'selected' : "" }} >
                                                                Request Approval
                                                            </option>
                                                        @endif
                                                        <option value="{{ App\Job::timeOut }}" {{ (!empty($results) ? $results->job_status : -1) == App\Job::timeOut ? 'selected' : "" }} >
                                                            TimeOut
                                                        </option>
                                                        <option value="{{ App\Job::cancel }}" {{ (!empty($results) ? $results->job_status : -1) == App\Job::cancel ? 'selected' : "" }} >
                                                            Canceled
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="postal-code">Customer Approval</label>
                                                    <select class="form-control" name="customer_approval"
                                                            id="customer_approval">
                                                        <option value="{{ App\Job::customer_not_complete }}" {{ (!empty($results) ? $results->customer_approval : -1) == App\Job::customer_not_complete ? 'selected' : "" }} >
                                                            Un Approve
                                                        </option>
                                                        <option value="{{ App\Job::customer_approved }}" {{ (!empty($results) ? $results->customer_approval : -1) == App\Job::customer_approved ? 'selected' : "" }}>
                                                            Approve
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="form-group col-sm-7 col-md-7">
                                                        <label for="postal-code">Cutomer Name</label>
                                                        <select class="select2 form-control" id="customer_select"
                                                                name="customer_select">
                                                            <option value="0">Select Customer</option>
                                                            @foreach($customers as $customer)
                                                                <option value="{{ $customer->id }}" {{ (!empty($results->customer_id) ? $results->customer_id : 0) == $customer->id ? 'selected' : "" }}
                                                                >{{ $customer->first_name." ".$customer->last_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-5 col-md-5">
                                                        <br>
                                                        <label for="postal-code">Add Payment Method</label>
                                                        <a class="btn btn-block btn-primary col action-btn js-user-payment-btn"
                                                           data-userId="{{ $customer->id }}"
                                                           style="color: white;cursor: pointer;">
                                                            <i class="fa fa-money fa-1x-size"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="cus_email">Email</label>
                                                    <input class="form-control {{ $errors->has('cus_email') ? 'is-invalid' : '' }}"
                                                           id="cus_email" name="cus_email" type="text"
                                                           placeholder="Enter customer email"
                                                           value="{{ !empty($results['user']) ? $results['user']->email : old('cus_email')}}">
                                                    @if ($errors->has('cus_email'))
                                                        <div class="invalid-feedback">{{ $errors->first('cus_email') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="cus_phone">Phone</label>
                                                    <input class="form-control {{ $errors->has('cus_phone') ? 'is-invalid' : '' }}"
                                                           id="cus_phone" name="cus_phone" type="text"
                                                           placeholder="Enter customer phone"
                                                           value="{{ !empty($results['user']) ? $results['user']->phone : old('cus_phone')}}">
                                                    @if ($errors->has('cus_phone'))
                                                        <div class="invalid-feedback">{{ $errors->first('cus_phone') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="cus_email">First Name</label>
                                                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                                           id="first_name" name="first_name" type="text"
                                                           placeholder="Enter first name"
                                                           value="{{ !empty($results['user']) ? $results['user']->first_name : old('first_name')}}">
                                                    @if ($errors->has('first_name'))
                                                        <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                                                    @endif
                                                    <br>
                                                    <label for="cus_email">Last Name</label>
                                                    <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                                           id="last_name" name="last_name" type="text"
                                                           placeholder="Enter last name"
                                                           value="{{ !empty($results['user']) ? $results['user']->last_name : old('last_name')}}">
                                                    @if ($errors->has('last_name'))
                                                        <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-6 col-md-6">
                                                    <label for="city">Customer Image</label>
                                                    <img id="preview_cust_img"
                                                         src="{{ !empty($results['user']) && !empty($results['user']->avatar) ? asset("/storage/app/".$results['user']->avatar) : config('app.coure_ui_asset_url').'/images/avatars/avatar-placeholder.png' }}"
                                                         class="form-control preview-img"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label for="cus_adrs">Customer Address</label>
                                                    <textarea
                                                            class="form-control {{ $errors->has('cus_adrs') ? 'is-invalid' : '' }}"
                                                            id="cus_adrs" name="cus_adrs" type="text"
                                                            placeholder="Enter customer Address">{{ !empty($results['user']) ? $results['user']->address : old('cus_adrs')}}</textarea>
                                                    @if ($errors->has('cus_adrs'))
                                                        <div class="invalid-feedback">{{ $errors->first('cus_adrs') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ $page_title }} Job Request</strong>
                            {{--<small>Form</small>--}}
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="row">
                                                        <div class="form-group col-sm-12 col-md-12">
                                                            <label for="cus_email">Search Place</label>
                                                            <input class="form-control"
                                                                   id="pac-input" name="pac-input" type="text"
                                                                   placeholder="Enter address here"
                                                                   value="{{ !empty($results) ? $results->location_address : "" }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div id="location-map"
                                                     style="width:100%;height:400px;"></div>
                                                <div id="infowindow-content">
                                                    <img src="" width="16" height="16" id="place-icon">
                                                    <span id="place-name" class="title"></span><br>
                                                    <span id="place-address"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="card-body">
                                            <div class="row">

                                                <div class="form-group col-sm-12 col-md-12">
                                                    <label for="country" class="col-sm-8 col-md-8">Change Driver
                                                        <small> (Check available providers)</small>
                                                    </label>
                                                    <a title="change provider" target="_blank" href="javascript:void(0)"
                                                       class="btn btn-block btn-primary col action-btn js-view-drivers-btn">
                                                        <i class="fa fa-retweet fa-1x-size"></i>
                                                    </a>
                                                </div>
                                                <div class="col-sm-12 col-md-12">
                                                    <div class="row">
                                                        <div class="form-group col-sm-6 col-md-6">
                                                            <label for="pro_email">Provider Email</label>
                                                            <input class="form-control"
                                                                   type="text"
                                                                   value="{{ !empty($results['provider']) ? $results['provider']->email : ''}}">
                                                        </div>
                                                        <div class="form-group col-sm-6 col-md-6">
                                                            <label for="pro_phone">Provider Phone</label>
                                                            <input class="form-control"
                                                                   type="text"
                                                                   value="{{ !empty($results['provider']) ? $results['provider']->phone : ''}}">
                                                        </div>
                                                        <div class="form-group col-sm-6 col-md-6">
                                                            <label for="pro_first_name">Provider First Name</label>
                                                            <input class="form-control" type="text"
                                                                   value="{{ !empty($results['provider']) ? $results['provider']->first_name : ''}}">
                                                            <br>
                                                            <label for="pro_last_name">Provider Last Name</label>
                                                            <input class="form-control" type="text"
                                                                   value="{{ !empty($results['provider']) ? $results['provider']->last_name : ''}}">
                                                        </div>
                                                        <div class="form-group col-sm-6 col-md-6">
                                                            <label for="pro_img">Provider Image</label>
                                                            <img id="preview_cust_img"
                                                                 src="{{ !empty($results['provider']) && !empty($results['provider']->avatar) ? asset("/storage/app/".$results['provider']->avatar) : config('app.coure_ui_asset_url').'/images/avatars/avatar-placeholder.png' }}"
                                                                 class="form-control preview-img"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-sm-12 col-md-12">
                                                            <label for="pro_adrs">Provider Address</label>
                                                            <textarea
                                                                    class="form-control"
                                                                    type="text"
                                                            >{{ !empty($results['provider']) ? $results['provider']->address : ''}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--</div>--}}
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary js-save-action-btn" type="submit" data-action="jobForm">
                                <i class="fa fa-bolt"></i> {{!empty($results) ? "Edit" : "Dispatch"}} Job
                            </button>
                            @if(!empty($results) && !empty($results->job_status != APP\Job::cancel))
                                <a href="javascript:void(0)"
                                   class="btn btn-sm btn-danger col action-btn  {{ $results->job_status != APP\Job::cancel ? 'js-cancel-job' : '' }}"
                                   data-route="all-jobs" data-model="JOB"
                                   data-id="{{  !empty($results) ? $results->id : 0  }}">
                                    <i class="fa fa-ban"></i> Cancel Job
                                </a>
                            @endif
                            <a class="btn btn-sm btn-primary" href="{{route('all-jobs')}}">
                                <i class="fa fa-location-arrow"></i> View all Jobs
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            {{--</div>--}}
        </form>
    </div>
    @include('layouts.partials.htmlScript')
@endsection
