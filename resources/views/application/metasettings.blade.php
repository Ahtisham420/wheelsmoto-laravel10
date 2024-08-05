@extends('layouts.app')

@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">Home</a>
    </li>
    <li class="breadcrumb-item active">Meta Settings</li>
    <link rel="stylesheet" href="{{config('app.coure_ui_asset_url').'/sass/tags.css'}}">
</ol>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-header">
                    <i class="fa fa-align-justify"></i> Meta Settings
                </div>

                <body>
                    <div class="card-body">

                        <div class="row">
                            <p>
                                <strong>Note 1:</strong> Write tag and press enter or "," for submitting<br><strong>Note 2:</strong> Click "X" for removing tag
                            </p><br>
                            <div class="col-md-1 text-right mt-2">
                                <strong>Tags:</strong>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <p>
                                        <div class="tags-input" data-name="tags-input">
                                            @php
                                            $data = (App\Tags::first()) ? (App\Tags::first())->tags : "";
                                            $tags = explode(",",$data);
                                            @endphp

                                            @if(count($tags)>0)
                                            @foreach($tags as $key => $value)
                                            <span class="tag">{{ $value }}<span class="close"></span></span>
                                            @endforeach
                                            @endif
                                        </div>
                                    </p>

                                </div>
                            </div>
                        </div>
                        <br>
                        {{--alerts start here--}}
                        @include('application.partials.scripts')
                        {{--alerts ends here--}}

                    </div>
                </body>
            </div>
        </div>
    </div>
</div>
@endsection