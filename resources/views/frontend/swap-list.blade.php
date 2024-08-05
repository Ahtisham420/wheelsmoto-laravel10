@include('frontend.partials.header')
<?php
$car_a=App\CarSetting::all();
$car_b=App\Brand::all();
$car_categories=App\Category::all();
$car_user=App\User_car::all();
?>
<div class="Amercancarpagebody">
    <div class="container">
        <div class="row" style="margin: 44px 0;">
            <div class="col-12  col-sm-8 col-md-8 col-lg-6 yearbtngrp new-yearbtngrp p-0"style="justify-content:flex-start;">
                <div class="span-div-american">
                    <div class="div-first-span">
                        <span style="color: #000;opacity: 0.45; padding: 0 10px;"> Order By:</span>
                    </div>
                    <div class="div-second-span">
                        <select class="btn dropdownbtn dropdown-toggle filter-input-class" id="car-year" data-col="year" name="year" style="
    height: 47px;
    padding-right: 15px;
    padding-left: 15px;
">
                            <option value="" selected disabled>Select Year</option>
                            <option value="1999">1999</option>
                            <option value="2000">2000</option>
                            <option value="2001">2001</option>
                            <option value="2002">2002</option>
                            <option value="2003">2003</option>
                            <option value="2004">2004</option>
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                            <option value="2014">2014</option>
                            <option value="2015">2015</option>
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                        </select>
                        {{--<button class="btn dropdownbtn dropdown-toggle" type="button" data-toggle="dropdown">Year--}}
                        {{--<span class="caret"></span></button>--}}
                        {{--</div>--}}
                    </div>
                    <div class="span-div-american">
                        <div class="div-first-span">
                            <span style="color: #000;opacity: 0.45; padding: 0 10px;"> Sort By:</span>
                        </div>
                        <div class="div-second-span">
                            <select class="btn dropdownbtn dropdown-toggle filter-input-class" id="car-fuel" data-col="fuel_type" name="fuel_type" style="
    height: 47px;
    padding-right: 15px;
    padding-left: 15px;
">
                                <option value="" selected disabled>Fuel Type</option>
                                <option value="Petrol">PETROL</option>
                                <option value="Dualfuel">Dualfuel</option>
                                <option value="Diesel">DIESEL</option>
                                <option value="Biodiesel">Biodiesel</option>
                                <option value="LPG">LPG</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="Electric">Electric</option>
                                <option value="Other">Other</option>

                            </select>
                            {{--<button class="btn dropdownbtn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="opacity:  1!important;">Petrol--}}
                            {{--<span class="caret"></span> </span></button>--}}
                        </div>
                    </div>
                    <div class="groupbtn">
                        <a class="grid" id="gridview" ><i class="fas fa-th "></i></a>
                        <a class="list"  id="listview"><i class="fas fa-list"></i></a>
                    </div>
                </div>

            </div>
            <div class="row m-0" style="width:100%;">
                <div class="col-12 col-sm-12 col-md-12 col-lg-3">
                    @include('frontend.filters')
                </div>
                <input type="hidden" id="type-filters" value="Swap">
                <div class="col-12 col-sm-12 col-md-12 col-lg-9 p-0">
                    <div class="col-12  col-sm-4  col-md-4 col-lg-6 search-result-heading"><div class="pageheading ">Search Results for Rental Cars</div></div>
                    <span class="error-post-code"></span>
                    <span class="error-post-code-swap" style="display:none;"></span>
                    <div class="row rowgap column-card append_class" style="width:100%; display:flex;">
                        <div id="apend" class="appen_filters" style="width:100%" >
                            <div class="row" style="width:100%">

                                @foreach($result as $swap)
                                    @if($swap->car_condition==="Used")
                                        @php $condition_type="Used";@endphp
                                    @else
                                        @php $condition_type="New";@endphp
                                    @endif
                                              <div class="col-12 col-sm-6 col-md-3 colwidth">
                                        <div class="card">
                                            <div class="cardimage lease-car-image">
                                                <p>{{ $condition_type }}</p>
                                                <img class="card-img-top"  src="/../../livepowerperformance/public/crop_images/{{$swap->crop_image}}" alt="Card image cap">
                                            </div>
                                            <div class="card-body ">
                                                <div class=" row ">

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12  americancardbody ">{{$swap->year}}  {{$swap->title}}</div>
                                                    <div class="mt-2 col-6 col-sm-12 col-md-6 "><p class="cardPrice">${{$swap->price}}</p></div>
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0 bidnowbtndiv">
                                                        @if(in_array($swap->id,$selected))
                                                            <label class="mt-2 swap_label">You already request this car</label>
                                                        @else
                                                            <a class="mt-2 bidnowbtn btn_swap_car_swapcar" style="text-decoration: none;color: #fff" href="{{route('frontend-swap-cars',['s_id'=>base64_encode($swap->id)])}}">Swap Now</a>
                                                           @endif
                                                    </div>
                                                </div>
                                                <p class="cardescription" style="padding-top:10px">{{$swap->advert_text}}</p>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


</div>


@include('frontend.partials.advertisment-footer')
@include('frontend.partials.footer')
@include('frontend.partials.filters-script')
