@include('frontend.partials.header')
@include('frontend.partials.login-modal')
<?php
$car_a = App\CarSetting::all();
$car_b = App\Brand::all();
$car_categories = App\Category::all();
$car_user = App\User_car::all();
?>
<style>
    .save_list {
        color: #00a651 !important;
    }
</style>
<div class="Amercancarpagebody">
    <div class="container">
        <div class="row" style="margin: 44px 0;">
            <div class="col-12  col-sm-6 col-md-6 col-lg-6 " style="justify-content:flex-start;">
                <h3 id="heding-buyer-request">All Buyer Requests</h3>
            </div>
            <div class="col-12  col-sm-6 col-md-6 col-lg-6  p-0 d-flex aloign-items-center justify-content-end ">
                <div class="input-group mb-1 input-group-wanted ">
                    <input style="background-color: transparent;" type="text" class="form-control input-search-wanted"
                           data-col="title" placeholder="Search">
                    <div class="input-group-append">
                        <span class="input-group-text wanted-span-search"><i class="fas fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 wanted-section">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link  @if($tab == 'all') active @endif" href="{{route('wanted')}}">Active
                            Adverts</a>

                        @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                            <a class="nav-item nav-link @if($tab == 'Favorites') active @endif"
                               href="{{route('favorites.wanted')}}">Favorites</a>
                        @endif
                    </div>
                </nav>
                <div class="tab-content p-0" id="nav-tabContent" style="background:#f0f2f4;">
                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                         aria-labelledby="nav-profile-tab">

                        <div class="append_class_wanted">
                            <div id="apend" style="width:100%;">
                                @foreach($table as $wanted)
                                    <div class="row m-0 mb-3 mt-3 pt-4  save-lis-wanted">
                                        <div class="col-12 pl-0">
                                            <div class="row m-0">
                                                <div class="col-10 save-list-heading">
                                                    <h3>{{$wanted->title}}</h3>
                                                    <p>{{$wanted->describe}}.</p>
                                                    <a href="{{asset('storage/app/public/'.$wanted->image)}}"
                                                       class="download-btn" download><i class="fas fa-paperclip"></i>Download
                                                        Attachment</a>
                                                </div>
                                                @php $class='';
                                        $s = 'save';
                                                @endphp
                                                @if(in_array($wanted->id,$user_s_id))
                                                    @php $class="save_list";
                                            $s= 'saved';
                                                    @endphp
                                                @endif
                                                <div
                                                    class="col-2 d-flex align-items-start justify-content-end  wanted-heart-fvrt">
                                                    @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                                                        <a class="wanted-save-list" data-col="{{$wanted->id}}">
                                                            <i class="fas fa-heart {{$class}}"
                                                               style="display:flex;color:#707070;padding-left:12px;"></i>
                                                        </a>
                                                    @endif
                                                </div>
                                                <div class="col-12 col-sm-7 wanted-client-budget">
                                                    @if(!empty($wanted->brandWanted))
                                                        <h5>{{$wanted->brandWanted['name']}} @else  @endif -<span>Client Budget :</span>
                                                            <span>Rs {{number_format($wanted->budget)}}</span></h5>
                                                        @if(!empty($wanted->user_number))
                                                            <h5>Contact Member :<span>{{$wanted->user_number}}</span>
                                                            </h5>
                                                        @endif
                                                </div>
                                                <div
                                                    class="col-12 col-sm-5 ask-question-wanted Veiw-detail-wanted d-flex align-items-center justify-content-end mb-3">
                                                    <h6 class="m-0">Send Offer</h6>
                                                    <div class="round-question">
                                                        <i class="fas fa-caret-down"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 detailDiv-query">
                                            <div class="col-12 p-0">
                                                <hr/>
                                            </div>
                                            <div class="row m-0">
                                                <div class="col-12">
                                                    <div class="form-row mb-3">
                                                        @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                                                            @if(!empty(session('userDetails')->id) && session('userDetails')->id !== $wanted->user_id )
                                                                <form action="{{route("chat-wanted")}}" method="post"
                                                                      id="chat_wanted" style="width: 100%;">
                                                                    <div class="row">
                                                                        @csrf
                                                                        <input type="hidden" name="car_id"
                                                                               value="{{$wanted->id}}">
                                                                        <input type="hidden" name="to_id"
                                                                               value="{{$wanted->user_id}}">

                                                                        <div class="form-group col-md-8">
                                                                            <label for="inputEmail4">Type proposal to
                                                                                attract the buyer</label>
                                                                            <textarea type="text" name="query1" rows="1"
                                                                                      class="form-control"
                                                                                      id="query_input"
                                                                                      placeholder="Enter Your Query"
                                                                                      required> </textarea>
                                                                                       <input type="text" name="from_mail" 
                                                                                      class="form-control  mt-3"
                                                                                      id="from_mail"
                                                                                      placeholder="Enter Your Email"
                                                                                      required /> 
                                                                        </div>
                                                                        <div class="form-group col-md-4">
                                                                            <label for="inputEmail4">Your proposal
                                                                                was</label>
                                                                            <input type="text" class="form-control"
                                                                                   name="query2" id="porposal_input"
                                                                                   placeholder="Prices" required />
                                                                            <button id="btn_toggle"
                                                                                    class="btn-show-more-filter mt-3">
                                                                                Send your Proposal
                                                                            </button>
                                                                        </div>


                                                                    </div>
                                                                </form>
                                                            @endif
                                                        @else
                                                            <a href='{{route('user-login')}}' class="text-dark m-auto" data-toggle="modal" data-target="#loginModal">Please
                                                                Login ?</a>
                                                        @endif
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 nextbtngrpdiv">
                            <div class="">

                                {{$table->links()}}

                            </div>


                        </div>

                    </div>

                    <div class="tab-pane fade " id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="row m-0 mb-3 mt-3 pt-4 save-lis-wanted" id="save-wanted-list">


                        </div>
                    </div>
                    <div class="col-12 nextbtngrpdiv">

                        <div>
                            <div class="row featureCarsliderbtn carousel-indicators">

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
@include('frontend.partials.advertisment-footer')
@include('frontend.partials.footer')
@include('frontend.partials.filters-script')
@include('frontend.partials.sociallogin')