@extends('layouts.app')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/settings_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('roles.create') }}">{{ __('admin/pages/settings_list.bread_crumb_2') }}</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{route('settings.store')}}">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <strong>{{ __('admin/pages/settings_list.card_title') }}</strong>
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
                                        <div class="row">
                                            @foreach ($setting as $item)
                                            <div class="form-group col-sm-6">
                                                <label for="company">{{ $item->name}}</label>
                                                <input class="form-control" name="{{ $item->id }}" type="text" placeholder="Enter Single Lane Price" value="{{ !empty($setting) ? $item->value : old('single_lane_price') }}">
                                                
                                            </div> 
                                             @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/settings_list.submit') }}
                        </button>
                        <a class="btn btn-sm btn-danger" type="reset" href="{{route('roles.store')}}">
                            <i class="fa fa-ban"></i> {{ __('admin/pages/settings_list.cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection