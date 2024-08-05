<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="google-signin-client_id"
          content="577913846255-ijq9th684v0gnvuvn7msplskuov6jeqg.apps.googleusercontent.com">
    {{--  <link rel="icon" href="{{ config('app.ui_asset_url').'images/favicon.png' }}" type="image/gif" sizes="16x16">--}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- <link href="https://fonts.cdnfonts.com/css/gilroy-bold" rel="stylesheet"> -->
    <!--    <link href="/your-path-to-fontawesome/css/fontawesome.css" rel="stylesheet">
      <link href="/your-path-to-fontawesome/css/brands.css" rel="stylesheet">
      <link href="/your-path-to-fontawesome/css/solid.css" rel="stylesheet"> -->
    <!--   <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
          integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
          integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/index.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/global.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/slick.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/slick-theme.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/intlTelInput.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/login.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/emojionearea.min.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/misecellinousCarPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/audisellingPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/blog.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/changePassword.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/audisellingAuctionPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/garageServices.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/americanMusclesCarPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/auctionCarPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/searchLeaseCarpage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/rentalCarPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/swapcarPage.css' }}">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/dashboard.css' }}">
    <link rel="shortcut icon" href="{{ config('app.ui_asset_url').'frontend/img/logo/short.ico' }}" sizes="16x16">
    <link rel="stylesheet" href="{{ config('app.ui_asset_url').'frontend/css/tagsinput.css' }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&display=swap"
          rel="stylesheet">
    {{-- <!-- google fonts --> --}}
    <link
        href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Archivo:wght@300;400;500;600;700&display=swap"
    />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@400&display=swap"
    />

    {{--    Select 2 tag cdn--}}

    {{-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/> --}}
    {{-- <!-- fontawsome kit --> --}}
    <script src="https://kit.fontawesome.com/f105d44546.js" crossorigin="anonymous"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XHJX044QQY"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-XHJX044QQY');
    </script>
    <title>Wheels Moto</title>
    <style>
        .error_select2 {
            border-color: red !important;
        }
    </style>
