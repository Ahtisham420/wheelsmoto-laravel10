<div class="row" id="simplediv">
    {{--      <div class="col-12 col-sm-12 col-md-3 tabmenu  p-0">
               <div class="nav flex-column nav-pills tabs-nav-power new-tab-formobile new-flex-row" id="v-pills-tab"
                         role="tablist" aria-orientation="vertical">
                        <a class="nav-link tablink active" id="v-pills-vehicel-adverts-list-tab" data-toggle="pill" href="#my-adverts"
                           role="tab" aria-controls="v-pills-home" aria-selected="true">My vehicle Adverts</a>
                        <a class="nav-link tablink" id="v-pills-profile-tab" data-toggle="pill" href="#sell-your-car"
                           role="tab" aria-controls="v-pills-profile" aria-selected="false">Sell your car</a>
                        <a class="nav-link tablink" id="v-pills-wanted-tab" data-toggle="pill" href="#wanted-section"
                           role="tab" aria-controls="v-pills-messages" aria-selected="false">Create Buyer Request</a>
                        <a class="nav-link tablink" id="v-pills-wanted-section-tab" data-toggle="pill" href="#wanted-section-list"
                           role="tab" aria-controls="v-pills-messages" aria-selected="false">My Buyer Request</a>
                        <!--<a class="nav-link tablink" id="v-pills-garage-adverts-list-tab" data-toggle="pill" href="#garage-advert-list"-->
                        <!--   role="tab" aria-controls="v-pills-messages" aria-selected="false">My Garage Adverts</a>-->
                        <a class="nav-link tablink" id="v-pills-misecellinous-adverts-list-tab" data-toggle="pill" href="#misecellinous-advert-list"
                           role="tab" aria-controls="v-pills-messages" aria-selected="false">My Auto Parts Adverts</a>
                    </div>
 </div>--}}
    <div class="col-12 col-sm-12 col-md-3 tabmenu  p-0">

        <div class="nav flex-column nav-pills tabs-nav-power new-tab-formobile new-flex-row" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            @if(!empty($tab) && $tab == "my_advert")
                <a class="nav-link tablink active" href="{{route('my-advert')}}">My Adverts</a>
            @else
                <a class="nav-link tablink" href="{{route('my-advert')}}"
                >My Adverts</a>
            @endif
            {{--id="v-pills-sell-your-car-tab"--}}
            @if(!empty($tab) && $tab == "sell_your_car")
                <a class="nav-link tablink active" href="{{route('sell-your-car')}}">Sell your car</a>
            @else
                <a class="nav-link tablink" href="{{route('sell-your-car')}}">Sell your car</a>
            @endif
            {{-- @php

                $packages_array= json_decode($package->attributes)

               $package =   $packages_array->images_per_post

               dd($package);

            @endphp --}}

            {{-- @if()

            @endif --}}



{{--            @if(!empty($tab) && $tab === "buyer_ad")--}}
{{--                <a class="nav-link tablink active"  href="{{route('create-buyer-request')}}">Create Buyer Request</a>--}}
{{--            @else--}}
{{--                <a class="nav-link tablink"  href="{{route('create-buyer-request')}}">Create Buyer Request</a>--}}
{{--            @endif--}}
{{--            @if(!empty($tab) && $tab === "buyer_list")--}}
{{--                <a class="nav-link tablink active" href="{{route('buyer-list')}}">My Buyer Request</a>--}}
{{--            @else--}}
{{--                <a class="nav-link tablink" href="{{route('buyer-list')}}">My Buyer Request</a>--}}
{{--        @endif--}}
{{--             @if(!empty($tab) && $tab === "garage")--}}
{{--         <a class="nav-link tablink active" href="{{route('garage-list')}}">My Garage Advert</a>--}}
{{--           @else--}}
{{--       <a class="nav-link tablink" href="{{route('garage-list')}}">My Garage Advert</a>--}}
{{--            @endif--}}
              {{--    @if(!empty($tab) && $tab === "autopart_ad")--}}
        {{--        <a class="nav-link tablink active" id="profilesection" href="{{route('autopart-advert')}}" style="border-bottom: 3px solid rgb(0, 166, 81);">Create Auto Part</a>--}}
        {{--    @else--}}
        {{--        <a class="nav-link tablink" href="{{route('autopart-advert')}}">Create Auto Part</a>--}}
        {{--    @endif--}}
        {{--    @if(!empty($tab) && $tab === "auto-part")--}}
        {{--        <a class="nav-link tablink active" id="profilesection" href="{{route('autopart-list')}}" style="border-bottom: 3px solid rgb(0, 166, 81);">My Auto Part</a>--}}
        {{--    @else--}}
        {{--        <a class="nav-link tablink" href="{{route('autopart-list')}}">My Auto Part</a>--}}
        {{--    @endif--}}


        </div>


    </div>

    <div class="col-12 col-sm-12 col-md-9  mobile-tab-showing">

        <div class="row " id=" last-open">

            <div class="col-12 tabshowing ">

                {{--<img class="badge1" src="{{ config('app.ui_asset_url') . 'frontend/img/carselling/badge.png' }}">--}}

                <div class="tab-content" id="v-pills-tabContent">

                    @if(!empty($tab) && $tab === "my_advert")
                        @include("frontend.myadvertsubtab")
                    @elseif(!empty($tab) && $tab === "sell_your_car")
                        @include("frontend.sellyourcar1")
{{--                    @elseif(!empty($tab) && $tab === "buyer_ad")--}}
{{--                        @include("frontend.wantedsectionsubtab")--}}
{{--                    @elseif(!empty($tab) && $tab === "buyer_list")--}}
{{--                        @include("frontend.wanted_list")--}}
{{--                    @elseif(!empty($tab) && $tab === "garage_advert")--}}
{{--                        @include("frontend.garageadvert")--}}
{{--                    @elseif(!empty($tab) && $tab === "garage")--}}
{{--                        @include("frontend.garage")--}}
               {{--    @elseif(!empty($tab) && $tab === "autopart_ad")--}}
                {{--        @include("frontend.misslenioussubtab")--}}
                {{--    @elseif(!empty($tab) && $tab === "auto-part")--}}
                {{--        @include("frontend.missleniousaddsubtab")--}}

                    @endif


                </div>

            </div>


        </div>


    </div>

</div>
