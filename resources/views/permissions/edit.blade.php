@extends('layouts.app')
@section('title','permission')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/permissions_from.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="">{{ __('admin/pages/permissions_from.bread_crumb_2_2') }}</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{route("permissions.update",$permission->id)}}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{ !empty($permission) ? $permission->id : 0 }}" name="id">
                    <div class="card-header">
                        <strong>{{ __('admin/pages/permissions_from.card_title_2') }} </strong>
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
                                                    <span for="input"><strong>{{ __('admin/pages/permissions_from.name') }}:</strong></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input name="name" type="text" value="{{ !empty($permission) ? $permission->name : '' }}" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1 text-right mt-2">
                                                    <span for="input"><strong>{{ __('admin/pages/permissions_from.parent_permission') }}:</strong></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control {{ $errors->has('parent_id') ? 'is-invalid' : '' }}" id="parent_id" name="parent_id">
                                                        <option value="">---Select One---</option>
                                                        @foreach($all_permissions as $per)
                                                        <option value="{{ $per->id }}" {{ ( $per->id == $permission->parent_id ) ? "selected" : "" }}>{{ $per->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/permissions_from.submit') }}
                        </button>
                        <a class="btn btn-sm btn-danger" type="reset" href="{{route('permissions.update',['id' => $permission->id])}}">
                            <i class="fa fa-ban"></i> {{ __('admin/pages/permissions_from.cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection