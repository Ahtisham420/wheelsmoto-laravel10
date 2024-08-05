@include('frontend.partials.header')
<div class="swapPageSection">
    <div class="container">
        <div class="row swapheadingrow ">
            <div class="col-12 col-sm-12 col-lg-3 p-0 swapheadingswap-car">

                Swap your car
            </div>
            <div class="col-7  p-0 headinghr">
                <hr>
            </div>
            <div class="col-12 col-md-12 col-lg-2  p-0 viewdiv">
                <div class="avaliablecars">805 Cars Availabe</div>
                <div class="separater"> |</div>
                <div class="viewall"> view all</div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12 col-xl-8">
                <div class="divtabs">
                    <div class="row divstab">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" id="swap_car_details" href="#carDetail">
                                    <img src="{{ config('app.ui_asset_url').'frontend/img/swapPage/caricon.png' }}">

                                    <p> Car Detail</p>

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-toggle="tab" id="swap_pricing_tab" href="#pricing">
                                    <img src="{{ config('app.ui_asset_url').'frontend/img/swapPage/pricetagicon.png' }}">

                                    <p> Pricing</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#result">
                                    <img src="{{ config('app.ui_asset_url').'frontend/img/swapPage/resulticon.png' }}">

                                    <p> Result</p>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <!-- Tab panes -->
                    <div class="row">
                        <div class=" col-12 p-0">
                            <div class="tab-content">
                                <div id="carDetail" class="container tab-pane active"><br>
                                    <div class="row swap-car-list-page">
                                      <div class="col-12 bidnowbtndiv">

                                          <a class="bidnowbtn" href="{{route("user-dashboard",["tab"=>"swap","flag"=>base64_encode($result->id)])}}" style="color:#fff;padding:10px 20px; cursor:pointer">Add New Car</a>
                                      </div>

                                         @if(!empty($swap_car) && count($swap_car) > 0)
                                           @foreach($swap_car as $swap)

                                        <div class="col-12 col-sm-6 col-md-4 colwidth" style="margin-top:20px;">
                                            <div class="card">
                                              <div class="cardimage">
                                                @if($swap->car_condition === "New")
                                                  @php $condition= "New"  @endphp
                                                  @else
                                                  @php $condition= "Used"  @endphp
                                                  @endif
                                                <p>{{$condition}}</p>
                                                <img class="card-img-top" src="{{asset("/public/crop_images/".$swap->crop_image)}}" alt="Card image cap">
                                              </div>
                                              <div class="card-body">
                                                <div class=" row ">
                                                  <div class="col-12 col-sm-12 col-md-12 col-lg-12  americancardbody "> {{$swap->year}} {{$swap->title}}</div>
                                                  <div class="col-12 col-sm-12 col-md-12 ">
                                                    <p class="cardPrice">${{$swap->price}}</p>
                                                  </div>
                                                    <input type="hidden" class="apped_id_swap" value="{{$swap->id}}">

                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12  d-flex align-items-center justify-content-start">
                                                        <button class="bidnowbtn swap-my-car" data-col="{{$swap->id}}">Swap My car</button>
                                                      {{--@if(in_array($swap->id,$selected_own_car))--}}
                                                          {{--<label class="swap-my-car" style="color:#e4001b;font-size: 18px; ">You already swap this</label>--}}
                                                    {{--@else--}}
                                                          {{--<button class="bidnowbtn swap-my-car" data-col="{{$swap->id}}">Swap My car</button>--}}
                                                    {{--@endif--}}
                                                  </div>
                                                </div>
                                                <p class="cardescription" style="padding-top: 10px">{{$swap->advert_text}}</p>
                                              </div>
                                            </div>
                                          </div>
                                             @endforeach
                                           @endif






                                    </div>
                                    <div class="swap-car-detail-form" style="display:none;">


                                        <div class="container">
                                            <div class="alert" id="swap_err" style="display: none"></div>
                                            <form action="{{route("create-swap")}}" method="post" id="add_swap_car" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="swap_id" id="swap_id" value="0">
                                                <div class="row">
                                                    <div class="col-12  firsttabheading">
                                                        Tell us about your current car
                                                    </div>
                                                    <div class="col-6 col-sm-4 registrationnumber ">
                                                        <label>Registration Number</label>
                                                        <div class="input-group swapinput mb-3">
                                                            <div class="input-group-prepend ">
                                                                <span class="input-group-text gbswap" id="basic-addon1">
                                                                    <img src="{{ config('app.ui_asset_url').'frontend/img/swapPage/Group 3414.png' }}">


                                                                    GB
                                                                </span>
                                                            </div>
                                                            <input type="text" class="form-control" placeholder="LL58 LGK" name="registration_no" aria-label="Username" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-6 col-sm-4 mileage ">

                                                        <label>Mileage </label>
                                                        <input type="number" class="form-control" name="mileage" placeholder="50,000" min="0">
                                                    </div>
                                                    <div class="col-6 col-sm-4 updatebtndiv">
                                                        <button type="submit" class="btn btn-update">Update Detail</button>


                                                    </div>
                                                    <div class="col-12 matter ">Please make sure the mileage is accurate.<a href="#"> Why this matters?</a></div>
                                                </div>
                                                <div class="col-12 p-0 swappageform">
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">* Price:</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" type="number" name="price" placeholder="Please Enter Your Price" style="color:#e4001b" min="0">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">*Manufacture:</label>
                                                        <div class="col-sm-10">
                                                            @php
                                                            $brand=App\Brand::all();
                                                            @endphp
                                                            <select class="form-control" id="sel1" name="manufacture">
                                                                <option value="">Select Manufacture:</option>
                                                                @if(!empty($brand)&&count($brand)!=0)
                                                                @foreach($brand as $t)
                                                                <option value="{{$t->name}}">{{$t->name}}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputEmail3" class="col-sm-2 col-form-label">*Fuel Type:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="fuel_type">
                                                                <option value="">Select Fuel Type</option>
                                                                <option id="DIESEL" value="DIESEL">Diesel</option>
                                                                <option value="PETROL">Petrol</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">* Car Type:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" id="sel1" name="car_type">
                                                                @php $car_type =App\CarSetting::all();
                                                                @endphp
                                                                <option value="">Select Car type</option>
                                                                @if(!empty($car_type)&&count($car_type)!=0)
                                                                @foreach($car_type as $t)
                                                                @if($t->_key === "car-type")
                                                                    <option value="{{$t->_value}}">{{$t->_value}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                    @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">* Car Make:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" id="sel1" name="carmake">
                                                                <option value="">Select Car Make</option>
                                                                @if(!empty($car_type)&&count($car_type)!=0)
                                                                @foreach($car_type as $make)
                                                                @if($make->_key === "car-make")
                                                                    <option value="{{$make->_value}}">{{$make->_value}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                    @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">*Engine Type:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" id="sel1" name="enginetype">
                                                                <option value="">Select Engine Type</option>
                                                                @if(!empty($car_type)&&count($car_type)!=0)
                                                                @foreach($car_type as $make)
                                                                @if($make->_key === "engine-types")
                                                                    <option value="{{$make->_value}}">{{$make->_value}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                    @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">* Model:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" id="sel1" name="model">
                                                                <option>Select Model</option>
                                                                @if(!empty($car_type)&&count($car_type)!=0)
                                                                @foreach($car_type as $model)
                                                                @if($model->_key === "modal")
                                                                    <option value="{{$model->_value}}">{{$model->_value}}</option>
                                                                    @endif
                                                                    @endforeach
                                                                    @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10 offset-sm-2 offsetdescription">
                                                            <p>If the vehicle details below are not quite right,</p>
                                                            <p> please select the correct derivative from the above list.</p>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-10 offset-sm-2 offsetdescription">
                                                            {{--<div class="row">--}}
                                                            {{--<div class="col-sm-4 bodytype">--}}
                                                            {{--<p>Body Type: <span>Couple</span></p>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="col-sm-4 bodytype">--}}
                                                            {{--<p>Body Type: <span>Couple</span></p>--}}

                                                            {{--</div>--}}
                                                            {{--<div class="col-sm-4 bodytype">--}}
                                                            {{--<p>Body Type: <span>Couple</span></p>--}}

                                                            {{--</div>--}}
                                                            {{--</div>--}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="inputPassword3" class="col-sm-2 col-form-label">Colour:</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control" id="sel1" name="color">
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"> Condition:</label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" id="sel1" name="swap_condition">
                                                                <option value="">Select Condition</option>
                                                                <option value="New">New</option>
                                                                <option value="Used">Used</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label"> Add Image:</label>
                                                        <div class="col-sm-10">
                                                            <p><input type="file" accept="image/*" name="image[]" id="swap_file" onchange="loadFile(event)" style="display: none;" multiple></p>
                                                            <p><label class="addphoto" for="swap_file" style="cursor: pointer;"> <i class="fa fa-camera"></i> Add Photo</label></p>
                                                            <p class="imageborder">
                                                                @for($i=1;$i<=3;$i++)
                                                                <img id="s_p_{{$i}}" width="20%" height="inherit" src="" />
                                                                @endfor
                                                            </p>
                                                        </div>
                                                        <div id="swap-image-preview" style="display: none"></div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 backbtn ">
                                                            <button class="btn btn-back"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i> Back</button>
                                                        </div>
                                                        <div class="col-sm-6 nextbtn">
                                                            <button class="btn btn-next" type="submit" style="display: flex;">Next<div class="loader ml-1 m-0"></div></button>

                                                        </div>
                                                    </div>
                                            </form>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12 footernote">
                                                    <p> Stuck?<a href="#"> Get help now </a></p>

                                                    <p class="m-0"> * Denotes mandatory field</p>
                                                    <p class="m-0">* Please note the design and layout of published adverts may differ from the preview. For full details see our Terms & Conditions </p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="pricing" class="container tab-pane fade">
                                <div class="container">
                                    <div class="row pricingsection">
                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 p-0">
                                            <div class="card">
                                                <div class="card-header p-0">
                                                    <div class="row d-none ">
                                                        <div class="col-12 carbrand">Car Brand</div>
                                                        <div class="col-12 selectcarbrand">
                                                            <select class="form-control" id="brandsCarswapping">
                                                                <option selected value="" disabled>Select Brand</option>
                                                                @if(!empty($brand)&&count($brand)!=0)
                                                                    @foreach($brand as $t)
                                                                        <option value="{{$t->name}}">{{$t->name}}</option>
                                                                    @endforeach
                                                                @endif

                                                            </select>
                                                        </div>
                                                        {{--<div class="col-12 summarybilldetail edit carsearch"><a href="#"> Search Car Manually</a></div>--}}
                                                    </div>

                                                    {{--<div class="row secondcar">--}}
                                                        {{--<div class="col-6 select p-0"> Select</div>--}}
                                                        {{--<div class="col-6 dropbtn p-0">--}}
                                                            {{--<select class="form-control" id="swap_condotion">--}}
                                                                {{--<option value="New">New</option>--}}
                                                                {{--<option value="Used">Used</option>--}}
                                                            {{--</select>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                    @if(!empty($result))

                                                    <div class="card-header p-0">

                                                        <h3>{{$result->model->_value}}</h3>
                                                        <p>{{$result->brand}},{{$result->cartype->_value}},{{$result->enginetype->_value}}</p>
                                                    </div>
                                                    <div class="cardimageswap-car">

                                                            <img class="card-img-top new-car-img-top mt-0" src="{{asset("/public/crop_images/".$result->crop_image)}}" alt="Card image cap">

                                                    </div>
                                                    <div class="card-body p-0">
                                                        <div class="row ">
                                                            <div class="col-12 carworth">Your Car Worth</div>
                                                            <div class="col-12">
                                                                <div class="  carspecspric">
                                                                    ${{$result->price}}
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                        </div>


                                                        <div class="row summarysection " id="swapingsection-summary">
                                                            <div class="col-12 summaryheading">
                                                                <i class="fas fa-file-alt"></i>
                                                                Car Summary

                                                            </div>
                                                            <div class="col-6 summarybillheading ">Purchase type:</div>
                                                            <div class="col-6 summarybilldetail">Paypal</div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                            <div class="col-6 summarybillheading ">Model:</div>
                                                            <div class="col-6 summarybilldetail">{{$result->model->_value}}</div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                            <div class="col-6 summarybillheading ">Car Condition:</div>
                                                            <div class="col-6 summarybilldetail">{{$result->car_condition}}</div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                            <div class="col-6 summarybillheading ">Car Make:</div>
                                                            <div class="col-6 summarybilldetail">{{$result->carmake->_value}}</div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                            <div class="col-6 summarybillheading ">Car Type:</div>
                                                            <div class="col-6 summarybilldetail">{{$result->cartype->_value}}</div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                            <div class="col-6 summarybillheading ">Color:</div>
                                                            <div class="col-6 summarybilldetail">{{$result->color}}</div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                            <div class="col-6 summarybillheading ">Engine Type:</div>
                                                            <div class="col-6 summarybilldetail">{{$result->enginetype->_value}}</div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                            <div class="col-6 summarybillheading ">Fuel type:</div>
                                                            <div class="col-6 summarybilldetail">{{$result->fuel_type}}</div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>
                                                            <div class="col-6 summarybillheading ">Manifacture:</div>
                                                            <div class="col-6 summarybilldetail">{{$result->brand}}</div>
                                                            <div class="col-12">
                                                                <hr>
                                                            </div>

                                                        </div>
                                                        @endif
                                                    </div>


                                                </div>
                                            </div>

                                        </div>

                                        <div class="col-2 separaterline">
                                            <div class="image">
                                                <img src="{{ config('app.ui_asset_url').'frontend/img/swapPage/swapimage.jpg' }}">

                                            </div>
                                            <div></div>

                                        </div>
                                        <div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 p-0" id="swap_append_class">
                                            <div class="card d-none" id="append_swap" >
                                                <div class="card-header p-0">
                                                    <h3>Audi AUDI A1 Prosmatic 2018</h3>
                                                    <p>Audi A5 2.7 TDI Sport Multitronic 2dr</p>
                                                </div>
                                                <div class="cardimageswap-car">


                                                    <img class="card-img-top mt-0" src="{{asset("/public/crop_images/".$result->crop_image)}}" alt="Card image cap">

                                                </div>
                                                <div class="card-body p-0">
                                                    <div class="row ">
                                                        <div class="col-12 carworth">Your Car Worth</div>
                                                        <div class="col-12">
                                                            <div class="  carspecspric">
                                                                £25,360
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="row summarysection">
                                                        <div class="col-12 summaryheading">
                                                            <i class="fas fa-file-alt"></i>
                                                            Car Summary
                                                        </div>
                                                        <div class="col-6 summarybillheading ">Purchase type:</div>
                                                        <div class="col-6 summarybilldetail">Paypal</div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-6 summarybillheading ">Model:</div>
                                                        <div class="col-6 summarybilldetail">Audi</div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-6 summarybillheading ">Variant:</div>
                                                        <div class="col-6 summarybilldetail">A5</div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-6 summarybillheading ">Trim:</div>
                                                        <div class="col-6 summarybilldetail">Couple (2007-2012) B8</div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-6 summarybillheading ">Derivative:</div>
                                                        <div class="col-6 summarybilldetail">2.7 TDI Sport Couple 2dr </div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-6 summarybillheading ">Body type:</div>
                                                        <div class="col-6 summarybilldetail">Couple</div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-6 summarybillheading ">Transmission:</div>
                                                        <div class="col-6 summarybilldetail">Automatic</div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-6 summarybillheading ">Fuel type:</div>
                                                        <div class="col-6 summarybilldetail">Diesel</div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>
                                                        <div class="col-6 summarybillheading ">Colour:</div>
                                                        <div class="col-6 summarybilldetail">Black</div>
                                                        <div class="col-12">
                                                            <hr>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-6 sold-by-footer-summary offset-6">
                                        <div class="row soldbydiv">
                                            <div class="col-8">
                                                <p>Sold By</p>
                                                <h6 class="m-0">Prada Car Gear</h6>
                                                <h6 class="m-0">(UK Melbourne)</h6>

                                            </div>
                                            <div class="col-4 messge">
                                                <a href="#">

                                                    <img src="{{ config('app.ui_asset_url').'frontend/img/swapPage/msg.png' }}" alt="">
                                                </a>

                                            </div>
                                        </div>

                                    </div>
                                    <form action="{{route("swap_id")}}" method="post" id="swap_id_form">
                                        @csrf
                                        <input type="hidden" name="swap_car" id="get_swap_id" value="">
                                        <input type="hidden" name="swap_list" id="get_swap_lis_id" value="{{$result->id}}">
                                    <div class="form-group row btngrops">
                                        <div class="col-6 col-sm-6 backbtn ">
                                            <button class="btn btn-back"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i> Back</button>
                                        </div>

                                        <div class="col-6 col-sm-6 nextbtn">
                                            <span class="alert m-auto" id="span_err_swap" style="display:none;"></span>
                                            <button class=" btn btn-next d-flex" id="btn-swap-dis">Swap<div class="loader  ml-2" id="swap_loader" style="height: 25px;width: 25px;"></div></button>


                                        </div>

                                    </div>
                                    </form>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12 footernote">
                                            <p> Stuck?<a href="#"> Get help now </a></p>

                                            <p class="m-0"> * Denotes mandatory field</p>
                                            <p class="m-0">* Please note the design and layout of published adverts may differ from the preview. For full details see our Terms & Conditions </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="result" class="container tab-pane fade"><br>
                                <h3>Menu 2</h3>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-lg-12 col-xl-4" style="padding-right: 0;">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6 col-xl-12">
                    <div class="card">
                        <div class="cardimageswap-car">
                            <img class="card-img-top swap_image_right" src="{{asset("/public/crop_images/".$classified->crop_image)}}" alt="Card image cap">

                            <div class="divcard">
                                <p><a href="{{route('frontend-classified-cars')}}"> View more offers</a>
                                    <img src="{{ config('app.ui_asset_url').'frontend/img/swapPage/arrow.png' }}" alt="">

                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 carname">Year:{{$classified->year}} Brand:{{$classified->brand}} </div>
                                <div class="col-12 carspecs">Model:{{$classified->model->_value}},Car Type:{{$classified->cartype->_value}}</div>

                                <div class="col-6 cardiv">
                                    <div class=" carprice ">
                                        <p><span> RPP</span> <del> ${{$classified->price}}</del></p>
                                    </div>
                                    <div class="  carspecspric">
                                        £25,360
                                    </div>
                                    <div class="col-12 p-0 save">
                                        <span style="color: #707070;font-size: 16px;padding-right: 10px;">Save</span>
                                        <div class="saveprice">£280</div>

                                    </div>


                                </div>
                                <div class="col-6 sidecard">
                                  {{$classified->advert_text}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-6 col-xl-12 left-carswap-section">
                    <div class="card">
                        <div class="cardimageswap-car">

                            <img class="card-img-top swap_image_right" src="{{asset("/public/crop_images/".$american_mas->crop_image)}}" alt="Card image cap">

                            <div class="divcard">
                                <p><a href="{{route('frontend-american-muscle')}}"> View more offers</a>
                                    <img src="{{ config('app.ui_asset_url').'frontend/img/swapPage/arrow.png' }}" alt="">

                                </p>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7 subheadind">{{$american_mas->brand}} </div>
                                <div class="col-5 ">
                                    <div class="  carspecspric">
                                     ${{$american_mas->price}}
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row btnsdiv">
                                        <div class="col-6">
                                            <label>Pre Bid Closed</label>
                                            <button class="prebidbtn" href="#">Pre Bid</button>
                                        </div>
                                        <div class="col-6">
                                            <label>Pre Bid Closed</label>
                                            <button class="livbidbtn" href="#">Live Bid</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 lastline">
                                    <p>22 Bids <span>(You're on top)</span></p>

                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



</div>

</div>
</div>

{{--model for login--}}
{{--<div class="modal fade" id="LoginModalSwap" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">--}}
{{--<div class="modal-dialog modal-dialog-centered" role="document">--}}
{{--<div class="modal-content">--}}
{{--<div class="modal-header">--}}
{{--<h5 class="modal-title" id="exampleModalLongTitle">Swap</h5>--}}
{{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--<span aria-hidden="true">&times;</span>--}}
{{--</button>--}}
{{--</div>--}}
{{--<div class="modal-body">--}}
{{--Please login for Swap Services.--}}
{{--</div>--}}
{{--<div class="modal-footer">--}}
{{--<a href="{{route("frontend-home")}}" type="button" class="btn btn-secondary">Close</a>--}}
{{--<a href="{{route("swap-login",["sw"=>"swap"])}}" type="button" class="btn btn-danger">Login</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}


@include('frontend.partials.advertisment-footer')
@include('frontend.partials.footer')
@include('frontend.partials.filters-script')
{{--<script>--}}
{{--$(document).ready(function(e) {--}}
{{--var se = "@if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true) login @endif";--}}
{{--if(se === " login "){--}}


{{--}else{--}}
{{--$('#LoginModalSwap').modal({backdrop: 'static', keyboard: false});--}}
{{--setTimeout(function(){--}}
{{--$('#LoginModalSwap').trigger('focus');--}}
{{--$("#LoginModalSwap").modal("show");--}}
{{--}, 3000);--}}
{{--}--}}


{{--});--}}

{{--</script>--}}
