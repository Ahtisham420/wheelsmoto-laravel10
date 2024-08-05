@extends('layouts.app')
@section('title','Brand')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/brand_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        All {{ $key }}
    </li>
</ol>
<div class="container-fluid">
    @include('car-setting.partials.all')
</div>
@endsection
@push('scripts')
    @include('car-setting.partials.scripts')
@endpush