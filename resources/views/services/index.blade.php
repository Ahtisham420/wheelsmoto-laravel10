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
                    <form method="post" action="{{ route('update-price') }}">
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
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="company">{{ $services[0]->title }} Price</label>
                                                    <input class="form-control {{ $errors->has('single_lane_price') ? 'is-invalid' : '' }}"
                                                           id="single_lane_price" name="single_lane_price" type="text"
                                                           placeholder="Enter Single Lane Price"
                                                           value="{{ !empty($services) ? $services[0]->price : old('single_lane_price') }}">
                                                    @if ($errors->has('single_lane_price'))
                                                        <div class="invalid-feedback">{{ $errors->first('single_lane_price') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="company">{{ $services[0]->title }} commision %</label>
                                                    <input class="form-control {{ $errors->has('single_lane_commision') ? 'is-invalid' : '' }}"
                                                           id="single_lane_commision" name="single_lane_commision"
                                                           type="text"
                                                           placeholder="Enter last name"
                                                           value="{{ !empty($services) ? $services[0]->commision : old('single_lane_commision') }}">
                                                    @if ($errors->has('single_lane_commision'))
                                                        <div class="invalid-feedback">{{ $errors->first('single_lane_commision') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="company">{{ $services[1]->title }} Price</label>
                                                    <input class="form-control {{ $errors->has('second_lane_price') ? 'is-invalid' : '' }}"
                                                           id="second_lane_price" name="second_lane_price" type="text"
                                                           placeholder="Enter Second Lane Price"
                                                           value="{{ !empty($services) ? $services[1]->price : old('second_lane_price') }}">
                                                    @if ($errors->has('second_lane_price'))
                                                        <div class="invalid-feedback">{{ $errors->first('second_lane_price') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="company">{{ $services[1]->title }} commision %</label>
                                                    <input class="form-control {{ $errors->has('second_lane_commision') ? 'is-invalid' : '' }}"
                                                           id="second_lane_commision" name="second_lane_commision"
                                                           type="text"
                                                           placeholder="Enter last name"
                                                           value="{{ !empty($services) ? $services[1]->commision : old('second_lane_commision') }}">
                                                    @if ($errors->has('second_lane_commision'))
                                                        <div class="invalid-feedback">{{ $errors->first('second_lane_commision') }}</div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="company">{{ $services[2]->title }} Price</label>
                                                    <input class="form-control {{ $errors->has('third_lane_price') ? 'is-invalid' : '' }}"
                                                           id="third_lane_price" name="third_lane_price" type="text"
                                                           placeholder="Enter third Lane Price"
                                                           value="{{ !empty($services) ? $services[2]->price : old('third_lane_price') }}">
                                                    @if ($errors->has('third_lane_price'))
                                                        <div class="invalid-feedback">{{ $errors->first('third_lane_price') }}</div>
                                                    @endif
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="company">{{ $services[2]->title }} commision %</label>
                                                    <input class="form-control {{ $errors->has('third_lane_commision') ? 'is-invalid' : '' }}"
                                                           id="third_lane_commision" name="third_lane_commision"
                                                           type="text"
                                                           placeholder="Enter last name"
                                                           value="{{ !empty($services) ? $services[2]->commision : old('third_lane_commision') }}">
                                                    @if ($errors->has('third_lane_commision'))
                                                        <div class="invalid-feedback">{{ $errors->first('third_lane_commision') }}</div>
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
