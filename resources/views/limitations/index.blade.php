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
                    <form method="post" action="{{ route('update-limitations') }}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ !empty($system_prefrence) ? $system_prefrence->id : 0 }}" name="id">
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
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-sm-4">
                                                    <label for="company">Max Job Limit</label>
                                                    <input class="form-control {{ $errors->has('max_job_limit') ? 'is-invalid' : '' }}"
                                                           id="max_job_limit" name="max_job_limit" type="text"
                                                           placeholder="Enter Max Jobm Limit"
                                                           value="{{ !empty($system_prefrence) ? $system_prefrence->max_job_limit : old('max_job_limit') }}">
                                                    @if ($errors->has('max_job_limit'))
                                                        <div class="invalid-feedback">{{ $errors->first('max_job_limit') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="company">Max Job Cancellation Time</label>
                                                    <input class="form-control {{ $errors->has('max_job_cancellation_time') ? 'is-invalid' : '' }}"
                                                           id="max_job_cancellation_time" name="max_job_cancellation_time"
                                                           type="text"
                                                           placeholder="Enter Max Job Cancellation Time"
                                                           value="{{ !empty($system_prefrence) ? $system_prefrence->max_job_cancellation_time : old('max_job_cancellation_time') }}">
                                                    @if ($errors->has('max_job_cancellation_time'))
                                                        <div class="invalid-feedback">{{ $errors->first('max_job_cancellation_time') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="company">Max Job Acception Time</label>
                                                    <input class="form-control {{ $errors->has('max_job_acception_time') ? 'is-invalid' : '' }}"
                                                           id="max_job_acception_time" name="max_job_acception_time"
                                                           type="text"
                                                           placeholder="Enter Max Job Acception Time"
                                                           value="{{ !empty($system_prefrence) ? $system_prefrence->max_job_acception_time : old('max_job_acception_time') }}">
                                                    @if ($errors->has('max_job_acception_time'))
                                                        <div class="invalid-feedback">{{ $errors->first('max_job_acception_time') }}</div>
                                                    @endif
                                                </div>
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
                            <a class="btn btn-sm btn-danger" type="reset" href="{{route('home')}}">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
