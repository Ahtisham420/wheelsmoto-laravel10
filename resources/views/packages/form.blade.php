@extends('layouts.app')

@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">Home</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('all-packages') }}">Packages</a>
    </li>
    <li class="breadcrumb-item active">{{ $page_title }}</li>
</ol>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{ route('save-packages') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ !empty($results) ? $results->id : 0 }}" name="id">
                    <div class="card-header">
                        <strong>{{ $page_title }} Package</strong>
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
                                                <label for="name">Name*</label>
                                                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" type="text" placeholder="Enter name" value="{{ !empty($results) ? $results->name : old('name') }}">
                                                @if ($errors->has('name'))
                                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="tagline">Tagline*</label>
                                                <input class="form-control {{ $errors->has('tagline') ? 'is-invalid' : '' }}" id="tagline" name="tagline" type="text" placeholder="Enter tagline" value="{{ !empty($results) ? $results->tagline : old('tagline') }}">
                                                @if ($errors->has('tagline'))
                                                <div class="invalid-feedback">{{ $errors->first('tagline') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="price">Price*</label>
                                                <input class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}" id="price" name="price" type="number" placeholder="Enter price" value="{{ !empty($results) ? $results->price : old('price') }}">
                                                @if ($errors->has('price'))
                                                <div class="invalid-feedback">{{ $errors->first('price') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="duration">Duration*</label>
                                                <select class="form-control" name="duration" id="duration">
                                                    <option value="{{ App\Package::per_day }}" {{ (!empty($results) ? $results->duration : old('duration')) == App\Package::per_day ? "selected": "" }}>Per Day</option>
                                                    <option value="{{ App\Package::per_month }}" {{ (!empty($results) ? $results->duration : old('duration')) == App\Package::per_month ? "selected": "" }}>Per Month</option>
                                                    <option value="{{ App\Package::per_year }}" {{ (!empty($results) ? $results->duration : old('duration')) == App\Package::per_year ? "selected": "" }}>Per Year</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="off_percentage">Off Percentage</label>
                                                <input class="form-control {{ $errors->has('off_percentage') ? 'is-invalid' : '' }}" id="off_percentage" name="off_percentage" type="number" placeholder="Enter Off %" value="{{ !empty($results) ? $results->off_percentage : old('off_percentage') }}">
                                                @if ($errors->has('off_percentage'))
                                                <div class="invalid-feedback">{{ $errors->first('off_percentage') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="off_bit">Off available</label><br>


                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" {{ (!empty($results) ? $results->off_bit : old('off_bit')) == 1 ? "checked": "" }} class="custom-control-input" id="off_bit" name="off_bit">
                                                    <label class="custom-control-label" for="off_bit"></label>
                                                </div>
                                                @if ($errors->has('off_bit'))
                                                <div class="invalid-feedback">{{ $errors->first('off_bit') }}</div>
                                                @endif
                                            </div>
                                        </div>


                                        <!-- /.row-->

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    @php
                                    $attributes = !empty($results->attributes) ? json_decode($results->attributes) : null;
                                    @endphp
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-sm-12">
                                                <label for="adverts">Adverts</label>
                                                <input class="form-control {{ $errors->has('adverts') ? 'is-invalid' : '' }}" id="adverts" name="adverts" type="number" placeholder="Enter no of adverts" value="{{!empty($attributes->adverts) ? $attributes->adverts : ''}}">
                                                @if ($errors->has('adverts'))
                                                <div class="invalid-feedback">{{ $errors->first('adverts') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label for="images_per_post">Images Per Post</label>
                                                <input class="form-control {{ $errors->has('images_per_post') ? 'is-invalid' : '' }}" id="images_per_post" name="images_per_post" type="number" placeholder="Enter no of images per post" value="{{!empty($attributes->images_per_post) ? $attributes->images_per_post : ''}}">
                                                @if ($errors->has('images_per_post'))
                                                <div class="invalid-feedback">{{ $errors->first('images_per_post') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="videos_per_post">Videos Per Post</label>
                                                <input class="form-control {{ $errors->has('videos_per_post') ? 'is-invalid' : '' }}" id="videos_per_post" name="videos_per_post" type="number" placeholder="Enter no of videos per post" value="{{!empty($attributes->videos_per_post) ? $attributes->videos_per_post : ''}}">
                                                @if ($errors->has('videos_per_post'))
                                                <div class="invalid-feedback">{{ $errors->first('videos_per_post') }}</div>
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
                        <a class="btn btn-sm btn-danger" type="reset" href="{{route('all-packages')}}">
                            <i class="fa fa-ban"></i> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection