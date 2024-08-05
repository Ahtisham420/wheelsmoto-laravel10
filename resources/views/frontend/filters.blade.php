<label style=" font-size: 14px; font-weight: 600;color: #1a1818;font-weight: bold; margin: 0;" for="exampleInputEmail1">Post Code Cars</label>
<div class="input-group mb-1 searchgroup">
    <input  style="background-color: transparent;" type="text" class="form-control custom-control-btn" data-col="post_code"  placeholder="Enter Post Code">
    <div class="input-group-append">
        <span class="input-group-text input-span-db"><img src="{{ config('app.ui_asset_url').'frontend/img/Group 3354.png' }}"></span>
    </div>
</div>
<span id="search-span-valid"></span>
<h6 class="newstylefiltersearch" style="padding-right: 20px;text-align: center;">
    <span style="font-weight: 400;font-size: 33px; ">Quick Search</span>
</h6>
<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row">
            @php
                $brands=App\Brand::all();
            @endphp
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnecManufacture">
                <a class="card-title">
                    Manufacture
                </a>
            </div>

        </div>
        <div class="priceshow collapse" id="collapseOnecManufacture" data-parent="#accordion">
            @foreach($brands as $brand)
 <div class="row" style="padding: 5px 0;">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input filter-input-class" data-col="brand" value="{{ $brand->name }}" id="customCheckModel{{ $brand->id }}">
                                <label class="custom-control-label" for="customCheckModel{{ $brand->id }}">
                                    {{ $brand->name }}
                                </label>
                            </div></div>

                    </div>

            @endforeach
        </div>
    </div>
</div>
<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row  " >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseThreeModal">
                <a class="card-title">
                    Select Model
                </a>
            </div>
        </div>
        <div class="priceshow collapse" id="collapseThreeModal" data-parent="#accordion">
            @foreach($car_a as $model)
                @if($model->_key=== "modal")
                    <div class="row" style="padding: 5px 0;">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input filter-input-class" data-col="modal" value="{{ $model->id }}" id="customCheckModel{{ $model->id }}">
                                <label class="custom-control-label" for="customCheckModel{{ $model->id }}">
                                    {{ $model->_value }}
                                </label>
                            </div></div>

                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row  " >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnecarType">
                <a class="card-title">
                    Select type
                </a>
            </div>

        </div>
        <div class="priceshow collapse" id="collapseOnecarType" data-parent="#accordion">
            @foreach($car_a as $c)
                @if($c->_key==="car-type")
                    <div class="row" style="padding: 5px 0;">
                        <div class="col-6">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="radio custom-control-input filter-input-class" id="customCheck{{ $c->id }}" data-col="car_type" value="{{ $c->id }}">
                                <label class="custom-control-label" for="customCheck{{ $c->id }}">{{ $c->_value }}</label>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </div>
</div>
<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row  " >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnecartransmissiom">
                <a class="card-title">
                    Select Transmission
                </a>
            </div>

        </div>
        <div class="priceshow collapse" id="collapseOnecartransmissiom" data-parent="#accordion">
            <div class="row" style="padding: 5px 0;">
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Mannual" data-col="transmission" class="radio custom-control-input filter-input-class" id="customCheckMannual">
                        <label class="custom-control-label " for="customCheckMannual">Mannual</label>
                    </div></div>
            </div>
            <div class="row" style="padding: 5px 0;">
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="Automatic" data-col="transmission" class="radio custom-control-input filter-input-class" id="customCheckAutomatic">
                        <label class="custom-control-label " for="customCheckAutomatic">Automatic</label>
                    </div></div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-12 "><hr></div>
