<div class="row rowgap column-card append_class">
    <span class="error-post-code"></span>
{{--    <div id="apend" class="appen_filters" ></div>--}}
        <div class="container-fluid" style="width:100%; display:flex;">
            <div id="products" class="row view-group">
                @if (!empty($result) && count($result) > 0 )
                    @foreach($result as $classified)
                        @php  $pics = json_decode($classified->pic_url);
                    $pic = $pics[0];
                    if ($classified->car_condition === "New"){
                        $v = "New";
                    }else{
                        $v = "Used";
                    }
                        @endphp
                        <div class="item col-xs-3 col-lg-3">
                            <div class="card" style="margin: 5%;border: 1px solid #bfbfbf;border-radius: 5px;height: 16rem;width: 14rem;">
                                <a href="{{route('car-detail',['id'=>$classified->slug])}}"><img class="card-img-top" src="{{$pic}}" style="padding:10px;height: 150px;object-fit: contain!important;" alt="Card image cap"></a>
                                @if(in_array($classified->id,$user_s_id))
                                    @php
                                        $class="red";
                                    @endphp
                                @else
                                    @php
                                        $class="grey";
                                    @endphp
                                @endif
                                <p class="heart-icon HomeFilterHeart" data-id="{{base64_encode($classified->id)}}"><i class="fas fa-heart {{$class}}"></i><p>
                                <div class="">
                                    <p class="productPrice" data-maxlength="40">₨ {{$classified->price}}</p>
                                    <p class="productD f-card-name">{{$classified->title}}</p>
                                    <!-- <p class="text-center productD">Car</p> -->
                                    <p class="productTime">CAR.. {{$classified->created_at->diffForHumans()}}</p>

                                </div>
                            </div>
                        <!--   <div class="thumbnail card" style="border: 1px solid #707070;">
                        <div class="img-event">
                            <div><span style="position: absolute;z-index: 2;top: 1%;background-color: #00a651;padding: 2px;color: white;font-size: 14px" class="mt-2 ml-2">{{ $v }}</span> </div>
                           <a href="{{route('car-detail',['id'=>base64_encode(base64_encode($classified->id))])}}"><img class="group list-group-image" src="{{$pic}}" alt="" style="height: 200px;width:100%;object-fit: contain;"/></a>
                        </div>
                        <div class="caption card-body">
                            <h4 class="group card-title inner list-group-item-heading mb-0">
                                Rs {{$classified->price}}
                            <div class="card-title inner list-group-item-heading">
@if(in_array($classified->id,$user_s_id))
                            @php
                                $class="red";
                            @endphp
                        @else
                            @php
                                $class="grey";
                            @endphp
                        @endif

                            <i class="fas fa-heart mt-3 group HomeFilterHeart {{$class}}"  data-id="{{base64_encode($classified->id)}}" style="position: absolute;top: -10px;right: 10px;color: {{$class}}"></i>
                                </div>
                            </h4>
                            <p class="group inner list-group-item-text f-card-description mb-0" style="display: none;">
                               {{$classified->advert_text}}
                            </p>
                        </div>
                        <div class="row ml-2">
                            <div class="col-xs-12 col-md-6">
                                <p class="lead">
                                   @if (!empty($classified->city_l)) {{$classified->city_l['_value']}} @else {{$classified->city}} @endif </p>
                            </div>
                            <div class="col-xs-12 col-md-6 pl-0">
                                <p>{{$classified->created_at->diffForHumans()}}</p>
                            </div>
                        </div>
                    </div> -->
                        </div>
                    @endforeach
                @endif

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
