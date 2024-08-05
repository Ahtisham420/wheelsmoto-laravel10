@extends('layouts.app')

@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">All Engin Types</li>
    </ol>
    <div class="container-fluid">
        @include('site-settings.partials.all')
        @include('site-settings.partials.scripts')
        @include('site-settings.partials.modal')
    </div>
@endsection
