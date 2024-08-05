@include('frontend.partials.header')
<?php
$car_a=App\CarSetting::all();
$car_b=App\Brand::all();
$car_categories=App\Category::all();
$car_user=App\User_car::all();
?>
<div class="Amercancarpagebody mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bradcrumb ">
                    <p><a href="{{route('frontend-home')}}">Home&nbsp; </a> <i class="fa fa-angle-right mr-2"></i><span>Home Filters</span></p>
                </div>
            </div>
            <div class="col-12  col-sm-12  col-md-6 col-lg-6 search-result-heading d-flex align-items-center"><div class="pageheading ">Home Filters</div></div>

            <div class="col-12  col-sm-8 col-md-12 col-lg-6 yearbtngrp new-yearbtngrp p-0" style="justify-content:flex-end;">
                <div class="span-div-american">
                    <div class="div-first-span">
                        <span style="color: #000;opacity: 0.45; padding: 0 10px;"> Order By:</span>
                    </div>
                    <div class=" div-second-span" id="dropdown-Btn" style="  padding-left: 0px;padding-right: 0px;">
                        <select class="btn dropdownbtn dropdown-toggle filter-home-class" id="car-year" data-col="year" name="year" style="height: 47px;padding-right: 15px;padding-left: 15px;">
                            <option  value="">None</option>
                            <option value="year">year</option>
                            <option value="price">Price</option>
                            {{--<option selected="selected" value=""> Year</option>--}}
                            {{--{{ $last= date('Y')-120 }}--}}
                            {{--{{ $now = date('Y') }}--}}

                            {{--@for ($i = $now; $i >= $last; $i--)--}}
                            {{--<option value="{{ $i }}">{{ $i }}</option>--}}
                            {{--@endfor--}}
                        </select>
                        {{--<button id="btnGroupDrop1" type="button" class="btn dropdownbtn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                        {{--year--}}
                        {{--<span class="caret"></span></button>--}}
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                            {{--<select class="dropdown-item" name="s_year" id="sort-year">--}}
                            {{--<option value="" disabled>Select Year</option>--}}
                            {{--@foreach($car_user as $brand)--}}
                            {{--<option value="" disabled>{{$brand->year}}</option>--}}
                            {{--<a class="dropdown-item" href="#">{{$brand->year}}</a>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                        </div>
                    </div>
                </div>
                <div class="span-div-american">
                    <div class="div-first-span">
                        <span style="color: #000;opacity: 0.45; padding: 0 10px;"> Sort By:</span>
                    </div>
                    <div class="div-second-span">
                        <select class="btn dropdownbtn dropdown-toggle filter-home-class" id="car-fuel" data-col="fuel_type" name="fuel_type" style="
    height: 47px;
    padding-right: 15px;
    padding-left: 15px;
">
                            <option value="ASC">Low</option>
                            <option value="DESC">High</option>
                            {{--<option value="">Fuel Type</option>--}}
                            {{--<option value="Petrol">PETROL</option>--}}
                            {{--<option value="Dualfuel">Dualfuel</option>--}}
                            {{--<option value="Diesel">DIESEL</option>--}}
                            {{--<option value="Biodiesel">Biodiesel</option>--}}
                            {{--<option value="LPG">LPG</option>--}}
                            {{--<option value="Hybrid">Hybrid</option>--}}
                            {{--<option value="Electric">Electric</option>--}}
                            {{--<option value="Other">Other</option>--}}

                        </select>
                        {{--<button class="btn dropdownbtn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="opacity:  1!important;">Petrol--}}
                        {{--<span class="caret"></span> </span></button>--}}
                    </div>
                </div>
                <div class="groupbtn">
                    <a class="grid" id="gridview" ><i class="fas fa-th"></i></a>
                    <a class="list"  id="listview"><i class="fas fa-list"></i></a>
                </div>
            </div>

        </div>
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-12 col-lg-2">
{{--                <label style=" font-size: 14px; font-weight: 600;color: #1a1818;font-weight: bold; margin: 0;" for="exampleInputEmail1">Postcode Cars</label>--}}
{{--                <div class="input-group mb-1 searchgroup">--}}
{{--                    <input  style="background-color: transparent;" type="text" class="form-control custom-control-btn" data-col="post_code"  placeholder="Enter Postcode">--}}
{{--                    <div class="input-group-append">--}}
{{--                        <span class="input-group-text home-car-span"><img src="{{ config('app.ui_asset_url').'frontend/img/Group 3354.png' }}"></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <span id="search-span-valid"></span>--}}
{{--                <h6 class="newstylefiltersearch" style="text-align: right;">--}}
{{--                    <span style="font-weight: bold;font-size: 16px; color: #1a1818;">Quick Search</span>--}}
{{--                </h6>--}}
{{--                <div class="col-12 "><hr></div>--}}
                <br>
                <br>

                <div class="row">
                    <div class="col-12 accordion" id="accordion2">
                        <div class="row">
                            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseThreeModal">
                                <a class="card-title">
                                    Select Location
                                </a>
                            </div>
                        </div>
                        <div class="priceshow collapse" id="collapseThreeModal" data-parent="#accordion2">
                            @php $state =  App\CarState::all() @endphp
                            @foreach($state as $st)
                                <div class="row" style="padding: 5px 0;">
                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input filter-home-class" data-col="state" value="{{ $st->id }}" id="customCheckModel{{ $st->id }}" @if(!empty($md) && $md == $st->id) checked @endif @if(!empty($selects)) @foreach($selects as $s) @if($s == $st->id) checked @endif @endforeach @endif>
                                                <label class="custom-control-label" for="customCheckModel{{ $st->id }}">
                                                    {{ $st->name }}
                                                </label>
                                            </div></div>

                                    </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-12 "><hr></div>
                <div class="row">


                    <div class="col-12 accordion" id="accordion1" >
                        <div class="row">
                            @php
                                $brands=App\Brand::OrderBy('name')->get();
                            @endphp
                            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnecManufacture">
                                <a class="card-title">
                                    Select Make
                                </a>
                            </div>

                        </div>
                        <div class="priceshow collapse" id="collapseOnecManufacture" data-parent="#accordion1">
                            <div style="overflow-x: hidden;overflow-y: scroll;height: 300px!important;" >
                            @if(!empty($select)) @php $selects= json_decode($select); @endphp @endif
                            @foreach($brands as $brand)
                                <div class="row" style="padding: 5px 0;">
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input filter-home-class" data-col="brand" value="{{ $brand->id }}" id="customCheckModel{{ $brand->id }}" @if(!empty($br) && $br == $brand->id) checked @endif  @if(!empty($selects)) @foreach($selects as $s) @if( $s == $brand->id) checked @endif @endforeach @endif>
                                            <label class="custom-control-label" for="customCheckModel{{ $brand->id }}">
                                                {{ $brand->name }}
                                            </label>
                                        </div></div>

                                </div>

                            @endforeach
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 "><hr></div>
                <div class="row">
                    <div class="col-12 accordion" id="accordion3" >
                        <div class="row  " >
                            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnecarType">
                                <a class="card-title">
                                    Select type
                                </a>
                            </div>

                        </div>
                        <div class="priceshow collapse" id="collapseOnecarType" data-parent="#accordion3">
                            <div style="overflow-x: hidden;overflow-y: scroll;height: 300px!important;" >
                            @foreach($car_a as $c)
                                @if($c->_key==="car-type")
                                    <div class="row" style="padding: 5px 0;">
                                        <div class="col-10">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="radio custom-control-input filter-home-class" id="customCheck{{ $c->id }}" data-col="car_type" value="{{ $c->id }}"  @if(!empty($tr) && $tr == $c->id) checked @endif @if(!empty($selects)) @foreach($selects as $s) @if( $s == $c->id) checked @endif @endforeach @endif>
                                                <label class="custom-control-label" for="customCheck{{ $c->id }}">{{ $c->_value }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 "><hr></div>
                <div class="row">
                    <div class="col-12 accordion" id="accordion4" >
                        <div class="row  " >
                            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnecarcondition">
                                <a class="card-title">
                                    Car Condition
                                </a>
                            </div>

                        </div>
                        <div class="priceshow collapse" id="collapseOnecarcondition" data-parent="#accordion4">
                            <div class="row" style="padding: 5px 0;">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="New" data-col="car_condition" class="radio custom-control-input filter-home-class" id="customCheckBrandnew" @if(!empty($selects)) @foreach($selects as $s) @if( $s == "New") checked @endif @endforeach @endif>
                                        <label class="custom-control-label " for="customCheckBrandnew">New</label>
                                    </div></div>
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="Used" data-col="car_condition" class="radio custom-control-input filter-home-class" id="customCheckBrandUsed" @if(!empty($selects)) @foreach($selects as $s) @if( $s == "Used") checked @endif @endforeach @endif>
                                        <label class="custom-control-label " for="customCheckBrandUsed">Used</label>
                                    </div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 "><hr></div>
                <div class="row">
                    <div class="col-12 accordion" id="accordion6" >
                        <div class="row  " >
                            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnecarfuel">
                                <a class="card-title">
                                    Fuel Type
                                </a>
                            </div>

                        </div>
                        <div class="priceshow collapse" id="collapseOnecarfuel" data-parent="#accordion6">
                            <div class="row" style="padding: 5px 0;">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="PETROL" data-col="fuel_type" class="radio custom-control-input filter-home-class" id="customCheckfueltype" @if(!empty($selects)) @foreach($selects as $s) @if( $s == "Petrol") checked @endif @endforeach @endif>
                                        <label class="custom-control-label " for="customCheckfueltype">Petrol</label>
                                    </div></div>
                            </div>
                            <div class="row" style="padding: 5px 0;">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="CNG" data-col="fuel_type" class="radio custom-control-input filter-home-class" id="customCheckfueltypeCNG" @if(!empty($selects)) @foreach($selects as $s) @if( $s == "CNG") checked @endif @endforeach @endif>
                                        <label class="custom-control-label " for="customCheckfueltypeCNG">CNG</label>
                                    </div></div>
                            </div>
                            <div class="row" style="padding: 5px 0;">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="Dualfuel" data-col="fuel_type" class="radio custom-control-input filter-home-class" id="customCheckDualfueltype1" @if(!empty($selects)) @foreach($selects as $s) @if( $s == "Dualfuel") checked @endif @endforeach @endif>
                                        <label class="custom-control-label " for="customCheckDualfueltype1">Dualfuel</label>
                                    </div></div>
                            </div>
                            <div class="row" style="padding: 5px 0;">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="DIESEL" data-col="fuel_type" class="radio custom-control-input filter-home-class" id="customCheckfueltype1" @if(!empty($selects)) @foreach($selects as $s) @if( $s == "Diesel") checked @endif @endforeach @endif>
                                        <label class="custom-control-label " for="customCheckfueltype1">Diesel</label>
                                    </div></div>
                            </div>
                            <div class="row" style="padding: 5px 0;">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="Biodiesel" data-col="fuel_type" class="radio custom-control-input filter-home-class" id="customCheckfueltype3" @if(!empty($selects)) @foreach($selects as $s) @if( $s == "Biodiesel") checked @endif @endforeach @endif>
                                        <label class="custom-control-label " for="customCheckfueltype3">Biodiesel</label>
                                    </div></div>
                            </div>
                            <div class="row" style="padding: 5px 0;">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="LPG" data-col="fuel_type" class="radio custom-control-input filter-home-class" id="customCheckfueltype4" @if(!empty($selects)) @foreach($selects as $s) @if( $s == "LPG") checked @endif @endforeach @endif>
                                        <label class="custom-control-label " for="customCheckfueltype4">LPG</label>
                                    </div></div>
                            </div>
                            <div class="row" style="padding: 5px 0;">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="Hybrid" data-col="fuel_type" class="radio custom-control-input filter-home-class" id="customCheckfueltype5" @if(!empty($selects)) @foreach($selects as $s) @if( $s == "Hybrid") checked @endif @endforeach @endif>
                                        <label class="custom-control-label " for="customCheckfueltype5">Hybrid</label>
                                    </div></div>
                            </div>
                            <div class="row" style="padding: 5px 0;">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" value="Electric" data-col="fuel_type" class="radio custom-control-input filter-home-class" id="customCheckfueltype6" @if(!empty($selects)) @foreach($selects as $s) @if( $s == "Electric") checked @endif @endforeach @endif>
                                        <label class="custom-control-label " for="customCheckfueltype6">Electric</label>
                                    </div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                        <hr>
                    </div>
                <div class="row">
                    <div class="col-12 accordion" id="accordion113" >
                        <div class="row  " >
                            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseYear">
                                <a class="card-title">
                                    Year
                                </a>
                            </div>
                        </div>
                        <div class="priceshow collapse" id="collapseYear" data-parent="#accordion113">
                            <div class="row m-0" style="padding: 5px 0;">
                                <div class="col-4 p-0">
                                    <input type="number" id="val1-filter-year" placeholder="To" class="form-control text-center" min="0">
                                </div>
                                <div class="col-1 dash d-flex align-items-center justify-content-center">
                                    <i class="fa fa-minus"></i>
                                </div>
                                <div class="col-5 p-0" style="flex:0 0 45.66%; max-width:45.66%">
                                    <input type="number" id="val2-filter-year" placeholder="From" class="form-control text-center" min="0">
                                </div>
                            </div>
                            <button  class="btn-show-more-filter-search mb-3 rounded home-year-btn" data-col="year">Search</button>
                        </div>
                    </div>
                </div>
                <div class="col-12 "><hr></div>
                <div class="row">
                    <div class="col-12 accordion" id="accordion114" >
                        <div class="row  " >
                            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseKM">
                                <a class="card-title">
                                    KM'S Driven
                                </a>
                            </div>
                        </div>
                        <div class="priceshow collapse" id="collapseKM" data-parent="#accordion114">
                            <div class="row m-0" style="padding: 5px 0;">
                                <div class="col-4 p-0">
                                    <input type="number" id="val1-filter-km" placeholder="To" class="form-control text-center" min="0">
                                </div>
                                <div class="col-1 dash d-flex align-items-center justify-content-center">
                                    <i class="fa fa-minus"></i>
                                </div>
                                <div class="col-5 p-0" style="flex:0 0 45.66%; max-width:45.66%">
                                    <input type="number" id="val2-filter-km" placeholder="From" class="form-control text-center" min="0">

                                </div>

                            </div>
                            <button  class="btn-show-more-filter-search mb-3 rounded home-km-btn" data-col="drivers_position">Search</button>

                        </div>
                    </div>
                </div>
                    <div class="col-12 "><hr></div>
                <div class="row">
                    <div class="col-12 accordion" id="accordion112" >
                        <div class="row  " >
                            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseMileage">
                                <a class="card-title">
                                    Price
                                </a>
                            </div>
                        </div>
                        <div class="priceshow collapse" id="collapseMileage" data-parent="#accordion112">
                            <div class="row m-0" style="padding: 5px 0;">
                                <div class="col-4 p-0">
                                    <input type="number" id="val1-filter" placeholder="To" class="form-control text-center" min="0">
                                </div>
                                <div class="col-1 dash d-flex align-items-center justify-content-center">
                                    <i class="fa fa-minus"></i>
                                </div>
                                <div class="col-5 p-0" style="flex:0 0 45.66%; max-width:45.66%">
                                    <input type="number" id="val2-filter" placeholder="From" class="form-control text-center" min="0">

                                </div>

                            </div>
                            <button  class="btn-show-more-filter-search mb-3 rounded home-price-btn" data-col="price">Search</button>

                        </div>
                    </div>
                </div>


            </div>
            <input type="hidden" id="home-filter"  @if(!empty($query)) value="{{ $query }}" @endif>
            <span class="error-post-code"></span>
            <div class="col-12 col-sm-12 col-md-12 col-lg-10" id="Append_render_data">
                {{--<div class="col-12  col-sm-4  col-md-4 col-lg-6 search-result-heading p"><div class="pageheading ">Search Results for Home Filters</div></div>--}}
                <div class="row rowgap column-card append_class">
                    <div id="apend" class="appen_filters" style="width:100%; display:flex;">
    <div class="container-fluid">
    <div id="products" class="homes view-group">
    @if (!empty($result) && count($result) > 0 )
        @foreach($result as $data)
            @php  
                $pics = json_decode($data->pic_url);
                $pi = $pics[0];
                if ($data->car_condition === "New") {
                    $v = "New";
                } else {
                    $v = "Used";
                }
            @endphp
            <div class="listing-item" id="listingItemContainer" onclick="window.location='{{route('car-detail',['id'=>$data->slug])}}'">
                <img class="listing-image-icon" alt="" src="{{$pi}}" />
                <div class="superhost-tag">
                    <img class="superhost-icon" alt="" src="{{ config('app.ui_asset_url').'frontend/img/demoImages/superhost-icon.svg' }}" />
                    <div class="superhost">Superhost</div>
                </div>
                <img class="heart-icon" alt="" src="{{ config('app.ui_asset_url').'frontend/img/demoImages/hearticon.svg' }}" />
                <div class="item-details">
                    <div class="listing-info">
                        <div class="listing-cont">
                                <div class="listing-title f-card-title m-0">{{$data->title}}</div>
                                <div class="listing-subtitle">{{ucfirst($data->registration_no)}}</div>
                                <div class="listing-desc d-none">{{$data->advert_text}}</div>
                        </div>
                        <div class="rating-cont">
                            <div class="rating">4.9</div>
                            <img class="star-icon" alt="" src="{{ config('app.ui_asset_url').'frontend/img/demoImages/star-icon.svg' }}" />
                        </div>
                    </div>
                    <div class="bottom-container">
                        <div class="price-per-night">
                            <div class="rating">PKR {{number_format($data->price)}}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <span class="error-post-code m-auto" style="display: block; color: #00c29f; font-size: 25px; font-weight: 500;">No Record Match</span>
    @endif
</div>
    </div>
                    </div>
                    <input type="hidden" class="load-more-input" value="@if(isset($last_id)){{$last_id}}@endif">
                </div>
                <div class="row  pagemargin">
                    <div class="m-auto">
                        @if (!empty($result) && count($result) > 0 )
                        <div class="viewalldeals red-color-paginate">
                            <button class="form-control load-more-tile" >Load More<div class="loader m-auto" id="loda-more-tile-loader"></div></button>
                        </div>
                        @endif
                    </div>
                    {{-- <div class="col-6 nextbtngrpdiv">
                      <div>
                        <div class="row featureCarsliderbtn carousel-indicators" >
                       <div data-target="#carouselExampleIndicators1" data-slide-to="0" class="col-1" style="width: 40px;
                       height: 40px;

                       ">1</div>
                       <div data-target="#carouselExampleIndicators1" data-slide-to="1" class="col-1" style="width: 40px;
                       height: 40px;
                       border-radius: 2px;
                        ">2</div>
                       <div data-target="#carouselExampleIndicators1" data-slide-to="2" class="col-1 active" style="width: 40px;
                       height: 40px;
                       border-radius: 2px;
                        ">3</div>
                       <div data-target="#carouselExampleIndicators1" data-slide-to="3" class="col-1" style="width: 40px;
                       height: 40px;

                       ">4</div>
                       <div data-target="#carouselExampleIndicators1" data-slide-to="3" class="col-1" style="width: 40px;
                       height: 40px;

                       color: #e4001b;"><i class="fas fa-caret-right " aria-hidden="true"></i></div>

                   </div></div>
                    </div> --}}
                </div>

            </div>
        </div>


    </div>


</div>



@include('frontend.partials.advertisment-footer')
@include('frontend.partials.footer')
@include('frontend.partials.filters-script')
