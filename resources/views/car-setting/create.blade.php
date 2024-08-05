@extends('layouts.app')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/brand_form.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="#">Add {{ $key }}</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{route('save-car-settings',["key" => $key])}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <strong>{{ $key }}</strong>
                        {{--<small>Form</small>--}}
                    </div>
                    <div class="row">
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
                                @if($key === "model")
                                    @php $brand = App\Brand::orderby('name')->get(); @endphp
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1 text-right mt-2">
                                                            <span for="input"><strong>Brand Name:</strong></span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            @if(!empty($brand) && count($brand) > 0)
                                                                <select class="form-control" name="brand" required>
                                                                    <option value="">Select Brand</option>
                                                                    @foreach($brand as $b)
                                                                        <option value="{{$b->id}}">{{$b->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($key === "city")
                                    @php $brand = App\CarState::orderby('name')->get(); @endphp
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1 text-right mt-2">
                                                            <span for="input"><strong>State:</strong></span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            @if(!empty($brand) && count($brand) > 0)
                                                                <select class="form-control" name="state" required>
                                                                    <option value="">Select State</option>
                                                                    @foreach($brand as $b)
                                                                        <option value="{{$b->id}}">{{$b->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if($key === "variant")
                                    @php $model = App\CarSetting::orderby('_value')->where('_key','model')->get(); @endphp
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-1 text-right mt-2">
                                                            <span for="input"><strong>Model:</strong></span>
                                                        </div>
                                                        <div class="col-md-4">
                                                            @if(!empty($model) && count($model) > 0)
                                                                <select class="form-control" name="model" required>
                                                                    <option value="">Select Model</option>
                                                                    @foreach($model as $b)
                                                                        <option value="{{$b->id}}">{{$b->_value}}</option>
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1 text-right mt-2">
                                                    <span for="input"><strong>{{ __('admin/pages/brand_form.name') }}:</strong></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input name="_key" type="hidden" value="{{ $key }}" class="form-control" />
                                                    <input name="_value" type="text" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                @if($key === 'car-type')
                                    <div class="bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border">
                                        <div style='max-width:55px;' class='float-right m-2'>
                                            <img id="blah">
                                        </div>
                                        <h4>Icon</h4>
                                        <div class="form-group mb-4 p-2">
                                            <label for="blog_feature_img">Image - (required)</label>
                                            <small id="blog__help" class="form-text text-muted">Upload image -
                                                {{-- <code>&times;px</code> - it will --}}
                                                it will show on Car Type
                                            </small>
                                            <input class="form-control"  type="file" name="icon" onchange="readURL(this);" id="blog_feature_img"
                                                   aria-describedby="blog_help">

                                        </div>
                                    </div>
                                @endif

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/brand_form.submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(55)
                        .height(25.313);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush