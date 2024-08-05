@extends('layouts.app')
@section('title','Category')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/categories_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('posts.index') }}">All Posts</a>
    </li>
</ol>
<div class="container-fluid">
    @include('posts.partials.all')
</div>
@endsection
