@extends('layouts.app')
@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('create-discounts') }}">Descounts</a>
        </li>
        <li class="breadcrumb-item active"></li> 
    </ol>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('save-discounts')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ !empty($results) ? $results->id : 0 }}" name="id">
                        <div class="card-header">
                        <strong>Add Coupons</strong>
                            {{--<small>Form</small>--}}
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                @if(session('message'))
                                <p class="alert alert-success">{{session('message')}}</p>
                                @endif
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="company">Coupon ID*</label>
                                                    <input class="form-control" type="text" name="title" id="inputTitle" value="" >
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="company">Percentage*</label>
                                                    <input class="form-control" type="text" name="percentage" id="percentage" value="0.00" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <span for="input">Descriptions*</span>
                                                <textarea name="body" id="inputBody" class="form-control" rows="3"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <span for="input">Start Date*</span>
                                                <input type="date" name="start" id="inputStart" class="form-control" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <span for="input">End Date*</span>
                                                <input type="date" name="end" id="inputEnd" class="form-control" value="" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <a class="btn btn-sm btn-danger" type="reset" href="{{route('create-discounts')}}">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

