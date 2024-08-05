@include('frontend.partials.header')
<div class="Amercancarpagebody">
    <div class="container">
        <div class="row" style="margin: 15px 0;">
          <!--   <div class="col-12  col-sm-4  col-md-4 col-lg-6 mb-3 search-result-heading">
                <div class="pageheading ">Search Results for Misecellinous</div>
            </div> -->
            <div class="col-12  col-sm-8 col-md-8 col-lg-6 yearbtngrp new-yearbtngrp">

                {{--<div class="input-group mb-1 input-group-wanted ">--}}
                    {{--<input style="background-color: transparent;" type="text" class="form-control" id="input-filter-search-misc" data-col="car_part" placeholder="Search Request">--}}
                    {{--<div class="input-group-append">--}}
                        {{--<span class="input-group-text input-search-misc"><i class="fas fa-search"></i></span>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>

        </div>
        <div class="row m-0">
            <div class="col-12 col-sm-12 col-md-12 col-lg-2">
                <div class="row" style="margin-bottom: 21px;">
                <div class="col-12 input-group mb-1 input-group-wanted">
                    <input style="background-color: transparent;" type="text" class="form-control" id="input-filter-search-misc" data-col="car_part" placeholder="Search">
                    <div class="input-group-append">
                        <span class="input-group-text input-search-misc"><i class="fas fa-search"></i></span>
                    </div>
                </div>
                </div>
                <div class="col-12 ">
                    <hr>
                </div>

                <div class="row">
                    <div class="col-12 accordion" id="accordion">
                        <div class="row  ">
                            <div class=" col-12 categoryheading  collapsed" data-toggle="collapse" href="#collapseThreeModalCondition">
                                <a class="card-title">
                                    Select Condition
                                </a>
                            </div>
                        </div>
                        <div class="priceshow collapse" id="collapseThreeModalCondition" data-parent="#accordion">
                            <div class="row" style="padding: 5px 0;">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input filter-radio-misc" data-col="part_condition" value="New" id="customCheckModelANew">
                                        <label class="custom-control-label" for="customCheckModelANew">
                                            New
                                        </label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input filter-radio-misc" data-col="part_condition" value="Used" id="customCheckModelAUsed">
                                        <label class="custom-control-label" for="customCheckModelAUsed">
                                            Used
                                        </label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <hr>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row  " id="price">
                            <div class=" col-6 categoryheading">
                                Price
                            </div>
                            <div class=" col-6 addiconcategor">
                                <i class='fas fa-plus' id="plusicon"></i>
                                <i class='fas fa-minus' id="minusicon"></i>

                            </div>
                        </div>
                        <div class="priceshow1">
                            <div class="row m-0" style="padding: 5px 0;">
                                <div class="col-4 p-0">
                                    <input type="number" id="val1" placeholder='to' class="form-control" min="0">
                                </div>
                                <div class="col-1 dash d-flex align-items-center justify-content-center">
                                    <i class="fa fa-minus"></i>
                                </div>


                                <div class="col-4 p-0">
                                    <input type="number" id="val2" placeholder='from' class="form-control" min="0">

                                </div>

                            </div>
                            <button  class="btn-show-more-filter-search mb-3" id="price-misc-filter">Search</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-10 p-0 ">
                <span class="error-post-code-misc ml-5"></span>
                <div class="append_class_misc">
                    <div id="apend">
                          @include('frontend.partials.auto-part-tile')
                    </div>
            </div>
            </div>
        </div>
    </div>

</div>
</div>


</div>


</div>
@include('frontend.partials.advertisment-footer')
@include('frontend.partials.footer')
@include('frontend.partials.filters-script')
<script>
      window.onload = function() {
        setTimeout(function() {
            if ( typeof(window.google_jobrunner) === "undefined" ) {
                 alert('If you want to see full Ads Please Off your Ad blocker');
                 console.log("ad blocking found.");
            } else {
                console.log("no ad blocking found.");
            }
        }, 10000);
    };
</script>