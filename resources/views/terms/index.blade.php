@extends('layouts.app')
@section('title','Category')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/categories_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('terms.index') }}">All Posts</a>
    </li>
</ol>
<div class="container-fluid">
    @include('terms.partials.all')
</div>
@endsection
