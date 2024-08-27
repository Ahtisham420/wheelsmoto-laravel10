<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="google-signin-client_id"
          content="577913846255-ijq9th684v0gnvuvn7msplskuov6jeqg.apps.googleusercontent.com">
    <meta name="app_url" content="{{env('APP_URL')}}">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <link rel="shortcut icon" href="{{ config('app.ui_asset_url').'frontend/img/logo/fav-icon.ico' }}" sizes="16x16">
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
    <div class="homepage">
        <div class="header">
            <div class="header-content">
                <a href="{{route('frontend-home')}}">
                    <img class="logo-icon" alt="" src="{{ config('app.ui_asset_url').'frontend/img/logo/new_logo.png' }}"/>
                </a>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars" style="color: #00c29f;"></i>
                </button>
                <div class="collapse navbar-collapse newheaderdiv  ml-auto  " id="navbarSupportedContent">
                    <ul class="navbar-nav  custom-navbar">
                        <div class="closeiconnav" type="button" data-toggle="collapse"
                             data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                             aria-expanded="false" aria-label="Toggle navigation">
                            <img src="{{ config('app.ui_asset_url').'frontend/img/logo/close.png' }}" alt="">
                        </div>
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('frontend-blog')}}">Blog</a>
                        </li>
                        <hr class="hr">
{{--                        <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('wanted')}}">Buyer Request</a>--}}
{{--                        </li>--}}
                        <hr class="hr">
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('event-frontend')}}">Events</a>
                        </li>
                        <hr class="hr">
{{--                        <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('garage')}}">Garage Service</a>--}}
{{--                        </li>--}}
                        <hr class="hr">
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('user-login')}}">Sign In</a>
                        </li>
                        <hr class="hr">
                        <li class="nav-item">
                        <a class="nav-link" href="{{route('user-login',['id'=>'register'])}}">Register Now</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-links topbar">
{{--                    <div class="home"><a href="{{route('frontend-blog')}}">Blog</a></div>--}}
{{--                    <div class="home"><a href="{{route('wanted')}}">Buyer Request</a></div>--}}
{{--                    <div class="home"><a href="{{route('event-frontend')}}">Events</a></div>--}}
{{--                    <div class="home"><a href="{{route('garage')}}">Garage Service </a></div>--}}
                </div>
                <div class="login-section">
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
                        <div style="border:2px solid #b8b8b8; padding: 10px 0;" ></div>
                        <li><a href="{{route("my-advert")}}">Dashboard</a></li>
                        <div style="border:2px solid #b8b8b8; padding: 10px 0;" ></div>
                        <li><a href="{{route('user-logout')}}">Sign Out</a></li>
                    @else
                        <li><a href="{{route('user-login')}}">Sign in</a></li>
                        <div style="border:2px solid #b8b8b8; padding: 10px 0;" ></div>
                        <li><a href="{{route('user-login',['id'=>'register'])}}">Register Now</a>
                        </li>
                    @endif
                </div>
            </div>
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
                        <div class="d-flex align-items-center justify-content-center col-12">
                            <i class="fa-solid fa-cookie-bite" style="color: #00c29f; font-size: 25px; margin-right:4px"></i>
                            <h5 style="color: #00c29f; margin:0;">Cookies Consent</h5>
                        </div>
                        <div class="d-flex align-items-center px-2">
                            <p>WheelsMoto use cookies to help you have a superior and more relevant browsing experience on the website.</p>
                        </div>
                        <div class="cookies-show-btn"><input type="hidden" name="cookie_n" id="cookie"
                                                                             value="{{time()}}">
                            <input type="hidden" value="submit" name="submit">
                            <button value="submit">Continue</button>
                            <a class="cancel-cookies">Cancel</a></div>
                    </div>
                </form>
                <!-- <div class="wrapper">
                    <header>
                        <i class="bx bx-cookie"></i>
                        <h2>Cookies Consent</h2>
                    </header>

                    <div class="data">
                        <p>This website use cookies to help you have a superior and more relevant browsing experience on the website. <a href="#"> Read more...</a></p>
                    </div>

                    <div class="buttons">
                        <button class="button" id="acceptBtn">Accept</button>
                        <button class="button" id="declineBtn">Decline</button>
                    </div>
                </div> -->
            @endif

            <div class="modal fade" id="ShareModalCenter" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle"
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
            <div class="modal fade" id="likeCarModal" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalCenterTitle"
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
                                            onclick="location.href='{{route('user-login',['id'=>'favourite'])}}'">
                                        Continue to
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
