@include('frontend.partials.header')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 col-12">

            <div class="container-fluid">

                <div class="col-md-12">
                    <div id="custCarousel" class="carousel slide" data-ride="carousel" align="center">
                        <!-- slides -->
                        <div class="carousel-inner" style="background-color:black;height:25rem;object-fit:fill;">
                            @if(!empty($car_d) && $car_d->pic)
                                @php $pics = json_decode($car_d->pic);  @endphp
                                @foreach($pics as  $key => $pic)
                                    <div class="carousel-item @if($key === 0) active @endif" style="width:50rem;height:19rem"> <img src="{{asset('storage/app/public/'.$pic)}}" alt="Hills"> </div>
                                @endforeach
                            @endif
                        </div>
                        <!-- Left right -->
                        <a class="carousel-control-prev" href="#custCarousel" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a>
                        <a class="carousel-control-next" href="#custCarousel" data-slide="next"> <span class="carousel-control-next-icon" style="background-color:black"></span> </a>
                        <!-- Thumbnails -->
                        <ol class="carousel-indicators list-inline justify-content-center" style="padding: 20px;">
                            @if(!empty($car_d) && $car_d->pic)
                                @php $pics = json_decode($car_d->pic);  @endphp
                                @foreach($pics as  $key => $pic)
                                    <li class="list-inline-item" > <a id="carousel-selector-{{$key}}" @if($key === 1)  class="selected" @endif data-slide-to="{{$key}}" data-target="#custCarousel"> <img src="{{asset('storage/app/public/'.$pic)}}" class="img-fluid cars" style="width: 65px;height: 45px;object-fit: contain;"> </a> </li>
                                @endforeach
                            @endif
                        </ol>
                    </div>
                </div>

            </div>
            <!-- <=========Product Detail=========> -->
            <div class="container-fluid" style="margin-top: 100px;border: 1px solid #707070;border-radius: 5px;">
                <div class="row">
                    <div class="row ml-2">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                            <h4 class="ml-4">Description</h4>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                        <p style="padding:20px;margin-bottom:10px;"> @if(!empty($car_d->description)) {{$car_d->description}} @endif </p>
                    </div>
                </div>
            </div>
            <div class="container-fluid mt-3" style="border: 1px solid #707070;border-radius: 5px;">
                <div class="row ml-4 mt-1">
                    <h4>Related Ads</h4>
                </div>
                <div class="row mt-2" >
                    <div class="container ads-more-cars" style="background-color:">
                            <div class="row AddMore" style="display: none;">
                                @if(!empty($rel_ad) && count($rel_ad) > 0)
                                    @foreach($rel_ad as $car)
                                        @php $p = json_decode($car->pic);
                      if (!empty($p)){
                      $pi = $p[0];
                      } @endphp
                                        <div class="col-lg-12" style="padding: 5px;">
                                            <div class="card">
                                                <a href="{{route('garage-detail',['id'=>base64_encode(base64_encode($car->id))])}}"><img class="card-img-top" src="{{asset('storage/app/public/'.$pi)}}" style="padding:10px;height: 150px;object-fit: contain!important;" alt="Card image cap"></a>
                                                <div class="">
                                                    <p class="productPrice">{{$car->c_name}}</p>
                                                    <p class="productD f-garage-description" data-maxlength="30">{{$car->description}}</p>
                                                    <p class="productTime">Garage..... {{$car->created_at->diffForHumans()}}</p>

                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                            <br>
                            <br>
                        </div>

                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-12">
            <!-- <=======Saller Discription======> -->
            <div class="row mt-2" style="border: 1px solid #707070;border-radius: 5px;">
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
                </div>

                <button class="btn btn-block ml-2 mr-2 mt-2" style="background-color:#00973D;color: white;">Chat</button>
                
                </div>

            <!-- <=======Post In========> -->
            <div class="row mt-2" style="border:1px solid #707070;border-radius:5px">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12">
                    <br>
                    <b class="">Posted In</b>
                    <p class="mt-2" style="font-size: 15px;color: #707070;">@if($car_d->location){{$car_d->location}}@endif</p>
                    <div
                        id="googleMap"
                    style="height: 250px"
                       >
                    </div>
{{--                    <img src="https://wheelshunt.com/resources\images\productDetailMap\staticmap.png" class="img-fluid" style="max-width:100%;height:auto;">--}}
                    <div class="row mt-2"></div>
                </div>



            </div>
{{--            <div class="row mt-2">--}}
{{--                <div class="col-lg-6"><p>AD ID 1029632197</p></div>--}}
{{--                <div class="col-lg-6 " style="float: right;"><p>REPORT WITH AD</p></div>--}}
{{--            </div>--}}
            <div class="row mt-2">
{{--                <div class="d-flex justify-content-around">--}}



{{--                </div>--}}
{{--                <img src="https://wheelshunt.com/resources\images\productDetailMap\gadd.png" class="img-fluid" style="max-width:100%;height:auto">--}}
            </div>
        </div>
    </div>
</div>


@include('frontend.partials.footer')
@include("frontend.partials.filters-script")
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRThsOQmQXD3F7FpoUnTkAWJtFY3gKCNc&callback=myMap"></script>
