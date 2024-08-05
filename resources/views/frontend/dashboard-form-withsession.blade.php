<div class="row sellcar">
    <div class="col-12  col-sm-6 col-md-4  registrationnumber" style="position:relative;">
        <label>Registration Number</label>
        <div class="input-group swapinput mb-3">
            <div class="input-group-prepend ">
<span class="input-group-text gbswap image_invalid" id="basic-addon1">
<img src="{{ config('app.ui_asset_url').'frontend/img/swapPage/Group 3414.png' }}" alt="">
GB
</span>
            </div>
            <input id="registernumber" type="text" class="form-control validate0" name="registration_number" placeholder="LL58 LGK" aria-label="Username" aria-describedby="basic-addon1"
                   value="{{ $data->GetVehicleDataResult->VehicleRegistration->VRM}}">
        </div>
        <span id="registration_invalid_message" style="position:absolute;bottom:-26px;"></span>


    </div>

    <div class="col-12 col-sm-6 col-md-4 mileage">

        <label>Mileage </label>
        <input id="mileage" type="number" class="form-control validate0"   name="milage" placeholder="50,000"
               value="{{$data->GetVehicleDataResult->MileageDetails->InputMileage}}">


    </div>
    <div class="col-12  col-sm-6 col-md-4 updatebtndiv">

       <a  id="detail" class="btn btn-update text-white" style="
       display: flex;
       align-items: center;
       justify-content: center;
   ">Get Details <div class="loader"></div></a>


     </div>
    <div class="col-12 matterdiv" style="padding-top:20px;">Please make sure the mileage is accurate. <span>Why this matters?</span></div>
