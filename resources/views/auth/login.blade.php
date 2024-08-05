@extends('layouts.app')

@section('content')
    <style>
        .main {
            margin-left: 0px !important;
        }

        .header-fixed .app-body {
            margin-top: 160px;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email" value="{{ old('email') ? old('email') : 'admin@gmail.com' }}" required autocomplete="email"
                                           autofocus
                                    >

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('email') }}</strong>
    </span>
                                    @endif
                                </div>
                            </div>
<input type="hidden" name="type" value="2">
                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password" required autocomplete="current-password" value="{{ old('password') ? old('password') : '123456' }}">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
    <strong>{{ $errors->first('password') }}</strong>
    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<body class="app flex-row align-items-center">--}}
    {{--<div class="container">--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="col-md-8">--}}
                {{--<div class="card-group">--}}
                    {{--<div class="card p-4">--}}
                        {{--<div class="card-body">--}}
                            {{--<h1>Login</h1>--}}
                            {{--<p class="text-muted">Sign In to your account</p>--}}
                            {{--<form method="POST" action="{{ route('login') }}">--}}
                                {{--<div class="input-group mb-3">--}}
                                    {{--<div class="input-group-prepend">--}}
                    {{--<span class="input-group-text">--}}
                      {{--<i class="icon-user"></i>--}}
                    {{--</span>--}}
                                    {{--</div>--}}
                                    {{--<input id="email" type="email"--}}
                                           {{--class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"--}}
                                           {{--name="email" value="{{ old('email') }}" required autocomplete="email"--}}
                                           {{--autofocus>--}}
                                    {{--@if ($errors->has('email'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                                {{--<div class="input-group mb-4">--}}
                                    {{--<div class="input-group-prepend">--}}
                    {{--<span class="input-group-text">--}}
                      {{--<i class="icon-lock"></i>--}}
                    {{--</span>--}}
                                    {{--</div>--}}
                                    {{--<input id="password" type="password"--}}
                                           {{--class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"--}}
                                           {{--name="password" required autocomplete="current-password">--}}
                                    {{--@if ($errors->has('password'))--}}
                                        {{--<span class="invalid-feedback" role="alert">--}}
                                    {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                {{--</div>--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-6">--}}
                                        {{--<button class="btn btn-primary px-4" type="submit">Login</button>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-6 text-right">--}}
                                    {{--<button class="btn btn-link px-0" type="button">Forgot password?</button>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- CoreUI and necessary plugins-->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
    </body>


@endsection
