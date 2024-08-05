@extends("layouts.app")
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/categories_form.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('posts.create') }}">{{ __('admin/pages/categories_form.bread_crumb_2_1') }}</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <form method="post" action="{{route('notifications.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <strong>Create Notification</strong>
                        <small>(Form to create the notifications)</small>
                    </div>


                    @include("notifications.form", ['post' => new App\Post(),'users' => $users])



                    
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit">
            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/categories_form.submit') }}
        </button>
        <a class="btn btn-sm btn-danger" type="reset" href="{{route('create-category')}}">
            <i class="fa fa-ban"></i> {{ __('admin/pages/categories_form.cancel') }}
        </a>
    </div>
    </form>
</div>
</div>
</div>
</div>
@endsection
