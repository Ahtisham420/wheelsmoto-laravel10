<span class="wanted-section-error mt-3 ml-3"></span>
 <div class="append_class_wanted">
                        <div id="apend" style="width:100%;">
                        @foreach($table as $wanted)
                            <div class="row m-0 mb-3 mt-3 pt-4  save-lis-wanted">
                                <div class="col-12 pl-0">
                                    <div class="row m-0">
                                        <div class="col-10 save-list-heading">
                                            <h3>{{$wanted->title}}</h3>
                                            <p>{{$wanted->describe}}.</p>
                                            <a href="{{asset('storage/app/public/'.$wanted->image)}}" class="download-btn" download><i class="fas fa-paperclip"></i>Download Attachment</a>
                                              </div>
                                        @php $class='';
                                        $s = 'save';
                                        @endphp
                                        @if(in_array($wanted->id,$user_s_id))
                                            @php $class="save_list";
                                            $s= 'saved';
                                            @endphp
                                        @endif
                                        <div class="col-2 d-flex align-items-start justify-content-end  wanted-heart-fvrt">
                                        @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)  <a class="wanted-save-list"  data-col="{{$wanted->id}}"> <i class="fas fa-heart {{$class}}" style="display: flex;color:#707070;padding-left: 12px;"></i>
                                          <!--   <span  class="span-heart {{$class}}" style="color:#707070;">{{$s}}</span> -->
                                        </a>
                                            @endif
                                        </div>
                                        <div class="col-12 col-sm-7 wanted-client-budget">
                                          @if(!empty($wanted->brandWanted)) <h5>{{$wanted->brandWanted['name']}} @else  @endif -<span>Client Budget :</span> <span>Rs {{$wanted->budget}}</span></h5>
                                           @if(!empty($wanted->user_number)) <h5>Contact Member :<span>{{$wanted->user_number}}</span></h5> @endif
                                        </div>
                                        <div class="col-12 col-sm-5 ask-question-wanted Veiw-detail-wanted d-flex align-items-center justify-content-end">
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
                                          <div class="form-row">
                                              <!--  <div class="form-group col-6 col-md-6">
                                                <label for="inputEmail4">Brand</label>
                                                <input type="text" class="form-control"   value="@if(!empty($wanted->brandWanted)){{$wanted->brandWanted->name}}@endif" readonly>
                                                </div> -->
                                              <!--   {{--<div class="form-group col-6 col-md-6">--}}
                                                    {{--<label for="inputEmail4">Vehicle</label>--}}
                                                    {{--<input type="text" class="form-control"   value="@if(!empty($wanted->brandWanted)){{$wanted->brandWanted->name}}@endif" readonly>--}}
                                                {{--</div>--}} -->
                                             <!--    <div class="form-group col-6 col-md-6">
                                                    <label for="inputEmail4">Model</label>
                                                    <input type="text" class="form-control"  value="@if(!empty($wanted->modelWanted)){{$wanted->modelWanted->_value}}@endif" readonly>
                                                </div> -->
                                               <!--  <div class="form-group col-6 col-md-6">
                                                    <label for="inputEmail4">Varient</label>
                                                    <input type="text" class="form-control"   value="@if(!empty($wanted->varientWanted)){{$wanted->varientWanted->_value}}@endif" readonly>
                                                </div> -->
                                              @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                                                  @if(!empty(session('userDetails')->id) && session('userDetails')->id !== $wanted->user_id )
                                              <form action="{{route("chat-wanted")}}" method="post" id="chat_wanted" style="width: 100%;">
                                                  <div class="row">
                                                      @csrf
                                                  <input type="hidden" name="car_id" value="{{$wanted->id}}">
                                                  <input type="hidden" name="to_id" value="{{$wanted->user_id}}">

                                                <div class="form-group col-md-8">
                                                    <label for="inputEmail4">Type proposal to attract the buyer</label>
                                                    <textarea type="text" name="query1" rows="3" class="form-control" id="query_input" placeholder="Enter Your Query" required> </textarea>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4">Your proposal was</label>
                                                    <input type="text" class="form-control" name="query2" id="porposal_input" placeholder="Prices" required>
                                                     <button id="btn_toggle"  class="btn-show-more-filter mt-3">Send your Proposal</button>
                                                </div>
                                               <!--  <div class="col-12 col-sm-4 ml-auto">
                                                   

                                                </div> -->
                                                  </div>
                                                </form>
                                                @endif
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

                            <div>
                                <div class="">
                                    {{$table->links()}}
                                </div>
  </div>
                            </div>
<script>
    let detailDiv=  $(".detailDiv-query");
    detailDiv.hide();
    $('.Veiw-detail-wanted').on('click',function(e){

        if(  detailDiv.css("display")== "none"){
            console.log(this);
            // $(this).closest(".save-lis-wanted ").css("background", "#fff");
            // $(this).closest(".save-lis-wanted ").find(".round-question").css("background", "#e4001b");
            // $(this).closest(".round-question").css("background", "#e4001b");
            $(this).closest(".save-lis-wanted ").find(".round-question i").css("color", "#707070");
            console.log(this);
            $(this).closest(".save-lis-wanted").find(detailDiv).slideToggle("slow");



        }else if (  detailDiv.css("display")== "block" ) {
            // $(this).closest(".save-lis-wanted ").css("background", "#efefef");

            $(this).closest(".save-lis-wanted ").find(".round-question").css("background", "#fff");
            $(this).closest(".save-lis-wanted ").find(".round-question i").css("color", "#707070");

            $(this).closest(".save-lis-wanted ").find(detailDiv).slideToggle("slow");


        }


    });
</script>
