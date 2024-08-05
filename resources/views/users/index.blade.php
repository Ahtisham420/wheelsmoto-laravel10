@extends('layouts.app')

@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">{{ __('admin/pages/users_list.bread_crumb_1') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('admin/pages/users_list.bread_crumb_2') }}</li>
    </ol>
    <div class="container-fluid">
        @include('users.partials.all')
    </div>
@endsection
@push('scripts')
    @include('users.partials.scripts')
@endpush
