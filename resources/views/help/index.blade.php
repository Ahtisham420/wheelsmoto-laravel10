@extends('layouts.app')
@section('title','Help')
@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('all-guides') }}">All Issues</a>
        </li>
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="container-fluid">
        @include('help.partials.all')
    </div>
@endsection