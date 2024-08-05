@extends('layouts.app')

@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('all-users') }}">Users</a>
        </li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{ route('profile-users') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ !empty($results) ? $results->id : 0 }}" name="id">
                        <div class="card-header">
                            <strong>{{ $page_title }} User</strong>
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
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="company">First Name*</label>
                                                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}"
                                                           id="first_name" name="first_name" type="text"
                                                           placeholder="Enter first name" value="{{ !empty($results) ? $results->first_name : old('first_name') }}">
                                                    @if ($errors->has('first_name'))
                                                        <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="company">Last Name*</label>
                                                    <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}"
                                                           id="last_name" name="last_name" type="text"
                                                           placeholder="Enter last name" value="{{ !empty($results) ? $results->last_name : old('last_name') }}">
                                                    @if ($errors->has('last_name'))
                                                        <div class="invalid-feedback">{{ $errors->first('last_name') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Username*</label>
                                                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                                       id="username" name="username" type="text"
                                                       placeholder="Enter user name" value="{{ !empty($results) ? $results->username : old('username') }}" {{ !empty($results) ? "disabled" : "" }}>
                                                @if ($errors->has('username'))
                                                    <div class="invalid-feedback">{{ $errors->first('username') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label for="vat">Email*</label>
                                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                       id="email" name="email" type="email"
                                                       placeholder="example@mail.com" value="{{ !empty($results) ? $results->email : old('email') }}" {{ !empty($results) ? "disabled" : "" }}>
                                                @if ($errors->has('email'))
                                                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>

                                            <!-- /.row-->
                                            <div class="form-group">
                                                <label for="country">Phone*</label>
                                                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                       id="phone" name="phone" type="text" value="{{ !empty($results) ? $results->phone : old('phone') }}">
                                                @if ($errors->has('phone'))
                                                    <div class="invalid-feedback">{{ $errors->first('phone') }}</div>
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="postal-code">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="{{ App\User::active }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::active ? "selected": "" }}>Active</option>
                                                        <option value="{{ App\User::inactive }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::inactive ? "selected": "" }}>Inctive</option>
                                                        <option value="{{ App\User::banned }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::banned ? "selected": "" }}>Banned</option>
                                                        <option value="{{ App\User::pending }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::pending ? "selected": "" }}>Pending</option>
                                                    </select>
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
                                                    <label for="postal-code">Profile Image</label>
                                                    <input class="form-control" id="avatar_file" name="avatar_file"
                                                           type="file">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="city">Preview</label>
                                                    <img id="preview-avatar"
                                                         src="{{ !empty($results->avatar) ? asset("/storage/app/".$results->avatar) : config('app.coure_ui_asset_url').'/images/avatars/avatar-placeholder.png' }}"
                                                            {{--src="{{ asset('/storage/app/avatar_file/2vSCnI0P3cBdUE0iKenFVupRB26hmP6hSQghBHhf.png') }}"--}}
                                                         class="form-control preview-img"/>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="vat">Address*</label>
                                                <textarea class="form-control" id="address" name="address" rows="4"
                                                    required placeholder="Address..">{{ !empty($results) ? $results->address : old('address') }}
                                                </textarea>
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
                            <a class="btn btn-sm btn-danger" type="reset" href="{{route('all-users')}}">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
