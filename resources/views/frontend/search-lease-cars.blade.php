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
      <div class="col-12  col-sm-4  col-md-4 col-lg-6 search-result-heading"><div class="pageheading ">Search Results for American Muscle</div></div>
      <div class="col-12  col-sm-8 col-md-8 col-lg-6 yearbtngrp new-yearbtngrp">
        <div class="span-div-american">
          <div class="div-first-span">
        <span style="color: #000;opacity: 0.45; padding: 0 10px;"> Order By:</span>
      </div>
      <div class="div-second-span">
          <button class="btn dropdownbtn dropdown-toggle" type="button" data-toggle="dropdown">Year
          <span class="caret"></span></button>
      </div>
        </div>
        <div class="span-div-american">
          <div class="div-first-span">
          <span style="color: #000;opacity: 0.45; padding: 0 10px;"> Sort By:</span>
          </div>
          <div class="div-second-span">
          <button class="btn dropdownbtn dropdown-toggle" type="button" data-toggle="dropdown"> <span style="opacity:  1!important;">Petrol
            <span class="caret"></span> </span></button>
          </div>
          </div>
            <div class="groupbtn">
              <a class="grid" id="gridview" ><i class="fas fa-th "></i></a>
              <a class="list"  id="listview"><i class="fas fa-list"></i></a>
            </div>
       </div>

    </div>
    <div class="row m-0">
      <div class="col-12 col-sm-12 col-md-12 col-lg-3">

        @include('frontend.filters')

      </div>
      <input type="hidden" id="type-filters" value="Lease">
<div class="col-12 col-sm-12 col-md-12 col-lg-9 p-0 ">
<div class="row rowgap column-card append_class">
      <div id="apend" class="appen_filters" style="width:100%; display:flex;">
        @foreach($result as $car)
        @if($car->car_condition==="Used")
        @php $condition_type="Used";@endphp
        @else
        @php $condition_type="New";@endphp
        @endif
          <div class="col-12 col-sm-6 col-md-4 colwidth"  style="margin-top:20px">
              <div class="card" >
                  <div class="cardimage">
                      <p>{{ $condition_type }}</p>
                      <img class="card-img-top" src="/../../livepowerperformance/public/crop_images/{{$car->crop_image}}" alt="Card image cap">
                  </div>
                  <div class="card-body">
                      <div class=" row ">
                          <div class="col-8 col-sm-12 col-md-8 col-lg-8  americancardbody "> {{$car->year}}  {{$car->title}}</div>
                          <div class="col-6 col-sm-12 col-md-6 "><p class="cardPrice">${{$car->price}}</p></div>
                          <div class="col-6 col-sm-12 col-md-12 col-lg-6  bidnowbtndiv"><button class="bidnowbtn">Lease Now</button></div>
                      </div>
                      <p class="cardescription">{{$car->advert_text}}</p>
                  </div>
              </div>
                 </div>
            @endforeach

  </div>
  </div>

       <div class="row ">
         <div class="col-12 col-md-6">
            <div class="viewalldeals">
              {{-- <p class="m-0">View All Leasing deals <span><i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i></span></p> --}}
            </div>
         </div>

       </div>



    </div>


  </div>


</div>


<div class="advertisementdiv">
  <div class="container">
    <div class="row advertisementdivsection">
      <div class="col-12 col-sm-12 col-md-6">
        <div class="advertisingheading"> Create your Advertisment</div>
        <div>
          <img src="../img/featuredCar/Group 3236.png" alt="">
        </div>
        <div class="advertisingparagraph">
          Excepteur sint occaecat cupidatat non proident, sunt in culpa<br>
          qui officia deserunt

        </div>
        <form>
          <div class="row">
            <div class="col-12 col-sm-6">
              <label> Registration #</label>
              <input type="text" class="form-control" placeholder="e.g. LL58 JFK">
            </div>
            <div class="col-12 col-sm-6">
              <label> Registration #</label>
              <input type="text" class="form-control" placeholder="e.g. 50,000">
            </div>
            <div class="col-8 col-sm-6">
              <button>create an  ad</button>
            </div>
            <div class="col-12 col-sm-6 advertisementdivlink">
              <a href="#" style="font-weight: bold;">Manage Existing Adverts</a>
            </div>
            <div class="col-12 col-sm-6 advertisementdivlink">
             See our <a href="#">advertisement prices</a>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>

</div>

        @include('frontend.partials.footer')
        @include('frontend.partials.filters-script')
