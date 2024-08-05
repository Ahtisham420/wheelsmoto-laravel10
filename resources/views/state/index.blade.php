@extends('layouts.app')
@section('title','State')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/brand_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('all-state') }}">All State</a>
    </li>
</ol>
<div class="container-fluid">
    @include('state.partials.all')
</div>
@endsection