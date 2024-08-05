@extends('layouts.app')
@section('title','Category')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/food_category.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
         <a href="{{ route('food-cat.index') }}">{{ __('admin/pages/food_category.bread_crumb_2') }}</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __('admin/pages/food_category.all') }}
    </li>
</ol>
<div class="container-fluid">
    @include('category-f.partials.all')
</div>
@endsection
@push('scripts')
    @include('category-f.partials.scripts')
@endpush
