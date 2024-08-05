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
              <div class="col-12  col-sm-4  col-md-4 col-lg-6 search-result-heading"><div class="pageheading ">Search Results for postcode</div></div>
              <div class="col-12  col-sm-8 col-md-8 col-lg-6 yearbtngrp new-yearbtngrp">
                {{--<div class="span-div-american">--}}
                  {{--<div class="div-first-span">--}}
                {{--<span style="color: #000;opacity: 0.45; padding: 0 10px;"> Order By:</span>--}}
              {{--</div>--}}
              {{--<div class="div-second-span">--}}
                  {{--<button class="btn dropdownbtn dropdown-toggle" type="button" data-toggle="dropdown">Year--}}
                  {{--<span class="caret"></span></button>--}}
              {{--</div>--}}
                {{--</div>--}}
                {{--<div class="span-div-american">--}}
                  {{--<div class="div-first-span">--}}
                  {{--<span style="color: #000;opacity: 0.45; padding: 0 10px;"> Sort By:</span>--}}
                  {{--</div>--}}
                  {{--<div class="div-second-span">--}}
                  {{--<button class="btn dropdownbtn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="opacity:  1!important;">Petrol--}}
                    {{--<span class="caret"></span> </span></button>--}}
                  {{--</div>--}}
                  {{--</div>--}}
                    <div class="groupbtn">
                      <a class="grid" id="gridview" ><i class="fas fa-th "></i></a>
                      <a class="list"  id="listview"><i class="fas fa-list"></i></a>
                    </div>
               </div>

            </div>
            <div class="row ">
              <div class="col-12 col-sm-12 col-md-12 col-lg-3">

                  @include('frontend.filters')
              </div>
              <div class="col-12 col-sm-12 col-md-12 col-lg-9 p-0">
                <div class="row rowgap column-card">
               @if(!empty($result))
                      @foreach($result as $classified)
                      <div class="col-12 col-sm-6 col-md-4 colwidth">
                          @if($classified->car_condition==="Used")
                      @php $v="Used";@endphp
                      @else
                      @php $v="New";@endphp
                      @endif
                      <div class="card" >
                            <div class="cardimage">
                              <p>{{ $v }}</p>
                              <img class="card-img-top" src="/../../wheelshunt/public/crop_images/{{$classified->crop_image}}" alt="Card image cap">
                            </div>
                          <div class="card-body">
                            <div class=" row ">
                              <div class="col-8 col-sm-12 col-md-8 col-lg-8  americancardbody ">{{$classified->year}}  {{$classified->title}}</div>
                              <div class="col-6 col-sm-12 col-md-6 "><p class="cardPrice">${{$classified->price}}</p></div>
                              {{--<div class="col-6 col-sm-12 col-md-12 col-lg-6  bidnowbtndiv"><button class="bidnowbtn"></button></div>--}}
                            </div>
                            <p class="cardescription">{{$classified->advert_text}}</p>
                          </div>
                        </div>
                      </div>
                       @endforeach
                       @endif
                       @if($result->isEmpty())
                       <div style="color:red"><h4>There is no record against your request</h4></div>
                       @endif
                 </div>
                  <div class="row  pagemargin">
                 <div class="col-6">
                  <div class="viewalldeals">
                    {{--<p class="m-0">View All Deals <span><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></span></p>--}}
                </div>
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



{{--@include('frontend.partials.advertisment-footer')--}}

        @include('frontend.partials.footer')
