@extends('layouts.app')

@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/users_form.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('all-users') }}">{{ __('admin/pages/users_form.bread_crumb_2') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ $page_title == "Add" ? __('admin/pages/users_form.bread_crumb_3_1') : __('admin/pages/users_form.bread_crumb_3_2') }}</li>
</ol>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{ route('profile-users') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ !empty($results) ? $results->id : 0 }}" name="id">
                    <div class="card-header">
                        <strong>{{ $page_title == "Add" ? __('admin/pages/users_form.card_title_1') : __('admin/pages/users_form.card_title_2') }}</strong>
                        <small> {{ $page_title !='Edit' ? __('admin/pages/users_form.card_small') : "" }}</small>
                        <div class="float-right">
                            <button class="btn btn-sm btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/users_form.submit') }}
                            </button>
                            <a class="btn btn-sm btn-danger" type="reset" href="{{route('all-users')}}">
                                <i class="fa fa-ban"></i> {{ __('admin/pages/users_form.cancel') }}
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {{--alerts start here--}}
                            @include('partials.validation')
                            {{--alerts ends here--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="company">{{ __('admin/pages/users_form.first_name') }}</label>
                                                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" id="first_name" name="first_name" type="text" placeholder="{{ __('admin/pages/users_form.first_name_placeholder') }}" value="{{ !empty($results) ? $results->first_name : old('first_name') }}">
                                                @if ($errors->has('first_name'))
                                                <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="company">{{ __('admin/pages/users_form.last_name') }}</label>
                                                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" id="last_name" name="last_name" type="text" placeholder="{{ __('admin/pages/users_form.last_name_placeholder') }}" value="{{ !empty($results) ? $results->last_name : old('last_name') }}">
                                                @if ($errors->has('last_name'))
                                                <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        {{--<div class="form-group">--}}
                                        {{--<label for="company">Username*</label>--}}
                                        {{--<input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"--}}
                                        {{--id="username" name="username" type="text"--}}
                                        {{--placeholder="Enter user name" value="{{ !empty($results) ? $results->username : old('username') }}" {{ !empty($results) ? "disabled" : "" }}>--}}
                                        {{--@if ($errors->has('username'))--}}
                                        {{--<div class="invalid-feedback">{{ $errors->first('username') }}
                                    </div>--}}
                                    {{--@endif--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <label for="vat">{{ __('admin/pages/users_form.email') }}</label>
                                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email" name="email" type="email" placeholder="{{ __('admin/pages/users_form.email_placeholder') }}" value="{{ !empty($results) ? $results->email : old('email') }}" {{ !empty($results) ? "disabled" : "" }}>
                                        @if ($errors->has('email'))
                                        <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>

                                    <!-- /.row-->
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="country">{{ __('admin/pages/users_form.phone') }}</label>
                                            <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" id="phone" name="phone" type="text" value="{{ !empty($results) ? $results->phone : old('phone') }}" placeholder="{{ __('admin/pages/users_form.phone_placeholder') }}">
                                            @if ($errors->has('phone'))
                                            <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="postal-code">{{ __('admin/pages/users_form.type') }}</label>
                                            <select class="form-control" name="type" id="type">
                                                <option value="{{ App\User::customer }}" {{ (!empty($results) ? $results->type : old('type')) == App\User::customer ? "selected": "" }}>{{ __('admin/pages/users_form.customer') }}</option>
                                                <option value="{{ App\User::provider }}" {{ (!empty($results) ? $results->type : old('type')) == App\User::provider ? "selected": "" }}>{{ __('admin/pages/users_form.customer_vendor') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label for="postal-code">{{ __('admin/pages/users_form.status') }}</label>
                                            <select class="form-control" name="status" id="status">
                                                <option value="{{ App\User::active }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::active ? "selected": "" }}>{{ __('admin/pages/users_form.active') }}</option>
                                                <option value="{{ App\User::inactive }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::inactive ? "selected": "" }}>{{ __('admin/pages/users_form.inactive') }}</option>
                                                <option value="{{ App\User::banned }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::banned ? "selected": "" }}>{{ __('admin/pages/users_form.banned') }}</option>
                                                <option value="{{ App\User::pending }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::pending ? "selected": "" }}>{{ __('admin/pages/users_form.pending') }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="postal-code">Identity Verification</label>
                                            <select class="form-control" name="approval_status" id="approval_status">
                                                <option value="{{ App\User::verified }}" {{ (!empty($results) ? $results->identity_verification : old('approval_status')) == App\User::verified ? "selected": "" }}>
                                                {{ __('admin/pages/users_form.verified') }}
                                                </option>
                                                <option value="{{ App\User::unverified }}" {{ (!empty($results) ? $results->identity_verification : old('approval_status')) == App\User::unverified ? "selected": "" }}>
                                                {{ __('admin/pages/users_form.unverified') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="attach_roles">Attach Role</label>
                                            <select class="select2 form-control {{ $errors->has('attach_roles') ? 'is-invalid' : '' }}" placeholder="Choose Role" name="attach_roles[]" id="attach_roles" multiple="multiple">
                                                <option value="">---Select One---</option>
                                                @foreach($roles as $role)
                                                    
                                                    <option value="{{ $role->id }}" {{ (!empty($results) ? ( in_array($role->id, $results->rolesid()->toArray() )) ? "selected" : "" : "" )}}>{{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('attach_roles'))
                                            <div class="invalid-feedback">{{ $errors->first('attach_roles') }}</div>
                                            @endif
                                            
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label for="attach_permission">Assign Permissions</label>
                                            <select class="select2 form-control {{ $errors->has('attach_permissions') ? 'is-invalid' : '' }}" placeholder="Choose Permissions" name="attach_permissions[]" id="attach_permission" multiple="multiple">
                                                <option value="">---Select One---</option>
                                                @foreach($permissions as $permission)
                                                    <option value="{{ $permission->id }}" {{ (!empty($results) ? ( in_array($permission->id, $results->permissionsid()->toArray() )) ? "selected" : "" : "" )}}>{{ $permission->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('attach_permissions'))
                                            <div class="invalid-feedback">{{ $errors->first('attach_permissions') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                    {{--<div class="form-group col-sm-4">--}}
                                    {{--<label for="postal-code">Type</label>--}}
                                    {{----}}
                                    {{--<div class="btn-group">--}}
                                    {{--<div class="dropdown">--}}
                                    {{--<button class="btn btn-secondary  badge-success dropdown-toggle"--}}
                                    {{--id="dropdownMenuButton" type="button" data-toggle="dropdown"--}}
                                    {{--aria-haspopup="true" aria-expanded="false">--}}
                                    {{--Customer--}}
                                    {{--</button>--}}
                                    {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                                    {{--<a class="dropdown-item" href="#">Admin</a>--}}
                                    {{--<a class="dropdown-item" href="#">Customer</a>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}

                                    

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-sm-5">
                                            <label for="postal-code">{{ __('admin/pages/users_form.profile_image') }}</label>
                                            <input class="form-control" id="avatar_file" name="avatar_file" type="file">
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="city">{{ __('admin/pages/users_form.preview') }}</label>
                                            <img id="preview-avatar" src="{{ !empty($results->avatar) ? asset("/storage/app/".$results->avatar) : config('app.coure_ui_asset_url').'/images/avatars/avatar-placeholder.png' }}" {{--src="{{ asset('/storage/app/avatar_file/2vSCnI0P3cBdUE0iKenFVupRB26hmP6hSQghBHhf.png') }}"--}} class="form-control preview-img" />
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="vat">{{ __('admin/pages/users_form.address') }}</label>
                                        <textarea class="form-control" id="address" name="address" rows="4" placeholder="{{ __('admin/pages/users_form.address_placeholder') }}">{{ !empty($results) ? trim($results->address) : trim(old('address')) }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @if($page_title == 'Edit')
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <form method="post" action="{{ route('update-user-password') }}">
                            {{ csrf_field() }}
                            <input type="hidden" value="{{ !empty($results) ? $results->id : 0 }}" name="id">
                            <div class="card-header">
                                <strong>{{ __('admin/pages/users_form.update_password') }}</strong>
                                {{--<small>Form</small>--}}
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="company">{{ __('admin/pages/users_form.update_password_description') }}</label>
                                                    
                                                </div>
                                                <button class="btn btn-sm btn-primary" type="submit">
                                                    <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/users_form.send_new_password') }}
                                                </button>

                                                <!-- /.row-->
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="card-body">
                                                <div class="form-group col-sm-12">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    @php
                    $data = array("User" =>  __('admin/pages/users_form.customer') );
                    $data['id_scanning_data'] = !empty($results) ? $results : null;
                    @endphp
                    @include('providers.partials.verification_data',$data)
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
</div>
@endsection