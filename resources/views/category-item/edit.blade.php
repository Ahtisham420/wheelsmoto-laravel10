@extends('layouts.app')
@section('title','Category')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/NewsLetters_List.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{route('category-items-index')}}">All Items</a>
    </li>
    <li class="breadcrumb-item">
        {{ __('admin/pages/NewsLetters_List.bread_crumb_edit') }}
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action='{{route("category-items-updated",$category_items->id)}}' enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <strong>ITEMS GROUP</strong>
                        {{--<small>Form</small>--}}
                    </div>
                    @include("category-item.form")
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/NewsLetters_List.submit') }}
                        </button>
                        <a class="btn btn-sm btn-danger" type="reset" href="{{route('category-items-index')}}">
                            <i class="fa fa-ban"></i> {{ __('admin/pages/NewsLetters_List.cancel') }}
                        </a>
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

<div id="cat_img_modal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="cat_img_demo"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning crop_image_cat">Crop & Upload Image</button>
            </div>
        </div>
    </div>
</div>
@endsection
