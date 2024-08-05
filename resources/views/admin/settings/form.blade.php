@extends('layouts.app')

@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">Home</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('all-settings') }}">Settings</a>
        </li>
        <li class="breadcrumb-item active">{{ $page_title }}</li>
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{ route('update-settings') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ !empty($results) ? $results->id : 0 }}" name="id">
                        <div class="card-header">
                            <strong> {{ $page_title }}</strong>
                            {{--<small>Form</small>--}}
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {{--alerts start here--}}
                                @include('partials.validation')
                                {{--alerts ends here--}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="row">
                                                
                                              
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Meta Description</label>
                                                <input class="form-control {{ $errors->has('meta') ? 'is-invalid' : '' }}"
                                                       id="meta_description" name="meta_description" type="text"
                                                       placeholder="Enter meta description" value="{{ !empty($results) ? $results->meta_description : old('meta_description') }}" {{ !empty($results) ? "" : "" }}>
                                                @if ($errors->has('meta'))
                                                    <div class="invalid-feedback">{{ $errors->first('meta') }}</div>
                                                @endif
                                            </div>
                                            

                                            <!-- /.row-->
                                           
                                            <!-- <div class="row">
                                                <div class="form-group col-sm-6">
                                                    <label for="postal-code">Status</label>
                                                    <select class="form-control" name="status" id="status">
                                                        <option value="{{ App\User::active }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::active ? "selected": "" }}>Active</option>
                                                        <option value="{{ App\User::inactive }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::inactive ? "selected": "" }}>Inctive</option>
                                                        <option value="{{ App\User::banned }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::banned ? "selected": "" }}>Banned</option>
                                                        <option value="{{ App\User::pending }}" {{ (!empty($results) ? $results->status : old('status')) == App\User::pending ? "selected": "" }}>Pending</option>
                                                    </select>
                                                </div>
                                            </div> -->
                                            {{--<div class="form-group col-sm-4">--}}
                                            {{--<label for="postal-code">Type</label>--}}
                                            {{----}}
                                            {{--<div class="btn-group">--}}
                                            {{--<div class="dropdown">--}}
                                            {{--<button class="btn btn-secondary  badge-success dropdown-toggle"--}}
                                            {{--id="dropdownMenuButton" type="button" data-toggle="dropdown"--}}
                                            {{--aria-haspopup="true" aria-expanded="false">--}}
                                            {{--Customer--}}
                                            {{--</button>--}}
                                            {{--<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
                                            {{--<a class="dropdown-item" href="#">Admin</a>--}}
                                            {{--<a class="dropdown-item" href="#">Customer</a>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--</div>--}}

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-sm-5">
                                                    <label for="postal-code">Logo</label>
                                                    <input class="form-control" id="avatar_file" name="avatar_file"
                                                           type="file">
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="city">Preview</label>
                                                    <img id="preview-avatar"
                                                         src="{{ !empty($results->logo) ? asset("/storage/app/".$results->logo) : config('app.coure_ui_asset_url').'/images/avatars/img-placeholder.png' }}"
                                                            {{--src="{{ asset('/storage/app/avatar_file/2vSCnI0P3cBdUE0iKenFVupRB26hmP6hSQghBHhf.png') }}"--}}
                                                         class="form-control preview-img"/>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-sm-5">
                                                    <label for="postal-code">Favicon</label>
                                                    <input class="form-control" id="avatar_file1" name="avatar_file1"
                                                           type="file">
                                                </div>

                                                <div class="form-group col-sm-4">
                                                    <label for="city">Preview</label>
                                                    <img id="preview-avatar"
                                                         src="{{ !empty($results->fevicon) ? asset("/storage/app/".$results->fevicon) : config('app.coure_ui_asset_url').'/images/avatars/img-placeholder.png' }}"
                                                            {{--src="{{ asset('/storage/app/fevicon/2vSCnI0P3cBdUE0iKenFVupRB26hmP6hSQghBHhf.png') }}"--}}
                                                         class="form-control preview-img"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                            <a class="btn btn-sm btn-danger" type="reset" href="{{route('all-users')}}">
                                <i class="fa fa-ban"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