<div class="row">
  <div class="col-12">
    <div class="row  " id="price">
    <div class=" col-6 categoryheading">
      Price
    </div>
    <div class=" col-6 addiconcategor">
      <i class='fas fa-plus' id="plusicon" ></i>
      <i class='fas fa-minus' id="minusicon" ></i>

    </div>
  </div>
  <div class="priceshow1">
    <div class="row" style="padding: 5px 0;">
      <div class="col-12">
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="radio custom-control-input" id="customCheck1"  value='$50 between $100'>
        <label class="custom-control-label " for="customCheck1">$50 between $100</label>
      </div></div>

    </div>
    <div class="row" style="padding: 5px 0;">
      <div class="col-12">
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck2" >
        <label class="custom-control-label" for="customCheck2">
          $50-$100
         </label>
      </div></div>

    </div>
    <div class="row" style="padding: 5px 0;">
      <div class="col-12">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class=" custom-control-input" id="customCheck3">
          <label class="custom-control-label" for="customCheck3">$200-$300</label>
        </div>
    </div>

    </div>
    <div class="row" style="padding: 5px 0;">
      <div class="col-12">
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck4">
        <label class="custom-control-label" for="customCheck4">$300-$500</label>
      </div></div>

    </div>
    <div class="row" style="padding: 5px 0;">
      <div class="col-12">
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck5">
        <label class="custom-control-label" for="customCheck5">$500-$600</label>
      </div></div>

    </div>
    <div class="row" style="padding: 5px 0;">
      <div class="col-12">
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck6">
        <label class="custom-control-label" for="customCheck6"> $600-$700</label>
      </div></div>

    </div>
    <div class="row" style="padding: 5px 0;">
      <div class="col-12">
        <div class="custom-control custom-checkbox">
        <input type="checkbox" class="custom-control-input" id="customCheck1">
        <label class="custom-control-label" for="customCheck1"> $700 and Over</label>
      </div></div>

    </div>

  </div>
  </div>
</div> --}}


<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row  " >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnecarfuel">
                <a class="card-title">
                    Fuel Type
                </a>
            </div>

        </div>
 <div class="priceshow collapse" id="collapseOnecarfuel" data-parent="#accordion">
          <div class="row" style="padding: 5px 0;">
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="PETROL" data-col="fuel_type" class="radio custom-control-input filter-input-class" id="customCheckfueltype">
                        <label class="custom-control-label " for="customCheckfueltype">Petrol</label>
                    </div></div>
      </div>
     <div class="row" style="padding: 5px 0;">
         <div class="col-12">
             <div class="custom-control custom-checkbox">
                 <input type="checkbox" value="DIESEL" data-col="fuel_type" class="radio custom-control-input filter-input-class" id="customCheckfueltype1">
                 <label class="custom-control-label " for="customCheckfueltype1">Diesel</label>
             </div></div>
     </div>
        </div>
    </div>
</div>
<div id="toggle_div">
    <div class="col-12 "><hr></div>
    <div class="row">
        <div class="col-12 accordion" id="accordion" >
            <div class="row  " >
                <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnecarcondition">
                    <a class="card-title">
                        Car Condition
                    </a>
                </div>

            </div>
            <div class="priceshow collapse" id="collapseOnecarcondition" data-parent="#accordion">
                <div class="row" style="padding: 5px 0;">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="New" data-col="car_condition" class="radio custom-control-input filter-input-class" id="customCheckBrandnew">
                            <label class="custom-control-label " for="customCheckBrandnew">New</label>
                        </div></div>
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" value="Used" data-col="car_condition" class="radio custom-control-input filter-input-class" id="customCheckBrandUsed">
                            <label class="custom-control-label " for="customCheckBrandUsed">Used</label>
                        </div></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 "><hr></div>
    <div class="row">
        <div class="col-12 accordion" id="accordion" >
            <div class="row  " >
                <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnec">
                    <a class="card-title">
                        Wheel size
                    </a>
                </div>

            </div>
            <div class="priceshow collapse" id="collapseOnec" data-parent="#accordion">
                @foreach($car_a as $brand)
                    @if($brand->_key==="car-type")
                        <div class="row" style="padding: 5px 0;">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" value="{{ $brand->id }}" data-col="wheel_size" class="radio custom-control-input filter-input-class" id="customCheckBrand{{ $brand->id }}">
                                    <label class="custom-control-label " for="customCheckBrand{{ $brand->id }}">{{ $brand->_value }}</label>
                                </div></div>

                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </div>
<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row  " >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOnecardoor">
                <a class="card-title">
                    Car Doors
                </a>
            </div>

        </div>
        <div class="priceshow collapse" id="collapseOnecardoor" data-parent="#accordion">
            <div class="row" style="padding: 5px 0;">
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="2" data-col="car_door" class="radio custom-control-input filter-input-class" id="customCheckMannual2">
                        <label class="custom-control-label " for="customCheckMannual2">2</label>
                    </div></div>
            </div>
            <div class="row" style="padding: 5px 0;">
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" value="4" data-col="car_door" class="radio custom-control-input filter-input-class" id="customCheckAutomatic2">
                        <label class="custom-control-label " for="customCheckAutomatic2">4</label>
                    </div></div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="col-12 "><hr></div>
<div class="row">
  <div class="col-12 accordion" id="accordion" >
    <div class="row  " >
    <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseOne">
      <a class="card-title">
        Category
    </a>
    </div>

  </div>
  <div class="priceshow collapse" id="collapseOne" data-parent="#accordion">
    @foreach($car_categories as $category)
    <div class="row" style="padding: 5px 0;">
      <div class="col-12">
        <div class="custom-control custom-checkbox">
        <input type="checkbox" value="{{ $category->name }}" class="radio custom-control-input" id="customCheck17{{ $category->id }}">
        <label class="custom-control-label " for="customCheck17{{ $category->id }}">{{ $category->name }}</label>
      </div></div>

    </div>
    @endforeach
    </div>
  </div>
</div>
<div class="col-12 "><hr></div>
<div class="row">
  <div class="col-12 accordion" id="accordion" >
    <div class="row  " >
    <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseTwo">
      <a class="card-title">
      Fuel Type
    </a>
    </div>

  </div>
  <div class="priceshow collapse" id="collapseTwo" data-parent="#accordion">
    @foreach($car_user as $fuel)
    <div class="row" style="padding: 5px 0;">
      <div class="col-12">
        <div class="custom-control custom-checkbox">
        <input type="checkbox" value="fuel_type" class="radio custom-control-input" id="customCheck16{{ $fuel->id }}">
        <label class="custom-control-label " for="customCheck16{{ $fuel->id }}">{{ $fuel->fuel_type }}</label>
      </div></div>
        </div>
    @endforeach
 </div>
  </div>
</div> --}}

<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row  " >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseCarMakeModal">
                <a class="card-title">
                    Car Make
                </a>
            </div>

        </div>
        <div class="priceshow collapse" id="collapseCarMakeModal" data-parent="#accordion">

            @foreach($car_a as $car_make)
                @if($car_make->_key==="car-make")
                    <div class="row" style="padding: 5px 0;">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input filter-input-class"  data-col="car_make" value="{{ $car_make->id }}" id="customCheckCarMake{{ $car_make->id }}">
                                <label class="custom-control-label" for="customCheckCarMake{{ $car_make->id }}">
                                    {{ $car_make->_value }}
                                </label>
                            </div></div>

                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row  " >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseImportModal">
                <a class="card-title">
                    Import
                </a>
            </div>

        </div>
        <div class="priceshow collapse" id="collapseImportModal" data-parent="#accordion">

            @foreach($car_a as $import)
                @if($import->_key==="import")
                    <div class="row" style="padding: 5px 0;">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input filter-input-class"  data-col="import" value="{{ $import->id }}" id="customCheckImport{{ $import->id }}">
                                <label class="custom-control-label" for="customCheckImport{{ $import->id }}">
                                    {{ $import->_value}}
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row  " >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseSafteyFeatureModal">
                <a class="card-title">
                    Saftey Features
                </a>
            </div>

        </div>
        <div class="priceshow collapse" id="collapseSafteyFeatureModal" data-parent="#accordion">

            @foreach($car_a as $saftey_feature)
                @if($saftey_feature->_key==="saftey-feature")
                    <div class="row" style="padding: 5px 0;">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input filter-input-class"  data-col="saftey_f" value="{{ $saftey_feature->id }}" id="customCheckSafteyFeature{{ $saftey_feature->id }}">
                                <label class="custom-control-label" for="customCheckSafteyFeature{{ $saftey_feature->id }}">
                                    {{ $saftey_feature->_value}}
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row  " >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseVariantModal">
                <a class="card-title">
                    Variant
                </a>
            </div>

        </div>
        <div class="priceshow collapse" id="collapseVariantModal" data-parent="#accordion">

            @foreach($car_a as $variant)
                @if($variant->_key==="variant")
                    <div class="row" style="padding: 5px 0;">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input filter-input-class"  data-col="variant" value="{{ $variant->id }}" id="customCheckVariant{{ $variant->id }}">
                                <label class="custom-control-label" for="customCheckVariant{{ $variant->id }}">
                                    {{ $variant->_value}}
                                </label>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row" >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseFourTransmission">
                <a class="card-title">
                    Select Engine Type
                </a>
            </div>

        </div>
        <div class="priceshow collapse" id="collapseFourTransmission" data-parent="#accordion">
            @foreach($car_a as $transmission)
                @if($transmission->_key ==="engine-types")
                    <div class="row" style="padding: 5px 0;">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="radio custom-control-input filter-input-class" data-col="engine_type" id="customCheckEngine{{ $transmission->id}}" value="{{ $transmission->id}}">
                                <label class="custom-control-label " for="customCheckEngine{{ $transmission->id }}">{{ $transmission->_value }}</label>
                            </div></div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>

