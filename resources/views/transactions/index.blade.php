@extends('layouts.app')

@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">All Transactions</li>
</ol>
<div class="container-fluid">
    @include('transactions.partials.all')
</div>
@endsection