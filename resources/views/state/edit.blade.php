@extends('layouts.app')
@section('title','Brand')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/brand_form.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="">Add State</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{route('save-state')}}">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ !empty($brand) ? $brand->id : 0 }}" name="id">
                    <div class="card-header">
                        <strong>Edit State </strong>
                        {{--<small>Form</small>--}}
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($errors->any())
                            <div class="alert alert-danger m-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            @if(session('message'))
                            <p class="alert alert-success m-3">{{session('message')}}</p>
                            @endif
                            {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1 text-right mt-2">
                                                    <span for="input"><strong>{{ __('admin/pages/brand_form.name') }}:</strong></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input name="name" type="text" value="{{ !empty($brand) ? $brand->name : '' }}" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        {{--<div class="row">--}}
                                            {{--<div class="col-md-1 text-right mt-2">--}}
                                                {{--<span for="input"><strong>{{ __('admin/pages/brand_form.status') }}:</strong></span>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-4 mt-2">--}}
                                                {{--@if($brand->status == 0)--}}
                                                {{--<label class="switch">--}}
                                                    {{--<input class="brand_status" id="{{ $brand->id }}" name="brand_status" type="checkbox" />--}}
                                                    {{--<span class="slider round"></span>--}}
                                                {{--</label>--}}
                                                {{--@elseif($brand->status == 1)--}}
                                                {{--<label class="switch">--}}
                                                    {{--<input class="brand_status" name="brand_status" id="{{ $brand->id }}" type="checkbox" checked />--}}
                                                    {{--<span class="slider round"></span>--}}
                                                {{--</label>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/brand_form.submit') }}
                        </button>
                        <a class="btn btn-sm btn-danger" type="reset" href="{{route('show-brand',['id' => $brand->id])}}">
                            <i class="fa fa-ban"></i> {{ __('admin/pages/brand_form.cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection