@include('frontend.partials.header')
 <div class="gaeaheServices">
       <div class="container">
         <div class="row pagehaeding">
             <div class="col-6 text-center col-md-6 col-xl-5 garageheading">
             Garage Services

             </div>
          </div>
         <div class=" row searchbar">
             <div class="col-12 col-sm-5 m-auto">
               <form action="{{route('from-garage-search')}}" method="post">
                   @csrf
                <div class="input-group mb-3">
                <input type="text" class="form-control garage-search-input-filter" id="garage-search-input" name="garage_search" data-col="c_name" placeholder="Search Garage By Name" aria-label="Recipient's username" aria-describedby="basic-addon2">
                 <div class="input-group-append">
                  <button class="garage-section-search-filter input-group-text" type="submit" id="basic-addon2"><i class='fas fa-search'></i></button>
                </div>
            </div>
            </form>
           </div>
           <div class="col-12">
               <hr>
           </div>
         </div>
         <div class="row servicesContainer">
             <div class="col-6"></div>
             <div class="col-6"></div>
         </div>
         <div class="row">
            <span class="garage-section-error"></span>
         </div>
         <div class="row shopsection">
           <div class="row append_class_garage m-0">
           <div class="row m-0" id="apend">
           @foreach($garages as $garage)
             <div class="col-12 col-md-12 mb-3" onclick="location.href = '{{route('garage-detail',['id'=>base64_encode(base64_encode($garage->id))])}}'" style="cursor: pointer;">
               <div class="row" style="border: 1px solid #e4e0e0;height: 100%;">
                 @php
                   $cars = json_decode($garage->pic);
                   $car =  $cars[0];
                 @endphp
                 <div class="col-md-4 col-lg-4 col-sm-12 col-xs-12 p-0 sidecar"><img src="{{asset('storage/app/public/'.$car)}}" alt=""></div>
                 <div class="col-md-8 col-lg-8 col-sm-12 col-xs-12">
                   <div class="row shopdetailSection">
                     <div class="col-12  shopName" data-maxlength="50">
                       <h3 class="f-card-name">{{$garage->c_name}}</h3>
                       <img  src=" {{ config('app.ui_asset_url').'frontend/img/featuredCar/Group 3236.png' }}" alt="">
                     </div>
                     <div class="col-12  shopdescription" data-maxlength="100">
                       <p class="f-card-description">{{$garage->description}}</p>
                     </div>
                     <div class="col-12 topratedSection">
                       <div class="row">
                         <div class="col-12 col-sm-6  visitourwebsitebtn">
                          @if(!empty($garage->user_website))<a class="btn btn-danger new-btn-danger-wheelshunt" href="{{$garage->user_website}}" target="blank">Visit our website</a>@endif
                         </div>
                       </div>
                     </div>


                   </div>

                 </div>
               </div>
             </div>
           @endforeach
           </div>
           </div>
         </div>
            <div class="row  pagemargin">
          <div class="col-12 col-sm-6 nextbtngrpdiv ml-auto">
         {{$garages->links()}}
          </div>
        </div>

       </div>
     </div>

{{--modal for user login--}}
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Garage Services</h5>
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                    {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            </div>
            <div class="modal-body">
             Please Login For Garage Services.
            </div>
            <div class="modal-footer">
                <a href="{{route("frontend-home")}}" type="button" class="btn btn-secondary">Close</a>
                <a href="{{route("garage-login",["gr"=>"1"])}}" type="button" class="btn btn-danger new-btn-danger-wheelshunt">login</a>
            </div>
        </div>
    </div>
</div>


{{--modal for garage section payment --}}
<div class="modal fade" id="PayModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Garage Services Payment</h5>
                {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                {{--<span aria-hidden="true">&times;</span>--}}
                {{--</button>--}}
            </div>
            <div class="modal-body">
                Please Pay for Garage Services.
            </div>
            <div class="modal-footer">
                <a href="{{route("frontend-home")}}" type="button" class="btn btn-secondary">Close</a>
                <a href="{{route("user-login")}}" type="button" class="btn btn-danger new-btn-danger-wheelshunt">Purchase</a>
            </div>
        </div>
    </div>
</div>

@include('frontend.partials.advertisment-footer')
@include('frontend.partials.footer')
@include('frontend.partials.filters-script')
