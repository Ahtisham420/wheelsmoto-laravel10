@extends('layouts.app')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/roles_from.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('roles.create') }}">{{ __('admin/pages/roles_from.bread_crumb_2_1') }}</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{route('roles.store')}}">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <strong>{{ __('admin/pages/roles_from.card_title_1') }}</strong>
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
                                                    <span for="input"><strong>{{ __('admin/pages/roles_from.name') }}:</strong></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input name="name" type="text" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1 text-right mt-2">
                                                    <span for="input"><strong>{{ __('admin/pages/roles_from.assign_permission') }}:</strong></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <select class="select2 form-control {{ $errors->has('attach_permissions') ? 'is-invalid' : '' }}" placeholder="Choose Permissions" name="attach_permissions[]" id="attach_permission" multiple="multiple">
                                                        <option value="">---Select One---</option>
                                                        @foreach($permissions as $permission)
                                                            <option value="{{ $permission->id }}">{{ $permission->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @if ($errors->has('attach_permissions'))
                                                    <div class="invalid-feedback">{{ $errors->first('attach_permissions') }}</div>
                                                    @endif
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
                            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/roles_from.submit') }}
                        </button>
                        <a class="btn btn-sm btn-danger" type="reset" href="{{route('roles.store')}}">
                            <i class="fa fa-ban"></i> {{ __('admin/pages/roles_from.cancel') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection