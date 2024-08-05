@include('frontend.partials.header')
<style>
    .hide-login{
        display: none!important;
    }
    .show-register{
        display: block!important;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-12  col-md-6 col-lg-5 offset-1  m-auto">
            <div class="row m-0">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                {{--@php $package_id=0;@endphp--}}
                {{--@if(isset($id)  && is_numeric($id))--}}

                {{--<div class="row shadow-lg p-3  bg-white rounded m-auto" style="margin-top: 40px!important;">--}}
                    {{--<div class="col-12 selectedpckg p-0"> </div>--}}
                    {{--@if($package)--}}
                    {{--@php $package_id=$package->id;--}}
                    {{--@endphp--}}
                  {{--@php $json= json_decode($package->attributes)@endphp--}}

                  {{--@if($json->images_per_post <=4)--}}
                   {{--@php $value="Basic";@endphp--}}
                   {{--@else--}}
                   {{--@php $value="Standard"; @endphp--}}
                   {{--@endif--}}
                    {{--<div class="col-12 mypackage-description">{{$value}} </div>--}}
                     {{--<div class="col-12 moneyDetailmypackage">£{{number_format($package->price, 2)}} <span>per month</span></div>--}}
                    {{--<div class="col-12">--}}
                        {{--<div class="row mypackage-detail">--}}
                            {{--<div class="col-12 mypackage-price">Price: £{{number_format($package->price, 2)}} </div>--}}
                            {{--<div class="col-12 mypackage-hr">--}}
                                {{--<hr>--}}
                            {{--</div>--}}
                            {{--<div class="col-12 mypackage-price">Limit: Month</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--@endif--}}
                {{--@endif--}}

                <div class="col-12 p-0">
                    <div class="formheading new-form-heading">

                        Register<br> &<br>
                        <span>
                            Hunt A Wheel
                        </span>
                    </div>
                </div>
                    @if(!empty($id) && $id == "register")
                        @php $class = "hide-login" @endphp
                        @else
                        @php $class = "" @endphp
                        @endif
                <div id="signin" class="register new-register-form {{$class}}" style="{{session()->has('registerError') ? 'display: none;' : 'display: block;'}}">
                    <form action="{{route('user-login-submit')}}" method="post" class="login_f">
                        @csrf
                        <input type="hidden" name="garage_input" @if(!empty($gr)) value="{{$gr}}" @endif>
                        <input type="hidden" name="swap_input" @if(!empty($sw)) value="{{$sw}}" @endif>
                        <input type="hidden" name="swap_id" @if(!empty($swap_id)) value="{{$swap_id}}" @endif>
                        <input type="hidden" name="blog_id" @if(!empty($bg)) value="{{$bg}}" @endif>
                        <input type="hidden" name="like_login" @if(!empty($id) && $id == "favourite")value="{{$id}}"@endif>
                        <div class="col-12 input-button">
                            <div class=" input-group mb-3" style="flex-wrap:unset!important">
                                <div class="input-group-prepend">
                                    <span class="input-group-text red-border-input" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/message.png' }}" alt=""></span>
                                </div>
                                <input id="login-email" type="tel" name="phone" class="login-email1 form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') ? old('phone') : '+92' }}" required autocomplete="off"
                                  placeholder="Enter Your Phone no" aria-label="Username" aria-describedby="basic-addon1">
                                @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
{{--<input type="hidden" name="package_id" value="{{$package_id}}">--}}
                        <div class="col-12 input-button">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text red-border-input" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/password.png' }}" alt=""></span>
                                </div>
                                <!-- id="password-field" -->
                                <input min="8" max="20" id="login-password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1"
                                  name="password" required autocomplete="current-password" value="{{ old('password') ? old('password') : '' }}">
                                 <!--  <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->

                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif

                            </div>

                        </div>
                     <div class="col-12" >
                         <input type="checkbox" id="show-pass" onclick="myFunction()" class=" mt-2">
                         <label for="show-pass" style="font-size: 14px;color:#00c29f;">Show Password</label>
                         <div class="col-6" style="justify-content: right;display: inline-grid;padding-right: 0px;float: right">
                         <a href="{{url("/recover/account")}}" style="font-size: 14px;color:#00c29f;margin-top:0.3rem">Forgotten Password?</a>
                         </div>
                     </div>
                     <div class="col-12"><span id="login-form-validation"></span></div>
                        <div class="col-12">
                            <button class="btn signinbutton" id="login-form" style="display: flex;align-items: center;justify-content: center;"> Sign In <div class="loader"></div></button>
                        </div>
                        <div class="col-12">
                            <a id="registerNow" class="btn registernow"> Register Now</a>
                        </div>

                    </form>
                </div>
                    @if(!empty($id) && $id=="register")
                        @php $class = "show-register" @endphp
                    @else
                        @php $class = "" @endphp
                    @endif
                <div id="register" class="register" style="{{session()->has('registerError') ? 'display: block;' : 'display: none;'}}">
                    <form action="{{route('user-register-submit')}}" method="post" class="user-registration">
                        @csrf
                      <input type="hidden" id="vrf_number">
                        <input type="hidden" name="like_login" @if(!empty($id) && $id == "favourite")value="{{$id}}"@endif>
                        <div class="col-12 input-button">
                            <div class="input-group mb-3" style="flex-wrap:unset!important">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-red-border-span" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/message.png' }}" alt=""></span>
                                </div>
                                <input id="phone-number" type="tel" name="phone" class="red-border-reg form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') ? old('phone') : '' }}" required autocomplete="off" readonly
                                  placeholder="Enter Your Phone" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-12 input-button">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-red-border-span" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/message.png' }}" alt=""></span>
                                </div>
                                <input id="email" type="email" name="email" class="red-border-reg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') ? old('email') : '' }}" required autocomplete="email"
                                  placeholder="Enter Your Email" aria-label="Username" aria-describedby="basic-addon1" auto>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        {{--<input type="hidden" name="package_id" value="{{$package_id}}">--}}
                        <div class="col-12 input-button">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-red-border-span span-boorder" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/password.png' }}" alt=""></span>
                                </div>
                                <input min="8" max="20" id="password0" type="password" class="red-border-reg form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Passsword" aria-label="Username"
                                  aria-describedby="basic-addon1" name="password" required autocomplete="current-password" value="{{ old('password') ? old('password') : '' }}">
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <span id="password-valid"></span>
                        </div>
                        <div class="col-12 input-button">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-red-border-span red-span-red" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/password.png' }}" alt=""></span>
                                </div>
                                <input min="8" max="20" id="password1" type="password" class="red-border-reg form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirm Password" aria-label="Username"
                                  aria-describedby="basic-addon1" name="password_confirmation" required autocomplete="current-password" value="{{ old('password_confirmation') ? old('password_confirmation') : '' }}">
                                @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                            <span id="confirm"></span>
                            <span id="valdid"></span>
                        </div>
                        <div class="col-12">
                          <div class="custom-control custom-checkbox temrsandconditioncheck" >
                              <input type="checkbox" class="radio custom-control-input" id="termsandcondcheck"  name="availibilty[]" value="Sell">
                              <label class="custom-control-label tcCHeck" for="termsandcondcheck">I've read the <a href="{{url('/privacy-policy')}}">Terms and Conditions</a></label>
                          </div>


                        </div>
                        <div class="col-12">
                            <button class="btn signinbutton" id="registerBTN" style="display: flex;align-items: center;justify-content: center;"disabled> Register Now <div class="loader"></div></button>
{{--                            <a id="signinbutton" class="btn registernow"> Sign In</a>--}}
                        </div>

                    </form>
                </div>
                    <div id="phone-section" class="register {{$class}}" style="{{session()->has('registerError') ? 'display: block;' : 'display: none;'}}">
                        <form action="{{route('user-register-phone')}}" id="check_p" method="post">
                            @csrf
                            <input type="hidden" name="like_login" @if(!empty($id) && $id == "favourite")value="{{$id}}"@endif>
                            <div class="col-12 input-button">
                                <div class="input-group mb-3" style="flex-wrap:unset!important">
                                    <div class="input-group-prepend" style="flex-wrap:unset!important">
                                        <span class="input-group-text input-red-border-span" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/message.png' }}" alt=""></span>
                                    </div>
                                    <input id="phone" type="tel" name="phone"  class="login-email red-border-reg form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') ? old('email') : '+92' }}" required autocomplete="off"
                                           placeholder="Phone Number" aria-label="Username" aria-describedby="basic-addon1">
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            {{--<input type="hidden" name="package_id" value="{{$package_id}}">--}}
                            <div class="col-12">
                                <button type="submit" class="btn signinbutton" id="c" style="display: flex;align-items: center;justify-content: center;">Send <div class="loader"></div></button>
                            </div>
                            <div id="recaptcha-container"></div>
                        </form>
                    </div>
                    <div id="confirm-code" class="register" style="{{session()->has('registerError') ? 'display: block;' : 'display: none;'}}">
                        {{--<input type="hidden" name="package_id" value="{{$package_id}}">--}}
                            <div class="col-12 input-button">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text input-red-border-span span-boorder" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/password.png' }}" alt=""></span>
                                    </div>
                                    <input id="code" type="number" class="red-border-reg form-control" placeholder="Enter Code" name="code" value="">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="err-code"></strong>
                                </span>
                                </div>
                                <span id="password-valid"></span>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn signinbutton" id="proceed" style="display: flex;align-items: center;justify-content: center;">Send <div class="loader"></div></button>
                            </div>
                    </div>
                <div class="col-12 orseparater">
                    <div class="row m-0">
                        <div class="col-5 p-0">
                            <hr>
                        </div>
                        <div class="col-2 or">or</div>
                        <div class="col-5 p-0">
                            <hr>
                        </div>
                    </div>
                </div>
              <!--   <div class="col-12">
                    <button class="btn facbookbtn facebook_btn_social_login" id="facbookbtn"><i class="fa fa-facebook-square"></i>Continue with Facebook </button>
                </div> -->
                 <script src="https://accounts.google.com/gsi/client" async defer></script>
    <div id="g_id_onload"
         data-client_id="577913846255-ijq9th684v0gnvuvn7msplskuov6jeqg.apps.googleusercontent.com"
         data-callback="handleCredentialResponse">
    </div>
    <div class="g_id_signin" data-type="standard">  <div class="col-12" data-onsuccess="onSignIn">
                    <button class="btn googlebtn google_btn_social_login" id="googlebtn" data-onsuccess="onSignIn"> <img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/google.png' }}" alt="">Continue with Google </button>
                </div></div>
              
                <div class="col-12 privacypolicy">
                    By continuing, you agree to our <span><a href="{{url('/cookies-policies')}}">Terms of use</a></span> and
                    <span> <a href="{{url('/privacy-policy')}}">Privacy Policy</a>.</span>
                </div>
                <div class="col-12 backpage">
                    <a href="{{route("frontend-home")}}">
                        <button class="btn btn-back"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i> Back to Home Page</button>

                    </a>
                </div>
            </div>
        </div>
        @if(session()->has('product'))
            @php
            $data=session()->get('product');
            @endphp
            <div class="col-12  col-md-6 col-lg-5 offset-1  new-feild-in-loginform">
                <div class="col-12 new-feild-in-loginform-heading">
                    Search Result

                </div>


                <div class="row summarysection">

                    <div class="col-12 summaryheading">
                        <i class="fas fa-file-alt" aria-hidden="true"></i>
                        Car Details
                    </div>
                    <div class="col-6 summarybillheading ">VehicleRegistration:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->VRM }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">Model:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->Model }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">Color:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->Colour }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">Year Of Manufacture:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->YearOfManufacture }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">SeatingCapacity:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->SeatingCapacity }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">Fuel:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->Fuel }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">Gears:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->Gears }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">Make:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->Make }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">Mileage:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->MileageDetails->InputMileage }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">Engine Capacity:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->EngineCapacity }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">MaxPermissibleMass:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->MaxPermissibleMass }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">UKDateFirstRegistered:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->UKDateFirstRegistered }} </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">CO2Emissions:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->CO2Emissions }}</div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-6 summarybillheading ">DTPModelCode:</div>
                    <div class="col-6 summarybilldetail">{{ $data->GetVehicleDataResult->VehicleRegistration->DTPModelCode }}</div>



                </div>

                @endif
            </div>

    </div>


