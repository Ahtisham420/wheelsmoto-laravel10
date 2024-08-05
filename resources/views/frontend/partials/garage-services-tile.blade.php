<div class="row shopsection">
    <div class="row append_class_garage m-0">
        <div class="row m-0" id="apend">
            @foreach($garages as $garage)
            <div class="col-12 col-md-6 shop" onclick="location.href = '{{route('garage-detail',['id'=>base64_encode(base64_encode($garage->id))])}}'" style="cursor: pointer;">
                <div class="row" style="border: 1px solid #e4e0e0;height: 100%;">
                    @php
                    $cars = json_decode($garage->pic);
                    $car =  $cars[0];
                    @endphp
                    <div class="col-3 p-0 sidecar"><img src="{{asset('storage/app/public/'.$car)}}" alt=""></div>
                    <div class="col-9">
                        <div class="row shopdetailSection">
                            <div class="col-12  shopName" data-maxlength="10">
                                <h3 class="f-card-name">{{$garage->c_name}}</h3>
                                <img class="myTestAd" src="{{ config('app.ui_asset_url').'frontend/img/featuredCar/Group 3236.png' }}" alt="">
                            </div>
                            <div class="col-12  shopdescription" data-maxlength="100">
                                <p class="f-card-description">{{$garage->description}}</p>
                            </div>
                            <!--  <div class="col-12 formgroup">
                               <label><span>Your Email:</span> Let us Contact You</label>
                                 <form class="garage_btn_email" action="{{route('garagemail')}}" method="post">
                                     <input type="hidden" name="user_id" value="{{$garage->user_id}}">
                                 <div class="input-group mb-3">
                                   <input type="hidden" value="{{$garage->user_id}}" name="g_userId" class="g_userId">
                                   <input type="email"  class="form-control g_email" name="email" placeholder="e.g. Trigonsoft@gmail.com" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                                   <div class="input-group-append">
                                     <button class="input-group-text" id="basic-addon2"><i class='fas fa-paper-plane'></i></button>
                                   </div>
                                 </div>
                                 </form>
                             </div> -->
                            <!--  <div class="col-12">
                               <div class="row">
                                 <div class="col-12 col-sm-6 dealsin">
                                   WE DEALS IN: <span>VIEW LIST</span>
                                 </div>
                               </div>
                             </div> -->
                            <div class="col-12 topratedSection">
                                <div class="row">
                                    {{--<div class="col-8 col-sm-6">--}}
                                        {{-- <div class="row">--}}
                                            {{--<div class="col-4">--}}
                                                {{--<img src=" {{ config('app.ui_asset_url').'frontend/img/garageicon/badge.png' }}" alt="">--}}
                                                {{--</div>--}}

                                            {{--<div class="col-8 p-0  toprated">--}}
                                                {{--<h3>Top Rated</h3>--}}
                                                {{--<div class="clientRating">--}}
                                                    {{--<i class="fas fa-star"></i>--}}
                                                    {{--<i class="fas fa-star"></i>--}}
                                                    {{--<i class="fas fa-star"></i>--}}
                                                    {{--<i class="fas fa-star"></i>--}}
                                                    {{--<i class="fas fa-star laststarclientration"></i>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div> --}}
                                        {{--</div>--}}
                                    <div class="col-12 col-sm-6  visitourwebsitebtn">
                                        @if(!empty($garage->user_website))<a class="btn btn-danger new-btn-danger-wheelshunt" href="{{$garage->user_website}}" target="blank">Visit our website</a>@endif
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="col-12 col-md-6 shop" style="border: 1px solid #e4e0e0;">
        <div class="row">
            <div class="col-12 carimage p-0">
                <img class="carimagemain"  src=" {{ config('app.ui_asset_url').'frontend/img/garageicon/Image.png' }}" alt="">
                <img class="logoCarimage"  src=" {{ config('app.ui_asset_url').'frontend/img/garageicon/logo.png' }}" alt="">


                <div class="dreamheading">
                    <h5>We don't Sell cars </h5>
                    <h1> We Sell Dreams</h1>
                </div>
            </div>

        </div>
    </div> --}}

</div>
<div class="row  pagemargin">
    <div class="col-12 col-sm-6">
        <div class="viewalldeals">
            {{--<p class="m-0"><span class="carsshow"> 805 Cars Availabe</span>  <span class="separater">|</span> View All--}}
                {{--</p>--}}
        </div>
    </div>
    <div class="col-12 col-sm-6 nextbtngrpdiv">
        {{$garages->links()}}
    </div>
</div>
