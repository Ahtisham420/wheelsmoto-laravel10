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
                    <form method="post" action="{{ route('update-google-api') }}">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ !empty($google_settings) ? $google_settings->id : 0 }}" name="id">
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
                                                <div class="form-group col-sm-6">
                                                    <label for="company">Google Maps</label>
                                                    <input class="form-control {{ $errors->has('google_maps') ? 'is-invalid' : '' }}"
                                                           id="google_maps" name="google_maps" type="text"
                                                           placeholder="Enter Google Maps API key"
                                                           value="{{ !empty($google_settings) ? $google_settings->google_maps : old('google_maps') }}">
                                                    @if ($errors->has('google_maps'))
                                                        <div class="invalid-feedback">{{ $errors->first('google_maps') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <!-- <label for="company">Google Places</label> -->
                                                    <input class="form-control {{ $errors->has('google_places') ? 'is-invalid' : '' }}"
                                                           id="google_places" name="google_places"
                                                           type="text"
                                                           placeholder="Enter Google Places API key"
                                                           hidden
                                                           readonly
                                                           value="{{ !empty($google_settings) ? $google_settings->google_places : 1 }}">
                                                    @if ($errors->has('google_places'))
                                                        <div class="invalid-feedback">{{ $errors->first('google_places') }}</div>
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
