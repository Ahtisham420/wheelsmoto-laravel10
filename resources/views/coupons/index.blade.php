@extends('layouts.app')
@section('title','Coupons')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('all-discounts') }}">All Coupons</a>
        </li>
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="container-fluid">
        @include('coupons.partials.all')
    </div>
@endsection