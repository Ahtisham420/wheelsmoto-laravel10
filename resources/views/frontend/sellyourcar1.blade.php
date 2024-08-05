@if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
    @php $us = App\User::where("id",session('userDetails')->id)->first();
                                                 $user_S = $us->status
    @endphp
    @endif
    @if(!empty($user_S) && $user_S == App\User::unverfied)
        <div class="email-verify-header mt-5 ml-5" style="display: none;"><div style="display: flex;">Please Verify Your Mail?<div class="loader-email ml-1 email-loader-header" ></div><a class="verify-mail-user" href="#">Verify email</a></div></div>
    @else
<div>
    @if($update)
        @php $url=route("updatecar"); @endphp
    @else
        @php $url=route("savecar"); @endphp
    @endif

    <form action='{{ $url }}' method="post" class="needs-validation sell-form" enctype="multipart/form-data"  id="user_car_s" novalidate>
        <div class="container">
            @if ($update)
                <input type="hidden" name="c_id" value="{{ $update->id }}">
            @endif
            {{ csrf_field() }}
            <div class="row sellcar">
                <div class="col-12 formdiv p-0">

                    <div class="form-row">
                        <div class="col-12 col-md-10 mb-3">
                            <div class="form-row">
                                <div class="col-12 col-sm-12 col-md-12  labelalign">
                                    <label for="validationCustom02">*Make :</label>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 ">
                                    @php
                                        $brand=App\Brand::orderBy('name')->get();
                                    @endphp
                                    <select class="form-control validate1 brand-select-base select2" name="brand">
                                        <option value="">Select Make</option>
                                        @if(!empty($brand)&&count($brand)!=0)
                                            @foreach($brand as $t)
                                                <option id="{{$t->id}}" value="{{$t->id}}"
                                                        @if($update)
                                                        @if($update->brand)
                                                        @if($update->brand==$t->id)
                                                        selected

                                                        @endif
                                                        @endif
                                                        @endif
                                                >{{$t->name}}</option>
                                            @endforeach
                                        @else
                                            <option value="">Select Make</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

         <div class="col-12 col-md-10 mb-3 " id="model_show_sell" style="@if(!empty($update) && !empty($update->modal)) display: block @else display: none @endif ">
              <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Model :</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12 ">
              @if(!empty($update->brand))
                  @php $model = App\CarSetting::OrderBy('_value')->where('brand',$update->brand)->get(); @endphp
              @else
                  @php $model = App\CarSetting::all(); @endphp
              @endif

              <select class="form-control validate1 make-brand-append select2" name="model">
                  <option  value="">Select Model</option>
                  @if(!empty($model) && count($model) > 0)
                      @foreach($model as $mo)
                          @if($mo->_key==="model")
                              <option value="{{$mo->id}}" @if(!empty($update->modal) && $update->modal == $mo->id) selected @endif>{{$mo->_value}}</option>
                          @endif
                      @endforeach
                  @endif
              </select>
          </div>
      </div>
  </div>

                        <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Year :</label>

          </div>
          <div class="col-12 col-sm-12 col-md-12">
              <input id="txtF" type="number" class="form-control validate0 new-price-for-car"  onKeyup="return check(event,value)" onInput="checkLength()" name="year"  placeholder="e.g.2021" @if(!empty($update->year))value="{{$update->year}}"@endif>
              <p id="yerar_validation" style="display: none;color:#00a651;">Year has a maximum value of 2021.</p>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*KMs driven :</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12">
              <input  type="text" class="form-control validate0" name="driven" id="inp_kms"  placeholder="e.g.2698" @if(!empty($update->drivers_position))value="{{$update->drivers_position}}"@endif>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Fuel:</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12 ">
              <select class="form-control validate1 select2" name="fuel">
                  <option value="">Select Fuel Type</option>
                  <option value="CNG" @if(!empty($update->fuel_type) && $update->fuel_type == "CNG") selected @endif>CNG</option>
                  <option value="Diesel" @if(!empty($update->fuel_type) && $update->fuel_type == "Diesel") selected @endif>Diesel</option>
                  <option value="Hybrid" @if(!empty($update->fuel_type) && $update->fuel_type == "Hybrid") selected @endif>Hybrid</option>
                  <option value="Petrol" @if(!empty($update->fuel_type) && $update->fuel_type == "Petrol") selected @endif>Petrol</option>
                  <option value="Dualfuel" @if(!empty($update->fuel_type) && $update->fuel_type == "Dualfuel") selected @endif>Dualfuel</option>
                  <option value="Biodiesel" @if(!empty($update->fuel_type) && $update->fuel_type == "Biodiesel") selected @endif>Biodiesel</option>
                  <option value="LPG" @if(!empty($update->fuel_type) && $update->fuel_type == "LPG") selected @endif>LPG</option>
                  <option value="Electric" @if(!empty($update->fuel_type) && $update->fuel_type == "Electric") selected @endif>Electric</option>
              </select>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Car Type :</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12 ">
              @php $car_type = App\CarSetting::where('_key','car-type')->get(); @endphp
              <select class="form-control validate1 select2" name="car_type">
                  <option  value="">Select car type</option>
                  @if(!empty($car_type) && count($car_type) > 0)
                      @foreach($car_type as $type)
                          @if($type->_key==="car-type")
                              <option value="{{$type->id}}" @if(!empty($update->car_type) && $update->car_type == $type->id) selected @endif>{{$type->_value}}</option>
                          @endif
                      @endforeach
                  @endif
              </select>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Condition :</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12 ">
              <select class="form-control validate1 select2" name="car_condition" >
                  <option value="">Select Condition</option>
                  <option value="New" @if(!empty($update->car_condition) && $update->car_condition == "New") selected @endif>New</option>
                  <option value="Used" @if(!empty($update->car_condition) && $update->car_condition == "Used") selected @endif>Used</option>
              </select>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Registered in :</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12 ">
              <select class="form-control validate1 select2" name="registered" >
                  <option value="">Select Registered in</option>
                  @include("frontend.registered-in")
              </select>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Add Title:</label>

          </div>
          <div class="col-12 col-sm-12 col-md-12 textareacount">
              <input id="enginesize" type="text" class="form-control validate0" name="title" maxlength="70"  autocomplete="off"  placeholder="Ad Title" @if(!empty($update->title))value="{{$update->title}}"@endif >
              <span id="chars_input"><span>@php if (!empty($update->title)){ echo strlen($update->title); } else { echo  0; } @endphp</span>/70</span>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Description:</label>

          </div>
          <div class="col-12 col-sm-12 col-md-12 textareacount">


                          <textarea type="text" class="form-control" rows="5" maxlength="4096"  name="description" value="@if($update && !empty($update->advert_text)){{$update->advert_text}}@endif">@if(!empty($update->advert_text)){{$update->advert_text}}@endif</textarea>

                  <span id="chars"><span>@php if ($update && !empty($update->title)){ echo strlen($update->advert_text); } else { echo  0; } @endphp</span>/4096</span>


              {{--<textarea class="form-control validate0" name="description"  rows="3" >@if(!empty($update->advert_text)){{$update->advert_text}}@endif</textarea>--}}
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12 d-block  labelalign">
              <h6>Set A price</h6>
              <label for="validationCustom02">*Enter Price in Rupees :</label>

          </div>
          <div class="col-12 col-sm-12 col-md-12 rs_style">
              <div class="input-group-prepend span_rs"><span class="input-group-text gbswap image_invalid " id="basic-addon1">Rs</span>  <input id="rs_input_valid" type="number" class="form-control validate0 new-price-for-car" name="price"  placeholder="e.g.2698" @if(!empty($update->price))value="{{$update->price}}"@endif onKeyup="return checkPrice(event,value)" onInput="checkLengthPrice()">
              </div>


          </div>
      </div>
      <span id="rs_validation" ></span>
  </div>
  <div class="col-12 col-sm-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12 d-block  labelalign">
              <h6>Add Photos:</h6>

          </div>
          @if(!empty($update->pic_url))

              @php  $pic_car = json_decode($update->pic_url);
              @endphp
          @endif
          @for($i=0;$i<12;$i++)
              <div class="col-8 m-auto col-sm-4 col-md-4">
              <label class="cabinet center-block">
                  <figure>
                      <img id="preview_{{$i}}"
                           src="@if(!empty($pic_car[$i])){{$pic_car[$i]}}@else{{ config('app.ui_asset_url') . 'frontend/img//thumbnail.jpg' }} @endif"
                           class="gambar item-img-output img-responsive img-thumbnail"/>
                      <figcaption>
                          <i class="fa fa-camera"></i>
                      </figcaption>
                      <input type="file" class="item-img file center-block image_dash" name="file_photo" data-id="{{$i}}" id="image_{{$i}}"/>
                  </figure>
              </label>
          </div>
          @endfor

<input type="hidden" name="number" value="{{ !empty(session('userDetails')->phone) ? session('userDetails')->phone : old('phone') }}">
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Select Your Location</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12 ">
              <select class="form-control validate1 state-select-base select2" name="state" >
                  <option value="">Select State</option>
                  @php $state = App\CarState::OrderBy("name")->get(); @endphp
                  @if(!empty($state) && count($state) > 0)
                      @foreach($state as $s)
                          <option value="{{$s->id}}" @if(!empty($update->state) && $update->state == $s->id) selected @endif>{{$s->name}}</option>
                      @endforeach
                  @endif
              </select>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Select Your City</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12 ">
              @if(!empty($update->state))
                  @php $city = App\CarSetting::OrderBy('_value')->where('state',$update->state)->where('_key','city')->get(); @endphp
              @else
                  @php $city = App\CarSetting::OrderBy('_value')->where('_key','city')->get(); @endphp
              @endif
              <select class="form-control validate1 state-city-append select2" name="city">
                  <option value="">Select City</option>
                  @if(!empty($city) && count($city) > 0 )
                      @foreach($city as $c)
                          <option value="{{$c->id}}" @if(!empty($update->state) && $update->city == $c->id) selected @endif>{{$c->_value}}</option>
                      @endforeach
                  @endif
              </select>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Select Ad</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12 ">
        <select class="form-control validate0 select2" onchange="getAdVal(this)">
        <option value="for-me" @if(empty($update->other_number)) selected @endif >For Me</option>
        <option value="for-other" @if(!empty($update->other_number)) selected @endif >For Other</option>
        
        </select>
          </div>
      </div>
  </div>
     <div class="col-12 col-md-10 mb-3 other-detail" style=" @if(empty($update->other_name)) display:none @endif ">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Other's Name</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12">
          <input type="text" class="form-control others-get-detail"  placeholder="Enter User Name"  name='other_name'
          @if(!empty($update->other_name))value='{{$update->other_name}}'@endif>
          </div>
      </div>
  </div>
  <div class="col-12 col-md-10 mb-3 other-detail" style=" @if(empty($update->other_number)) display:none @endif">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Other's Phone No:</label>
          </div>
          <div class="col-12 col-sm-12 col-md-12">
          <input type="tel" class="form-control others-get-detail"  placeholder="Enter Phone #" name='other_number'
          @if(!empty($update->other_number))value='{{$update->other_number}}'@endif>
          </div>
      </div>
  </div>
