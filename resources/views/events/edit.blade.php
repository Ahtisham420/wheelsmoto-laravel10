@extends('layouts.app')
@section('title','Category')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/categories_form.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="">{{ __('admin/pages/categories_form.bread_crumb_2_2') }}</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action='{{route("events.update",$post->id)}}' enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


                    <div class="card-header">
                        <strong>Edit Post </strong>
                        {{--<small>Form</small>--}}
                    </div>
                    @include("events.form", ['post' => $post])
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/categories_form.submit') }}
                        </button>
                        {{-- <a class="btn btn-sm btn-danger" type="reset"
                            href="{{route('show-category',['id' => $category->id])}}">
                        <i class="fa fa-ban"></i> {{ __('admin/pages/categories_form.cancel') }}
                        </a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
