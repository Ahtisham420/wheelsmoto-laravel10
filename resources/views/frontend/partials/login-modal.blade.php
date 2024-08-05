<div class="modal" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-title text-center">
                    <h4>Login</h4>
                </div>
                <div class="d-flex flex-column text-center">
                    <form action="{{route('user-login-submit')}}" method="post" class="login_f">
                        @csrf
                        <input type="hidden" name="garage_input" @if(!empty($gr)) value="{{$gr}}" @endif>
                        <input type="hidden" name="swap_input" @if(!empty($sw)) value="{{$sw}}" @endif>
                        <input type="hidden" name="swap_id" @if(!empty($swap_id)) value="{{$swap_id}}" @endif>
                        <input type="hidden" name="blog_id" @if(!empty($bg)) value="{{$bg}}" @endif>
                        <input type="hidden" name="like_login"
                               @if(!empty($id) && $id == "favourite")value="{{$id}}"@endif>
                        <div class="col-12 input-button">
                            <div class=" input-group mb-3" style="flex-wrap:unset!important">
                                <div class="input-group-prepend">
                                    <span class="input-group-text red-border-input" id="basic-addon1"><img
                                            src="{{ config('app.ui_asset_url').'frontend/img/loginicon/message.png' }}"
                                            alt=""></span>
                                </div>
                                <input id="login-email" type="tel" name="phone"
                                       class="login-email-modal form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                       value="{{ old('phone') ? old('phone') : '+92' }}" required autocomplete="off"
                                       placeholder="Enter Your Phone no" aria-label="Username"
                                       aria-describedby="basic-addon1">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 input-button">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text red-border-input" id="basic-addon1"><img
                                            src="{{ config('app.ui_asset_url').'frontend/img/loginicon/password.png' }}"
                                            alt=""></span>
                                </div>
                                <input min="8" max="20" id="login-password" type="password"
                                       class=" form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       placeholder="Password" aria-label="Username" aria-describedby="basic-addon1"
                                       name="password" required autocomplete="current-password"
                                       value="{{ old('password') ? old('password') : '' }}">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif

                            </div>

                        </div>
                        <div class="col-12">
                            <input type="checkbox" id="show-pass" onclick="myFunction()" class="mt-2">
                            <label for="show-pass" style="font-size: 14px;color:#00c29f;">Show Password</label>
                            <div class="col-6 mt-2"
                                 style="justify-content: right;display: inline-grid;padding-right: 0px;float: right">
                                <a href="{{url("/recover/account")}}" style="font-size: 14px;color:#00c29f;">Forgotten
                                    Password?</a>
                            </div>
                        </div>
                        <div class="col-12"><span id="login-form-validation"></span></div>
                        <div class="col-12">
                            <button class="btn signinbutton " id="login-form"
                                    style="display: flex;align-items: center;justify-content: center;"> Sign In
                                <div class="loader"></div>
                            </button>
                        </div>

                    </form>

                    <div class="text-center text-muted delimiter">or use a social network</div>
                    <div class="d-flex justify-content-center social-buttons">
                        <button type="button" class="btn btn-round google_btn_social_login" id="googlebtn" data-toggle="tooltip" data-placement="top" title="Facebook">
                            <img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/google.png' }}" alt="">
                        </button>
                        </di>
                    </div>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <div class="signup-section">Not a member yet? <a href="{{route('user-login',['id'=>'register'])}}"
                                                                 class="text-theme-color"> Sign Up</a>.
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ config('app.ui_asset_url').'frontend/js/intlTelInput.js' }}"></script>
<script>
    var input = document.querySelector("#login-email");
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
