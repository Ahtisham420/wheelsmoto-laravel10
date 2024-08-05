@extends('layouts.app')
@section('title','Category')
@section('content')
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/home') }}">{{ __('admin/pages/categories_form.bread_crumb_1') }}</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">{{ __('admin/layout.types') }}</a>
        </li>
        <li class="breadcrumb-item active">
            <span>{{ __('admin/layout.edit') }}</span>
        </li>
    </ol>
    <!-- Breadcrumb-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <form method="post" action="{{route('save-category')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" value="{{ !empty($category) ? $category->id : 0 }}" name="id">
                        <div class="card-header">
                            <strong>{{ __('admin/pages/categories_form.card_title_2') }} </strong>
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
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">{{ __('admin/pages/categories_form.name') }}</label>
                                                            <input name="name" type="text"
                                                                   value="{{ !empty($category) ? $category->name : '' }}"
                                                                   class="form-control" required/>
                                                    </div>
                                                    @include('category.partials.classification-select',[$classifications,$category])
                                                    @include('category.partials.sub-classification-select',[$sub_classifications,$category])
                                                    @include('category.partials.category-select',[$categories,$category])
                                                    @include('category.partials.nature-select',$category)

                                                    <div class="form-group">
                                                        <label for="name">{{ __('admin/pages/categories_form.status') }}</label>
                                                        <div class="col-md-4 mt-2">
                                                            @if($category->status == 0)
                                                                <label class="switch">
                                                                    <input class="category_status"
                                                                           id="{{ $category->id }}" type="checkbox"/>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            @elseif($category->status == 1)
                                                                <label class="switch">
                                                                    <input class="category_status"
                                                                           id="{{ $category->id }}" type="checkbox"
                                                                           checked/>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="catgeory_image">{{ __('admin/pages/categories_form.feature_icon') }}</label>
                                                                <input type="file" name="icon_img"
                                                                       id="icon_img">
                                                            </div>
                                                            <div class="form-group">
                                                                <img id="preview_icon_img" style="width:30%;"
                                                                     src="{{!empty($category->icon_img) ? asset('storage/app')."/".$category->icon_img :  config('app.coure_ui_asset_url').'images/defaults/square-placeholder.jpg' }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="catgeory_image">{{ __('admin/pages/categories_form.feature_interest_image') }}</label>
                                                                <input type="file" name="interest_img"
                                                                       id="interest_img">
                                                            </div>
                                                            <div class="form-group">
                                                                <img id="preview_interest_img" style="width:50%;"
                                                                     src="{{ !empty($category->interest_img) ? asset('storage/app')."/".$category->interest_img : config('app.coure_ui_asset_url').'images/defaults/portrait.jpg' }}"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="catgeory_image">{{ __('admin/pages/categories_form.feature_image') }}</label>
                                                                <input type="file" name="feature_img"
                                                                       id="feature_img">
                                                            </div>
                                                            <div class="form-group">
                                                                <img id="preview_feature_img" style="width:100%;"
                                                                     src="{{  !empty($category->feature_img) ? asset('storage/app')."/".$category->feature_img : config('app.coure_ui_asset_url').'images/defaults/350x150.png' }}"/>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="row" style="width: 200%;">
                                                        @php $css="none"; @endphp
                                                        @php $attr="disabled"; @endphp

                                                        @if($category->classification_id==3)
                                                            @php $css=""; @endphp
                                                            @php $attr=""; @endphp
                                                        @endif
                                                        <div class="col-6" id="ammun" style="display:{{$css}}">
                                                            <div class="form-group">
                                                                <label for="name">Ammunities</label>
                                                                <button type="button" id="ammunities_field">Add+</button>
                                                            </div>
                                                            @php $count2=1; @endphp
                                                            @if(!empty($category->ammunties) && count(json_decode($category->ammunties))> 0)
                                                                @foreach(json_decode($category->ammunties) as $key=>$t)
                                                                    <div class="row" style="margin-top: 5px;">
                                                                        <input type="hidden" name="anum_count[]" value="{{$key+1}}">
                                                                        <div class="col-3">
                                                                            <input  type="text" name="anum_title_{{$key+1}}" class="form-control" value="{{$t->title}}" placeholder="Title" required/>

                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <input type="radio" name="anum_req_{{$key+1}}" class="form-check-input" value="text" {{($t->attr_req==="text")?"checked":""}}>Text
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <input type="radio" name="anum_req_{{$key+1}}" class="form-check-input" value="bolean" {{($t->attr_req==="bolean")?"checked":""}}>Bolean
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1"><i class="fa fa-times del_attr" aria-hidden="true" style="cursor: pointer"></i></div>
                                                                    </div>
                                                                    @php $count2++ @endphp
                                                                @endforeach
                                                            @endif

                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row" style="width: 200%;">
                                                        <div class="col-6 ml-5 mt-4" id="attr_ap">
                                                            <div class="form-group">
                                                                <label for="name">Custom Attributes</label>
                                                                <button type="button" id="addcustom_field">Add+</button>
                                                            </div>
                                                            @php $count=1; @endphp
                                                            @if(!empty($category->custom_attribute) && count(json_decode($category->custom_attribute))> 0)
                                                                @foreach(json_decode($category->custom_attribute) as $key=>$t)
                                                                    <div class="row" style="margin-top: 5px;">
                                                                        <input type="hidden" name="attr_count[]" value="{{$key+1}}">
                                                                        <div class="col-3">
                                                                            <input  type="text" name="attr_title_{{$key+1}}" class="form-control" value="{{$t->title}}" placeholder="Title" required/>

                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <input type="radio" name="attr_req_{{$key+1}}" class="form-check-input" value="text" {{($t->attr_req==="text")?"checked":""}}>Text
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div class="form-check">
                                                                                <label class="form-check-label">
                                                                                    <input type="radio" name="attr_req_{{$key+1}}" class="form-check-input" value="bolean" {{($t->attr_req==="bolean")?"checked":""}}>Bolean
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-1"><i class="fa fa-times del_attr" aria-hidden="true" style="cursor: pointer"></i></div>
                                                                    </div>
                                                                    @php $count++ @endphp
                                                                @endforeach
                                                            @endif
                                                        </div>


                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-sm btn-primary" type="submit">
                                <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/categories_form.submit') }}
                            </button>
                            <a class="btn btn-sm btn-danger" type="reset"
                               href="{{route('all-categories')}}">
                                <i class="fa fa-ban"></i> {{ __('admin/pages/categories_form.cancel') }}
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
        var count="{{$count}}";
        var count2="{{$count2}}";
        $(document).on("click","#addcustom_field",function (e){
            let app='         <div class="row" style="margin-top: 5px;">'+
                '<input type="hidden" name="attr_count[]" value="'+count+'">'+
                '                                                                <div class="col-3">\n' +
                '                                                                    <input  type="text" name="attr_title_'+count+'" class="form-control" placeholder="Title" required/>\n' +
                '\n' +
                '                                                                </div>\n' +
                '                                                                <div class="col-2">\n' +
                '                                                                    <div class="form-check">\n' +
                '                                                                        <label class="form-check-label">\n' +
                '                                                                            <input type="radio" name="attr_req_'+count+'" class="form-check-input" value="text" checked>Text\n' +
                '                                                                        </label>\n' +
                '                                                                    </div>\n' +
                '                                                                </div>\n' +
                '                                                                <div class="col-2">\n' +
                '                                                                    <div class="form-check">\n' +
                '                                                                        <label class="form-check-label">\n' +
                '                                                                            <input type="radio" name="attr_req_'+count+'" class="form-check-input" value="bolean">Bolean\n' +
                '                                                                        </label>\n' +
                '                                                                    </div>\n' +
                '                                                                </div>\n' +
                '                                                                <div class="col-1"><i class="fa fa-times del_attr" aria-hidden="true" style="cursor: pointer"></i></div>\n' +
                '                                                            </div>';
            $("#attr_ap").append(app);
            count++;
        });
        $(document).on("click","#ammunities_field",function (e){
            let app='         <div class="row" style="margin-top: 5px;">'+
                '<input type="hidden" name="anum_count[]" value="'+count2+'">'+
                '                                                                <div class="col-3">\n' +
                '                                                                    <input  type="text" name="anum_title_'+count2+'" class="form-control" placeholder="Title" required/>\n' +
                '\n' +
                '                                                                </div>\n' +
                '                                                                <div class="col-2">\n' +
                '                                                                    <div class="form-check">\n' +
                '                                                                        <label class="form-check-label">\n' +
                '                                                                            <input type="radio" name="anum_req_'+count2+'" class="form-check-input" value="text" checked>Text\n' +
                '                                                                        </label>\n' +
                '                                                                    </div>\n' +
                '                                                                </div>\n' +
                '                                                                <div class="col-2">\n' +
                '                                                                    <div class="form-check">\n' +
                '                                                                        <label class="form-check-label">\n' +
                '                                                                            <input type="radio" name="anum_req_'+count2+'" class="form-check-input" value="bolean">Bolean\n' +
                '                                                                        </label>\n' +
                '                                                                    </div>\n' +
                '                                                                </div>\n' +
                '                                                                <div class="col-1"><i class="fa fa-times del_attr" aria-hidden="true" style="cursor: pointer"></i></div>\n' +
                '                                                            </div>';
            $("#ammun").append(app);
            count2++;
        });
        $(document).on("click",".del_attr",function(e){
            $(this).closest(".row").remove();
        });
        $(document).on("change","#classification_id",function(e){
            var val=$(this).val();
            if(val==3){
                $("#ammun").show();

            }
            else{
                $("#ammun").hide();

            }

        });
    </script>

@endpush
