@extends('layouts.app')
@section('title','Dispatcher')

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row">
            <div class="col-md-9 col-lg-9">
                <div>
                    <div class="dispatcher-col-1">
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                @include('dispatcher.partials.left')
                            </div>
                            <div class="col-md-8 col-lg-8">
                                @include('dispatcher.partials.map')
                            </div>
                            <div class="col-md-12 col-lg-12">
                                    @include('dispatcher.partials.bottom')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-3 col-lg-3" style="z-index: 10;">
                @include('dispatcher.partials.right')
            </div>
        </div>
    </div>
    <style>
        .app-footer {
            display: none;
        }
    </style>
    <script>
        var active = document.querySelector("body");
        active.classList.add("brand-minimized", "sidebar-minimized");
    </script>
@endsection