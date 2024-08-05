@extends('layouts.app')

@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">{{ $page_title }}</li>
</ol>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{ route('profile-admin-password') }}">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <strong>{{ $page_title }}</strong>
                        {{--<small>Form</small>--}}
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            {{--alerts start here--}}
                            @include('partials.validation')
                            {{--alerts ends here--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="company">Current Password*</label>
                                            <input class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}" id="current_password" name="current_password" type="password" placeholder="Enter current password">
                                            @if ($errors->has('current_password'))
                                            <div class="invalid-feedback">{{ $errors->first('current_password') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="company">New Password*</label>
                                            <input class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}" id="new_password" name="new_password" type="password" placeholder="Enter new password">
                                            @if ($errors->has('new_password'))
                                            <div class="invalid-feedback">{{ $errors->first('new_password') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="company">Confirm New Password*</label>
                                            <input class="form-control {{ $errors->has('new_password_confirmation') ? 'is-invalid' : '' }}" id="new_password_confirmation" name="new_password_confirmation" type="password" placeholder="Confirm new password">
                                            @if ($errors->has('new_password_confirmation'))
                                            <div class="invalid-feedback">{{ $errors->first('new_password_confirmation') }}</div>
                                            @endif
                                        </div>
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <a class="btn btn-sm btn-danger" type="reset">
                                            <i class="fa fa-ban"></i> Cancel
                                        </a>

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
                    <div class="card-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection