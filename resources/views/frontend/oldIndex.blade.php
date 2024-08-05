@include('frontend.partials.header')
<style type="text/css">
   .select2-container .select2-selection--single{
        border: none!important;
    }
    .container1 {
  position: relative;
  width: 100%;
}


.container1 .btn1 {
  position: absolute;
  top: 60%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
  color: white!important;
    background: #00a651;
    padding-left: 6%;
    padding-right: 6%;
    border-radius: 25px;
    text-decoration:none;
}

.container1 .btn1:hover {
  background-color: green;
}
</style>
@include('frontend.partials.scripts')
 <div class="container-fluid sliderSection">

    <div class="container p-0">
        <div class="row m-0" style="padding-top:30px;padding-bottom:30px;">
            <div class="col-12 text-center Leasecarsectionheading Slider-heading-wheels ">
                Hunt a wheel with wheelshunt
                <span><img style="width: 14px; height: 14px;margin-right: 15px;" src="{{ config('app.ui_asset_url').'frontend/img/sliderSection/wheelshunticon/right.png' }}">one stop solution for all your vehicles needs!</span>
            </div>
 </div>
        <div class="sliderdivposition " style="padding-top: 14px; margin-bottom:30px;">
                <div class="row m-0 separaterdiv mb-3">
                    <div class="col col-xs-3 col-sm-3 col-md-3 col-lg-1 col-xl-1 index-filter-selection  all index-newCarFilter" data-col="All"><a> All</a></div>
                    <div class="col col-xs-3 col-sm-3 col-md-3 col-lg-1 col-xl-1 index-filter-selection all" data-col="New"><a> New Car</a></div>
                    <div class="col col-xs-3 col-sm-3 col-md-3 col-lg-1 col-xl-1   index-filter-selection all" data-col="Used"><a>Used Car</a></div>
                    {{--<div class="col col-xs-3 col-sm-3 col-md-3 col-lg-2 col-xl-2  all"><a href="#">Featured Cars</a></div>--}}
                    <div class="col-0  col-lg-6 col-xl-6">
                        <hr/>
                    </div>
                </div>
                <div class="buttondiv">
                   <div class="btn-group btngroup" role="group" aria-label="Button group with nested dropdown">
                        <img style="width: 27px; height: 21px; margin-top: 20px; margin-left: 15px;" src="{{ config('app.ui_asset_url').'frontend/img/sliderSection/caricon.png' }}">
                        <div class="btnhr"> </div>
                        <div class="btn-group " role="group">
                            <select class="dropdown-item select-index filter-index select2 brand-select-base" data-placeholder="Select Make" name="brand">
                                <option value="">Select Make</option>
                                @foreach($brands as $brand)
                                    <option value="{{$brand->id}}" data-id="{{$brand->id}}" >{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="btn-group btngroup" role="group" aria-label="Button group with nested dropdown">
                        <img style="width: 27px; height: 21px; margin-top: 20px; margin-left: 15px;" src="{{ config('app.ui_asset_url').'frontend/img/sliderSection/car.png' }}">
                        <div class="btnhr"> </div>

                        <div class="btn-group " role="group">
                            <select class="dropdown-item select-index filter-index make-brand-append select2"data-placeholder="Select Model"  name="modal">
                                <option value="">Select Model</option>
                                @if(isset($md_top))
                                @foreach($md_top as $dropdown)
                                        <option value="{{$dropdown->id}}">{{ $dropdown->_value }}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="btn-group btngroup" role="group" aria-label="Button group with nested dropdown">
                        <img style="width: 27px; height: 21px; margin-top: 20px; margin-left: 15px;" src="{{ config('app.ui_asset_url').'frontend/img/sliderSection/Group 3290.png' }}">
                        <div class="btnhr"> </div>

                        <div class="btn-group " role="group">
                            <select class="dropdown-item select-index filter-index select2" data-placeholder="Select Year" name="year">
                                <option value="">Select Year</option>
                                {{ $last= date('Y')-120 }}
                                {{ $now = date('Y') }}
                                @for ($i = $now; $i >= $last; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                            </select>
                              </div>
                    </div>
                    <div class="btn-group btngroup" role="group" aria-label="Button group with nested dropdown">
                        <img style="width: 27px; height: 21px; margin-top: 20px; margin-left: 15px;" src="{{ config('app.ui_asset_url').'frontend/img/sliderSection/Path 4275.png' }}">
                        <div class="btnhr"> </div>

                        <div class="btn-group " role="group">
                            <select class="dropdown-item select-index price-filter-range select2" data-placeholder="Select Price" name="price">
                                <option selected="selected" value="">Price Range</option>
                                <option value="1 and 500">₨1-500</option>
                                <option value="500 and 1000">₨500-1000</option>
                                <option value="1000 and 1500">₨1000-1500</option>
                                <option value="1500 and 2000">₨1500-2000</option>
                                <option value="2000 and 2600">₨2000-2600</option>
                                <option value="2600 and 3000">₨2600-3000</option>
                                <option value="3000 and 3500">₨3000-3500</option>
                                <option value="3500 and 4000">₨3500-4000</option>
                                <option value="4000 and 4500">₨4000-4500</option>
                                <option value="4500 and 5000">₨4500-5000</option>
                                <option value="5000 and 5500">₨5000-5500</option>
                                <option value="5500 and 6000">₨5500-6000</option>
                                <option value="6000 and 6500">₨6000-6500</option>
                                <option value="6500 and 7000">₨6500-7000</option>
                                <option value="7000 and 7500">₨7000-7500</option>
                                <option value="7500 and 8000">₨7500-8000</option>
                                <option value="8000 and 8500">₨8000-8500</option>
                                <option value="8500 and 9000">₨8500-9000</option>
                                <option value="9000 and 9500">₨9000-9500</option>
                                <option value="9500 and 10000">₨9500-10000</option>
                                <option value="above">above</option>
                            </select>
                           </div>
                    </div>

                    <div class="btn-group"> <button class="searchcarbtn" id="search-filter-btn-index">Search cars</button></div>


                </div>
                <div class="lastdiv">
{{--                    <a href="#">Reset</a> | --}}
                    <a href="#" data-toggle="modal" data-target=".filters-Modal">More Options</a></div>
            </div>
    </div>
</div>
<section style="background: #f8f8f8;">
  <div class="container">
        <div class="row m-0">
            <div class="col-6 col-md-6 col-sm-6  Leasecarsectionheading" >Vehicle types</div>
            <div class="col-6 col-md-6 col-sm-6 view-all-right"><a href="{{route('frontend-cartype-list')}}">View all</a></div>
        </div>
<div class="row m-0">
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 m-auto section-slider">
        <div class="row home-produc-slider m-0 pb-4 pt-4 slider-2-index" >
              @php $indicator="";
                @endphp
                @if(!empty($car_type) && count($car_type) > 0)
                    @php $count2=5;
                    @endphp
                    @php $i_count=0 ;
                    @endphp
                    @php $arr_len=sizeof($car_type) % 3;
                    @endphp
                    @foreach($car_type as $key=>$slid)
                        @php $count= $key+3;
                        @endphp
                        @if(($count %3)==0)
                        <div class="col-12 col-sm-12 w-100  p-0 slick-slide">
                                    @php $i_count=$i_count+1
                                    @endphp
                                    @endif
                                    <div class="slider-card">
                                        <a href="{{route('index-car-type',['type'=> strtr($slid->_value,' ','-')])}}">
                                            @if(!empty($slid->icon))
                                                <img  src="/../../public/car_icon/{{$slid->icon}}">
                                                @else
                                                <img  src="{{ config('app.ui_asset_url').'frontend/img/sliderSection/wheelshunticon/slidericon/car.png' }}">
                                                @endif
                                            <p>{{$slid->_value}}</p>
                                    </a>
                                    </div>
                                    @if($count==$count2)
                                        @php $count2=$count2 +3;
                                        @endphp
                                </div>

                        @endif

                    @endforeach
                    @if($arr_len !==0)
            </div>
        </div>

        @endif
        @endif
        </div>
        </div>
        <!-- start of more ads -->
<!--<div class="container-fluid" style="background: #f8f8f8; padding-top: 50px;padding-bottom: 50px;"></div>-->
    <!-- <========add banner========> -->
   <!-- <======More Ads=====. -->
        <div class="container">
        <div class="row">
          <div class="col-6 col-md-6  Leasecarsectionheading">
            <!-- <h3 class="More-ads"> </h3> -->
             Latest Ads
           
          </div>
            <div class="col-6 col-md-6 view-all-right pr-0">
              <div class="view-all-right">
              <a class="" href="{{route('index-front-filter',["query"=>"all"])}}">
                View all
              </a>
           </div>
          </div>
        </div>
      </div>
      <div class="container ads-more-cars">
          <div class="row AddMore" style="display: none;">
              @if(!empty($slider) && count($slider) > 0)
                  @foreach($slider as $car)
                      @php $p = json_decode($car->pic_url);
                      if (!empty($p)){
                      $pi = $p[0];
                      }
                      @endphp
                      @php $class='grey';
                       @endphp
                       @if(in_array($car->id,$user_s_id))
                          @php $class="save_like00";
                         @endphp
                      @endif
             <div class="col-lg-12" style="padding: 5px;cursor: pointer;" >
                  <div class="card" style="border: 1px solid #bfbfbf75;width: 14rem;">
  <a href="{{route('car-detail',['id'=>$car->slug])}}"><img class="card-img-top" src="{{$pi}}" style="padding:10px;height: 150px;object-fit: cover!important;" alt="Card image cap"></a>
  <div class="pl-2 pb-2 pr-2 pt-2">
     <p class="heart-icon 0likeByUser0" data-id="{{base64_encode($car->id)}}" data-type="car"><i class="fas fa-heart {{$class}}"></i></p>
     <p class="productPrice m-0">PKR {{number_format($car->price)}}</p>
    <p class="productD f-card-title m-0" data-maxlength="22"> {{$car->title}}</p>
    <p class="productTime m-0">{{ucfirst($car->registration_no)}}</p>
   
  </div>
</div>
              </div>
          @endforeach
          @endif

          </div>
          <br>
          <br>
      </div>
        <!-- end more ad -->
          <!--<div class="container-fluid" style="background: #f8f8f8; padding-top: 50px;padding-bottom: 50px;"></div>-->
        <!-- <========add banner========> -->
    <!-- <==========Browes Used Cars=======> -->
    <!-- <div class="container"><h3 class='Leasecarsectionheading'>Browse Used Cars</h3></div> -->

<div id="exTab2" class="container mt-4 Brose-slider" style="height:20rem ;">
<ul class="nav nav-tabs">
            <li class="active"><a  href="#1" data-toggle="tab" style="color:#707070;font-size: 20px;text-decoration: none;">Makes</a></li>
            <li class="ml-4"><a href="#2" data-toggle="tab" class="BrowseTab" style="color:#707070;font-size: 20px;text-decoration: none;padding: 10px;">Budget</a>
            </li>
            <li class="ml-4"><a href="#4" data-toggle="tab" class="BrowseTab"  style="color:#707070;font-size: 20px;text-decoration: none;padding: 10px;">Model</a>
            </li>
            <li class="ml-4"><a href="#5" data-toggle="tab" class="BrowseTab"  style="color:#707070;font-size: 20px;text-decoration: none;padding: 10px;">State</a>
            </li>
            <li class="ml-4"><a href="#6" data-toggle="tab" class="BrowseTab"  style="color:#707070;font-size: 20px;text-decoration: none;padding: 10px;">City</a>
            </li>
        </ul>
        <!-- <hr> -->
        <div class="tab-content ">
            <div class="tab-pane active mt-2 " id="1">
                  <div class="row">
            <div class="col-6 col-md-6  Leasecarsectionheading" >Brands</div>
            <div class="col-6 col-md-6 view-all-right"><a href="{{route('frontend-brand-list')}}">View all</a></div>
        </div>

                <div class="owl-carousel owl-theme">
                    @if(!empty($show_br) && count($show_br) > 0)
                        @foreach($show_br as $key => $b)
                         <div class="item">
                        <div class="col-lg-10 shadow p-2 bg-white" style="padding: 10px;">
                            <div style="padding: 10px;">
                                <center>
                                       <a href="{{route('index-brand',['brand'=>strtr($b->name,' ','-')])}}"><img src="/../../public/brand_icon/{{$b->image}}" style="width:70px;height:70px;"></a>
                                </center>
                            </div>
                        </div>
                      
                    </div>
                       @endforeach
                    @endif
                </div>
            </div>
            <div class="tab-pane" id="2">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <ul style="list-style: none;">
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'2'])}}">Car Under 2 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'3'])}}">Car Under 3 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'4'])}}">Car Under 4 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'5'])}}">Car Under 5 Lakhs</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <ul style="list-style: none;">
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'6'])}}">Car Under 6 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'7'])}}">Car Under 7 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'8'])}}">Car Under 8 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'9'])}}">Car Under 9 Lakhs</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <ul style="list-style: none;">
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'10'])}}">Car Under 10 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'15'])}}">Car Under 15 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'20'])}}">Car Under 20 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'25'])}}">Car Under 25 Lakhs</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <ul style="list-style: none;">
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'30'])}}">Car Under 30 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'35'])}}">Car Under 35 Lakhs</a></li>
                            <li class="mt-4 budget-content"><a href="{{route('car-budget',['type'=>'40'])}}">Car Under 40 Lakhs</a></li>
                        </ul>
                    </div>
                </div>



            </div>
            <div class="tab-pane mt-5" id="4">
                <div class="row">
                    @if (!empty($md_top) && count($md_top) > 0)
                        @foreach($md_top as $key=>$md)
                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12">
                                    {{$md->_value}}
                          </div>
                        @endforeach
                    @endif

                </div>
            </div>
            <div class="tab-pane" id="5">
                <div class="row">
                    @if (!empty($state_sl) && count($state_sl) > 0)
                        @foreach($state_sl as $st)
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 col-12">
                                <ul style="list-style:none;">
                                    <li class="mt-4 modalclr"><a href="{{route('car-state',['type'=>base64_encode(base64_encode($st->id))])}}">{{$st->name}}</a></li>
                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="tab-pane" id="6">
                <div class="row">
                    @if (!empty($ct_top) && count($ct_top) > 0)
                        @foreach($ct_top as $key=>$ct)
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 col-12">
                                <ul style="list-style:none;">
                                    <li class="mt-4 modalclr">{{$ct->_value}}</li>
                                </ul>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
  </section>

  <section style="background: #f8f8f8;">
  
</section>
<div class="modal fade bd-example-modal-lg filters-Modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg filtermodalsize">
      <div class="modal-content">
            <div class="row  m-0">
          <div class="col-12 closemodal">
            <a href="#" data-dismiss="modal"><span aria-hidden="true">&times;</span></a>
          </div>
        </div>
        <div class="row filetermodal">
         <div class="col-12 col-sm-12 ">
            <div class="row m-0">
              <div class="m-auto owl-carousel owl-theme">
                    @if(!empty($car_type) && count($car_type) > 0)
                        @foreach($car_type as $key => $b)
                            <div class="item">
                                @php $first = $key @endphp
                            <!--     <div class="col-lg-10 shadow p-2 bg-white" style="border-radius: 10px;padding: 10px;"> -->
                                    <div class="col-12 filterheading car-modal-filter" style="padding: 10px;" data-col="{{$b->id}}">
                                  
                                          @if(!empty($b->icon))
                                                    <img  src="/../../public/car_icon/{{$b->icon}}" class="m-auto" style="height:30px">
                                                @else
                                                    <img  src="{{ config('app.ui_asset_url').'frontend/img/sliderSection/wheelshunticon/slidericon/car.png' }}">
                                                @endif
                                                <p class="m-0">{{$b->_value}}</p>
                                       
                                    </div>
                                <!-- </div> -->
                           </div>
                        @endforeach
                    @endif
                </div>
             </div>
              <div class="row">
              <div class="col-6 col-sm-3 modalfilterselect">
               <select class="form-control filter brand-select-filter select2"  placeholder="Price Range" style="border: solid 1px #707070; border-radius: 0;" name="brand">
                                  <option value=""> Make </option>
                                     @foreach($brands as $b)
                                     <option value="{{$b->id}}" name="brand" data-id="{{$b->id}}">{{ $b->name }}</option>
                                      @endforeach

                </select>
              </div>
              <div class="col-6 col-sm-3 modalfilterselect">
               <select class="form-control filter select2" id="brandModalFilter" placeholder="Model" style="border: solid 1px #707070; border-radius: 0;" name="modal">

                                <option  value="">Model (optional)</option>
                                      
                        </select>
              </div>
              <div class="col-6 col-sm-3 modalfilterselect">
                <select class="form-control filter select2" placeholder="Price Range" style="border: solid 1px #707070; border-radius: 0;" name="car_type">
                  <option selected="selected" value="" >Select Type</option>
                  @foreach($cr_type as $type)
                  <option value="{{ $type->id }}" >{{ $type->_value }}</option>
                  @endforeach
                  </select>
              </div>
              <div class="col-6 col-sm-3 modalfilterselect">
                <select class="form-control filter select2" placeholder="Price Range" style="border: solid 1px #707070; border-radius: 0;" name="car_condition">
                  <option selected="selected" value="" >Select Condition</option>
                  <option value="New">New</option>
                  <option value="Used">Used</option>
            </select>
              </div>
                  <div class="col-6 col-sm-3 modalfilterselect">
                      <select class="form-control filter-price select2" placeholder="Price Range" style="border: solid 1px #707070; border-radius: 0;" name="price">
                          <option selected="selected" value=""> Price Range</option>
                          <option value="1 and 1000">$1-1000</option>
                          <option value="1000 and 2000">$1000-2000</option>
                          <option value="2000 and 3000">$2000-3000</option>
                          <option value="3000 and 4000">$3000-4000</option>
                          <option value="4000 and 5000">$4000-5000</option>
                          <option value="5000 and 6000">$5000-6000</option>
                          <option value="6000 and 7000">$6000-7000</option>
                          <option value="7000 and 8000">$7000-8000</option>
                          <option value="8000 and 9000">$8000-9000</option>
                          <option value="9000 and 10000">$9000-10000</option>
                          <option value="10000 and 20000">$10000-20000</option>
                          <option value="20000 and 30000">$20000-30000</option>
                          <option value="30000 and 40000">$30000-40000</option>
                          <option value="50000 and 60000">$40000-50000</option>
                          <option value="50000 and 60000">$50000-60000</option>
                          <option value="60000 and 70000">$60000-70000</option>
                          <option value="70000 and 80000">$70000-80000</option>
                          <option value="80000 and 90000">$80000-90000</option>
                          <option value="90000 and 100000">$90000-100000</option>
                          <option value="above">above</option>
                      </select></div>
                  <div class="col-6 col-sm-3 modalfilterselect">
                      <select class="form-control filter select2" placeholder="Price Range" style="border: solid 1px #707070; border-radius: 0;" name="year">
                          <option selected="selected" value="" > Year</option>
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
                          <option value="200">200</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
                          <option value="2020">2021</option>
                      </select></div>

              <div class="col-12 btnfilter">
                <button class="btn filter_btn">Filter Vehicle</button>
              </div>
             <span id="filter-btn-error"></span>
            </div>
          </div>

        </div>
      

      {{--  end of form for home filters  --}}
      </div>
    </div>
  </div>
     @if(empty(session("userLoggedIn")) && session("userLoggedIn") == false)
<div class="modal fade bd-example-modal-lg" id='register-my-modal' tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <!--<div>-->
        <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
        <!--  <span aria-hidden="true">&times;</span>-->
        <!--</button>-->
        <!--</div>-->
            <div class="container1">
  <img src="https://wheelsmoto.com/public/coverPage.png" alt="register now" style="width:100%;height:100%;">
  <a class="btn1" href="{{route('user-login')}}">Register Now</a>
</div>
    </div>
  </div>
</div>
@endif
@include('frontend.partials.footer')
@include('frontend.partials.filters-script')
<script type="text/javascript">
   $(document).ready(function() {
        $('#register-my-modal').modal('show');
    });
</script>
