@include('frontend.partials.header')
<style>
    .misc_numbr_display{
        display: block!important;
    }
    .error {
        border: 1px solid red;
    }

    .place_your_ad {
        width: 100% !important;

        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

</style>
@php $flag=false; @endphp
@if (!empty($user_package->package_id))
    @php $check_u=json_decode($user_package->package->attributes) ;@endphp
    @if($check_u->images_per_post==10 )
        @php $flag=true; @endphp
    @endif
@endif

<div class="container">
    <div class="row profilesection">

        <div class="col-4  col-sm-3  col-xl-3 profileimage">
            @php
                $placeholder = config('app.ui_asset_url').'images/avatars/avatar-placeholder.png';
            @endphp
            @if (empty(session('userDetails')->avatar))
                <img src="{{ $placeholder }}">
            @else
                <img onerror="this.src={{ $placeholder }};" src="{{session('userDetails')->avatar}}">
            @endif
        </div>
        <div class="col-8 col-sm-5 col-md-5 col-lg-5 profiledescription p-0">
            <h3>
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
            </h3>
            <p>@if(!empty(session('userDetails')) && !empty(session('userDetails')->email)){{session('userDetails')->email }}@endif <br>@if(!empty(session('userDetails')) && !empty(session('userDetails')->phone)){{session('userDetails')->phone }}@endif</p>
              </div>
              <div class="col-2 col-sm-2 col-md-2 col-lg-2 profiledescription p-0">

              </div>
        <div class=" col-sm-10 col-md-3 col-lg-3 profiledescription ">
            <p class="float-md-right float-lg-right float-xl-right">Member since {{ \Carbon\Carbon::parse(session('userDetails')->created_at)->diffForHumans() }}</p>
            <p class="float-md-right float-lg-right float-xl-right"> <a href="{{ route('user-dashboard', ['tab' => 'profile']) }}"> Edit Profile </a> | <a
                    href="{{ route('user-change-password') }}"> Change Password</a></p>
        </div>

        <div class="col-12 p-0">

            <div class="mobil-menu-portal">

                <!-- <a>Portal Menu <i class="fa fa-bars" style="color: #707070;" aria-hidden="true"></i></a><br><br> -->
                <div class="pos-f-t p-0">

                    <nav class="justify-content-center" style="background-color: #e0e1ed">
                        <button class="d-flex m-auto align-items-center" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
                                aria-controls="navbarToggleExternalContent" aria-expanded="false"
                                aria-label="Toggle navigation" style="color:#707070; border:none; background-color:white; border-radius:5px;">Portal Menu
                            <span class="navbar-toggler-icon d-flex align-items-center" style="color:#707070 !important;"><i
                                    class="fas fa-bars"></i></span>
                        </button>
                    </nav>
                    <div class="collapse" id="navbarToggleExternalContent">
                        <div class="p-2" style="background-color:#e0e1ed">
                            @if(!empty($tab) && $tab == "my_advert")
                                <a href="{{route('my-advert')}}"
                                   class="nav-link select-main-tab active btn btn-block" id="powersCar"
                                   style="border-bottom: 3px solid #00c29f;background-color:white !important;color:#707070 !important">My Adverts</a>
                            @else
                                <a href="{{route('my-advert')}}" class="nav-link select-main-tab" id="powersCar"
                                   style="background-color:white !important;color:#707070 !important">My Adverts</a>
                            @endif

                            <hr>
                            @if(!empty($tab) && $tab == "profile_dash")
                                <a class="nav-link active btn btn-block" id="profilesection" href="{{route('profile-dashboard')}}" style="border-bottom: 3px solid rgb(0, 166, 81);background-color:white !important;color:#707070 !important">Profile</a>
                            @else
                                <a id="profilesection" href="{{route('profile-dashboard')}}" class="nav-link select-main-tab" style="background-color:white !important;color:#707070 !important">Profile</a>
                                <hr>
                            @endif
                        <!--@if(!empty($tab) && $tab == "garage_ad")-->
                        <!--    <a class="nav-link select-main-tab btn btn-block" href="{{route('garage-advert')}}" style="border-bottom: 3px solid rgb(0, 166, 81);background-color:white !important;color:#707070 !important ">Garage Adverts</a>-->
                            <!--@else-->
                        <!--    <a class="nav-link select-main-tab btn btn-block" href="{{route('garage-advert')}}" id="currentpackage" style="background-color:white !important;color:#707070 !important;">Garage Adverts</a>-->
                            <!--        <hr>-->
                            <!--    @endif-->
                            @if(!empty($tab) && $tab == "autopart_ad")
                                <a class="nav-link select-main-tab btn btn-block" href="{{route('autopart-advert')}}" style="border-bottom: 3px solid #00c29f;background-color:white !important;color:#707070 !important ">Auto Part Advert</a>
                            @else
                                <a class="nav-link select-main-tab btn btn-block"
                                   href="{{route('autopart-advert')}}" id="currentpackage" style="background-color:white !important;color:#707070 !important;">Auto Part Advert</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="col-12  myhr p-0">
            <hr>
        </div>

        <div class="col-12 navsection p-0" id="mobile-my-portal-menu">
            <ul>
                <li class=" navheading">
                    @if(!empty($tab) && $tab == "my_advert")
                        <a href="{{route('my-advert')}}" class="nav-link select-main-tab active" id="powersCar" style="border-bottom: 3px solid #00c29f;">My Adverts</a>
                    @else
                        <a href="{{route('my-advert')}}" class="nav-link select-main-tab" id="powersCar">My Adverts</a>
                    @endif
                </li>
                <li class="navheading">
                    @if(!empty($tab) && $tab == "profile_dash")
                        <a class="nav-link active" id="profilesection" href="{{route('profile-dashboard')}}" style="border-bottom: 3px solid #00c29f;"> Profile</a>
                    @else
                        <a id="profilesection" href="{{route('profile-dashboard')}}"> Profile</a>
                    @endif
                </li>
{{--                <li class="navheading">--}}
{{--                @if(!empty($tab) && $tab == "garage_advert")--}}
{{--                    <a class="nav-link active" id="profilesection" href="{{route('garage-advert')}}" style="border-bottom: 3px solid rgb(0, 166, 81);">Create Garage Advert</a>--}}
{{--                    @else--}}
{{--                    <a id="nav-link" href="{{route('garage-advert')}}">Create Garage Advert</a>--}}
{{--                    @endif--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
    <div class="tabsecton " id="power-car">


        @if(!empty($tab) && $tab == "my_advert" ||  $tab == "sell_your_car" || $tab == "change_package" ||  $tab === "buyer_ad" || $tab === "buyer_list" || $tab === "garage_advert" || $tab === "garage" || $tab === "misslenious_create" || $tab === "misslenious_add_tab" || $tab === "my_payments" || $tab === "auto-part")
            @include("frontend.powercartab")
        @endif
        @if(!empty($tab) && $tab == "packages_dash")
            @include("frontend.currentpack")
        @endif

        @if(!empty($tab) && $tab == "profile_dash")
            @include("frontend.profiletab")
        @endif
        @if(!empty($tab) && $tab == "autopart_ad")
            @include("frontend.powercartab")

        @endif



    </div>

</div>
<!--Modal-->

<!--new Modal-->
<div class="modal fade addfeatureModal" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="row modalbadge">
                <img class="badgeModal"
                     src="{{ config('app.ui_asset_url') . 'frontend/img/carselling/badge.png' }}"
                     alt="">
                <div class="col-12">
                    <div class="row marginmodal">
                        <div class="col-4 modalHeading">
                            <img src="{{ config('app.ui_asset_url') . 'frontend/img/carseelingtabs/checkmark.png' }}"
                                 alt="">
                            Select Your Features
                        </div>
                        <div class="col-8">
                            <hr>
                        </div>
                    </div>
                </div>


                <div class="col-12 modalaccordian">
                    <div id="accordion" class="accordion">
                        <div class="card mb-0">
                            <div class="card-header collapsed" data-toggle="collapse"
                                 href="#collapseOne">

                                <img src="{{ config('app.ui_asset_url') . 'frontend/img/techspecsIcon/3.png' }}"
                                     alt="">
                                <a class="card-title">

                                    Safety Feature
                                </a>
                                <p><span></span> Selected</p>
                            </div>
                            <div id="collapseOne" class="card-body collapse"
                                 data-parent="#accordion">
                                <div class="row checkedchechkbox">
                                    @if (!empty($saftey_feature) && count($saftey_feature) > 0)
                                        @foreach ($saftey_feature as $t)
                                            <div class="col-4 checkboxCoulmn ">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="radio custom-control-input  modal_list_view" name="saf_f[]"
                                                           id="{{ $t->id }}" data-col="{{ $t->_value }}"  value="{{ $t->id }}"
                                                           @if ($update)

                                                           @php
                                                               $saf=json_decode($update->saftey_f)
                                                           @endphp
                                                           @if (!empty($saf))
                                                           @foreach ($saf as $f)
                                                           @if ($t->id == $f)
                                                           checked
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                        @endif

                                                    >
                                                    <label class="custom-control-label new_checkbox_val_safety"
                                                           for="{{ $t->id }}">{{ $t->_value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif



                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 modalaccordian1">
                    <div id="accordion" class="accordion">
                        <div class="card mb-0">
                            <div class="card-header collapsed" data-toggle="collapse"
                                 href="#collapseTwo">

                                <img src="{{ config('app.ui_asset_url') . 'frontend/img/techspecsIcon/4.png' }}"
                                     alt="">

                                <a class="card-title">

                                    In Car Entertainment Systems
                                </a>

                            </div>
                            <div id="collapseTwo" class="card-body collapse"
                                 data-parent="#accordion">
                                <div class="row checkedchechkbox">
                                    @if (!empty($ent_feature) && count($ent_feature) > 0)
                                        @foreach ($ent_feature as $t)
                                            <div class="col-4 checkboxCoulmn ">
                                                <div class="custom-control custom-checkbox">

                                                    <input type="checkbox" name="en_f[]"
                                                           class="radio custom-control-input modal_list_view"
                                                           id="{{ $t->id }}" data-col="{{ $t->_value }}"  value="{{ $t->id }}"
                                                           @if ($update)

                                                           @php $saf=json_decode($update->ent_f)
                                                           @endphp
                                                           @if (!empty($saf))
                                                           @foreach ($saf as $f)
                                                           @if ($t->id == $f)
                                                           checked
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                        @endif
                                                    >
                                                    <label class="custom-control-label new_checkbox_val_enter"
                                                           for="{{ $t->id }}">{{ $t->_value }}</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 closebtnmodafilter">

                    <button class="closebtn-modal-" id="modalbtndash" type="button" name="button"
                            data-dismiss="modal">Done</button>
                </div>



            </div>

        </div>
    </div>
</div>






@include('frontend.partials.footer')
@include('frontend.partials.filters-script')
@include('frontend.partials.firebase-script')
