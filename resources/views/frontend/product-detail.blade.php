@include('frontend.partials.header')
@include('frontend.partials.login-modal')


<!--<div class="container-fluid">-->
<!--	<div class="row justify-content-center">-->
<!--		<div class="d-flex">-->
<!--			<a href="" class="btn  menu-btn">Home</a>-->
<!--			<a href="" class="btn menu-btn">Blog</a>-->
<!--			<a href="" class="btn menu-btn">Buyer Request</a>-->
<!--			<a href="" class="btn menu-btn">Event</a>-->
<!--			<a href="" class="btn menu-btn">Grage Services</a>-->
<!--			<a href="" class="btn menu-btn">Auto Part</a>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
<!--<nav aria-label="breadcrumb" style="background-color: white !important;">-->
<!--  <ol class="breadcrumb">-->
<!--    <li class="breadcrumb-item nav-btn">Home</li>-->
<!--    <li class="breadcrumb-item nav-btn">Vehicles</li>-->
<!--     <li class="breadcrumb-item nav-btn">Cars</li>-->
<!--     <li class="breadcrumb-item nav-btn">Cars in Sindh</li>-->
<!--    <li class="breadcrumb-item nav-btn">Cars in Karachi</li>-->
<!--    <li class="breadcrumb-item nav-btn">Cars in Gulistan-e-Jauhar Block 4</li>-->
<!--    <li class="breadcrumb-item nav-btn">Toyota Cars in Gulistan-e-Jauhar Block 4</li>-->
<!--    <li class="breadcrumb-item active nav-btn" aria-current="page">Toyota Corrolla Altis in Gulistan-e-Jauhar Block 4</li>-->
<!--  </ol>-->
<!--</nav>-->
<!-- <=======Banner======> -->
<!--<div class="container">-->
<!--      <img src="https://www.wheelshunt.com/resources\images\banner\banner.png" class="img-fluid" style="max-width:100%;height:auto">-->
<!--  </div>-->
@if(isset($garage_d))
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-12 mb-5">

            <!--<div class="container-fluid">  </div>-->

                <!--<div class="col-md-12"></div>-->
                    <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                        <!-- slides -->
                        <div class="carousel-inner" style="background-color:black;">
                            @if(!empty($garage_d) && $garage_d->pic)
                                @php $pics = json_decode($garage_d->pic);  @endphp
                                @foreach($pics as  $key => $pic)
                                    <div class="carousel-item @if($key === 0) active @endif"> <img src="{{asset('storage/app/public/'.$pic)}}" alt="Hills"> </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- Left right -->
                        <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a>
                        <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon"></span> </a>
                        <!-- Thumbnails -->
                        <ol class="carousel-indicators list-inline justify-content-center">
                            @if(!empty($garage_d) && $garage_d->pic)
                                @php $pics = json_decode($garage_d->pic);  @endphp
                                @foreach($pics as  $key => $pic)
                                    <li class="list-inline-item" > <a id="carousel-selector-{{$key}}" @if($key === 1)  class="selected" @endif data-slide-to="{{$key}}" data-target="#custCarousel"> <img src="{{asset('storage/app/public/'.$pic)}}" class="img-fluid indicator-img cars "> </a> </li>
                                @endforeach
                            @endif
                        </ol>
                    </div>




        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-12">
            <!-- <=======Saller Discription======> -->
            <div class="row mt-2 block-margin" >
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <h5 class="mt-2" style="color: #707070;font-size: 20px;">Seller description</h5>
                </div>
                <div class="row">
                    <img  @if(!empty($garage_d->user) && !empty($garage_d->user['avatar'])) src="{{$garage_d->user['avatar']}}" @else src="https://wheelshunt.com/resources\images\thunmnailsilder\profile.png"  @endif  class="ml-4" style="height:40px;width:40px" >
                    <div>
                        <b class="ml-2">@if(!empty($garage_d->user)){{$garage_d->user['username']}}@endif</b>
                        <br>
                        <p class="ml-3 mb-2">{{$garage_d->created_at->diffForHumans()}}</p>
                    </div>

                </div>



            </div>

            <!-- <=======Post In========> -->
            <div class="row mt-2 block-margin">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <br>
                    <b class="">Posted In</b>
                     <p class="mt-2" style="font-size: 15px;color: #707070;">@if($garage_d->location){{$garage_d->location}}@endif</p>
                      @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                    <div  id="googleMap" style="height: 250px"></div>
                    <div class="row mt-2"></div>
                    @else
                    <div><p>Please <a href="{{route('user-login')}}" data-toggle="modal" data-target="#loginModal">login</a> to See Location on Google-Map</p></div>
                     @endif
                </div>



            </div>
     <!--        <div class="row mt-2">
                <div class="col-lg-6"><p>AD ID 1029632197</p></div>
                <div class="col-lg-6 " style="float: right;"><p>REPORT WITH AD</p></div>
            </div> -->
            <div class="row mt-2">
               <!--  <div class="d-flex justify-content-around">



                </div>
                <img src="https://wheelshunt.com/resources\images\productDetailMap\gadd.png" class="img-fluid" style="max-width:100%;height:auto"> -->
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-12">
           <div class="container-fluid related-slider mt-3" style="border: 1px solid #707070;border-radius: 5px;">
                <div class="row ml-4 mt-1">
                    <h4>Related Ads</h4>
                </div>
                <!--<div class="row mt-2"> </div>-->
                <!-- <div class="AddMore"> -->
                    <!--<div class="row " >-->
                    <!--</div>-->
                    <!-- @if(!empty($rel_ad) && count($rel_ad) > 0)
                        @foreach($rel_ad as $car)
                            @php $p = json_decode($car->pic);
                      if (!empty($p)){
                      $pi = $p[0];
                      }
                            @endphp

                            <div class="item item-cursor">
                                <div class="card ml-3 mb-3" style="border: 1px solid #bfbfbf75;">
                                    <a class="text-center" href="{{route('garage-detail',['id'=>base64_encode(base64_encode($car->id))])}}"><img class="card-img-top" src="{{asset('storage/app/public/'.$pi)}}" style="padding:10px;height: 150px;object-fit: cover!important;" alt="Card image cap"></a>


                                    <div class="pl-2 pb-2 pr-2 pt-2">
                                        <p class="productPrice m-0">{{$car->c_name}}</p>
                                        <p class="productD f-card-name m-0" data-maxlength = '18'>{{$car->description}}</p> -->
                                        <!-- <p class="text-center productD">Car</p> -->
                                        <!-- <p class="productTime m-0">{{$car->created_at->diffForHumans()}}</p>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>

            </div> -->
            <div id="carAdsCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        @if(!empty($rel_ad) && count($rel_ad) > 0)
            @foreach($rel_ad->chunk(4) as $index => $carChunk)
                <li data-target="#carAdsCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
            @endforeach
        @endif
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        @if(!empty($rel_ad) && count($rel_ad) > 0)
            @foreach($rel_ad->chunk(4) as $index => $carChunk)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach($carChunk as $car)
                            @php
                                $p = json_decode($car->pic);
                                $pi = !empty($p) ? $p[0] : 'default.jpg';
                            @endphp
                            <div class="col-md-3 item item-cursor">
                                <div class="card ml-3 mb-3" style="border: 1px solid #bfbfbf75;">
                                    <a class="text-center" href="{{ route('garage-detail', ['id' => base64_encode(base64_encode($car->id))]) }}">
                                        <img class="card-img-top" src="{{ asset('storage/app/public/'.$pi) }}" style="padding:10px;height: 150px;object-fit: cover!important;" alt="Card image cap">
                                    </a>
                                    <div class="pl-2 pb-2 pr-2 pt-2">
                                        <p class="productPrice m-0">{{ $car->c_name }}</p>
                                        <p class="productD f-card-name m-0" data-maxlength='18'>{{ $car->description }}</p>
                                        <p class="productTime m-0">{{ $car->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endif
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#carAdsCarousel" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carAdsCarousel" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

        </div>
    </div>
</div>
@else
<div class="container-fluid mt-4">
<div id="lightBox" class="d-none">
        <div class="position-fixed d-flex align-items-center lightbox w-100">
            <div id="closeLightBox" class="position-absolute close-lightbox p-0 m-0 text-light bg-dark rounded">x</div>
            <div class="w-100">
                <div id="custCarousel2" class="carousel slide" data-ride="carousel" align="center">
                    <div class="carousel-inner">
                        @if(!empty($car_d) && $car_d->pic_url)
                            @php $pics = json_decode($car_d->pic_url);  @endphp
                            @foreach($pics as $key => $pic)
                                <div class="carousel-item @if($key === 0) active @endif">
                                        <img src="{{ $pic }}" alt="Hills" class="lightbox-img" style="height: 35rem" >
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <a class="carousel-control-prev" href="#custCarousel2" data-slide="prev">
                        <div class="d-flex align-items-center justify-content-center bg-dark p-2 rounded">
                            <span class="carousel-control-prev-icon"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#custCarousel2" data-slide="next">
                        <div class="d-flex align-items-center justify-content-center bg-dark p-2 rounded">
                            <span class="carousel-control-next-icon"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-12 mb-5">

            <!--<div class="container-fluid">  </div>-->

                <!--<div class="col-md-12"></div>-->
                <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
        <!-- slides -->
        <div class="carousel-inner" style="background-color:black;">
            @if(!empty($car_d) && $car_d->pic_url)
                @php $pics = json_decode($car_d->pic_url);  @endphp
                @foreach($pics as $key => $pic)
                    <div class="carousel-item @if($key === 0) active @endif">
                        <img src="{{ $pic }}" alt="Hills" class="carousel-img">
                    </div>
                @endforeach
            @endif
        </div>
        <!-- Left right -->
        <a class="carousel-control-prev" href="#custCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#custCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
        <!-- Thumbnails -->
        <ol class="carousel-indicators list-inline justify-content-center">
            @if(!empty($car_d) && $car_d->pic_url)
                @php $pics = json_decode($car_d->pic_url);  @endphp
                @foreach($pics as $key => $pic)
                    <li class="list-inline-item">
                        <a id="carousel-selector-{{$key}}" @if($key === 0) class="selected" @endif data-slide-to="{{$key}}" data-target="#custCarousel">
                            <img src="{{ $pic }}" class="img-fluid indicator-img cars">
                        </a>
                    </li>
                @endforeach
            @endif
        </ol>
    </div>




        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-12">
            <div class="row block-margin">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6">
                    <h5 class="mt-3">Rs {{number_format($car_d->price)}}</h5>
                </div>
                @php $class='';
                @endphp
                @if(!empty($car_d))
                    @if(in_array($car_d->id,$user_s_id))
                        @php $class="save_like00";
                        @endphp
                    @endif
                    @endif
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 col-6 d-flex justify-content-end">
                   <!-- <i-->
                   <!--         class="fa fa-share-alt mt-2"-->
                   <!--         style="-->
                   <!--   font-size: 20px;-->
                   <!--   padding: 10px;-->
                   <!--" onclick="myFunctionurl();"-->
                   <!-- ></i>-->
                    <i class="fa fa-heart mt-2 likeByUserCarDetail {{$class}}" data-id="{{base64_encode($car_d->id)}}" style="font-size:20px;padding: 10px;"></i>
                </div>
                <div class="col-12">
                    <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-12">
                        <p class="side-dicription">{{$car_d->year}} - {{$car_d->drivers_position}} km
                            @if(!empty($car_d->brand_d)){{$car_d->brand_d['name']}}@endif <br> @if(!empty($car_d->modal_m)){{$car_d->modal_m['_value']}}@endif {{$car_d->year}}</p>
                    </div>
                        <input type="text" id="car_share_icon" value="{{route('car-detail',['id'=>base64_encode(base64_encode($car_d->id))])}}" style="opacity:0.00000000000001;width: 5%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-12">
                        <p class="side-dicription-state">@if(!empty($car_d->city_l)){{$car_d->city_l['_value']}}@endif,@if(!empty($car_d->stat_l)){{$car_d->stat_l['name']}} @else  @endif</p>
                    </div>
                </div>
            </div>
            <!-- <=======Saller Discription======> -->
            <div class="row mt-2 block-margin">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <h5 class="mt-2" style="color: #707070;font-size: 20px;">Seller description</h5>
                </div>
                <div class="row">
                    <img  @if(!empty($car_d->user) && !empty($car_d->user['avatar'])) src="{{$car_d->user['avatar']}}" @else src="https://wheelshunt.com/resources\images\thunmnailsilder\profile.png"  @endif  class="ml-4" style="height:40px;width:40px" >
                    <div>
                        <b class="ml-2">@if(!empty($car_d->user)){{$car_d->user['username']}}@endif</b>
                        <br>
                        <p class="ml-3 mb-2">{{$car_d->created_at->diffForHumans()}}</p>
                    </div>


                    @if($car_d && $car_d->other_number && !empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 ml-3"><label><b>Owner's Name</b></label> <i class="fa fa-user ml-1" aria-hidden="true"></i> <span class="ml-2"> {{$car_d->other_name}}  </span> </div>
                       <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 ml-3 mt-1"><label><b>Owner's Number</b></label> <i class="fa fa-phone ml-1" aria-hidden="true"></i> <span class="ml-2"> {{$car_d->other_number}}  </span> </div>
                   @else

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 ml-3 mt-1"><label><b>Owner's Number</b></label> <i class="fa fa-phone ml-1" aria-hidden="true"></i> <span class="ml-2"> {{$car_d->contact_number}}  </span> </div>

                    @endif

                  <!--   <i
                            class="fas fa-angle-right ml-5 mt-2"
                            style=" font-size: 40px; color: #707070;"
                    ></i>
 -->
                </div>

             <!--    <button class="btn btn-block ml-2 mr-2 mt-2" style="background-color:#00973D;color: white;">Chat</button> -->


                <!-- <div class="row mt-2" style="margin-left: 30px;color: white;">wheelsHunt</div> -->

            </div>

            <!-- <=======Post In========> -->
            <div class="row mt-2 block-margin">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <br>
                    <b class="">Posted In</b>
                     <p class="mt-2" style="font-size: 15px;color: #707070;">@if($car_d->location){{$car_d->location}}@endif</p>
                      @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                    <div  id="googleMap" style="height: 150px"></div>
                    <div class="row mt-2"></div>
                    @else
                    <div><p>Please <a href="{{route('user-login')}}" data-toggle="modal" data-target="#loginModal">login</a> to See Location on Google-Map</p></div>
                     @endif
                </div>



            </div>
     <!--        <div class="row mt-2">
                <div class="col-lg-6"><p>AD ID 1029632197</p></div>
                <div class="col-lg-6 " style="float: right;"><p>REPORT WITH AD</p></div>
            </div> -->
            <div class="row mt-2">
               <!--  <div class="d-flex justify-content-around">



                </div>
                <img src="https://wheelshunt.com/resources\images\productDetailMap\gadd.png" class="img-fluid" style="max-width:100%;height:auto"> -->
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-12">
            <!-- <=========Product Detail=========> -->
            <div class="container-fluid mt-5 mobile-container-fluid">
                <div class="row mt-2">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6 col-6">
                        <h4 class="ml-4">Details</h4>
                    </div>

                </div>
                <div class="row" >

                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-6">
                        <ul class="details-item">
                            <li>Make</li>
                            <li>Year</li>
                            <li>Fuel</li>
                            <li>Register in</li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-6">
                        <ul class="details-item">
                            @if(!empty($car_d))
                                <li>@if(!empty($car_d->brand_d)){{$car_d->brand_d['name']}} @else N/A @endif</li>
                                <li>@if(!empty($car_d->year)){{$car_d->year}} @else N/A @endif</li>
                                <li>@if(!empty($car_d->year)){{$car_d->fuel_type}} @else N/A @endif</li>
                                <li>@if(!empty($car_d->registration_no)){{$car_d->registration_no}} @else N/A @endif</li>
                            @endif
                        </ul>
                    </div>


                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-6">
                        <ul class="details-item">
                            <li>Model</li>
                            <li>KMs driven</li>
                            <li>Condition</li>

                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 col-6">
                        <ul class="details-item">
                            @if(!empty($car_d))
                                <li>@if(!empty($car_d->modal_m)){{$car_d->modal_m['_value']}} @else N/A @endif</li>
                                <li>@if(!empty($car_d->drivers_position)){{$car_d->drivers_position}} @else N/A @endif Km</li>
                                <li>@if(!empty($car_d->car_condition)){{$car_d->car_condition}} @else N/A @endif</li>
                            @endif

                        </ul>
                    </div>
                </div>
                <hr style=" width: 90%;" >
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                        <h4 class="ml-4">Description</h4>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                        <p style="padding:20px;margin-bottom:10px;" class="ml-4"> @if(!empty($car_d->advert_text)) {{$car_d->advert_text}} @endif </p>
                        <!--<ul style="list-style: none;">-->
                        <!--	<li>-->
                        <!--		     Toyota Altis-->
                        <!--	</li>-->
                        <!--	<li>-->
                        <!--		       model 2018-->
                        <!--	</li>-->
                        <!--	<li>-->
                        <!--		     1st owner-->
                        <!--	</li>-->
                        <!--	<li>-->
                        <!--		        super white color-->
                        <!--	</li>-->
                        <!--	<li>-->
                        <!--		          scratchless condition-->
                        <!--	</li>-->
                        <!--	<li>-->
                        <!--		        no work required sale on nearest offer-->
                        <!--	</li>-->
                        <!--</ul>-->

                    </div>
                </div>
            </div>
            <div class="container-fluid mt-3 related-slider position-relative" style="border: 1px solid #707070;border-radius: 5px;">
                <div class="row ml-4 mt-1">
                    <h4>Related Ads</h4>
                </div>
                <div id="carAdsCarousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @if(!empty($rel_ad) && count($rel_ad) > 0)
                            @foreach($rel_ad->chunk(4) as $index => $carChunk)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="row">
                                        @foreach($carChunk as $car)
                                            @php
                                                $p = json_decode($car->pic_url);
                                                $pi = !empty($p) ? $p[0] : 'default.jpg';
                                                $class = in_array($car->id, $user_s_id) ? 'red' : 'grey';
                                            @endphp
                                            <div class="col-md-3 rounded mb-4">
                                                <div class="card rounded h-100">
                                                    <a href="{{ $car->slug ? route('car-detail', ['id' =>$car->slug]) : '' }}">
                                                        <img src="{{ $pi }}" class="card-img-top" alt="{{ $car->title }}" style="height: 150px; object-fit: cover;">
                                                        <div class="card-body">
                                                            <p class="heart-icon HomeFilterHeart" data-id="{{ base64_encode($car->id) }}">
                                                                <i class="fas fa-heart {{ $class }}"></i>
                                                            </p>
                                                            <h5 class="card-title" style="color: #00c29f;">PKR {{ number_format($car->price) }}</h5>
                                                            <p class="card-text">{{ $car->title }}</p>
                                                            <p class="card-text text-muted">{{ ucfirst($car->registration_no) }}</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carAdsCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carAdsCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

                <!--<div class="row mt-2"> </div>-->
                <!-- <div class="AddMore"> -->
                    <!--<div class="row " >-->
                    <!--</div>-->
                    <!-- @if(!empty($rel_ad) && count($rel_ad) > 0)
                        @foreach($rel_ad as $car)
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

                            <div class="item item-cursor">
                                <div class="card rounded mr-3 mb-3" style="border: 1px solid #bfbfbf75;">
                                    <a class="text-center"><img class="card-img-top" src="{{$pi}}" style="padding:10px;height: 150px;object-fit: cover!important;" alt="Card image cap"></a>
                                    @if(in_array($car->id,$user_s_id))
                                        @php
                                            $class="red";
                                        @endphp
                                    @else
                                        @php
                                            $class="grey";
                                        @endphp
                                    @endif

                                    <div class="pl-2 pb-2 pr-2 pt-2">
                                        <p class="heart-icon HomeFilterHeart" data-id="{{base64_encode($car->id)}}"><i class="fas fa-heart {{$class}}"></i></p>
                                        <p class="productPrice m-0">PKR {{number_format($car->price)}}</p>
                                        <p class="productD f-card-name m-0" data-maxlength = '22'>{{$car->title}}</p> -->
                                        <!-- <p class="text-center productD">Car</p> -->
                                        <!-- <p class="productTime m-0">{{ucfirst($car->registration_no)}}</p>

                                    </div>
                                </div>
                            </div> -->
                            <!--             <div class="col-lg-12" style="padding: 5px;">-->
                            <!--                  <div class="card" style="border: 1px solid #bfbfbf;border-radius: 5px;height: 16rem;width: 14rem;">-->
                            <!--  <a href="{{route('car-detail',['id'=>base64_encode(base64_encode($car->id))])}}"><img class="card-img-top" src="{{$pi}}" style="padding:10px;height: 150px;object-fit: contain!important;" alt="Card image cap"></a>-->
                            <!--  <p class="heart-icon 0likeByUser0" data-id="{{base64_encode($car->id)}}"><i class="fas fa-heart {{$class}}"></i><p>-->
                            <!--  <div class="" data-maxlength="40">-->
                            <!--     <p class="productPrice">₨ {{$car->price}}</p>-->
                            <!--    <p class="productD f-card-name">{{$car->title}}</p>-->
                            <!--    <p class="productTime">CAR.. {{$car->created_at->diffForHumans()}}</p>-->

                            <!--  </div>-->
                            <!--</div>-->
                            <!--              </div>-->
                        <!-- @endforeach
                    @endif

                </div>

            </div> -->
        </div>
    </div>
</div>
@endif


@include('frontend.partials.footer')
@include("frontend.partials.filters-script")
@if(isset($garage_d))
<script>
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng({{$garage_d->map_lat}},{{$garage_d->map_lng}}),
            zoom:12,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        var marker = new google.maps.Marker({position: {'lat':{{$garage_d->map_lat}},'lng':{{$garage_d->map_lng}}}});

        marker.setMap(map);
    }
</script>
@else
<script>
    function myMap() {
        var mapProp= {
            center:new google.maps.LatLng({{$car_d->map_lat}},{{$car_d->map_lng}}),
            zoom:5,
        };
        var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
        var marker = new google.maps.Marker({position: {'lat':{{$car_d->map_lat}},'lng':{{$car_d->map_lng}}}});

        marker.setMap(map);
    }
</script>
@endif
<script>
    document.querySelectorAll('.carousel-img').forEach(item => {
            item.addEventListener('click', function() {
                document.getElementById('lightBox').classList.remove('d-none');
                // Ensure the carousel in the lightbox is updated to show the clicked image
                let index = Array.from(item.parentElement.parentElement.children).indexOf(item.parentElement);
                $('#custCarousel2').carousel(index);
            });
        });

        document.getElementById("closeLightBox").addEventListener("click", function() {
            document.getElementById("lightBox").classList.add("d-none");
        });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRThsOQmQXD3F7FpoUnTkAWJtFY3gKCNc&callback=myMap"></script>
