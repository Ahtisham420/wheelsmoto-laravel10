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
                <div id="signin" class="register new-register-form">
                    <form action="{{route('change-password')}}" id="new-password-regiter" method="post">
                        @csrf
                        <input type="hidden" name="id" value="@php echo $id; @endphp">
{{--                    <input type="hidden" name="tab" value="@php echo $tab; @endphp">--}}
                        <div class="col-12 input-button">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-red-border-span span-boorder" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/password.png' }}" alt=""></span>
                                </div>
                                <input min="8" max="20" id="rpassword0" type="password" class="red-border-reg form-control" placeholder="New Passsword" aria-label="Username"
                                       aria-describedby="basic-addon1" name="password" required autocomplete="current-password">

                            </div>
                            <span id="password-valid"></span>
                        </div>
                        <div class="col-12 input-button">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text input-red-border-span red-span-red" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/password.png' }}" alt=""></span>
                                </div>
                                <input min="8" max="20" id="rpassword1" type="password" class="red-border-reg form-control" placeholder="Confirm Password" aria-label="Username"
                                       aria-describedby="basic-addon1" name="password_confirmation" required autocomplete="current-password">

                            </div>
                            <span id="confirm"></span>
                            <span id="valdid"></span>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn signinbutton" id="login-form" style="display: flex;align-items: center;justify-content: center;">Change Password<div class="loader" id="new-password-loader"></div></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.partials.footer')