</div>

@include('frontend.partials.footer')
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-auth.js"> </script>
<script>
// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyBr-TJMZSJ0vwA9LUyTtLUrdAzfhgwtnaU",
  authDomain: "wheelsmoto1.firebaseapp.com",
  projectId: "wheelsmoto1",
  storageBucket: "wheelsmoto1.appspot.com",
  messagingSenderId: "862609138610",
  appId: "1:862609138610:web:db1fb89f452e6816727aab"
};
    // var firebaseConfig = {
    //     apiKey: "AIzaSyA_ZexHljTTP-Kmny2QtimUQHdAFov2nTc",
    //     authDomain: "trigonsoft-project.firebaseapp.com",
    //     databaseURL: "https://trigonsoft-project.firebaseio.com",
    //     projectId: "trigonsoft-project",
    //     storageBucket: "trigonsoft-project.appspot.com",
    //     messagingSenderId: "720006640137",
    //     appId: "1:720006640137:web:f16a96459c6647b1be3ed8",
    //     measurementId: "G-T5FPQM2EH2"
    // };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
</script>
<script>
    function rec() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('c', {
            'size': 'invisible',
            'callback': function(response) {
                onSignInSubmit();
            }
        });
    }
    window.onload = function () {
        render();
    };
    function render() {
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
        recaptchaVerifier.render();
    }
    $(document).on("submit","#check_p",function(e) {
        e.preventDefault();
        phone_num=$("#phone").val();
        var url = $(this).attr("action");
        $("#c").prop("disabled", true);
        $("#phone").prop("readonly", true);
        $("#c").html("sending...");
        var form = new FormData(this);
        $.ajax({
            method: "post",
            url: url,
            DataType: "json",
            data: form,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.status == 1) {
                    rec();
                    phone_num=data.num;
                    firebase.auth().signInWithPhoneNumber(phone_num, window.recaptchaVerifier).then(function(confirmationResult) {
                        window.confirmationResult = confirmationResult;
                        coderesult = confirmationResult;
                        if ($('div.show-register').length) {
                            $('#phone-section').removeClass("show-register");
                            $('#phone-section').hide();
                        }else{
                               $('#phone-section').hide();
                        }
                        $("#signin").hide();
                        $("#register").hide();
                        $('#confirm-code').show();
                        $("#vrf_number").val(phone_num);
                    }).catch(function(error) {
                        alert(error.message);
                    });

                } else {
                    alert("this phone number is already exist!Please try another number");
                    $("#c").prop("disabled", false);
                    $("#phone").prop("readonly", false);
                    $("#c").html("Verify");
                }
            }
        });

    });
    $("#proceed").click(function(e) {
        var num = $("#code").val();
        $(this).text("verifying....");
        coderesult.confirm(num).then(function(result) {
            console.log(result);
            $("#signin").hide();
            $("#register").show();
            $("#confirm-code").hide();
            $("#phone-section").hide();
            $("#vrf_number").val(phone_num);
            $("#phone-number").val(phone_num);
            console.log(phone_num);
        }).catch(function(error) {
            alert(error.message);
        });
    });

</script>
<script src="{{ config('app.ui_asset_url').'frontend/js/intlTelInput.js' }}"></script>
<script>
    var input =  document.querySelector(".login-email");
    window.intlTelInput(input, {
        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
        // hiddenInput: "full_number",
        // initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        // separateDialCode: true,
        utilsScript: "{{ config('app.ui_asset_url').'frontend/js/utils.js' }}",
    });
    var input =  document.querySelector(".login-email1");
    window.intlTelInput(input, {
        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
         hiddenInput: "full_number",
         initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        // separateDialCode: true,
        utilsScript: "{{ config('app.ui_asset_url').'frontend/js/utils.js' }}",
    });
</script>
<!-- </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="../js/signIn.js" type="text/javascript">

</script>

</body>

</html> -->
