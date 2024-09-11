@include('frontend.partials.header')
<style type="text/css">
    .container1 {
        position: relative;
        width: 100%;
    }


    .container1 .btn1 {
        position: absolute;
        top: 60%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        background-color: #555;
        color: white;
        font-size: 16px;
        padding: 12px 24px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        text-align: center;
        color: white !important;
        background: #00a651;
        padding-left: 6%;
        padding-right: 6%;
        border-radius: 25px;
        text-decoration: none;
    }

    .container1 .btn1:hover {
        background-color: green;
    }

    .view-all-button {
        cursor: pointer;
        border: 0;
        padding: 15px var(--padding-11xl);
        background-color: var(--accent);
        height: 50px;
        border-radius: var(--br-9xs);
        overflow: hidden;
        box-sizing: border-box;
        font-size: var(--font-size-base);
        font-weight: 500;
        color: var(--white);
    }

    .view-all-button:focus {
        outline: none;
    }

    .view-all-button a {
        text-decoration: none;
        color: var(--white)
    }
    .show-more-btn{
        cursor: pointer;
        border: none;
        background-color: transparent;
        font-weight: 600;
        color: #00c29f;
    }
    .show-more-btn:focus{
        outline: none;
    }

    .view-more-btn{
        cursor: pointer;
        border: none;
        background-color: transparent;
        font-weight: 600;
        color: #00c29f;
        padding: 11px var(--padding-11xl);
    }
    .view-more-btn:focus{
        outline: none;
    }

    .loading-container {
        position: relative;
        height: 5rem;
        width: 5rem;
    }

    .loading-progress {
        position: absolute;
        height: calc(100% + 6px);
        width: calc(100% + 6px);
        border-radius: 50%;
        border: 5px solid #ACCAFF36;
        border-radius: 50%;

        &::before {
            content: "";
            position: absolute;
            height: calc(100% + 6px);
            width: calc(100% + 6px);
            border-radius: 50%;
            border: 5px solid transparent;
            border-top-color: #00c29f;
            top: -3px;
            left: -2px;
            animation: spin 1s linear infinite;
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div class="hero-container">
    <div class="hero-container-inner">
        <div class="frame-parent">
            <div class="find-a-host-for-every-journey-parent">
                <b class="find-a-host-container">
                    <span>Hunt a </span>
                    <span class="host">Wheel</span>
                    <span> with Wheel's Moto</span>
                </b>
                <div class="discover-the-best">
                    One stop solution for all your vehicles need!
                </div>
            </div>
            <div class="form search-bar">
                <select class="autocompletebasic filter-index dropdown-item select2 select-index brand-select-base" data-placeholder="Select Make" name="brand">
                    <option selected>
                        Select Brand
                    </option>
                    @if(isset($brands) && count($brands) > 0)
                        @foreach($brands as $data)
                            <option value="{{$data->id}}" data-id="{{$data->id}}">{{$data->name}}</option>
                        @endforeach
                    @endif
                </select>
                {{--                <div class="autocompletebasic">--}}
                {{--                    <div class="text">Accommodation</div>      </div>--}}

                <div class="grouped">
                    <select class="label-parent dropdown-item select2 select-index filter-index make-brand-append"
                    data-placeholder="Select Model" name="modal">
                        <option selected>
                            Select Model
                        </option>
                        @if(isset($md_top) && count($md_top) > 0)
                            @foreach($md_top as $data)
                                <option value="{{$data->_key}}" data-id="{{$data->_key}}">{{$data->_value}}</option>
                            @endforeach
                        @endif
                    </select>
                    {{--                <div class="label-parent">--}}
                    {{--                    <div class="label">Check-in</div>     </div>--}}
                    <div class="icon">
                    </div>
                    <select class="label-parent dropdown-item select2 select-index filter-index" data-placeholder="Select Year" name="year">
                        <option selected value="">
                            Select Year
                        </option>
                            {{ $last= date('Y')-120 }}
                            {{ $now = date('Y') }}
                            @for ($i = $now; $i >= $last; $i--)
                            <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                    </select>
                    {{--                <div class="label-parent">--}}
                    {{--                    <div class="label">Check-out</div>    </div>--}}
                    <select class="label-container select2 select-index price-filter-range"
                    data-placeholder="Select Price" name="price">
                        <option selected value="">Price Range</option>
                        <option value="1-500">₨1-500</option>
                        <option value="500-1000">₨500-1000</option>
                        <option value="1000-1500">₨1000-1500</option>
                        <option value="1500-2000">₨1500-2000</option>
                        <option value="2000-2600">₨2000-2600</option>
                        <option value="2600-3000">₨2600-3000</option>
                        <option value="3000-3500">₨3000-3500</option>
                        <option value="3500-4000">₨3500-4000</option>
                        <option value="4000-4500">₨4000-4500</option>
                        <option value="4500-5000">₨4500-5000</option>
                        <option value="5000-5500">₨5000-5500</option>
                        <option value="5500-6000">₨5500-6000</option>
                        <option value="6000-6500">₨6000-6500</option>
                        <option value="6500-7000">₨6500-7000</option>
                        <option value="7000-7500">₨7000-7500</option>
                        <option value="7500-8000">₨7500-8000</option>
                        <option value="8000-8500">₨8000-8500</option>
                        <option value="8500-9000">₨8500-9000</option>
                        <option value="9000-9500">₨9000-9500</option>
                        <option value="9500-10000">₨9500-10000</option>
                        <option value="above">above</option>
                    </select>
                    {{--                <div class="label-container">--}}
                    {{--                    <div class="label">Guest</div>      </div>--}}
                </div>
                <button class="search-button" id="search-filter-btn-index">
                    <img class="iconsearch" alt=""
                         src="{{ config('app.ui_asset_url').'frontend/img/demoImages/iconsearch.svg' }}"/>

                    <div class="button" >Search</div>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="stays-section">
    <div class="search-section-header">
        <div class="stays-nearby-parent">
            <div class="stays-nearby">Featured</div>
        </div>
        <div class="layout-selection">
            <a href="{{route('index-front-filter',["query"=>"all"])}}"><button class="view-all-button">View All</button></a>
        </div>
    </div>
   <div class="homes" id="homePageFeatureListing">

   </div>
</div>
<div class="stays-section">
    <div class="search-section-header">
        <div class="stays-nearby-parent">
            <div class="stays-nearby">Near By</div>
        </div>
        <div class="layout-selection">
            <a href="{{route('index-front-filter',["query"=>"all"])}}"><button class="view-all-button">View All</button></a>
        </div>
    </div>
    <div class="homesNearby" id="featureListing">

    </div>
</div>
@include('frontend.partials.scripts')
@if(empty(session("userLoggedIn")) && session("userLoggedIn") == false)
    <div class="modal fade bd-example-modal-lg" id='register-my-modal' tabindex="-1" role="dialog"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!--<div>-->
                <!--    <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                <!--  <span aria-hidden="true">&times;</span>-->
                <!--</button>-->
                <!--</div>-->
                <div class="container1">
                    <img src="https://wheelsmoto.com/public/coverPage.png" alt="register now"
                         style="width:100%;height:100%;">
                    <a class="btn1" href="{{route('user-login')}}">Register Now</a>
                </div>
            </div>
        </div>
    </div>
@endif
@include('frontend.partials.footer')
@include('frontend.partials.filters-script')

<script type="text/javascript">
    // $(document).ready(function () {
    //     $('#register-my-modal').modal('show');
    // });
</script>
