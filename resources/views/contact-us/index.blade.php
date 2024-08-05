@extends('layouts.app')
@section('title','Comments')
@section('content')
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/categories_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('contactus.index') }}">All Contact Lists</a>
    </li>
</ol>
<div class="container-fluid">
    @include('contact-us.partials.all')
</div>
@endsection