<div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <div class="col-12 col-sm-12 col-md-12  labelalign">
              <label for="validationCustom02">*Enter Your Number :</label>

          </div>
          <div class="col-12 col-sm-12 col-md-12 rs_style">
              <div class="input-group-prepend "><span class="input-group-text gbswap image_invalid span_92" id="basic-addon1">Phone</span><input id="Number_contact" type="tel" name='number' class="form-control validate0 new-price-for-car" placeholder="e.g.2698" @if(!empty(!empty($update->contact_number))) value="{{$update->contact_number}}" @else value = {{ !empty(session('userDetails')->phone) ? session('userDetails')->phone : old('phone') }} @endif >
               <!--  <input readonly id="Number_contact" type="tel" class="form-control validate0 new-price-for-car" placeholder="e.g.2698" @if(!empty(!empty($update->contact_number)))value="{{$update->contact_number}}" @else value = {{ !empty(session('userDetails')->phone) ? session('userDetails')->phone : old('phone') }} @endif onKeyup="return checkPhoneNumber(event,value)" onInput="checkLengthPhoneNumber()"> -->
              </div>

          </div>
          <p id="phone_validation" style="display: none;color:#00a651;">Not Valid Number.</p>
      </div>
  </div>
      <div class="col-12 col-md-10 mb-3">
                            <div class="form-row">
                                <div class="col-12 col-sm-12 col-md-12  labelalign">
                                    <label for="validationCustom02 blog_subtitle"> Location :</label>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <input type="text" class="form-control"  placeholder="Enter Location" aria-describedby="blog_subtitle_help" id="GarageMapInput" name='location'
                                                   @if(!empty($update->location))value='{{$update->location}}'@endif required>
                                            <small id="location" class="form-text text-muted">Location</small>
                                </div>
                            </div>
                            <div class="form-row">
                                <input type="hidden" name="map_lat" id="GarageMapLat" value="@if(!empty($update->map_lat)){{$update->map_lat}}@endif">
                                <input type="hidden" name="map_lng" id="GarageMapLng" value="@if(!empty($update->map_lng)){{$update->map_lng}}@endif">
                                <div class="col-md-12 col-xs-12 col-sm-12 Map mb-3 ml-auto">
                                    <div id="Garagemap" style="height:250px; width:100%;">
                                        Map
                                    </div>
                                </div>

                            </div>
                        </div>
  <div class="col-12 col-md-10 mb-3">
      <div class="form-row">
          <button type="submit" class=" btn btn-next" id="car_btn" style="display:flex;" disabled>Submit<div class="loader ml-2" id="add_loader" ></div></button>
      </div>
  </div>








