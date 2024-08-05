@extends('layouts.app')
@section('title','Roles')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/logs_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('logs.index') }}">{{ __('admin/pages/logs_list.bread_crumb_2') }}</a>
    </li>
</ol>
<div class="container-fluid">
    @include('logs.partials.all')
</div>
@endsection