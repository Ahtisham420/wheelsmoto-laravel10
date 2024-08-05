@include('frontend.partials.header')
<div class="container mt-5 mb-5">
    <div class="row" style="margin-bottom: 150px;margin-top: 150px;">

        <div class="col-12  col-md-6 col-lg-5 offset-1  m-auto">
            <div class="row m-0">
                    @if(session()->has('message_red'))
                        <div class="alert alert-danger">
                            {{ session()->get('message_red') }}
                        </div>
                    @endif
<div id="step-1" class="register new-register-form" style="{{session()->has('registerError') ? 'display: none;' : 'display: block;'}}">
    <form action="{{route('user-password-forgott')}}" method="post" id="check_number" enctype="multipart/form-data">
        @csrf
        <div class="col-12 input-button">
            <div class=" input-group mb-3">
                <div class="input-group-prepend">

                    <span class="input-group-text red-border-input" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/message.png' }}" alt=""></span>
                </div>
                <input id="login-phone" type="tel" name="user_phone" class="form-control" required
                       placeholder="Enter Your Email" value="+92" aria-label="Username" aria-describedby="basic-addon1">
                @if ($errors->has('user_email'))
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('user_email') }}</strong>
                                </span>
                @endif
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn signinbutton" id="login-form" style="display: flex;align-items: center;justify-content: center;">Verify<div class="loader"></div></button>
        </div>
        <div id="recaptcha-container"></div>
    </form>

</div>
                        <div id="step-2" class="register" style="display: none;">
                            {{--<input type="hidden" name="package_id" value="{{$package_id}}">--}}
                            <form  id="confirm_code" >
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
                                <button type="submit" class="btn signinbutton" id="proceed" style="display: flex;align-items: center;justify-content: center;">Send<div class="loader"></div></button>
                            </div>
                                <input type="hidden" id="token_n" name="token">
                                <input type="hidden" id="phone_nu" name="number">
                                <input type="hidden" id="user_id" name="id">
                            </form>
                        </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.partials.footer')
<script src="{{ config('app.ui_asset_url').'frontend/js/intlTelInput.js' }}"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.19.1/firebase-auth.js"> </script>
    <script>

        var firebaseConfig = {
            apiKey: "AIzaSyB5SrdLwAIJdU4ZUma3uXIlhqFZtjtrDbY",
            authDomain: "trigonsoft-project.firebaseapp.com",
            databaseURL: "https://trigonsoft-project.firebaseio.com",
            projectId: "trigonsoft-project",
            storageBucket: "trigonsoft-project.appspot.com",
            messagingSenderId: "720006640137",
            appId: "1:720006640137:web:255492e5d13d4519be3ed8",
            measurementId: "G-61E6QRJ76T"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>
    <script>
        var coderesult = "";
        var phone_num="";
        window.onload = function () {
            render();
        };
        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }
        $(document).on("submit","#check_number",function(e) {
            e.preventDefault();
            phone_num=$("#login-phone").val();
            var url = $(this).attr("action");
            $("#login-form").prop("disabled", true);
            $("#login-form").html("sending...");
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
                        phone_num=data.num;
                        var recap = grecaptcha.getResponse().length;
                        if (recap > 0) {

                        }else{
                            alert('please checked recaptcha');
                        }
                        firebase.auth().signInWithPhoneNumber(phone_num, window.recaptchaVerifier).then(function(confirmationResult) {
                            window.confirmationResult = confirmationResult;
                            coderesult = confirmationResult;
                            $("#phone_nu").val(data.num);
                            $("#token_n").val(data.token);
                            $("#user_id").val(data.user_id);
                            $('#step-1').hide();
                            $('#step-2').show();
                        }).catch(function(error) {
                            alert(error.message);
                        });

                    } else {
                        alert("this phone number is not exist!Please try another number");
                        $("#login-form").prop("disabled", false);
                        $("#login-form").html("Verify");
                    }
                }
            });

        });
        $(document).on("submit","#confirm_code",function(e) {
            e.preventDefault();
            var num = $("#code").val();
            var phone = $("#phone_nu").val();
            var token =  $("#token_n").val();
            $(this).text("verifying....");
            coderesult.confirm(num).then(function(result) {
                console.log(result);
                $('#step-1').hide();
                $('#step-2').hide();
                var url = '{{route("new-password",["token"=>":tkn"])}}'
                url = url.replace(":tkn",token);
                window.location = url;
            }).catch(function(error) {
                alert(error.message);
            });
        });
        var input =  document.querySelector("#login-phone");
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
    </script>
