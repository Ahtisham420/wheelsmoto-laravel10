@extends("layouts.app")
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/categories_form.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('events.create') }}">Create Event</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <form method="post" action="{{route('events.store')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <strong>Create Event</strong>
                        {{--<small>Form</small>--}}
                    </div>


                    @include("events.form", ['post' => new App\Event()])



                    {{-- <div class="row">
                        <div class="col-sm-12">
                            @if ($errors->any())
                            <div class="alert alert-danger m-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
            </div>
            @endif
            @if(session('message'))
            <p class="alert alert-success m-3">{{session('message')}}</p>
            @endif
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-1 text-right mt-2">
                                    <span
                                        for="input"><strong>{{ __('admin/pages/categories_form.name') }}:</strong></span>
                                </div>
                                <div class="col-md-4">
                                    <input name="name" type="text" class="form-control" required />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit">
            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/categories_form.submit') }}
        </button>
        <a class="btn btn-sm btn-danger" type="reset" href="{{route('events.create')}}">
            <i class="fa fa-ban"></i> {{ __('admin/pages/categories_form.cancel') }}
        </a>
    </div>
    </form>
</div>
</div>
</div>
</div>
@endsection
