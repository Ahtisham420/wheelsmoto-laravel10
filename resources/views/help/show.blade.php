@extends('layouts.app')
@section('title','Help')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="">Show</a>
    </li>
    <li class="breadcrumb-item active"></li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {{--<form method="post" action="{{route('update-guides')}}" enctype="multipart/form-data">--}}
                {{ csrf_field() }}
                <input type="hidden" value="{{ !empty($guide) ? $guide->id : 0 }}" name="id">
                <div class="card-header">
                    <strong>Show Issue </strong>
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
                                            <label for="company">User ID*</label>
                                            <input class="form-control" type="text" name="user_id" id="inputUser_id" value="{{$guide->user_id}}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="company">User Type*</label>
                                            <input class="form-control" type="text" name="user_type" id="inputUser_type" value="{{$guide->user_type}}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="company"> Issue*</label>
                                            <input class="form-control" type="text" name="issue_name" id="inputIssue_name" value="{{$guide->issue_name}}">
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="company"> Type of Issue*</label>
                                            <input class="form-control" type="text" name="issue_type" id="inputIssue_name" value="{{$guide->issue_type}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <span for="input">Descriptions*</span>
                                        <textarea name="issue_description" id="inputIssue_description" class="form-control" rows="3">{{$guide->issue_description}}</textarea>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label for="postal-code">Status</label>
                                            <input class="form-control" type="text" name="status" id="inputStatus" value="{{$guide->status}}">
                                            {{--<select class="form-control" name="status" id="status" placeholder="Review.." required>--}}
                                            {{--</select>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a class="btn btn-sm btn-danger" href="{{route('all-guides')}}">
                        <i class="fa fa-left-arrow"></i> Back
                    </a>
                </div>
                {{--</form>--}}
            </div>
        </div>
    </div>
</div>
@endsection