</head>
<body>
<div>
    <!--<div id="bar"></div>-->
    @php $flag=null; @endphp
    @if(@isset($_COOKIE["wheelshunt_cookie"]))
        @php
            $flag=App\Cookie::where("c_name","=",$_COOKIE["wheelshunt_cookie"])->first();
        @endphp
    @endif
    @if(!$flag)
        <form class="form-cookie" action="{{route("add-cookie")}}" method="post">
            @csrf
            <div class="row coockies-show" id="div-cookie" style="display: none;">
                <div class="col-12 col-sm-6">
                    <p>WheelsHunt uses cookies to improve visitor experience.</p>
                </div>
                <div class="col-12 col-sm-6 cookies-show-btn"><input type="hidden" name="cookie_n" id="cookie"
                                                                     value="{{time()}}">
                    <input type="hidden" value="submit" name="submit">
                    <button value="submit">Continue</button>
                    <a class="cancel-cookies" style="color: #FFFFFF!important;">Cancel</a></div>
            </div>
        </form>
    @endif
    <div class="topbar">
        <ul>
            <li><a href="{{route('frontend-blog')}}">Blog</a></li>
            <li><a href="{{route('wanted')}}">Buyer Request</a></li>
            <li><a href="{{route('event-frontend') }}">Events</a></li>
            <li><a href="{{route('garage')}}">Garage Service </a></li>
            <!--<li><a href="{{route('frontend-misecellinous')}}">Auto Part</a></li>-->
            <!-- <li><a href="{{route('frontend-car-selling-lease')}}">Car Selling Lease</a></li> -->
            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                {{--<li><a href="{{route('user-logout')}}">Logout </a></li>--}}
                {{--<li><a href="{{route('user-change-password')}}">Change Password </a></li>--}}
            @else
                <!-- <li><a href="{{route('user-login')}}">Login </a></li> -->
            @endif
            <!-- <li><a href="{{route('frontend-car-selling-auction')}}">Car Selling Auction</a></li> -->
        </ul>
        <div class="topbarsign d-flex ml-auto">
            <ul>
                @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                    <li>
                        <a href="{{route("profile-dashboard")}}">
                            @php
                                if(!empty(session('userDetails')->first_name)){
                                echo session('userDetails')->first_name;
                                }
                                if(!empty(session('userDetails')->first_name) && !empty(session('userDetails')->last_name)){
                                echo " ";
                                }
                                if(!empty(session('userDetails')->last_name)){
                                echo session('userDetails')->last_name;
                                }
                                if(empty(session('userDetails')->first_name) && empty(session('userDetails')->last_name)){
                                if(!empty(session('userDetails')->username)){
                                echo session('userDetails')->username;
                                }else{
                                echo "N/A";
                                }
                                }
                            @endphp
                        </a>
                    </li>
                    <li style="border-left: solid;border-left-color: #b8b8b8;"><a href="{{route("my-advert")}}">Dashboard</a>
                    </li>


                    <li><a href="{{route('user-logout')}}">Sign Out</a></li>
                @else
                    <li><a href="{{route('user-login')}}">Sign in</a></li>
                    <li><a class="btn-register" href="{{route('user-login',['id'=>'register'])}}">Register Now</a></li>
                @endif
            </ul>
        </div>
    </div>
    <header>
        <div class="header">
            <nav class="navbar navbar-expand-lg headerbackground">
                <a class="navbar-brand wheels-hunt-navbar" href="{{route('frontend-home')}}"><img
                        src="{{ config('app.ui_asset_url').'frontend/img/logo/logo.png' }}"></a>
                <button class="navbar-toggler " type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" style="color: #000;"></i>
                </button>
                <div class="email-verify-header m-auto" style="display: none;">
                    <div style="display: flex;">Please Verify Your Mail?
                        <div class="loader-email ml-1 email-loader-header"></div>
                        <a class="verify-mail-user" href="#"> Verify email</a></div>
                </div>
                <div class="collapse navbar-collapse newheaderdiv  ml-auto  " id="navbarSupportedContent">
                    <ul class="navbar-nav  custom-navbar">
                        <div class="closeiconnav" type="button" data-toggle="collapse"
                             data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                             aria-expanded="false" aria-label="Toggle navigation">
                            <img src="{{ config('app.ui_asset_url').'frontend/img/logo/close.png' }}" alt="">
                        </div>
                        {{--<li class="nav-item active">--}}
                        {{--<a class="nav-link" href="{{route('frontend-home')}}">Home <span class="sr-only">(current)</span></a>--}}
                        {{--</li>--}}
                        {{--<hr class="hr">--}}
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{route('frontend-american-muscle')}}">American Muscle</a>--}}
                        {{--</li>--}}
                        {{--<hr class="hr">--}}
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{route('frontend-auction-cars')}}">Auction </a>--}}
                        {{--</li>--}}
                        {{--<hr class="hr">--}}
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{route('frontend-classified-cars')}}">Classified</a>--}}
                        {{--</li>--}}
                        {{--<hr class="hr">--}}
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{route('frontend-search-lease-cars')}}">Lease Cars</a>--}}
                        {{--</li>--}}
                        {{--<hr class="hr">--}}
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{route('frontend-rental-cars')}}">Rental</a>--}}
                        {{--</li>--}}
                        {{--<hr class="hr">--}}
                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{route('frontend-swap-list')}}">Swaps</a>--}}
                        {{--</li>--}}
                        <div class="topbar-mobile">
                            <li class="nav-item"><a class="nav-link" href="{{route('frontend-blog')}}">Blog</a></li>
                            {{--<li class="nav-item"><a class="nav-link" href="{{route('frontend-car-selling')}}">Car Selling </a> </li>--}}
                            <li class="nav-item"><a class="nav-link" href="{{route('event-frontend') }}">Events</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('garage')}}">Garage Service </a></li>
                            <li class="nav-item"><a class="nav-link" href="{{route('frontend-misecellinous')}}">Miscellaneous</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{route('wanted')}}">Wanted</a></li>

                            <!-- <li><a href="{{route('frontend-car-selling-lease')}}">Car Selling Lease</a></li> -->
                            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                                <li class="nav-item"><a class="nav-link" href="{{route("profile-dashboard")}}">
                                        @php
                                            if(!empty(session('userDetails')->first_name)){
                                            echo session('userDetails')->first_name;
                                            }
                                            if(!empty(session('userDetails')->first_name) && !empty(session('userDetails')->last_name)){
                                            echo " ";
                                            }
                                            if(!empty(session('userDetails')->last_name)){
                                            echo session('userDetails')->last_name;
                                            }
                                            if(empty(session('userDetails')->first_name) && empty(session('userDetails')->last_name)){
                                            if(!empty(session('userDetails')->username)){
                                            echo session('userDetails')->username;
                                            }else{
                                            echo "N/A";
                                            }
                                            }
                                        @endphp
                                    </a></li>
                                <li class="nav-item"><a class="nav-link" href="{{route('user-change-password')}}">Change
                                        Password </a></li>
                            @else
                                <!-- <li><a href="{{route('user-login')}}">Login </a></li> -->
                            @endif
                            <!-- <li><a href="{{route('frontend-car-selling-auction')}}">Car Selling Auction</a></li> -->

                        </div>


                        <div class=" buttongroup new-buttongroup" style="float:right">
                            {{-- @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                              @php
                                $route = route("user-logout");
                              @endphp
                              <button onclick="location.href='{{$route}}'" class="signinbtn" style="cursor: pointer;"> <span style="padding-right: 5px;"><img src="{{ config('app.ui_asset_url').'frontend/img/logo/Path 4266.png' }}" alt=""></span>sign out</button>
                            @else
                              @php
                                $route = route("user-login");
                              @endphp
                              <button onclick="javascript:location.href='{{$route}}'" class="signinbtn" style="cursor: pointer;"> <span style="padding-right: 5px;"><img src="{{ config('app.ui_asset_url').'frontend/img/logo/Path 4266.png' }}" alt=""></span>sign in</button><hr class="hr"> <button onclick="javascript:location.href='{{$route}}'" class="signinbtn" style="cursor: pointer;"> <span style="padding-right: 5px;"><img src="{{ config('app.ui_asset_url').'frontend/img/logo/Path 4266.png' }}" alt=""></span>Register</button>
                            @endif --}}

                            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                                @php
                                    $route = route("my-advert");
                                @endphp
                                <a style="text-align: center;" href="{{route('user-logout')}}">Sign Out</a>
                                <button class="createadbtn-wheel" style="cursor: pointer;"
                                        onclick="location.href='{{$route}}'">Give A Quote!
                                </button>
                            @else
                                {{--  modal id  id="packagemodal"  data-target=".bd-example-modal-lg" --}}
                                <a style="text-align: center;" href="{{route('user-login')}}">Sign in</a>
                                <button class="createadbtn-wheel" style="cursor: pointer;" data-toggle="modal"
                                        onclick="location.href='{{route('user-login')}}'"> Buy New Car
                                </button>
                            @endif
                        </div>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="modal fade" id="ShareModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title" id="exampleModalLongTitle">Car Details</h5>


                </div>

                <div class="modal-body">

                    Web Page link Copied.

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>

            </div>

        </div>

    </div>

    {{--modal for dashboard form--}}
    <div class="modal fade SelectModalCenterDashboard" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">About Form</h5>
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                </div>
                <div class="modal-body">
                    Please Fill or Select required Fields.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #00a651;color:#FFFFFF"
                            data-dismiss="modal">OK
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade SelectModalCenterDashboardPIC" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">About Form</h5>
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                </div>
                <div class="modal-body">
                    Please Select Images.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #00a651;color:#FFFFFF"
                            data-dismiss="modal">OK
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade verifyMailUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">About Email</h5>
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                </div>
                <div class="modal-body Modal-verify-mail">
                    something was wrong.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn" style="background-color: #00a651;color:#FFFFFF"
                            data-dismiss="modal">OK
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="5MBlimitImGE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Images Validation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span aria-hidden="true">&times;</span>

                    </button>

                </div>

                <div class="modal-body" id="DashboardImageValidation">

                    Image size is less than 5MB!.

                </div>

                <div class="modal-footer">


                    <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>

                </div>

            </div>

        </div>


    </div>
    <div class="modal fade" id="likeCarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Login For Favourite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="col-12">
                            <button class="btn googlebtn"
                                    onclick="location.href='{{route('user-login',['id'=>'favourite'])}}'">Continue to
                                Login
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