</div>
<div class="col-12 formdiv p-0">

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-6 col-md-6  labelalign">
                    <label for="validationCustom02">*Engine Size :</label>

                </div>
                <div class="col-12 col-sm-6 col-md-6">
                    <input id="enginesize" type="text" class="form-control validate0" name="engine_size"  placeholder="e.g.2698"
                           value="{{ $data->GetVehicleDataResult->VehicleRegistration->EngineCapacity }}">


                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6  labelalign">
                    <label for="validationCustom02">*Engine Type :</label>

                </div>
                <div class="col-12 col-sm-8 col-md-6 ">
                    <select class="form-control validate0" name="engine_type" >
                        <option value="">Select Engine Type</option>
                        @if(!empty($engine_type)&&count($engine_type)!=0)
                            @foreach($engine_type as $t)

                                <option value="{{$t->id}}">{{$t->_value}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

    </div>

    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">*Color :</label>

                </div>
                <div class="col-12 col-sm-8 col-md-6 ">
                    <input type="text" id="color" class="form-control validate0" name="color" value="@if($update)@if($update->color){{$update->color}}@endif @endif {{$data->GetVehicleDataResult->VehicleRegistration->Colour}}">
                    {{--<select class="form-control validate0" name="color" >--}}
                        {{--<option value="">Select Color</option>--}}
                        {{--@if(!empty($colors)&&count($colors)!=0)--}}
                            {{--@foreach($colors as $t)--}}
                                {{--<option id="{{ $t->_value }}" value="{{$t->id}}"--}}
                                        {{--@if($data->GetVehicleDataResult->VehicleRegistration->Colour===$t->_value)--}}
                                    {{--selected--}}

                                {{--@endif--}}

                                {{-->{{$t->_value}}</option>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                    {{--</select>--}}
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">* Interior :</label>

                </div>
                <div class="col-12 col-sm-6">
                    <select class="form-control validate0" name="interior" >
                        <option value="">Select Interior</option>
                        @if(!empty($interior)&&count($interior)!=0)
                            @foreach($interior as $t)
                                <option value="{{$t->id}}"
                                        @if($update)
                                        @if($update->interior)
                                        @if($update->interior==$t->id)
                                        selected

                                    @endif
                                    @endif
                                    @endif
                                >{{$t->_value}}</option>
                            @endforeach
                        @endif
                    </select>

                </div>
            </div>
        </div>


    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6  labelalign">
                    <label for="validationCustom02">* Metallic Paint:</label>

                </div>
                <div class="col-12 col-sm-8 col-md-6">
                    <select class="form-control validate0" name="metallic_paint"  arial-placeholder="e.g No">
                        <option value="">Yes Or NO?</option>
                        <option value="Yes" @if($update)
                        @if($update->metallic_paint)
                        @if($update->metallic_paint==="Yes")
                        selected

                            @endif
                            @endif
                            @endif >Yes</option>
                        <option value="No"
                                @if($update)
                                @if($update->metallic_paint)
                                @if($update->metallic_paint==="No")
                                selected

                            @endif
                            @endif
                            @endif
                        >No</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">*Matt Paint:</label>

                </div>
                <div class="col-12 col-sm-8 col-md-6 ">
                    <select class="form-control validate0" name="matt_paint"  arial-placeholder="e.g No">
                        <option value="">Select Matt Paint</option>
                        @if(!empty($matt_paint)&&count($matt_paint)!=0)
                            @foreach($matt_paint as $t)
                                <option value="{{$t->id}}"
                                        @if($update)
                                        @if($update->matt_paint)
                                        @if($update->matt_paint==$t->id)
                                        selected

                                    @endif
                                    @endif
                                    @endif
                                >{{$t->_value}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02"> *Number Of Doors:</label>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 ">
                    <select class="form-control validate0" name="car_door"  arial-placeholder="e.g No" required>
                        <option value="" selected >Select Doors</option>
                        <option value="2"
                                @if($update)
                                @if($update->car_door)
                                @if($update->car_door=="2")
                                selected

                                @endif
                                @endif
                                @endif
                        >2</option>
                        <option value="3"
                                @if($update)
                                @if($update->car_door)
                                @if($update->car_door=="3")
                                selected

                                @endif
                                @endif
                                @endif
                        >3</option>
                        <option value="4"
                                @if($update)
                                @if($update->car_door)
                                @if($update->car_door=="4")
                                selected

                                @endif
                                @endif
                                @endif
                        >4</option>
                        <option value="5"
                                @if($update)
                                @if($update->car_door)
                                @if($update->car_door=="5")
                                selected

                                @endif
                                @endif
                                @endif
                        >5</option>
                    </select>

                </div>

            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02"> *Safety Rating :</label>
                </div>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 ">
                    <select class="form-control validate0" name="saftey_rating"  arial-placeholder="e.g No" required>
                        <option value="" selected >Select One</option>
                        <option value="1" @if($update)
                        @if($update->safety_rating)
                        @if($update->safety_rating==="1")
                        selected

                                @endif
                                @endif
                                @endif >1</option>
                        <option value="2"
                                @if($update)
                                @if($update->safety_rating)
                                @if($update->safety_rating==="2")
                                selected

                                @endif
                                @endif
                                @endif
                        >2</option>
                        <option value="3"
                                @if($update)
                                @if($update->safety_rating)
                                @if($update->safety_rating==="3")
                                selected

                                @endif
                                @endif
                                @endif
                        >3</option>
                        <option value="4"
                                @if($update)
                                @if($update->safety_rating)
                                @if($update->safety_rating==="4")
                                selected

                                @endif
                                @endif
                                @endif
                        >4</option>
                        <option value="5"
                                @if($update)
                                @if($update->safety_rating)
                                @if($update->safety_rating==="5")
                                selected

                                @endif
                                @endif
                                @endif
                        >5</option>
                    </select>

                </div>

            </div>
        </div>

    </div>

    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02">Model:</label>

                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="form-row">
                <div class="col-12  ">
                    <select class="form-control validate1" name="modal" >
                        <option value="">Select Model:</option>
                        @if(!empty($modal)&&count($modal)!=0)
                            @foreach($modal as $t)
                                @php
                                    $val=str_replace(' ','',$t->_value);
                                @endphp
                                <option id="{{$val}}" value="{{$t->id}}"

                                        @if($data->GetVehicleDataResult->VehicleRegistration->Model===$t->_value)
                                        selected

                                        @endif
                                >{{$t->_value}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

            </div>
        </div>

    </div>


    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02">*Manufacture:</label>
                </div>
            </div>
        </div>
        <div class="col-md-9 mb-3">
            @php
                $brand=App\Brand::all();
            @endphp
            <div class="form-row">
                <div class="col-12">
                    <select class="form-control validate0" name="brand" >
                        <option value="">Select Manufacture:</option>
                        @if(!empty($brand)&&count($brand)!=0)
                            @foreach($brand as $t)
                                @php
                                    $val=str_replace(' ','',$t->name);
                                @endphp
                                <option id="{{$val}}" value="{{$t->name}}"
                                        @if($data->GetVehicleDataResult->VehicleRegistration->Make===$t->name)
                                        selected

                                        @endif
                                >{{$t->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

            </div>
        </div>

    </div>


    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02"> * Car Type:</label>

                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="form-row">
                <div class="col-12 colorinput ">
                    <select class="form-control validate0" name="car_type" >
                        <option value="">Select Car type</option>
                        @if(!empty($car_type)&&count($car_type)!=0)
                            @foreach($car_type as $t)
                                <option value="{{$t->id}}"
                                        @if($update)
                                        @if($update->car_type)
                                        @if($update->car_type==$t->id)
                                        selected

                                        @endif
                                        @endif
                                        @endif
                                        @if($data->GetVehicleDataResult->MCIAMotorcycleData->VehicleType===$t->name)
                                        selected

                                        @endif
                                >{{$t->_value}}</option>
                            @endforeach
                        @endif
                    </select>

                </div>

            </div>
        </div>

    </div>

    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02"> * Year:</label>

                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="form-row">
                <div class="col-12  ">
                    <select class="form-control validate0" name="year" id="year_mani">
                        <option value="1999"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="1999")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===1999)
                                selected

                                @endif
                        >1999</option>
                        <option value="2000"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2000")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2000)
                                selected

                                @endif

                        >2000</option>
                        <option value="2001"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2001")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2001)
                                selected

                                @endif

                        >2001</option>
                        <option value="2002"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2000")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2002)
                                selected

                                @endif

                        >2002</option>
                        <option value="2003"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2003")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2003)
                                selected

                                @endif
                        >2003</option>
                        <option value="2004"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2004")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2004)
                                selected

                                @endif
                        >2004</option>
                        <option value="2005"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2005")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2005)
                                selected

                                @endif
                        >2005</option>
                        <option value="2006"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2006")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2006)
                                selected

                                @endif
                        >2006</option>
                        <option value="2007"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2007")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2007)
                                selected

                                @endif
                        >2007</option>
                        <option value="2008"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2008")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2008)
                                selected

                                @endif
                        >2008</option>
                        <option value="2009"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2009")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2009)
                                selected

                                @endif
                        >2009</option>
                        <option value="2010"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2010")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2010)
                                selected

                                @endif
                        >2010</option>
                        <option value="2011"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2011")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2011)
                                selected

                                @endif
                        >2011</option>
                        <option value="2012"
                                @if($update)
                                @if($update->year)
                                @if($update->year==="2012")
                                selected

                                @endif
                                @endif
                                @endif
                                @if($data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture===2012)
                                selected

                                @endif
                        >2012</option>
                    </select>

                </div>

            </div>
        </div>

    </div>


    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02"> Safety Rating Info <span>(Optional)</span>:</label>

                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="form-row">
                <div class="col-12 ">
                    <textarea class="form-control" name="saftey_rating_info"  rows="3"  value="@if($update)@if($update->safety_rating_info){{$update->safety_rating_info}}@endif @endif"> @if($update)@if($update->safety_rating_info){{$update->safety_rating_info	}}@endif @endif</textarea>
                </div>

            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02"> BHP <span>(Optional)</span>:</label>

                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="form-row">
                <div class="col-12 ">
                    <textarea class="form-control" id='bhp' name="bhp"  rows="1" value="@if($update)@if($update->bhp){{$update->bhp}}@endif @endif"> @if($update)@if($update->bhp){{$update->bhp}}@endif @endif</textarea>
                </div>

            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">* Warranty</label>

                </div>
                <div class="col-12 col-sm-8 col-md-6">
                    <select class="form-control validate0" name="warranty"  arial-placeholder="e.g No">
                        <option value="">Yes Or NO?</option>
                        <option value="Yes" @if($update)
                        @if($update->warranty)
                        @if($update->warranty==="Yes")
                        selected

                            @endif
                            @endif
                            @endif >Yes</option>
                        <option value="No"
                                @if($update)
                                @if($update->warranty)
                                @if($update->warranty==="No")
                                selected

                            @endif
                            @endif
                            @endif
                        >No</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">* Drivers Position:</label>

                </div>
                <div class="col-8 col-sm-8 col-md-6 ">
                    <select class="form-control validate0" name="driver_position"  arial-placeholder="e.g No">
                        <option value="Left" @if($update)
                        @if($update->drivers_position)
                        @if($update->drivers_position==="Left")
                        selected

                            @endif
                            @endif
                            @endif >Left</option>
                        <option value="Middle Handed"
                                @if($update)
                                @if($update->drivers_position)
                                @if($update->metallic_paint==="Middle")
                                selected

                                @endif
                                @endif
                                @endif
                        >Center</option>
                        <option value="Right Handed"
                                @if($update)
                                @if($update->drivers_position)
                                @if($update->metallic_paint==="Right")
                                selected

                            @endif
                            @endif
                            @endif
                        >Right</option>

                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">* Wheel Size <span>Optional</span></label>

                </div>
                <div class="col-12 col-sm-8 col-md-6">
                    <input type="text" class="form-control" name="wheel_size"  placeholder="e.g 4x4" value="@if($update)@if($update->wheel_size){{$update->wheel_size}}@endif @endif">
                    {{--<select class="form-control" name="wheel_size"  arial-placeholder="e.g No">--}}
                        {{--<option value="">Select Wheel Size</option>--}}
                        {{--@if(!empty($wheel_size)&&count($wheel_size)!=0)--}}
                            {{--@foreach($wheel_size as $t)--}}
                                {{--<option value="{{$t->id}}"--}}
                                        {{--@if($update)--}}
                                        {{--@if($update->wheel_size)--}}
                                        {{--@if($update->wheel_size==$t->id)--}}
                                        {{--selected--}}

                                    {{--@endif--}}
                                    {{--@endif--}}
                                    {{--@endif--}}
                                {{-->{{$t->_value}}</option>--}}
                            {{--@endforeach--}}
                        {{--@endif--}}
                    {{--</select>--}}
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6  labelalign">
                    <label for="validationCustom02">* Alloy wheels:</label>

                </div>
                <div class="col-12 col-sm-8 col-md-6 ">
                    <select class="form-control validate0" name="alloy_wheel"  arial-placeholder="e.g No">
                        <option value="">Yes Or NO?</option>
                        <option value="Yes" @if($update)
                        @if($update->alloy_wheel)
                        @if($update->alloy_wheel==="Yes")
                        selected

                            @endif
                            @endif
                            @endif >Yes</option>
                        <option value="No"
                                @if($update)
                                @if($update->alloy_wheel)
                                @if($update->alloy_wheel==="No")
                                selected

                            @endif
                            @endif
                            @endif
                        >
                            NO </option>

                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02">*Add Features<img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/Component 27 – 52.png' }}" alt="">:</label>

                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="form-row">
                <div class="col-12 infoinput">
                    <p>Select your car's Features here, be as specific as you can as this will help buyers
                        to find your car</p>
                    <div class="row">
                        <div class="col-12 labelalign">
                            <select class="form-control newmodalopen "  arial-placeholder="e.g No">
                                <option  selected disabled>Add Features</option>
                                <option  value="yes">Add Features</option>
                                <option value="no">Remove Features</option>
                            </select>

                        </div>
                    </div>
                    <div id="append_ul"></div>
                    {{-- <div class="addorremove">
                        <p class="btn" data-toggle="modal" data-target=".addfeatureModal"><span><img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/Component 26 – 71.png' }}" alt=""></span> Add / Remove Features</p>
                    </div> --}}

                </div>

            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02">*Part Exchange:</label>

                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="form-row">
                <div class="col-12 ">
                    <select class="form-control validate0" name="part_exchange"  arial-placeholder="e.g No">
                        <option value="">Yes Or NO?</option>
                        <option value="Yes" @if($update)
                        @if($update->part_exchange)
                        @if($update->part_exchange==="Yes")
                        selected

                            @endif
                            @endif
                            @endif >Yes</option>
                        <option value="No"
                                @if($update)
                                @if($update->part_exchange)
                                @if($update->part_exchange==="No")
                                selected

                            @endif
                            @endif
                            @endif
                        > No </option>
                    </select>


                </div>

            </div>
        </div>

    </div>

    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02"> 0 to 60MPH <span>(Optional)</span>:</label>

                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="form-row">
                <div class="col-12 ">

                    <input type="text" name="speed" id="speed" class="form-control" placeholder="e.g 0 to 60" value="@if($update)
                    @if($update->speed)
                    {{$update->speed}}
                    @endif
                    @endif">

                    {{--<select class="form-control" name="speed"  arial-placeholder="e.g No">--}}

                        {{--<option value="">Yes Or NO?</option>--}}
                        {{--<option value="Yes" @if($update)--}}
                        {{--@if($update-> )--}}
                        {{--@if($update->speed==="Yes")--}}
                        {{--selected--}}

                            {{--@endif--}}
                            {{--@endif--}}
                            {{--@endif >Yes</option>--}}
                        {{--<option value="No"--}}
                                {{--@if($update)--}}
                                {{--@if($update->speed)--}}
                                {{--@if($update->speed==="No")--}}
                                {{--selected--}}

                            {{--@endif--}}
                            {{--@endif--}}
                            {{--@endif--}}
                        {{-->NO</option>--}}
                    {{--</select>--}}


                </div>

            </div>
        </div>

    </div>

    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02"> Top Speed <span>(Optional)</span>:</label>

                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="form-row">
                <div class="col-12 ">
                    <input class="form-control" name="top_speed" id="top_speed" type="text" placeholder="e.g 100" value="@if($update)@if($update->top_speed)
                    {{$update->top_speed}}
                    @endif
                    @endif">
                    {{--<select class="form-control" name="top_speed"  arial-placeholder="e.g No">--}}
                        {{--<option value="">Yes Or NO?</option>--}}
                        {{--<option value="Yes" @if($update)--}}
                        {{--@if($update->top_speed)--}}
                        {{--@if($update->top_speed==="Yes")--}}
                        {{--selected--}}

                            {{--@endif--}}
                            {{--@endif--}}
                            {{--@endif >Yes</option>--}}
                        {{--<option value="No"--}}
                                {{--@if($update)--}}
                                {{--@if($update->top_speed)--}}
                                {{--@if($update->top_speed==="No")--}}
                                {{--selected--}}

                            {{--@endif--}}
                            {{--@endif--}}
                            {{--@endif--}}
                        {{-->No</option>--}}
                    {{--</select>--}}


                </div>

            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-12 col-md-6 labelalign">
                    <label for="validationCustom02">Driver wheels<span>(Optional)</span>: </label>

                </div>
                <div class="col-12 col-sm-12 col-md-6">
                    <select class="form-control" name="driven_wheel"  arial-placeholder="e.g No">
                        <option value="" disabled>Select Wheels</option>
                        <option value="Front" @if($update)
                        @if($update->driven_wheels)
                        @if($update->driven_wheels==="Front")
                        selected

                                @endif
                                @endif
                                @endif >Front</option>
                        <option value="Rear"
                                @if($update)
                                @if($update->driven_wheels)
                                @if($update->driven_wheels==="Rear")
                                selected

                                @endif
                                @endif
                                @endif
                        >Rear</option>
                        <option value="4X4 All wheel Drive"
                                @if($update)
                                @if($update->driven_wheels)
                                @if($update->driven_wheels==="4X4 All wheel Drive")
                                selected

                                @endif
                                @endif
                                @endif
                        >4X4 All wheel Drive</option>
                    </select>

                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">*Import :</label>

                </div>
                <div class="col-12 col-sm-8 col-md-6">
                    <select class="form-control validate0" name="import" >
                        <option value="" >Yes/NO?</option>
                        @if(!empty($import)&&count($import)!=0)
                            @foreach($import as $t)
                                <option value="{{$t->id}}"
                                        @if($update)
                                        @if($update->import)
                                        @if($update->import==$t->id)
                                        selected

                                    @endif
                                    @endif
                                    @endif
                                >{{$t->_value}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-3 mb-3">
            <div class="form-row">
                <div class="col-12 labelalign">
                    <label for="validationCustom02">* MOT Expiry date: </label>

                </div>

            </div>
        </div>
        <div class="col-md-9 mb-3">
            <div class="form-row">
                <div class="col-12 ">
                    <input type="text" class="form-control validate0" name="mot" id="datepicker"  placeholder="e.g. 1-2-2016"value="@if($update)@if($update->mot_expiry_date){{$update->mot_expiry_date}}@endif @endif" required>


                </div>

            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">*Service history: </label>

                </div>
                <div class="col-12 col-sm-8 col-md-6">
                    <select class="form-control validate0" name="service_history" >
                        <option value="">Select Service History</option>
                        @if(!empty($service_history)&&count($service_history)!=0)
                            @foreach($service_history as $t)
                                <option value="{{$t->id}}"
                                        @if($update)
                                        @if($update->service_history)
                                        @if($update->service_history==$t->id)
                                        selected

                                    @endif
                                    @endif
                                    @endif
                                >{{$t->_value}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">* Boot spoiler:
                    </label>

                </div>
                <div class="col-12 col-sm-8 col-md-6 ">
                    <select class="form-control validate0" name="boot_spoiler" >
                        <option value="">Select Boot Spoiler</option>
                        @if(!empty($boot_spoiler)&&count($boot_spoiler)!=0)
                            @foreach($boot_spoiler as $t)
                                <option value="{{$t->id}}"
                                        @if($update)
                                        @if($update->boot_spoiler)
                                        @if($update->boot_spoiler==$t->id)
                                        selected

                                    @endif
                                    @endif
                                    @endif
                                >{{$t->_value}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

    </div>
    <div class="form-row">
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">* Parking Sensor: </label>

                </div>
                <div class="col-12 col-sm-8 col-md-6">
                    <select class="form-control validate0" name="parking_sensor" >
                        <option value="">Select Parking Sensor</option>
                        @if(!empty($parking_sensor)&&count($parking_sensor)!=0)
                            @foreach($parking_sensor as $t)
                                <option value="{{$t->id}}"
                                        @if($update)
                                        @if($update->parking_sensor)
                                        @if($update->parking_sensor==$t->id)
                                        selected

                                    @endif
                                    @endif
                                    @endif
                                >{{$t->_value}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="form-row">
                <div class="col-12 col-sm-4 col-md-6 labelalign">
                    <label for="validationCustom02">* Exhaust:</label>

                </div>

                <div class="col-12 col-sm-8 col-md-6 ">
                    <select class="form-control validate0" name="exhaust" >
                        <option value="">Select Exhaust</option>
                        @if(!empty($exhaust)&&count($exhaust)!=0)
                            @foreach($exhaust as $t)
                                <option value="{{$t->id}}"
                                        @if($update)
                                        @if($update->exhaust)
                                        @if($update->exhaust==$t->id)
                                        selected

                                    @endif
                                    @endif
                                    @endif
                                >{{$t->_value}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="col-12">
<div class="form-group row">
    <div class="col-6 col-sm-6 backbtn ">
        <a class="btn btn-back"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i> Back</a>
    </div>
    <div class="col-6 col-sm-6 nextbtn">
        <a class=" btn btn-next" id="carsellarnext0">Next</a>


    </div>
</div>

</div>

</div>

</div>
<div id="first-next-section">
<div class="row sellurcarnextsection 1">
<div class="col-12" id="salenextPage">
<div class="row">
<div class="col-12 tabshowing">
    <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">


    <div class="col-12 formdiv">

        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02"> Title:</label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-6">
                        <input type="text" class="form-control validate1" name="title" value="@if($update)@if($update->title){{$update->title}}@endif @endif"  required>
                    </div>


                </div>
            </div>

        </div>


        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02"> * Variant:</label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12 colorinput ">
                        <select class="form-control validate1" name="variant">
                            <option value="">Select Variant</option>
                            @if(!empty($variant)&&count($variant)!=0)
                                @foreach($variant as $t)
                                    <option value="{{$t->id}}"
                                            @if($update)
                                            @if($update->variant)
                                            @if($update->variant==$t->id)
                                            selected

                                        @endif
                                        @endif
                                        @endif
                                    >{{$t->_value}}</option>
                                @endforeach
                            @endif
                        </select>

                    </div>

                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02"> * Car Make:</label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12  ">
                        <select class="form-control validate1" name="car_make" >
                            <option value="">Select Car Make</option>
                            @if(!empty($car_make)&&count($car_make)!=0)
                                @foreach($car_make as $t)
                                    <option value="{{$t->id}}"
                                            @if($update)
                                            @if($update->car_make)
                                            @if($update->car_make==$t->id)
                                            selected

                                        @endif
                                        @endif
                                        @endif
                                    >{{$t->_value}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                </div>
            </div>

        </div>

        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02"> * Post Code:</label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12">
                        @php $s =  Session::get('userDetails')['PostalCode'];
                        @endphp
                        @if(!empty($s))
                            <input type="text" class="form-control validate1"  value="{{$s}}" disabled>
                            <input type="hidden" name="post_code" value="{{$s}}">
                        @else
                            <input type="text" class="form-control validate1" name="post_code" placeholder="Enter Post Code" required>
                        @endif
                        {{--<input type="text" class="form-control validate1" name="post_code" value="@if($update)@if($update->post_code){{$update->post_code}}@endif @endif" required>--}}

                    </div>

                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02"> * Body Type:</label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12 colorinputType ">
                        <select class="form-control validate1" name="body_type" >
                            <option value="">Select Body type</option>
                            @if(!empty($body_type)&&count($body_type)!=0)
                                @foreach($body_type as $t)
                                    <option value="{{$t->id}}"

                                            @if($update)
                                            @if($update->body_type)
                                            @if($update->body_type==$t->id)
                                            selected

                                        @endif
                                        @endif
                                        @endif
                                    >{{$t->_value}}</option>
                                @endforeach
                            @endif
                        </select>


                    </div>

                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02"> * Transmission:</label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12 colorinputType ">
                        <select class="form-control validate1" name="transmission" >
                            <option value="">Select Transmission</option>
                            <option value="Mannual"   @if($update)
                            @if($update->transmission)
                            @if($update->transmission==="Mannual")
                            selected

                                @endif
                                @endif
                                @endif>Mannual</option>
                            <option value="Automatic"
                                    @if($update)
                                    @if($update->transmission)
                                    @if($update->transmission==="Automatic")
                                    selected

                                @endif
                                @endif
                                @endif
                            >Automatic</option>

                        </select>


                    </div>

                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02"> * Fuel Type:</label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12 colorinputType ">
                        <select class="form-control validate1" name="fuel_type" >
                            <option value="">Select Fuel Type</option>
                            <option id="DIESEL" value="DIESEL"
                                 @if($data->GetVehicleDataResult->VehicleRegistration->Fuel=== "DIESEL")
                                selected
                                 @endif
                            >Diesel</option>
                            <option value="PETROL"
                                   @if($data->GetVehicleDataResult->VehicleRegistration->Fuel=== "PETROL")
                                selected
                                 @endif
                            >Petrol</option>

                        </select>


                    </div>

                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02"> * Condition:</label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12 colorinput ">
                        <select class="form-control validate1" name="condition" >
                            <option value="">Select Condition</option>
                            <option value="New"
                                    @if($update)
                                    @if($update->condition)
                                    @if($update->condition==="New")
                                    selected

                                    @endif
                                    @endif
                                    @endif
                            >New</option>
                            <option value="Used"
                                    @if($update)
                                    @if($update->condition)
                                    @if($update->condition==="Used")
                                    selected

                                @endif
                                @endif
                                @endif
                            >Used</option>
           </select>

                    </div>

                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02"> Advert Text : <img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/Component 27 – 52.png' }}" alt=""></label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12  text-area">
                        <textarea class="form-control validate1" name="advert_type" id="advert_t"  rows="3" @if($update)@if($update->advert_text)value="{{$update->advert_text}}"@endif

                       @endif> @if($update)@if($update->advert_text){{$update->advert_text}}@endif @endif</textarea>
                    </div>

                </div>
            </div>

        </div>


    </div>
</div>


</div>
</div>
</div>
<div class="row sellurcarnextsection 2 ">
<div class="col-12" id="salenextPage">
<div class="row">
<div class="col-12 tabshowing">
    <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">
    <div class="col-12">
        <div class="row sellcar">
            <div class="col-8 col-sm-8 col-md-5 advertisementHeading">
                <img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/checkmark.png' }}" alt="">
                What's your asking price?
            </div>
            <div class="col-4 col-sm-4 col-md-7">
                <hr>
            </div>

        </div>

    </div>
    <div class="col-12 formdiv">

        <div class="form-row">
            <div class="col-12 pricedescription">
                We've crunched the numbers for you<br>
                <span>
Our recommended selling price* is:
</span>
            </div>
            <div class="col-12 bestprice">
                *Best Price
            </div>
            <div class="col-col-12 col-sm-5">
                <div class="input-group priceaddbtn">
                    <div class="input-group-prepend" style="width: inherit;>
<span class="input-group-text">
<img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/shopping.png' }}" alt="">
</span>
                        @if($update)
                            @if($update->price)
                                @php $price=(int) $update->price @endphp
                            @endif
                        @else
                            @php $price="" @endphp
                        @endif
                        <input type="number" class="validate1 new-price-for-car" name="price" id="number" placeholder="0" value="{{$price}}" min="0">

                                            </div>

                                        </div>

                        <div class="input-group priceaddbtn" style="width:100%;">
                              <button id="plus">+</button>
                              <button id="minus">-</button>
                            </div>






            </div>
            <div class="col-12 bestprice">
                Based on our valuation of £6,360.<img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/Component 27 – 52.png' }}">
            </div>
            <div class="col-12 addedvalue">
                * We've added some wiggle room for you.<br>
                See our:<a href="#">Advertisement prices</a>
            </div>




        </div>

    </div>
    <div class="col-12">
        <div class="form-group row">
            <div class="col-6 col-sm-6  backbtn ">
                <a class="btn btn-back" id="previousbtnTo0"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="col-6 col-sm-6 nextbtn">
                <a class=" btn btn-next" id="carsellarnext1">Next</a>


            </div>
        </div>

    </div>
</div>


</div>
</div>


</div>

</div>



<div id="second-next-section">
<div class="row sellurcarnextsection 1">
<div class="col-12" id="salenextPage">
<div class="row">
<div class="col-12 tabshowing">
    <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">

    <div class="col-12 formdiv">

        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02">Select Category
                            for <img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/Component 27 – 52.png' }}" alt=""></label>

                    </div>

                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="form-row">
                    <div class="col-12 checkboxdiv">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="radio custom-control-input" id="customCheck1" name="availibilty[]" value="Car"
                                   @if($update)
                                   @if($update->car_availbilty)
                                   @if($update->car_availbilty==="Car")
                                   checked

                                   @endif
                                   @endif
                                   @endif
                                   >
                            <label class="custom-control-label " for="customCheck1">Car</label>
                        </div>
                 <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="radio custom-control-input" id="customCheck3" name="availibilty[]" value="Bike"
                                   @if($update)
                                   @if($update->car_availbilty)
                                   @if($update->car_availbilty==="Bike")
                                   checked
                                    @endif
                                    @endif
                                    @endif>
                            <label class="custom-control-label " for="customCheck3">Bike</label>
                        </div>
                        {{--<div class="custom-control custom-checkbox">--}}
                            {{--<input type="checkbox" class="radio custom-control-input" id="customCheck4" name="availibilty[]" value="Swap"--}}
                                   {{--@if($update)--}}
                                   {{--@if($update->car_availbilty)--}}
                                   {{--@if($update->car_availbilty==="Swap")--}}
                                   {{--checked--}}

                                {{--@endif--}}
                                {{--@endif--}}
                                {{--@endif--}}
                            {{-->--}}
                            {{--<label class="custom-control-label " for="customCheck4">Swap</label>--}}
                        {{--</div>--}}
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>


</div>
</div>
</div>
<div class="row sellurcarnextsection 2 ">
<div class="col-12" id="salenextPage">
<div class="row">
<div class="col-12 tabshowing">
    <img class="badge" src="{{ config('app.ui_asset_url').'frontend/img/carselling/badge.png' }}">
    <div class="col-12">
        <div class="row sellcar">
            <div class="col-4 advertisementHeading">
                <img src="{{ config('app.ui_asset_url').'frontend/img/carseelingtabs/checkmark.png' }}" alt="">
                Photos of Cars
            </div>
            <div class="col-8">
                <hr>
            </div>

        </div>

    </div>
    <div class="col-12 formdiv">

        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02">Photos:</label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12 audimodel">
                        <p><input type="file" id="filemy" class="validate2" name="pic[]"  style="display: none;" accept="image/*" multiple></p>
                        <p><label class="addphoto" for="filemy" style="cursor: pointer;"> <i class="fa fa-camera"></i> Add Photo</label></p>
                        <p class="imageborder">
                            <input type="hidden" name="c_status" value="0" id="c_status">
                            @if($update)
                                @if($update->pic_url)
                                   @php $pics=json_decode($update->pic_url) @endphp
                                      @if(!empty($pics))
                                          @for($i=0;$i<3;$i++)
                                              <img id="output{{$i+1}}" @if(isset($pics[$i])) src='../../../storage/app/public/{{$pics[$i]}}' @endif />

                                            @endfor
                                          @endif
                                          @endif
                            @else
                                <img id="output1" />
                                <img id="output2" />
                                <img id="output3" />
                                @endif
                            <div id="image-preview" style="display: none"></div>

                        </p>

                    </div>

                </div>
            </div>

        </div>
        <div class="form-row">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02">Video:</label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12 audimodel">
                        <p><input type="file" id="video-upload" name="video" class="validate2"   style="display: none;" accept="video/*" ></p>
                        <p><label class="addphoto" for="video-upload" style="cursor: pointer;"> <i class="fa fa-video-camera"></i> Add Video</label></p>
                        <p class="imageborder" id="videos_err" style="display: none">

                            @if($update)
                                @if($update->video_url)
                                    <video id="video1" src='../../../storage/app/public/{{$update->video_url}}' controls height="300" width="100%"  />
                                @endif
                            @else
                                <video id="video1" controls height="300" width="100%"/>

                                @endif
                            <div id="video-preview"></div>

                        </p>

                    </div>

                </div>
            </div>

        </div>

    </div>
    <div class="col-12">
        <div class="form-group row">
            <div class="col-sm-8 backbtn ">
                <a class="btn btn-back" id="previousbtnTo1"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i> Back</a>
            </div>
            <div class="col-sm-4 nextbtn">
                <button class=" btn btn-next" id="place_d" type="submit" name="submit" value="submit">Place Your Advertise <div class="loader"></div></button>



            </div>
        </div>

    </div>
</div>


</div>
</div>

<span id="status" style="color:red;font-size:16px;"></span>
</div>




</div>
