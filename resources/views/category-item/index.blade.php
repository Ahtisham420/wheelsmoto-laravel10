@extends('layouts.app')
@section('title','Category')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/category_items_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('category-items-index') }}">{{ __('admin/pages/category_items_list.bread_crumb_2') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('admin/pages/category_items_list.all') }}
    </li>
</ol>
<div class="container-fluid">
    @include('category-item.partials.all')
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
@push('scripts')
    @include('category-item.partials.scripts')
@endpush