</div>



</div>


</div>

</div>

</form>
        <span id="form_submit_error" style="color: red"></span>
</div>
        @endif
<script>
   function getAdVal(request){
        console.log(request.value);
        if(request.value == "for-other"){
            $('.other-detail').show();
            $('.others-get-detail').attr('required',true);
            $('.others-get-detail').addClass('validate0');
        }else{
             $('.other-detail').hide();
             $('.others-get-detail').removeClass('validate0');
             $('.others-get-detail').attr('required',false);
             $('.others-get-detail').val('');
        }
   }
    function initGarageAutocomplete() {
        let mapLat = Number('{{!empty($update->map_lat) ? $update->map_lat : "40.6971494"}}');
        let mapLng = Number('{{!empty($update->map_lng) ? $update->map_lng : "-74.2598655"}}');

        var map = new google.maps.Map(document.getElementById('Garagemap'), {
            center: {
                lat: mapLat,
                lng: mapLng
            },
            draggable: false,
            zoom: 8,
            mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('GarageMapInput');

        var searchBox = new google.maps.places.SearchBox(input);

        var marker;
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());

            if (marker) {
                marker.setMap(null);
            }

            marker = new google.maps.Marker({
                map: map,
                position: map.getCenter(),
                title: "Location"
            });

        });

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            $('#GarageMapLat').val('');
            $('#GarageMapLng').val('');
            $('#GarageMapInput').removeClass('border border-danger');

            var places = searchBox.getPlaces();
            console.log(places[0]);
            if (places.length == 0) {
                $('#GarageMapInput').addClass('border border-danger');
                $('#GarageMapLat').val('');
                $('#GarageMapLng').val('');

                return;
            }

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();

            if (places.length == 1) {
                if (!places[0].geometry) {
                    $('#GarageMapInput').addClass('border border-danger');
                    console.log("Returned place contains no geometry");
                    return;
                }

                $('#GarageMapLat').val(places[0].geometry.location.lat());
                $('#GarageMapLng').val(places[0].geometry.location.lng());
                var addr=places[0].address_components;
                for (var x in addr){
                    console.log(addr[x].types);
                    if(addr[x].types[0]==="country"){
                        $(".s_country option[value='"+ addr[x].long_name +"']").prop("selected",true);
                        $(".s_country").prop("disabled",true);
                        $("#profileCountry").val(addr[x].long_name);
                    }
                    else if(addr[x].types[0]==="administrative_area_level_2"){
                        $("input[name='city']").val(addr[x].long_name);
                        $("#city").val(addr[x].long_name);

                    }
                }



            } else {
                $('#GarageMapInput').addClass('border border-danger');
                $('#GarageMapLat').val('');
                $('#GarageMapLng').val('');


                console.log("error in results");
                return;
            }

            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRThsOQmQXD3F7FpoUnTkAWJtFY3gKCNc&libraries=places&callback=initGarageAutocomplete" async defer></script>