<div class="col-12 "><hr></div>
<div class="row">
    <div class="col-12 accordion" id="accordion" >
        <div class="row  " >
            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseFour">
                <a class="card-title">
                    Select Body type
                </a>
            </div>

        </div>
        <div class="priceshow collapse" id="collapseFour" data-parent="#accordion">
            @foreach($car_a as $dri_position)
                @if($dri_position->_key==="body-type")
                    <div class="row" style="padding: 5px 0;">
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" value="{{ $dri_position->id }}" class="radio custom-control-input filter-input-class" data-col="body_type" id="customCheck12{{ $dri_position->id }}">
                                <label class="custom-control-label "   for="customCheck12{{ $dri_position->id }}">{{ $dri_position->_value }}</label>
                            </div></div>

                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
    <div class="col-12 ">
        <hr>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row  " id="price">
                <div class=" col-6 categoryheading">
                    Price
                </div>
                <div class=" col-6 addiconcategor">
                    <i class='fas fa-plus' id="plusicon"></i>
                    <i class='fas fa-minus' id="minusicon"></i>

                </div>
            </div>
            <div class="priceshow1">
                <div class="row m-0" style="padding: 5px 0;">
                    <div class="col-5 p-0">
                        <input type="number" id="val1-filter" class="form-control" min="0">
                    </div>
                    <div class="col-1 dash d-flex align-items-center justify-content-center">
                        <i class="fa fa-minus"></i>
                    </div>
                         <div class="col-5 p-0" style="flex:0 0 45.66%; max-width:45.66%">
                        <input type="number" id="val2-filter" class="form-control" min="0">

                    </div>

                </div>
                <button  class="btn-show-more-filter-search mb-3 price-filter-btn" data-col="price">Search</button>



            </div>
        </div>
    </div>

{{-- <div class="col-12 "><hr></div> --}}
{{-- <div class="row  " id="category">
  <div class=" col-4 categoryheading">
    Area
  </div>
  <div class=" col-8 addiconcategor">
    <input type="email" class="form-control" >
     </div>
</div> --}}
{{--<div class="col-12 "><hr></div>--}}
{{--<div class="row">--}}
    {{--<div class="col-12 accordion" id="accordion">--}}
        {{--<div class="row  " >--}}
            {{--<div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseFive">--}}
                {{--<a class="card-title">--}}
                    {{--Age Range--}}
                {{--</a>--}}
            {{--</div>--}}

        {{--</div>--}}
        {{--<div class="priceshow collapse" id="collapseFive" data-parent="#accordion">--}}
            {{--<div class="row" style="padding: 5px 0;">--}}
                {{--<div class="col-5 p-0">--}}
                    {{--<input type="email" class="form-control" placeholder="From">--}}
                {{--</div>--}}
                {{--<div class="col-1 dash">--}}
                    {{-----}}
                {{--</div>--}}
                {{--<div class="col-5 p-0">--}}
                    {{--<input type="email" class="form-control" placeholder="To">--}}
                {{--</div>--}}

            {{--</div>--}}

        {{--</div>--}}

{{--</div>--}}
{{--</div>--}}
</div>
<div class="col-12 "><hr></div>
<button id="btn_toggle" class="btn-show-more-filter mb-3">Advanced Search </button>
{{-- @foreach($car_a as $classified)
<div class="card" >
 <div class="cardimage">
   <p>{{ $v }}</p>
   <img class="card-img-top" src="/../../liveperformance/storage/app/crop_images/{{$classified->crop_image}}" alt="Card image cap">
 </div>
<div class="card-body">
 <div class=" row ">
   <div class="col-8 col-sm-12 col-md-8 col-lg-8  americancardbody ">{{$classified->year}}  {{$classified->title}}</div>
   <div class="col-6 col-sm-12 col-md-6 "><p class="cardPrice">${{$classified->price}}</p></div>
   <div class="col-6 col-sm-12 col-md-12 col-lg-6  bidnowbtndiv"><button class="bidnowbtn">Rent Now</button></div>
 </div>
 <p class="cardescription">{{$classified->advert_text}}</p>
</div>
</div>
@endforeach --}}
