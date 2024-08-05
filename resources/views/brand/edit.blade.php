@extends('layouts.app')
@section('title','Brand')
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/brand_form.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="">{{ __('admin/pages/brand_form.bread_crumb_2_2') }}</a>
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{route('save-brand')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" value="{{ !empty($brand) ? $brand->id : 0 }}" name="id">
                    <div class="card-header">
                        <strong>{{ __('admin/pages/brand_form.card_title_2') }} </strong>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1 text-right mt-2">
                                                    <span for="input"><strong>{{ __('admin/pages/brand_form.name') }}:</strong></span>
                                                </div>
                                                <div class="col-md-4">
                                                    <input name="name" type="text" value="{{ !empty($brand) ? $brand->name : '' }}" class="form-control" required />
                                                </div>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1 text-right mt-2">
                                                    <span for="input"><strong>{{ __('admin/pages/brand_form.slug') }}:</strong></span>
                                                </div>
                                                <div class="col-md-4"><input type="text" name="slug" class="form-control" value="{{ !empty($brand) ? $brand->slug : '' }}"></div>
                                             </div>
                                        </div>
                                           <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-1 text-right mt-2">
                                                    <span for="input"><strong>{{ __('admin/pages/brand_form.is_top') }}:</strong></span>
                                                </div>
                                                 <div class="col-md-4">
                                                    <select class="form-control" name="top_list">
                                                        <option value="{{App\Brand::inactive}}" {{ (!empty($brand) && App\Brand::inactive == $brand->top_list ) ? "selected": ""}} >Not</option>
                                                        <option value="{{App\Brand::active}}" {{ (!empty($brand) && App\Brand::active == $brand->top_list ) ? "selected": ""}}>Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-1 text-right mt-2">
                                                <span for="input"><strong>{{ __('admin/pages/brand_form.status') }}:</strong></span>
                                            </div>
                                            <div class="col-md-4 mt-2">
                                                @if($brand->status == 0)
                                                <label class="switch">
                                                    <input class="brand_status" id="{{ $brand->id }}" name="brand_status" type="checkbox" />
                                                    <span class="slider round"></span>
                                                </label>
                                                @elseif($brand->status == 1)
                                                <label class="switch">
                                                    <input class="brand_status" name="brand_status" id="{{ $brand->id }}" type="checkbox" checked />
                                                    <span class="slider round"></span>
                                                </label>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <div class="bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border">
                                    <div style='max-width:55px;' class='float-right m-2'>
                                        <img id="blah" style="width: 55px;height: 25.313px" src="/../../public/brand_icon/{{$brand->image}}">
                                    </div>
                                    <h4>Icon</h4>
                                    <div class="form-group mb-4 p-2">
                                        <label for="blog_feature_img">Image - (required)</label>
                                        <small id="blog__help" class="form-text text-muted">Upload image -
                                            {{-- <code>&times;px</code> - it will --}}
                                            it will show on Car Brand
                                        </small>
                                        <input class="form-control"  type="file" name="icon" onchange="readURL(this);" id="blog_feature_img"
                                               aria-describedby="blog_help">

                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-sm btn-primary" type="submit">
                            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/brand_form.submit') }}
                        </button>
                        <a class="btn btn-sm btn-danger" type="reset" href="{{route('show-brand',['id' => $brand->id])}}">
                            <i class="fa fa-ban"></i> {{ __('admin/pages/brand_form.cancel') }}
                        </a>
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