@extends('layouts.app')
@section('title','Category')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/categories_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('all-categories') }}">{{ __('admin/pages/categories_list.bread_crumb_2') }}</a>
    </li>
</ol>
<div class="container-fluid">
    @include('category.partials.all')
</div>
@endsection
@push('scripts')
    @include('category.partials.scripts')
@endpush