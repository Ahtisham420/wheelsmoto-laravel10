@include('frontend.partials.header')


        <div class="CarDetailSection">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                        <div class=" row m-0 imagecontaner">
                            <div class="col-8 col-md-12 col-lg-8 col-xl-8 audimainimg">
                                <p>20% OFF</p>
                                <img  src="{{ config('app.ui_asset_url').'frontend/img/audiselling/mainpic.jpg' }}" alt="Card image cap">
                            </div>
                            <div class="col-4 col-md-12  col-lg-4 col-xl-4 car-in-row">
                                <div class="row sideimg">
                                    <div class="col-12 col-md-4 col-lg-12 col-xl-12">
                                        <img  src="{{ config('app.ui_asset_url').'frontend/img/audiselling/1.jpg' }}" alt="Card image cap">
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-12 col-xl-12">
                                        <img  src="{{ config('app.ui_asset_url').'frontend/img/audiselling/2.jpg' }}" alt="Card image cap">
                                    </div>
                                    <div class="col-12 col-md-4 col-lg-12 col-xl-12">
                                        <img  src="{{ config('app.ui_asset_url').'frontend/img/audiselling/3.jpg' }}" alt="Card image cap">

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row sharediv">
                            <div class="col-4 col-sm-3 col-md-3 col-lg-2 col-xl-2 hearshareicon">
                                <i class="fa fa-heart"></i>
                                <i class="fa fa-share-alt"></i>
                            </div>
                            <div class="col-3 col-sm-4 col-md-2 col-lg-2 rating p-0">

                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star laststar"></i>

                            </div>
                            <div class="col-5 col-sm-5 col-md-4 col-lg-4 reviewsnumber"> 4.5 Ratings <span style=" color: #000000;"> | </span> 114 Reviews  </div>
                            <div class="col-12  col-md-3 col-lg-3 reportcar"> <i class="fas fa-exclamation-triangle"></i>Report this car</div>
                        </div>
                        <div class="mobileaccordian accordion shadow" id="accordionExample" >
                            <div class="row m-0 name-show-mobile">
                                <div class="col-8 col-sm-8 carname carselling-carNAme carspecs p-0">
                                    <h2>Audi AUDI A1</h2>
                                      <h2> Prosmatic 2018</h2>
                                      <p>Sportback S line 35 TFSI 150 PS S tronic
                                        1.5 5dr</p>
                                </div>
                                <div class="col-4 col-sm-4 carprice carpriceformobile carspecspric p-0" style="display: block">
                                    <p><span > RPP</span>  <del> £26,125</del></p>
                                    £25,360
                                </div>
                                {{-- <div class="col-8 p-0 carspecs">
                                    <p>Sportback S line 35 TFSI 150 PS S tronic
                                        1.5 5dr</p>
                                </div> --}}
                                {{-- <div class="col-6 col-sm-4 p-0 carspecspric">
                                    £25,360
                                </div> --}}
                                <div class="col-4 col-sm-4  p-0 purchasediv  purchasedivmobilecarselling" style="position: relative;">
                                    <div class="purchase" style="border: none"> Purchase</div>
                                    <label class="switch switchmobileseller">
                                        <input type="checkbox">
                                        <span class="slidercarselling round"></span>
                                    </label>

                                    </div>
                                <div class="col-4  p-0 swapsectionicon">

                                   <div class="swaplabel"> Lease</div>
                                    <div class="swapdivicon">
                                        <img  src="{{ config('app.ui_asset_url').'frontend/img/clientimages/Group 3313.png' }}" alt="Card image cap">

                                    </div>
                                    <div class="swaplabel">Swap</div>
                                </div>
                                <div class="col-4  p-0 save saveprice-carselling">
                                    <span style="color: #707070;font-size: 16px;">Save</span>
                                    <div class="saveprice">£280</div>

                                </div>
                            </div>
                            <div class="col-12 mobile-heading-description p-0" id="headingOne">
                                <h2 class="mb-0">
                                    <button type="button" data-toggle="collapse" data-target="#collapseOnemobile" aria-expanded="true" aria-controls="collapseOnemobiole" class="btn btn-link text-dark font-weight-bold text-uppercase collapsible-link">Description</button>
                                </h2>
                            </div>
                            <div id="collapseOnemobile" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse ">
                                <div class="col-12 cardescription newcarddescription p-0">
                                    <h3>Description</h3>
                                    <p>This unique Knot cushion is inspired by nautical elements and aesthetics. The cushion features an original tying technique that makes it both beautiful and functional. It adds a pop of color and texture to any room.  </p>
                                </div>
                                <div class="col-12 techspecs p-0">
                                    <h3>Tech Specs</h3>
                                </div>
                                <div class="row">
                                    <div class="col-12"><hr></div>

                                        <div class="col-12">
                                        <div id="accordion" class="accordion">
                                            <div class="card mb-0">
                                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne">

                                                    <img  src="{{ config('app.ui_asset_url').'frontend/img/techspecsIcon/1.png' }}" alt="Card image cap">

                                                    <a class="card-title">

                                                        Economy & Performance
                                                    </a>
                                                </div>
                                                <div id="collapseOne" class="card-body collapse" data-parent="#accordion" >
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                            qui officia deserunt mollit anim id est laborum.
                                                        </p>
                                                </div>

                                            </div>
                                        </div>
                                        </div>
                                    <div class="col-12"><hr></div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div id="accordion" class="accordion">
                                            <div class="card mb-0">
                                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseTwo">

                                                    <img  src="{{ config('app.ui_asset_url').'frontend/img/techspecsIcon/2.png' }}" alt="Card image cap">

                                                    <a class="card-title">

                                                        Driver Convenience
                                                    </a>
                                                </div>
                                                <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                            qui officia deserunt mollit anim id est laborum.
                                                        </p>
                                                </div>

                                            </div>
                                        </div>
                                     </div>
                                    <div class="col-12"><hr></div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div id="accordion" class="accordion">
                                            <div class="card mb-0">
                                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseThree">

                                                    <img  src="{{ config('app.ui_asset_url').'frontend/img/techspecsIcon/3.png' }}" alt="Card image cap">

                                                    <a class="card-title">

                                                        Safety
                                                    </a>
                                                </div>
                                                <div id="collapseThree" class="card-body collapse" data-parent="#accordion" >
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                            qui officia deserunt mollit anim id est laborum.
                                                        </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12"><hr></div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div id="accordion" class="accordion">
                                            <div class="card mb-0">
                                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseFour">

                                                    <img  src="{{ config('app.ui_asset_url').'frontend/img/techspecsIcon/4.png' }}" alt="Card image cap">

                                                    <a class="card-title">

                                                        Exterior Features
                                                    </a>
                                                </div>
                                                <div id="collapseFour" class="card-body collapse" data-parent="#accordion" >
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                            qui officia deserunt mollit anim id est laborum.
                                                        </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12"><hr></div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div id="accordion" class="accordion">
                                            <div class="card mb-0">
                                                <div class="card-header collapsed" data-toggle="collapse" href="#collapseFive">

                                                    <img  src="{{ config('app.ui_asset_url').'frontend/img/techspecsIcon/5.png' }}" alt="Card image cap">


                                                    <a class="card-title">

                                                        Interior Features
                                                    </a>
                                                </div>
                                                <div id="collapseFive" class="card-body collapse" data-parent="#accordion" >
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                            qui officia deserunt mollit anim id est laborum.
                                                        </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12"><hr></div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div id="accordion" class="accordion">
                                            <div class="card mb-0">
                                                <div class="card-header collapsed" data-toggle="collapse" href="#collapsesix">

                                                    <img  src="{{ config('app.ui_asset_url').'frontend/img/techspecsIcon/7.png' }}" alt="Card image cap">

                                                    <a class="card-title">

                                                        Dimensions
                                                    </a>
                                                </div>
                                                <div id="collapsesix" class="card-body collapse" data-parent="#accordion" >
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                                        exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
                                                        nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                                            qui officia deserunt mollit anim id est laborum.
                                                        </p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12"><hr></div>
                                </div>
                                <div class="row">
                                    <div class="col-12 techspecs p-0">
                                        <h3>TSeller Location</h3>
                                    </div>
                                    <div class="col-12 map" style="width:100%;height:auto;">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13610.381922114779!2d74.38530752237786!3d31.480312101747103!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391905fd556dd06b%3A0xd3d9770b88f0c919!2sDha%20Phase%201%2C%20Lahore%2C%20Punjab%2C%20Pakistan!5e0!3m2!1sen!2s!4v1589234663895!5m2!1sen!2s" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                                    </div>
                                </div>
                                <div class="row commentSection">
                                    <div class="col-12 comments">
                                        Comments
                                    </div>
                                    <div class="col-12 commentsmargin ">
                                        <div class="clientRating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star laststarclientration"></i>
                                            <span style="color: #707070;font-size:12px;font-weight:bolder;">3 days</span>
                                            <p>
                                                Amazing piece. Super comfortable to kick back on or for propping up my feet. Color is true<br> to image. Love it!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-1 clientimages">
                                                <img  src="{{ config('app.ui_asset_url').'frontend/img/clientimages/1.png' }}" alt="Card image cap">

                                            </div>
                                            <div class="col-6 clientName p-0">
                                                <h6>John Smith, Architector</h6>
                                                <p>Los Angeles, CA</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12"><hr></div>
                                    <div class="col-12 ">
                                        <div class="clientRating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star laststarclientration"></i>
                                            <span style="color: #707070;font-size:12px;font-weight:bolder;">3 days</span>
                                            <p>
                                                The coolest piece of furniture you’ll ever own!! It fits perfectly next my living room couch. Everyone who comes over comments on it!
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-1 clientimages">
                                                <img  src="{{ config('app.ui_asset_url').'frontend/img/clientimages/2.png' }}" alt="Card image cap">
                                            </div>
                                            <div class="col-6 clientName p-0">
                                                <h6>John Smith, Architector</h6>
                                                <p>San Francisco, CA</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12"><hr></div>
                                    <div class="col-12 ">
                                        <div class="clientRating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star laststarclientration"></i>
                                            <span style="color: #707070;font-size:12px;font-weight:bolder;">3 days</span>
                                            <p> The coolest piece of furniture you’ll ever own!! It fits perfectly next my living room couch. Everyone who comes over comments on it!  </p>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-1 clientimages">
                                                <img  src="{{ config('app.ui_asset_url').'frontend/img/clientimages/1.png' }}" alt="Card image cap">
                                            </div>
                                            <div class="col-6 clientName p-0">
                                                <h6>John Smith, Architector</h6>
                                                <p>San Francisco, CA</p>
                                            </div>
                                        </div>
                                    </div>



                                </div>

                            </div>


                        </div>


                    </div>
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="row">
                            <div class="col-12 name-hide-mobile">
                                    <div class="col-8 carname-carselling p-0">
                                        <h2>Audi AUDI A1</h2>
                                        <h2> Prosmatic 2018</h2>
                                    </div>
                                    <div class="col-4 carprice p-0">
                                        <p><span > RPP</span>  <del> £26,125</del></p>
                                    </div>
                                    <div class="col-8 p-0 carspecs">
                                        <p>Sportback S line 35 TFSI 150 PS S tronic
                                            1.5 5dr</p>
                                    </div>
                                    <div class="col-4 p-0 carspecspriccarselling">
                                        £25,360
                                    </div>
                                    <div class="col-4 col-md-12 col-lg-6 col-xl-4 p-0 purchasedivcarselling" style="position: relative;">
                                        <div class="purchase"> Purchase</div>
                                        <label class="switchcarselling">
                                            <input type="checkbox">
                                            <span class="slidercarselling round"></span>
                                        </label>

                                        </div>
                                    <div class="col-4 col-md-6 col-lg-6 col-xl-4  p-0 swapsectionicon">

                                    <div class="swaplabel"> Lease</div>
                                        <div class="swapdivicon">
                                            <img  src="{{ config('app.ui_asset_url').'frontend/img/clientimages/Group 3313.png' }}" alt="Card image cap">

                                        </div>
                                        <div class="swaplabel">Swap</div>
                                    </div>
                                    <div class="col-4 col-md-6 col-lg-6 col-xl-4 p-0 savecarselling">
                                        <span style="color: #707070;font-size: 16px;">Save</span>
                                        <div class="saveprice">£280</div>

                                    </div>
                            </div>
                            <div class="col-12 powerdiv p-0">
                                <img  src="{{ config('app.ui_asset_url').'frontend/img/clientimages/Path 4361.png' }}" alt="Card image cap">

                                68 buyers have viewed this car in the last 24 hours
                            </div>
                            <div class="col-12">
                            <div class=" row m soldby">
                                <div class="col-6 alignsolddiv " >
                                    <p class="m-0">Sold by</p>
                                    <h3 class="m-0">Prada Car Gear</h3>
                                     <h4 class="m-0">(UK Melbourne)</h4>
                                </div>
                                <div class="col-6 soldbydiv">
                                   <p class="m-0">Chat Now</p>
                                </div>
                                <div class="col-12"><hr></div>
                                <div class="col-6 alignsolddiv">

                                    <h3 class="m-0">Seller Type</h3>

                                </div>
                                <div class="col-6 soldbydiv" style="display: flex; align-items: center;  justify-content: center;">
                                    <select class="form-control" placeholder="Seller Type" style="border: solid 1px #707070; border-radius: 0;">
                                        <option>Private</option>
                                        <option>Owner</option>


                                      </select>
                                </div>
                                <div class="row m-0 borderdiv">
                                    <div class="col-4 " >
                                      <p  > Positive Seller Rating</p>
                                      <h1>63%</h1>
                                    </div>
                                    <div class="col-4 sideborder " >
                                       <p  > Ship on Time</p>
                                       <h1>98%</h1>
                                    </div>
                                    <div class="col-4 " >
                                        <p  >Chat Response
                                            Rate</p>
                                            <h1>93%</h1>
                                    </div>

                                </div>
                                <div class="col-12 gtprofile">
                                    Go to Profile
                                </div>

                            </div>
                            </div>


                        </div>
                        <div class="row summarysection">
                            <div class="col-12 summaryheading">
                                <i class="fas fa-file-alt"></i>
                                Deal Summary
                            </div>
                            <div class="col-6 summarybillheading " >Purchase type:</div>
                            <div class="col-6 summarybilldetail">Paypal</div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Model:</div>
                            <div class="col-6 summarybilldetail">Audi</div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Variant:</div>
                            <div class="col-6 summarybilldetail">A5</div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Trim:</div>
                            <div class="col-6 summarybilldetail">Couple (2007-2012) B8</div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Derivative:</div>
                            <div class="col-6 summarybilldetail">2.7 TDI Sport Couple 2dr </div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Body type:</div>
                            <div class="col-6 summarybilldetail">Couple</div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Transmission:</div>
                            <div class="col-6 summarybilldetail">Automatic</div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Fuel type:</div>
                            <div class="col-6 summarybilldetail">Diesel</div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Colour:</div>
                            <div class="col-6 summarybilldetail">Black</div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Registration Date:</div>
                            <div class="col-6 summarybilldetail">05/01/2009</div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Arrangement fee:</div>
                            <div class="col-6 summarybilldetail">£125 plus VAT</div>
                            <div class="col-12"><hr></div>
                            <div class="col-6 summarybillheading " >Delivery:</div>
                            <div class="col-6 summarybilldetail">Free UK Maintained</div>
                            <div class="col-12"><hr></div>
                            <div class="col-9 summarybillheading" style="margin-top: 30px; padding-bottom: 40px;">Excess mileage fees may apply.
                                Underwriting restrictions may apply.</div>

                        </div>
                        <div class="col-12 happydeal">
                            <img  src="{{ config('app.ui_asset_url').'frontend/img/sumamrysectiondiv/Group 3453.png' }}" alt="Card image cap">

                            Happy with this deal?

                        </div>
                        <div class="col-12 ordernowbtn">
                            <button>Order Now</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="leasecarsection">
            <div class="container">
                <div class="row headingsection">
                    <div class="col-12 col-md-6 col-xl-4 ">
                        <div class="Leasecarsectionheading"> View Similar Product</div>

                        <img  src="{{ config('app.ui_asset_url').'frontend/img/featuredCar/Group 3236.png' }}" alt="Card image cap">

                    </div>
                    <div class="col-0 col-md-6 col-xl-8  p-0 hrsection">
                        <hr >
                    </div>



                </div>
           </div>
           <div class=" sliderdiv mobile-slider-div">
            <div class="  slickslidercontent ">
                <div class="col-12 ">
                    <div class="card">
                        <div class="cardimage">
                            <p>Used</p>
                            <img class="card-img-top" src="{{ config('app.ui_asset_url').'frontend/img/leasecarsection/1.jpg' }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <div class=" row ">
                                <div class="col-8  americancardbody "> 2020 Volkswagen Passat</div>
                                <div class="col-4  americancardbodyendday "> Ends in 4 days</div>
                                <div class="col-4 ">
                                    <p class="cardPrice">$ 7.766</p>
                                </div>
                                <div class="col-8  bidnowbtndiv"><button class="bidnowbtn">Bid Now</button></div>
                            </div>
                            <p class="cardescription">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="card">
                        <div class="cardimage">
                            <p>Used</p>
                            <img class="card-img-top" src="{{ config('app.ui_asset_url').'frontend/img/leasecarsection/2.png' }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <div class=" row ">
                                <div class="col-8  americancardbody "> 2020 Volkswagen Passat</div>
                                <div class="col-4  americancardbodyendday "> Ends in 4 days</div>
                                <div class="col-4 ">
                                    <p class="cardPrice">$ 7.766</p>
                                </div>
                                <div class="col-8  bidnowbtndiv"><button class="bidnowbtn">Bid Now</button></div>
                            </div>


                            <p class="cardescription">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="card">
                        <div class="cardimage">
                            <p>Used</p>
                            <img class="card-img-top" src="{{ config('app.ui_asset_url').'frontend/img/leasecarsection/3.jpg' }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <div class=" row ">
                                <div class="col-8 americancardbody "> 2020 Volkswagen Passat</div>
                                <div class="col-4  americancardbodyendday "> Ends in 4 days</div>
                                <div class="col-4 ">
                                    <p class="cardPrice">$ 7.766</p>
                                </div>
                                <div class="col-8  bidnowbtndiv"><button class="bidnowbtn">Bid Now</button></div>
                            </div>
                            <p class="cardescription">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="card">
                        <div class="cardimage">
                            <p>Used</p>
                            <img class="card-img-top" src="{{ config('app.ui_asset_url').'frontend/img/leasecarsection/3.jpg' }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <div class=" row ">
                                <div class="col-8  americancardbody "> 2020 Volkswagen Passat</div>
                                <div class="col-4  americancardbodyendday "> Ends in 4 days</div>
                                <div class="col-4 ">
                                    <p class="cardPrice">$ 7.766</p>
                                </div>
                                <div class="col-8  bidnowbtndiv"><button class="bidnowbtn">Bid Now</button></div>
                            </div>
                            <p class="cardescription">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class="card">
                        <div class="cardimage">
                            <p>Used</p>
                            <img class="card-img-top" src="{{ config('app.ui_asset_url').'frontend/img/leasecarsection/2.png' }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <div class=" row ">
                                <div class="col-8  americancardbody "> 2020 Volkswagen Passat</div>
                                <div class="col-4  americancardbodyendday "> Ends in 4 days</div>
                                <div class="col-4 ">
                                    <p class="cardPrice">$ 7.766</p>
                                </div>
                                <div class="col-8  bidnowbtndiv"><button class="bidnowbtn">Bid Now</button></div>
                            </div>


                            <p class="cardescription">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                    </div>
                </div>

            </div>
                <div class="viewalldeals">
                    <p>Viwe All Leasing deals <span><i class="fas fa-long-arrow-alt-right"></i></span></p>
                </div>
            </div>

        </div>
        <div class="row m-0">
            <div class="col-12 swapheading mobile-heading" style="position: static; ">
                Swap your car
            </div>
        </div>

        <div class="swapsection">
            <div class="row m-0 p-0">
                <div class="col-sm-12 cl-md-12 col-lg-6 col-xlg-6 blogimg  p-0">
                    <img src="{{ config('app.ui_asset_url').'frontend/img/swap/Image.jpg' }}" >


                </div>
                <div class="col-sm-12 cl-md-12 col-lg-6 col-xlg-6  " style="position: relative;background-color: #f8f8f8;">
                    <div class="row ">
                        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-10  swapdiv swapdivindex">
                            <div class="row">
                                <div class="col-7 swapheading swapheading1 positon-swap-heading">
                                    Swap your car
                                </div>
                                <div class="col-9 col-sm-12  view-all-cars" style="text-align: end;">
                                    800 cars available | <span style="color: #e4001b;">View all</span>

                                </div>
                                <div class="col-3  swapicondiv swapicondiv1">
                                    <div class="swapicon">
                                        <img class="swapiconpic" src="{{ config('app.ui_asset_url').'frontend/img/swap//Group 3313.png' }}" >


                                    </div>
                                </div>
                                <div class="col col-sm-12 col-md-12 col-lg-9 col-xl-9 col-12 form-margin">
                                    <div class="cardiscription">
                                        <p>Excepteur sint occaecat cupidatat non “In my history of
                                            working with trade show vendors, I can honestly say that
                                            there is not one company that I've ever worked.</p>
                                    </div>
                                    <div class="col-12">

                                        <div class="formclassresponsive" style="text-align: left!important;">

                                                <div class="form-row">
                                                    <div class="col-8">
                                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Car Brand</label>


                                                        <select class="form-control" placeholder="Suzuki Picanto" style="border: solid 1px #707070; border-radius: 0;">
                                                            <option>e.g. LL58 JFK</option>
                                                            <option>e.g. LL58 JFK</option>
                                                            <option>e.g. LL58 JFK</option>
                                                            <option>e.g. LL58 JFK</option>
                                                        </select>

                                                    </div>
                                                    <div class="col-4">
                                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Year</label>


                                                        <select class="form-control" placeholder="e.g. 2014" style="border: solid 1px #707070; border-radius: 0;">
                                                            <option>2014</option>
                                                            <option>2014</option>
                                                            <option>2014</option>
                                                            <option>2014</option>
                                                            <option>2014</option>

                                                        </select>

                                                    </div>

                                                </div>
                                                <div class="form-row">
                                                    <div class="col-8">
                                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Modal</label>


                                                        <select class="form-control" placeholder="Accord" style="border: solid 1px #707070; border-radius: 0;">
                                                            <option>Accord</option>
                                                            <option>Accord</option>
                                                            <option>Accord</option>
                                                            <option>Accord</option>

                                                        </select>

                                                    </div>
                                                    <div class="col-4">
                                                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Condition</label>


                                                        <select class="form-control" placeholder="e.g. Average" style="border: solid 1px #707070; border-radius: 0;">
                                                            <option>Good</option>
                                                            <option>Average</option>
                                                            <option>Good</option>

                                                        </select>

                                                    </div>

                                                </div>
                                                <div class="form-group newform" style="padding-top: 10px; padding-bottom: 10px;">



                                                    <button type="submit" class="becomrental becomrental1" style="margin-top: 20px;">Swap</button>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        </div>

        <div class="onlineAuctions">
            <div class="container">
            <div class="row headingsection">
                <div class="col-12 ">
                    <div class="Leasecarsectionheading">Online Auctions <span style="color:#e4001b;font-size: 25px;"> (More Online Auctions)</span></div>

                    <img src="{{ config('app.ui_asset_url').'frontend/img/featuredCar/Group 3236.png' }}" >
                </div>

            </div>
           </div>
           <div class=" sliderdiv mobile-slider-div">


                <div class="  slickslidercontent ">
                    <div class="col-12 ">
                        <div class="card" >
                            <div class="cardimage">
                                <p>Used</p>
                                <img class="card-img-top" src="{{ config('app.ui_asset_url').'frontend/img/leasecarsection/2.png' }}" alt="Card image cap">
                            </div>
                            <div class="card-body">
                            <div class=" row ">
                                <div class="col-8  americancardbody "> 2020 Volkswagen Passat</div>
                                <div class="col-4  americancardbodyendday "> Ends in 4 days</div>
                                <div class="col-4 "><p class="cardPrice">$ 7.766</p></div>
                                <div class="col-8  bidnowbtndiv"><button class="bidnowbtn">Bid Now</button></div>
                            </div>
                                <p class="cardescription">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>
                            </div>
                    </div>
                    <div class="col-12 ">
                        <div class="card" >
                            <div class="cardimage">
                                <p>Used</p>
                                <img class="card-img-top" src="{{ config('app.ui_asset_url').'frontend/img/leasecarsection/3.jpg' }}" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <div class=" row ">
                                    <div class="col-8  americancardbody "> 2020 Volkswagen Passat</div>
                                    <div class="col-4  americancardbodyendday "> Ends in 4 days</div>
                                    <div class="col-4 "><p class="cardPrice">$ 7.766</p></div>
                                    <div class="col-8  bidnowbtndiv"><button class="bidnowbtn">Bid Now</button></div>
                                </div>


                                <p class="cardescription">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>
                            </div>
                    </div>
                    <div class="col-12 ">
                        <div class="card" >
                            <div class="cardimage">
                                <p>Used</p>
                                <img class="card-img-top" src="{{ config('app.ui_asset_url').'frontend/img/leasecarsection/1.jpg' }}" alt="Card image cap">
                            </div>
                            <div class="card-body">
                            <div class=" row ">
                                <div class="col-8 americancardbody "> 2020 Volkswagen Passat</div>
                                <div class="col-4  americancardbodyendday "> Ends in 4 days</div>
                                <div class="col-4 "><p class="cardPrice">$ 7.766</p></div>
                                <div class="col-8  bidnowbtndiv"><button class="bidnowbtn">Bid Now</button></div>
                            </div>
                                <p class="cardescription">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>
                            </div>
                    </div>
                    <div class="col-12 ">
                    <div class="card" >
                        <div class="cardimage">
                            <p>Used</p>
                            <img class="card-img-top" src="{{ config('app.ui_asset_url').'frontend/img/leasecarsection/3.jpg' }}" alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <div class=" row ">
                                <div class="col-8  americancardbody "> 2020 Volkswagen Passat</div>
                                <div class="col-4  americancardbodyendday "> Ends in 4 days</div>
                                <div class="col-4 "><p class="cardPrice">$ 7.766</p></div>
                                <div class="col-8  bidnowbtndiv"><button class="bidnowbtn">Bid Now</button></div>
                            </div>
                            <p class="cardescription">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                        </div>
                        </div>
                    </div> <div class="col-12 ">
                        <div class="card" >
                            <div class="cardimage">
                                <p>Used</p>
                                <img class="card-img-top" src="{{ config('app.ui_asset_url').'frontend/img/leasecarsection/2.png' }}" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <div class=" row ">
                                    <div class="col-8  americancardbody "> 2020 Volkswagen Passat</div>
                                    <div class="col-4  americancardbodyendday "> Ends in 4 days</div>
                                    <div class="col-4 "><p class="cardPrice">$ 7.766</p></div>
                                    <div class="col-8  bidnowbtndiv"><button class="bidnowbtn">Bid Now</button></div>
                                </div>


                                <p class="cardescription">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                            </div>
                            </div>
                    </div>

                </div>

           </div>

        </div>



        @include('frontend.partials.footer')
