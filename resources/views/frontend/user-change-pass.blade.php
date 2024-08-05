@include('frontend.partials.header')


<div class="container">
  <div class="row">
    <div class="col-12 col-sm-8 col-md-6 m-auto offset-4 ">
      <div class="row m-0">
        <div class="col-12 p-0">
          <div class="formheading">
            <br>
            <span>
              Change Password
            </span>
          </div>
        </div>

        <div id="register" class="register">
          <form action="{{route('user-pass-change-submit')}}" method="post">
            @csrf
            <input type="hidden" name="email" value="{{ !empty(session('userDetails')->email) ? session('userDetails')->email : old('email') }}">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            @if(session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
            @endif
            @if(session()->has('error'))
            <div class="alert alert-danger">
              {{ session()->get('error') }}
            </div>
            @endif
            <div class="col-12 input-button">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/message.png' }}" alt=""></span>
                </div>
                <input type="email"  class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ !empty(session('userDetails')->email) ? session('userDetails')->email : old('email') }}" required autocomplete="email" placeholder="{{ !empty(session('userDetails')->email) ? session('userDetails')->email : old('email') }}" aria-label="Username" aria-describedby="basic-addon1" readonly>
                @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-12 input-button">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/password.png' }}" alt=""></span>
                </div>
                <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="New Passsword" aria-label="Username" aria-describedby="basic-addon1" name="password" required autocomplete="current-password" value="{{ old('password') ? old('password') : '' }}" min="8">
                @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="col-12 input-button">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><img src="{{ config('app.ui_asset_url').'frontend/img/loginicon/password.png' }}" alt=""></span>
                </div>
                <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1" name="password_confirmation" required autocomplete="current-password" value="{{ old('password_confirmation') ? old('password_confirmation') : '' }}">
                @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <!-- <div class="col-12 input-button">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><img src="../img/loginicon/message.png" alt=""></span>
                </div>
                <input type="text" class="form-control" name="email" required placeholder="Enter Your Email" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div>
            <div class="col-12 input-button">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><img src="../img/loginicon/password.png" alt=""></span>
                </div>
                <input type="password" class="form-control inputicon" placeholder="Old Password" aria-label="Username" aria-describedby="basic-addon1">
                <div class="input-group-append">
                  <span class="input-group-text informativediv"><img src="../img/carseelingtabs/Component 27 – 52.png"></span>
                </div>
              </div>
            </div>
            <div class="col-12 input-button">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><img src="../img/loginicon/password.png" alt=""></span>
                </div>
                <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Username" aria-describedby="basic-addon1">
              </div>
            </div> -->
            <div class="col-12">
              <button class="btn signinbutton" type="submit"> Update Now</button>
            </div>
          </form>
        </div>

        <div class="col-12 privacypolicy">
          By continuing, you agree to our <span>Terms of use</span> and
          <span>Privacy Policy.</span>
        </div>
        <div class="col-12 backpage">
          <a href="{{route("profile-dashboard")}}">
            <button class="btn btn-back"><i class="fas fa-long-arrow-alt-left" aria-hidden="true"></i> Back to Home Page</button>
          </a>
        </div>
      </div>
    </div>
  </div>

</div>


</div>

@include('frontend.partials.footer')
