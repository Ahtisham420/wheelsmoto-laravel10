<footer>
    <div class="container">
        <div class="row footer1">
            <div class="col  col-sm-6 col-md-6 col-lg-4   widget1">
                <div style="margin-top: -18px">
                    <img class="footerlogo" src="{{ config('app.ui_asset_url').'frontend/img/logo/footer-logo.png' }}">
                </div>
                <div style="margin-top: -19px">
                    <p>
                        WheelsHunt is a platform that is purposely designed to cater all of your vehicle needs. Whether you are looking to hire, buy or sell that new or used car, be assured that this website has got you covered. Moreover, With our blog sections we keep you highly updated regarding the prevailing car trends and prices.
                    </p>

                </div>
                <div class="d-inline-block d-md-block">
                    <form class="form-inline" method="post" action="{{route('footer-mail')}}" id="footer-mail">
                        @csrf
                        <div class="text-center button-loader " style="width: 100%;">
                            <input type="hidden" name="submit" value="submit">
                            <input type="email" id="footer-mail-input" class="form-control" placeholder="Your Email Address" name="mail" required="" style="border-radius:0!important;width: 100%;border: 1px solid #FFFFFF;border-right: none">
                            <button class=" btn btn-block mybtn1  tx-tfm" style=" border-radius: 0px;max-width: 120px; background: #00a651;color: #fff">Subscribe
                                <div class="loader ml-1" id="mail-loader-footer"></div>
                            </button>
                        </div>
                        <span id="footer-mail-span"></span>
                    </form>
                </div>
                {{--<div class="d-inline-block d-md-block">--}}
                {{--<form class="form-inline" method="post" action="{{route('footer-mail')}}" id="footer-mail">--}}
                {{--<input type="hidden" name="_token" value="gtEB21AaPpc9Yh6BQvOH8GxGUJpTw89pWgmbr0FO">                        <div class="text-center button-loader " style="width: 100%;">--}}
                {{--<input type="hidden" name="submit" value="submit">--}}
                {{--<input type="email" id="footer-mail-input" class="form-control" placeholder="Your Email Address" name="mail" required="" style="border-radius:0!important;width: 100%;border: 1px solid #FFFFFF;border-right: none; ">--}}
                {{--<button class=" btn btn-block mybtn1  tx-tfm" style="--}}
                {{--border-radius: 0px;--}}
                {{--max-width: 120px; background: #00a651;--}}
                {{--color: #fff;">Subscribe--}}
                {{--<div class="loader ml-1" id="mail-loader-footer"></div>--}}
                {{--</button>--}}
                {{--</div>--}}
                {{--<span id="footer-mail-span"></span>--}}
                {{--</form>--}}
                {{--</div>--}}


            </div>
            <div class="col  col-sm-6 col-md-6 col-lg-3 widget3">
                <div class="footerheading">Useful Links
                </div>
                <div class="description">
                    <a href="{{url('/contact-us')}}">Contact us</a>
                    <a href="{{url('/about-us')}}">About us</a>
                    <a href="#">Careers</a>
                    <a href="#">Sitemap</a>
                    <a href="{{url('/privacy-policy')}}">Privacy policies</a>
                    <a href="#">Advertising terms & condition</a>
                    <a href="#">Display Advertise</a>
                    <a href="{{url('/cookies-policies')}}">Cookies Policies</a>
                </div>
            </div>
            <div class="col-6  col-sm-6 col-md-6 col-lg-3 widget4">
                <div class="footerheading">
                    Follow Us :
                </div>
                 @php  $footer = App\Footer::OrderBy('id','desc')->first(); @endphp
                <div class="description">
                    <p class="m-0">Address:</p>
                    <p class="m-0">@if(!empty($footer->address)){{$footer->address}}@endif</p>
                    <p class="m-0">Phone:</p>
                    <p class="m-0">@if(!empty($footer->phone)){{$footer->phone}}@endif</p>
                    <p class="m-0">Email: @if(!empty($footer->email)){{$footer->email}}@endif</p>
                </div>
                <div class="buttongroup socialmediaicongroup">
                    <a href="https://twitter.com/wheels_hunt" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/wheelshunt.official/" target="_blank"><i class="	fab fa-instagram"></i></a>
                    <a href="https://web.facebook.com/Wheels-Hunt-113432407234573?_rdc=1&_rdr" target="_blank"><i class="	fab fa-facebook-f"></i></a>
                    {{--                    <a href="https://www.youtube.com/channel/UCALG4ZeuaiYESwVu_uuox5Q?view_as=subscriber" target="_blank"><i class='	fab fa-youtube'></i></a>--}}
                    {{--<a href="https://www.pinterest.co.uk/powerperfor1032/?skipFac=1" target="_blank"><i class="	fab fa-linkedin"></i></a>--}}
                </div>
                {{--<button class="btn btn-store">--}}
                {{--<i class="	fab fa-google-play"></i>--}}
                {{--<span class="groupset">--}}
                {{--<span class="btn-label">GET IT ON </span>--}}
                {{--<span class="btn-caption">GOOGLE PLAY</span>--}}
                {{--</span>--}}
                {{--</button>--}}
                {{--<button class="btn btn-store">--}}
                {{--<i class=" appleicon	fab fa-apple"></i>--}}
                {{--<span class="groupset">--}}
                {{--<span class="btn-label">Download on the </span>--}}
                {{--<span class="btn-caption">APP STORE</span>--}}
                {{--</span>--}}
                {{--</button>--}}

            </div>
        </div>
    </div>
</footer>
<div class="container-fluid absolutefooter-wheel">
    <div class="container">
        <div class="footerseparater"></div>
        <div class="absolutefooter-wheel">
            © Wheels Hunt 2020 - 2021 | All rights reserved
        </div>
    </div>
</div>


</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="jquery.min.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>
<link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ config('app.ui_asset_url').'frontend/js/slick.js' }}" type="text/javascript"></script>
{{-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}
<script src="{{ config('app.ui_asset_url').'frontend/js/coursal.js' }}" type="text/javascript"></script>
<script src="{{ config('app.ui_asset_url').'frontend/js/packageSlider.js' }}" type="text/javascript"></script>
<script src="{{ config('app.ui_asset_url').'frontend/js/timer.js' }}" type="text/javascript"></script>
<script src="{{ config('app.ui_asset_url').'frontend/js/emojionearea.min.js' }}" type="text/javascript"></script>

<script src="{{ config('app.ui_asset_url').'frontend/js/signIn.js' }}" type="text/javascript"></script>
<script src="{{ config('app.ui_asset_url').'frontend/js/americanmuscle.js' }}" type="text/javascript"></script>
<script src="{{ config('app.ui_asset_url').'frontend/js/gridlist.js' }}" type="text/javascript"></script>
<script src="{{ config('app.ui_asset_url').'frontend/js/checkbox.js' }}" type="text/javascript"></script>
<script src="{{ config('app.ui_asset_url').'frontend/js/tagsinput.js' }}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAddbxUhXJYrPqsX24kbEhFR1cJg37U2vA&libraries=places&callback=initAutocomplete" async defer></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(Request::segment(2)=== 'login')

    @include('frontend.partials.sociallogin')

@endif
{{-- date range picker start --}}
{{-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> --}}
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
{{--<===========Links For Tabs Browes Used Cars=============>--}}
   <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
{{--  <===========Links For Tabs Browes Used Cars end=============>--}}

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>

{{-- date range picker end --}}

<script>
   $( window ).on("load", function() {
     $("#gridview").click();
     $('.select2').select2({
           placeholder: 'Select an option'
       });
        $("#car_btn").prop("disabled",false);
    });

    @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
            @php $us = App\User::where("id",session('userDetails')->id)->first();
            $user_S = $us->status
            @endphp
    @if(!empty($user_S) && $user_S == App\User::unverfied)
    $( window ).on( "load", function() {
        $(".email-verify-header").show();
    });
    @endif
    @endif


    $(document).on("click",".verify-mail-user",function(e) {
       e.preventDefault();
$(".verify-mail-user").hide();
$(".email-loader-header").show();
        $.ajax({
            method:"get",
            url:"{{route('again-verify-mail')}}",
            DataType:"json",
            success:function(data){
                if(data.status==1){
                    swal({
                        title: "Congraluation!",
                        text: data.result,
                        icon: "success",
                        button: "ok",
                    });
                    $(".email-loader-header").hide();
                    $(".email-verify-header").hide();
                    // setTimeout(function(){
                    //         $(".email-verify-header").hide();
                    //
                    //     },
                    //     5000);
                }else{
                    $(".verify-mail-user").show();
                    $(".email-loader-header").hide();
                    $(".verifyMailUser").modal("show");
                    $(".Modal-verify-mail").html(data.result);

                }


            },error:function(data){
          console.log(data);
            }


        });
    });






  //   $(document).on("keyup",function(e){
  //     var  mil=   $('#mileage').val();
  // var num=   $.isNumeric(mil);
  //        if(num){
  //            return /^\d*$/.test(value);
  //        }else {
  //            return false;
  //        }
  //   });
  $("#mileage").keypress(function (e){
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
          return false;
      }
  });
  $("#speed").keypress(function (e){
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
          return false;
      }
  });
  $("#top_speed").keypress(function (e){
      if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
          return false;
      }
  });


    //     $(window).on('load', function () {
    //  $(".wait").hide();
    //  });
    //  $(".wait").click(function () {
    //  $(".wait").show();
    //  })
    $(document).on("submit",".user-registration",function(e){
        e.preventDefault();
        var url=$(this).attr("action");
        var formdata=new FormData(this);
        var email = $("#email1").val();
        var pass1 = $("#password0").val();
        var pass2 = $("#password1").val();
        //  var pass_length = pass1.length;
        // var goodColor = $("#password1").css("border-color","blue");
        if (pass1 !=null && pass1 != ''){
            if(pass1.length<8 ){
                $("#password-valid").html("Password must be 8 characters.");
                $("#password-valid").css({color:"#e4173e",display:"block"});
                $("#password0").css("border-color","#e4173e");
                $(".span-boorder").css("border-color","#e4173e");
                setTimeout(function(){
                        $(".span-boorder").css('border-color', '#ced4da');
                        $("#password0").css('border-color', '#ced4da');
                        $("#password-valid").css({display:'none',color:'#ced4da'});
                         },
                    5000);
                return false;

            }

        }
        if(pass1 !== pass2){
            $("#password1").css("border-color","#e4173e");
            $(".red-span-red").css("border-color","#e4173e");
            $("#confirm").html("The password is not matched.");
            $("#confirm").css({display:'block',color:'#e4173e'});
            setTimeout(function(){
                        $(".red-span-red").css('border-color', '#ced4da');
                        $("#password1").css('border-color', '#ced4da');
                        $("#confirm").css({display:'none',color:'#ced4da'});
                         },
                    5000);
            return false;

        }
        if(email === "" || pass1 === "" || pass2 ===""){
            $("#email1").css('border-color', '#e4173e');
            $("#email1").css('border-color', '#e4173e');
            $("#password0").css('border-color', '#e4173e');
            $("#password1").css('border-color', '#e4173e');
            $("#valdid").html("Invalid info.");
            $("#valdid").css({'color':'#e4173e','display':'block' });
            $(".input-red-border-span").css('border', '1px solid #e4173e');

            return false;
        }
        setTimeout(function(){
                $(".input-red-border-span").css('border-color', 'transparent');
                $("#password0").css('border-color', 'transparent');
                $("#password1").css('border-color', 'transparent');
                $("#valdid").css('display', 'none');
                $("#email1").css('border-color', 'transparent'); },
            5000);
        $(".loader").show();
        $.ajax({
            method:"post",
            url:url,
            data:formdata,
            datatype:"json",
            cache: false,
            processData: false,
            contentType: false,
            success:function(data){
                if(data.status==1){

                    // swal({
                    //     title: "Congraluation!",
                    //     text: data.result,
                    //     icon: "success",
                    //     button: "ok",
                    // });
                    $("#valdid").html(data.result);
                    $("#valdid").css('display', 'block');
                    $("#valdid").css("color","#00a651");
                    $("#email1").css('border-color', '#00a651');
                    $("#email1").css('border-color', '#00a651');
                 //   $("#signinbutton").click();
                 window.location ="{{route('frontend-home')}}";

                }
                else{
                    $("#valdid").html(data.result);
                    $("#valdid").css('display', 'block');
                    $("#valdid").css("color","red");
                    $("#email1").css('border-color', '#e4173e');
                    $("#email1").css('border-color', '#e4173e');
                }
                setTimeout(function(){
                        $(".input-red-border-span").css('border-color', 'transparent');
                        $("#password0").css('border-color', 'transparent');
                        $("#password1").css('border-color', 'transparent');
                        $("#valdid").css('display', 'none');
                        $("#email1").css('border-color', 'transparent'); },
                    5000);
                $(".loader").hide();
            },
            error:function(data){

            }


        });

    });
   $(document).on("submit","#footer-mail",function (e){
       e.preventDefault();

       var url = $(this).attr('action');
       var formdata = new FormData(this);
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $("#mail-loader-footer").show();

       $.ajax({
           url:url,
           method:"post",
           DataType:"json",
           data:formdata,
           cache: false,
           contentType: false,
           processData: false,
           success:function(data){
               if(data.status==1){
                   $("#mail-loader-footer").hide();
                   $("#footer-mail-input").css("border","green");
                   $("#footer-mail-span").css('color','green');
                   $("#footer-mail-span").html(data.result);
               }else if (data.status==2){
                   $("#footer-mail-input").css("border","1px solid #e4001b");
                   $("#mail-loader-footer").hide();
                   $("#footer-mail-span").css('color','#e4001b');
                   $("#footer-mail-span").html(data.result);
               }else{
                   $("#footer-mail-input").css("border","1px solid #e4001b");
                   $("#footer-mail-span").css('color','#e4001b');
                   $("#footer-mail-span").html(data.result);
                   $("#mail-loader-footer").hide();

               }
               setTimeout(function () {
                   $("#footer-mail-input").css("border","transparent");
                   $("#footer-mail-span").html('');
               },5000);
           }
       });

   });
    $(document).on("submit",".login_f",function(e){
        e.preventDefault();
        var email = $("#login-email").val();
        var password = $("#login-password").val();
        var url=$(this).attr("action");
        var formdata=new FormData(this);
        //alert(email);
        //event.preventDefault();
        // var psw_textLength = password.length;
        // if(psw_textLength<8 ){
        //     $("#login-password").css('border-color', 'red');
        //     $("#login-form-validation").html("Invalid info");
        // }
        if(password === "" ||  email === ""){
            $("#login-email").css('border-color', '#e4173e');
            $("#login-password").css('border-color', '#e4173e');
            $("#login-form-validation").html("Invalid info.");
            $("#login-form-validation").css('color', '#e4173e');
            $(".red-border-input").css('border', '1px solid #e4173e');
            setTimeout(function(){
                    $(".red-border-input").css('border-color', '#ced4da');
                    $("#login-password").css('border-color', '#ced4da');
                    $("#login-email").css('border-color', '#ced4da'); },
                5000);

            return false;
        }
        $(".loader").show();
        $.ajax({
            url:url,
            Datatype:"json",
            data:formdata,
            method:"post",
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data);
                if(data.status==1){
                    console.log(data);
                    if(data.g_route === "1"){
                        window.location= "{{route("garage")}}";
                    }else if(data.w_route === "swap"){

                    var id =  btoa(data.s_id)  ;
                        var r_url  = "{{route('frontend-swap-cars',['s_id'=>':id'])}}";
                    r_url =    r_url.replace(":id",id);
                        window.location = r_url;
                    }else if(data.blog_route === "blog"){
                        window.location= "{{route("frontend-blog")}}";
                    }else{
                        window.location=data.result;
                    }

                }else if (data.status==3){
                    swal({
                        title: "Congraluation!",
                        text: data.result,
                        icon: "success",
                        button: "ok",
                    });
                    // $("#login-email").css('border-color', '#e4173e');
                    // $("#login-password").css('border-color', '#e4173e');
                    // $("#login-form-validation").html(data.result);
                    // $("#login-form-validation").css('color', '#e4173e');
                    // $(".red-border-input").css('border', '1px solid #e4173e');
                    // setTimeout(function(){
                    //         $(".red-border-input").css('border-color', '#ced4da');
                    //         $("#login-password").css('border-color', '#ced4da');
                    //         $("#login-email").css('border-color', '#ced4da'); },
                    //     5000);
                }else{
                    $("#login-email").css('border-color', '#e4173e');
                    $("#login-password").css('border-color', '#e4173e');
                    $("#login-form-validation").html(data.result);
                    $("#login-form-validation").css('color', '#e4173e');
                    $(".red-border-input").css('border', '1px solid #e4173e');
                    setTimeout(function(){
                            $(".red-border-input").css('border-color', '#ced4da');
                            $("#login-password").css('border-color', '#ced4da');
                            $("#login-email").css('border-color', '#ced4da'); },
                        5000);


                }
                $(".loader").hide();
            },
            error:function(data){

            }

        });
    });

    // this script for cookie
  $(document).on("submit",".form-cookie",function (e) {
      e.preventDefault();
      var col = $("#cookie").val();
      var url = $(this).attr("action");
      var formdata=new FormData(this);
      $.ajax({
          method:"post",
          url:url,
          DataType:"json",
          data:formdata,
          cache: false,
          contentType: false,
          processData: false,
          success:function(data){
          if(data.status==1){
              document.cookie="wheelshunt_cookie="+ $("#cookie").val() +";'expires'='Thu, 18 Dec 2100 12:00:00 UTC; path=/'";
              $("#div-cookie").css("display","none");
           console.log("okay");
          // window.location=location.reload();
          }else{
           $("#div-cookie").css("display","block");
       }

          },
          error:function(data){
              console.log(data);

          }

      });
  });


  $(document).on("click","#search",function(){
        var input = $("#search-input").val();
        if(input === ""){
            $("#search-input").css("border","1px solid #e4001b");
            $("#search").css("border","1px solid #e4001b");
            $("#search-span-valid").html("Please enter valid info.");
            $("#search-span-valid").css({color:"#e4001b",display:"block"});
              setTimeout(function(){
           $("#search-input").css("border","1px solid #ced4da");
            $("#search").css("border","1px solid #ced4da");
            $("#search-span-valid").html("");
            $("#search-span-valid").css({color:"#ced4da",display:"none"});

       },

                5000);
            //alert("please fill in the blank");
            return false;
        }

        var url="{{ route('search-post',['id'=>':url']) }}";
        url=url.replace(":url",input);
        window.location=url;
    });


    $(document).ready(function(data){

        $(document).on("submit",".a_search",function(e){
            e.preventDefault();
            var reg=$("#reg").val();
            var milage=$("#milage").val();
            if(reg == "" || milage == ""){

                $("#valid").html("Please enter full information.");
                $("#valid").css({"color":"#e4001b","font-size":"14px"});
                $("#valid").css("display","block");
                $("#reg").css("border-color","red");
                $("#milage").css("border-color","#e4173e");
 setTimeout(function(){
                $("#valid").css("display","none");
                $("#reg").css("border-color","#b3b3b3");
                $("#milage").css("border-color","#b3b3b3");
             },
                5000);
                //alert("please fill all the field");
                return false;
            }

           $(".loader").show();
            var formdata=new FormData(this);
            var url=$(this).attr("action");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                method:"post",
                url:url,
                DataType:"json",
                data:formdata,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data){
                    console.log(data);
                    if(data.status==1){
                        $(".loader").hide();
                        if(data.result['GetVehicleDataResult']['VehicleRegistration']['MaxPermissibleMass']!=0){
                        window.location=data.url+"/findcar";
                        }
                        else{
                             $("#valid").html("Please enter full information");
                        $("#valid").css("color","#e4173e");
                         $("#valid").css("display","block");
                        $("#reg").css("border-color","#e4173e");
                        $("#milage").css("border-color","#e4173e");

               setTimeout(function(){
                $("#valid").css("display","none");
                $("#reg").css("border-color","#b3b3b3");
                $("#milage").css("border-color","#b3b3b3");
             },5000);


                        }
                    }
                    else{
                        $(".loader").hide();
                        $("#valid").html("Please enter full information");
                        $("#valid").css("color","#e4173e");
                         $("#valid").css("display","block");
                        $("#reg").css("border-color","#e4173e");
                        $("#milage").css("border-color","#e4173e");

               setTimeout(function(){
                $("#valid").css("display","none");
                $("#reg").css("border-color","#b3b3b3");
                $("#milage").css("border-color","#b3b3b3");
             },
                5000);

                        //alert(data.result);
                    }

                },
                error:function(data){
                    console.log(data);

                }

            });
        });

    });

</script>
{{--<script>--}}
{{--    var loadFile = function(event) {--}}
{{--        var image = document.getElementById('g_p_1');--}}
{{--        image.src = URL.createObjectURL(event.target.files[0]);--}}
{{--    };--}}
{{--</script>--}}
<script>
    $(".f-card-description").html(function(index, currentText) {



        var maxLength = 100;

        if(currentText.length >= maxLength) {

            return currentText.substr(0, maxLength) + "...";

        } else {

            return currentText

        }

    });
    var loadFilevideo = function(event) {
        var video1 = document.getElementById('vide1');
        video1.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<script>
    $(document).ready(function(e){
            $resize = $('#image-preview').croppie({
                enableExif: true,
                enableOrientation: true,
                viewport: { // Default { width: 100, height: 100, type: 'square' }
                    x:169,
                    y:-11,
                    width: 200,
                    height: 200,
                    type: 'square' //square
                },
                boundary: {
                    x:169,
                    y:-11,
                    width: 300,
                    height: 300
                }
            });
            // this for garage cropper
        $resize_garage = $('#garage-image-preview').croppie({
                enableExif: true,
                enableOrientation: true,
                viewport: { // Default { width: 100, height: 100, type: 'square' }
                    x:169,
                    y:-11,
                    width: 200,
                    height: 200,
                    type: 'square' //square
                },
                boundary: {
                    x:169,
                    y:-11,
                    width: 300,
                    height: 300
                }
            });
        // miscellaneous cropper
        $resize_misc = $('#misc-image-preview').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' }
                x:169,
                y:-11,
                width: 200,
                height: 200,
                type: 'square' //square
            },
            boundary: {
                x:169,
                y:-11,
                width: 300,
                height: 300
            }
        });
//  swap cropper

        $resize_swap = $('#swap-image-preview').croppie({
            enableExif: true,
            enableOrientation: true,
            viewport: { // Default { width: 100, height: 100, type: 'square' }
                x:169,
                y:-11,
                width: 200,
                height: 200,
                type: 'square' //square
            },
            boundary: {
                x:169,
                y:-11,
                width: 300,
                height: 300
            }
        });



// this fo miscellanous
        $("#file_misc").change(function (e){
            $("#misc-image-preview").show();
            var reader = new FileReader();
            reader.onload = function (e) {
                $resize_misc.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            };
            reader.readAsDataURL(this.files[0]);
            var c=1;
            $("#m_p_1").removeAttr("src");
            $("#m_p_2").removeAttr("src");
            $("#m_p_3").removeAttr("src");
            for (var i = 0; i < 3; i++) {
                var image = document.getElementById('m_p_'+c);
                image.src = URL.createObjectURL(e.target.files[i]);
                c++;
            }
        });
// this for swap
        $("#swap_file").change(function (e){
            $("#swap-image-preview").show();
            var reader = new FileReader();
            reader.onload = function (e) {
                $resize_swap.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            };
            reader.readAsDataURL(this.files[0]);
            var c=1;
            $("#s_p_1").removeAttr("src");
            $("#s_p_2").removeAttr("src");
            $("#s_p_3").removeAttr("src");
            for (var i = 0; i < 3; i++) {
                var image = document.getElementById('s_p_'+c);
                image.src = URL.createObjectURL(e.target.files[i]);
                c++;
            }
        });






        $("#file1").change(function (e){
            $("#garage-image-preview").show();
            var reader = new FileReader();
            reader.onload = function (e) {
                $resize_garage.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            };
            reader.readAsDataURL(this.files[0]);
            var c=1;
            $("#g_p_1").removeAttr("src");
            $("#g_p_2").removeAttr("src");
            $("#g_p_3").removeAttr("src");
            for (var i = 0; i < 3; i++) {
                var image = document.getElementById('g_p_'+c);
                image.src = URL.createObjectURL(e.target.files[i]);
                c++;
            }
        });
        $("#wanted_image").click(function (e){
            e.preventDefault();
            $("#w_image").click();
        });
        $("#w_image").change(function (e){
                var image = document.getElementById('wanted_s_i');
                image.src = URL.createObjectURL(e.target.files[0]);
                $(".delete_w_p").show();
        });
        $(".delete_w_p").click(function (){
            $(this).hide();
            $("#w_image").val("");
            $("#wanted_s_i").removeAttr("src");
        });

 $("#filemy").change(function(e){
     console.log(this.files[0].size);
if(this.files[0].size > 1000000){
    console.log(this.files[0].size);
             alert('File size is less than 1MB!');
       return false;
         }

            $("#image-preview").show();

            $("#c_status").val(1);
            var reader = new FileReader();
            reader.onload = function (e) {
                $resize.croppie('bind',{
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $("#output1").removeAttr("src");
            $("#output2").removeAttr("src");
            $("#output3").removeAttr("src");
            for (var i = 0; i < 3; i++) {
                if (i == 0) {
                    var image = document.getElementById('output1');
                    image.src = URL.createObjectURL(e.target.files[i]);
                } else if (i == 1) {
                    var image = document.getElementById('output2');
                    image.src = URL.createObjectURL(e.target.files[i]);
                } else if (i == 2) {
                    var image1 = document.getElementById('output3');
                    image1.src = URL.createObjectURL(e.target.files[i]);
                } else {

                    var image = document.getElementById('output1');
                    image.src = URL.createObjectURL(e.target.files[0]);
                }
            }

        });
        $("#video-upload").change(function(e){
          // $(this).css("display","block");
$("#videos_err").show();
            var reader = new FileReader();
            reader.onload = function (e) {

            };
            reader.readAsDataURL(this.files[0]);
            $("video1").removeAttr("src");
            var image = document.getElementById('video1');
            image.src = URL.createObjectURL(e.target.files[0]);
        });
        $(document).on("focus",".validate1",function(){
            $(this).removeClass("error");
        });
        $("#user_car_s").submit(function(e){
             e.preventDefault();
            var flag = true;
            $(".validate0").each(function(e) {
                if ($(this).val() === "") {
                    flag = false;
                    $(this).find('.select2-selection--single').addClass("error");
                }
            });
            $(".validate1").each(function(e) {
                if ($(this).val() === "") {
                    flag = false;
                    $(this).next().next().next('.select2-selection--single').addClass("error");
                }
            });
            if (!flag){
                $(".SelectModalCenterDashboard").modal("show");
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
                return false;
            }
            var year_val = $("#txtF").val();
            var con_number  = $("#Number_contact").val();
            var price_np  = $("#rs_input_valid").val();
            var kms_np  = $("#inp_kms").val();
            var current_year = new Date().getFullYear();
            if (year_val > current_year){
                $("#yerar_validation").show();
                $("#yerar_validation").html("Year has a maximum value of 2021.");
                // scroll back up
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
                return false;
            }else if(year_val < 1900){
                $("#yerar_validation").show();
                $("#yerar_validation").html("Year has a minimum value of 1900.");
                //scroll back up
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
                return false;
            }else{

            }
                  if(kms_np.length > 6){
                $("#inp_kms").css("border-color","#ff0000");
                $("#kms_validation").show();
                $("#kms_validation").html("The maximum allowed value is 999999");
                $("#kms_validation").css("color","#ff0000");
                   $("html, body").animate({
                    scrollTop: 0
                }, 1000);
return false;
            }
              if(con_number.length < 11){
                $("#Number_contact").css("border-color","#ff0000");
                $(".span_92").css("border-color","#ff0000");
                $("#phone_validation").show();
                $("#phone_validation").html("Numbers must be 11 Characters.");
                $("#phone_validation").css("color","#ff0000");
return false;
            }
               if(price_np.length > 9){
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
                $("#rs_input_valid").css("border-color","#ff0000");
                $(".span_rs").css("border-color","#ff0000");
                $("#rs_validation").show();
                $("#rs_validation").html("The maximum allowed value is 100000000.");
                $("#rs_validation").css("color","#ff0000");
           return false;

            }
            if (price_np.length < 5){
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
                $("#rs_input_valid").css("border-color","#ff0000");
                $(".span_rs").css("border-color","#ff0000");
                $("#rs_validation").show();
                $("#rs_validation").html("The minimum allowed value is 50000.");
                $("#rs_validation").css("color","#ff0000");
                return false;
            }
                    if (price_np < 50000){
                $("html, body").animate({
                    scrollTop: 0
                }, 1000);
                $("#rs_input_valid").css("border-color","#ff0000");
                $(".span_rs").css("border-color","#ff0000");
                $("#rs_validation").show();
                $("#rs_validation").html("The minimum allowed value is 50000.");
                $("#rs_validation").css("color","#ff0000");
                return false;
            }
            var t=this;
            var url=$(this).attr("action");
            e.preventDefault();

            var formdata=new FormData(t);
            console.log(JSON.stringify(user_car_pic));
            if (user_car_pic !=""){
                formdata.append('image',JSON.stringify(user_car_pic));
            }else {
                $(".SelectModalCenterDashboardPIC").modal("show");
                return false;
            }

             $("#car_btn").prop("disabled",true);
                //$("#car_btn").addClass("place_your_ad");
               $("#add_loader").show();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:url,
                    method:"post",
                    DataType:"json",
                    data:formdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if(data.status==1){
                           $("#add_loader").hide();
                            if(data.swap_route === "Swap"){
                                var id = $("#swap_id_dashboard").val();
                                id =  btoa(id);
                                var s_url = "{{route('frontend-swap-cars',['s_id'=>':id'])}}";
                                s_url = s_url.replace(":id",id);
                                window.location = s_url;
                            }else{
                                $("#status").css("color","green");
                                $("#status").html(data.msg);
                                window.location=data.url;
                            }

                        }else{
                            $("#add_loader").hide();
                            $("#form_submit_error").css("color","red");
                            $("#form_submit_error").html(data.msg[0]);
                            $("#car_btn").prop("disabled",false);
                           // $("#car_btn").removeClass("place_your_ad");
                        }
                    }
                });
            });




    });



</script>
<script>
    $(document).ready(
        setTimeout(function () {
            $("#div-cookie").css('display','flex')
        },10000)

    );
    $(document).ready(function (e) {
        $(document).on("click",".car_del",function (e) {
            var del=$(this).data("delete");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var url='{{route("del_car",["id"=>":id"])}}';
                    url=url.replace(":id",del);
                    var cur=$(this);
                    $.ajax({
                        url:url,
                        method:"get",
                        DataType:"json",
                        success:function(data){
                            console.log(data);
                            if(data.status==1){
                                cur.closest(".cardetail").remove();
                            }
                            else{
                                swal({
                                    icon: "error",
                                    text:data.msg,
                                });
                            }
                        }
                    });

                }
            });
        });

    });

    {{-- delet form garage advert --}}
    $(document).ready(function (e){
        $(".garage_del").click(function (e) {
            var del=$(this).data("delete");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var url='{{route("del_garage",["id"=>":id"])}}';
                    url=url.replace(":id",del);
                    var cur=$(this);
                    $.ajax({
                        url:url,
                        method:"get",
                        DataType:"json",
                        success:function(data){
                            console.log(data);
                            if(data.status==1){
                                cur.closest(".cardetail").remove();
                            }
                            else{
                                swal({
                                    icon: "error",
                                    text:data.msg,
                                });
                            }
                        }
                    });

                }
            });
        });

    });

    // this is for wanted section
    $(document).ready(function (e){
        $(".wanted_del").click(function (e) {
            var del=$(this).data("delete");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var url='{{route("del_wanted",["id"=>":id"])}}';
                    url=url.replace(":id",del);
                    var cur=$(this);
                    $.ajax({
                        url:url,
                        method:"get",
                        DataType:"json",
                        success:function(data){
                            console.log(data);
                            if(data.status==1){
                                cur.closest(".cardetail").remove();
                            }
                            else{
                                swal({
                                    icon: "error",
                                    text:data.msg,
                                });
                            }
                        }
                    });

                }
            });
        });

    });
// this for misc delete
    $(document).ready(function (e){
        $(".misecellinous_del").click(function (e) {
            var del=$(this).data("delete");
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    var url='{{route("del_misc",["id"=>":id"])}}';
                    url=url.replace(":id",del);
                    var cur=$(this);
                    $.ajax({
                        url:url,
                        method:"get",
                        DataType:"json",
                        success:function(data){
                            console.log(data);
                            if(data.status==1){
                                cur.closest(".cardetail").remove();
                            }
                            else{
                                swal({
                                    icon: "error",
                                    text:data.msg,
                                });
                            }
                        }
                    });

                }
            });
        });

    });

    $("#plus").click(function() {
        event.preventDefault();
        if($("#number").val()===""){
            var y = 0
        }
        else{
            var y=$("#number").val();
        }
        y=parseInt(y);
        y += 1;
        $("#number").val(y);
    });
    $("#minus").click(function() {
        event.preventDefault();
        if($("#number").val()!==""){
            var m = parseInt($("#number").val());
            if(m!=0){
                m -= 1;
                $("#number").val(m);
            }

        }

    });
</script>
<script>
    var countChecked = function() {
        var n = $(".checkedchechkbox input:checked").length;
        $("#shownumber").text(n + (n === 1 ? " is" : " are"));
    };
    countChecked();
    $(".checkedchechkbox input[type=checkbox]").on("click", countChecked);
</script>
<script>
    function loadStepImg() {
        var image = document.getElementById('profilephoto1');
        image.src = URL.createObjectURL(event.target.files[0]);

    };
</script>
{{-- ajax for calling api --}}
<script>
    $("#detail").click(function(){
        var reg =$("#registernumber").val();
        var mileage =$("#mileage").val();
       //var color =$(#).val();
        if (mileage === ""){
            $('#mileage').css('border','1px solid #e4001b');
            $('#mileage_invalid_message').html("Please enter Mileage.");
            $('#mileage_invalid_message').css({color:"#e4001b",display:"block",fontSize:"15px"});
            setTimeout(function(){
                    $('#mileage').css('border-color','#ced4da');
                    $('#mileage_invalid_message').css("display","none"); },
                5000);
            return false;
        }
$(".loader").show();
$.ajax({

method:"get",
url:"{{ route("api.findcar")  }}"+"?reg="+reg+"&mileage="+mileage,
DataType:"json",
success:function(data){
//console.log(data.result['GetVehicleDataResult']['VehicleRegistration']['VRM']);
if(data.status==1){
    if(data.result['GetVehicleDataResult']['VehicleRegistration']['MaxPermissibleMass']!=0){
        var r_s=data.result['GetVehicleDataResult']['VehicleRegistration']['Model'];
        r_s=r_s.replace(/\s/g, "");
        console.log(r_s);
   //console.log(data.result['GetVehicleDataResult']['VehicleRegistration']['Model']);
$("#"+r_s).prop("selected",true);
$("#"+data.result['GetVehicleDataResult']['VehicleRegistration']['Colour']).prop("selected",true);
$("#registernumber").val(data.result['GetVehicleDataResult']['VehicleRegistration']['VRM']);
$("#DIESEL").val(data.result['GetVehicleDataResult']['VehicleRegistration']['Fuel']).prop("selected",true);
$("#mileage").val(data.result['GetVehicleDataResult']['MileageDetails']['InputMileage']);
$("#enginesize").val(data.result['GetVehicleDataResult']['VehicleRegistration']['EngineCapacity']);
$("#year_mani option[value='"+data.result['GetVehicleDataResult']['VehicleRegistration']['YearOfManufacture'] +"']").prop("selected",true);
$("#make_manuaf option[value='"+data.result['GetVehicleDataResult']['VehicleRegistration']['Make'] +"']").prop("selected",true);
$("#car_type option[value='"+data.result['GetVehicleDataResult']['MCIAMotorcycleData']['VehicleType'] +"']").prop("selected",true);
$("#color").val(data.result['GetVehicleDataResult']['VehicleRegistration']['Colour']);
//$("#bhp").val(data.result['GetVehicleDataResult']['VehicleRegistration']['EngineCapacity']);
}
else{
     $('#registernumber').css('border','1px solid #e4001b');
    $('.image_invalid').css('border','1px solid #e4001b');
    $('#registration_invalid_message').html("Reg num not found enter manually.");
    $('#registration_invalid_message').css({color:"red",display:"block",bottom:"-11px",fontSize:"15px"});
    setTimeout(function(){
        $('#registernumber').css('border-color','#ced4da');
        $('.image_invalid').css('border','transparent');
        $('#registration_invalid_message').css("display","none"); },
        5000);
        $('#mileage').css('border','1px solid #e4001b');
        $('#mileage_invalid_message').html("Mileage not found.");
        $('#mileage_invalid_message').css({color:"#e4001b",display:"block",bottom:"-11px",fontSize:"15px"});
        setTimeout(function(){
                $('#mileage').css('border-color','#ced4da');
                $('#mileage_invalid_message').css("display","none"); },
            5000);



}
}
else{
    if (mileage === ""){
        $('#mileage').css('border','1px solid #e4001b');
        $('#mileage_invalid_message').html("Please enter Mileage.");
        $('#mileage_invalid_message').css({color:"#e4001b",display:"block",bottom:"-11px",fontSize:"15px"});
        setTimeout(function(){
                $('#mileage').css('border-color','#ced4da');
                $('#mileage_invalid_message').css("display","none"); },
            5000);
        return false;
    }else {
        $('#mileage').css('border','1px solid #e4001b');
        $('#mileage_invalid_message').html("Mileage not found.");
        $('#mileage_invalid_message').css({color:"#e4001b",display:"block",bottom:"-11px",fontSize:"15px"});
        setTimeout(function(){
                $('#mileage').css('border-color','#ced4da');
                $('#mileage_invalid_message').css("display","none"); },
            5000);
    }
  if (reg === "") {
    $('#registernumber').css('border','1px solid #e4001b');
    $('.image_invalid').css('border','1px solid #e4001b');
    $('#registration_invalid_message').html("Please enter reg number.");
    $('#registration_invalid_message').css({color:"#e4001b",display:"block",bottom:"-11px"});
    setTimeout(function(){
        $('#registernumber').css('border-color','#ced4da');
        $('.image_invalid').css('border','transparent');
        $('#registration_invalid_message').css("display","none"); },
        5000);
  }else {
    $('#registernumber').css('border','1px solid #e4001b');
    $('.image_invalid').css('border','1px solid #e4001b');
    $('#registration_invalid_message').html("Reg num not found enter manually.");
    $('#registration_invalid_message').css({color:"#e4001b",display:"block",bottom:"-11px",fontSize:"15px"});
    setTimeout(function(){
        $('#registernumber').css('border-color','#ced4da');
        $('.image_invalid').css('border','transparent');
        $('#registration_invalid_message').css("display","none"); },
        5000);
  }


}
    $(".loader").hide();
},
error:function(data){

}

});
});
    $("#speed").change(function (e){
        if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57)){
            var val = $("#speed").val();
            if(val.length < 10) {
                alert("Value must contain 10 characters.");
                $(this).focus();
            }
            return false;
        }


    });
    $("#carsellarnext1").click(function() {
        var val = $("#number").val();
        if (val === ""){
            $("#number").css("borderColor","#e4001b");
        }

    });
    $(document).on("submit","#add_garage_advert",function (e){
        e.preventDefault();
        var formdata=new FormData(this);
        var url=$(this).attr("action");
        var img = $("#garage_image").val();
        var c_mail = $("#company_mail").val();
        var tags = $("#inputTags").val();
        var descr = $("#des_garage").val();
        var c_name = $("#company_name").val();
        var c_numb = $("#company_numb").val();
        var deal_item=[];
        if($(this).find(".badge-info") !=0){
            $(this).find(".badge-info").each(function (){
                deal_item.push($(this).text());
            });
        }else{
            alert("Please Add Deal item");
            return false;
        }
        var t=this;
        $resize_garage.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (img) {
            var formdata = new FormData(t);
            formdata.append("img",img);
            formdata.append("pic",garage_car_pic);
        formdata.append("deal_item",JSON.stringify(deal_item));
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#garage_loader").show();
        $.ajax({
            url:url,
            method:"post",
            DataType:"json",
            data:formdata,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.status==1){
                    $("#garage_loader").hide();
                    $("#garage_status").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});
                    $("#garage_status").html(data.msg);
                    window.location="{{route("garage-list")}}";

              }else{
                    $("#garage_loader").hide();
                    $("#status_g").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block "});
                    $("#status_g").html(data.msg);
                    //  console.log(data.msg);
                    $("#place_d").prop("disabled",false);
                    $("#place_d").removeClass("place_your_ad");

                }

            }
        });
        });
    });
    $(document).on("submit","#add_wanted",function (e){
        e.preventDefault();
        if ($("#contact_Checkbox").prop("checked") == true){
            var contact = $("#input_contact").val();
            if(contact === ""){
                alert("Please fill contact number");
                $("#input_contact").css("border","1px solid red");
                return false;
            }
        }
        var formdata=new FormData(this);
        var url=$(this).attr("action");
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".wanted_loader").show();

        $.ajax({
            url:url,
            method:"post",
            DataType:"json",
            data:formdata,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                console.log(data.url);
              if(data.status==1){
                  $("#status").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});
                    $("#status").html(data.msg);
                  $(".wanted_loader").hide();
                  //$("#add_wanted").trigger("reset");
                 // document.getElementById("powersCar").click();
                 // document.getElementById("v-pills-wanted-section-tab").click();
                  window.location="{{route("buyer-list")}}";
                //  alert("okay");
                //    window.location=data.url;

                }
                else{
                    $(".wanted_loader").hide();
                    $("#status_wanted").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block"});
                    $("#status_wanted").html(data.msg);
                    $("#place_d").prop("disabled",false);
                    $("#place_d").removeClass("place_your_ad");
                }
            }
        });
    });


    //this for badge delete
    $(document).on("click", "#badge_remove",function (e){
        e.preventDefault();
        $(e.currentTarget.parentElement).remove();
    });

$(document).on("submit","#chat_wanted",function (e) {
    e.preventDefault();
    var formdata=new FormData(this);
    var url  = $(this).attr("action");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:url,
        method:"post",
        DataType:"json",
        data:formdata,
        cache: false,
        contentType: false,
        processData: false,
        success:function(data){
            console.log(data.url);
            if(data.status==1){

                    window.location="{{route("chat-view")}}";

            }else{

            }
        }
    });

});

    $(document).on("submit","#new-password-regiter",function (e){
        e.preventDefault();
        var formdata=new FormData(this);
        var url=$(this).attr("action");
        var pass1 = $("#rpassword0").val();
        var pass2 = $("#rpassword1").val();
        //  var pass_length = pass1.length;
        // var goodColor = $("#password1").css("border-color","blue");
        if (pass1 !=null && pass1 != ''){
            if(pass1.length<8 ){
                $("#password-valid").html("Password must be 8 characters.");
                $("#password-valid").css({color:"#e4173e",display:"block"});
                $("#rpassword0").css("border-color","#e4173e");
                $(".span-boorder").css("border-color","#e4173e");
                setTimeout(function(){
                        $(".span-boorder").css('border-color', '#ced4da');
                        $("#rpassword0").css('border-color', '#ced4da');
                        $("#password-valid").css({display:'none',color:'#ced4da'});
                    },
                    5000);
                return false;

            }

        }
        if(pass1 !== pass2){
            $("#rpassword1").css("border-color","#e4173e");
            $(".red-span-red").css("border-color","#e4173e");
            $("#confirm").html("The password is not matched.");
            $("#confirm").css({display:'block',color:'#e4173e'});
            setTimeout(function(){
                    $(".red-span-red").css('border-color', '#ced4da');
                    $("#rpassword1").css('border-color', '#ced4da');
                    $("#confirm").css({display:'none',color:'#ced4da'});
                },
                5000);
            return false;

        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#new-password-loader").show();
        $.ajax({
                url:url,
                method:"post",
                DataType:"json",
                data:formdata,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.status==1){
                        $("#new-password-loader").hide();
                        // $("#garage_status").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});
                        // $("#garage_status").html(data.msg);
                        $("#confirm").html(data.msg);
                        $("#confirm").css({display:'block',color:'green'});
                        window.location =data.result;

                    }else{
                        $("#new-password-loader").hide();
                        $("#confirm").html(data.msg);
                        $("#confirm").css({display:'block',color:'#e4173e'});

                    }

                }
            });

    });

//miscellanous add
    $(document).on("submit","#add_misc_advert",function (e){
        e.preventDefault();
        var formdata=new FormData(this);
        var url=$(this).attr("action");
        var t=this;
        $resize_misc.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (img) {
            var formdata = new FormData(t);
            formdata.append("img",img);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $("#misc_loader").show();
            $.ajax({
                url:url,
                method:"post",
                DataType:"json",
                data:formdata,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.status==1){
                        $("#misc_loader").hide();
                        // $("#garage_status").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});
                        // $("#garage_status").html(data.msg);
                        window.location="{{route("autopart-list")}}";
                        }else{
                        $("#misc_loader").hide();
                        $("#status_m").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block "});
                        $("#status_m").html(data.msg);
                        //  console.log(data.msg);
                        $("#place_d").prop("disabled",false);
                        $("#place_d").removeClass("place_your_ad");

                    }

                }
            });
        });
    });

    // swap create
    $(document).on("submit","#add_swap_car",function (e){
        e.preventDefault();
 var t= this;
        var formdata=new FormData(this);
        var url=$(this).attr("action");

        $resize_swap.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function (img) {
            var formdata = new FormData(t);
            formdata.append("img",img);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".loader").show();

        $.ajax({
            url:url,
            method:"post",
            DataType:"json",
            data:formdata,
            cache: false,
            contentType: false,
            processData: false,
            success:function(data){
                if(data.status==1){
                    $(".loader").hide();
                    $("#swap_err").css({display:"none"});
                    $("#swap_pricing_tab").click();
                    $("#append_swap").remove();
                    $("#swap_id").val(data.result['id']);
                    var c_img = data.result["featured_img"];
                        var img =        '{{asset("/public/crop_images/".":image")}}';
                      img = img.replace(":image",c_img);
                      var apend = '<div class="col-sm-12 col-md-5 col-lg-5 col-xl-5 p-0" id="append_swap">' +
                            '<div class="card" >' +
                            '<div class="card-header p-0">' +
                            '<h3>'+data.result["model"]+'</h3>' +
                            '<p>'+data.result["manufacture"]+','+data.result["car_type"]+','+data.result["engine_type"]+'</p>' +
                            '</div>' +
                            '<div class="cardimageswap-car">' +
                            '<img class="card-img-top" src="'+img+'" alt="Card image cap">' +
                            '</div>' +
                            '<div class="card-body p-0">' +
                            '<div class="row">' +
                            '<div class="col-12 carworth">Your Car Worth</div>' +
                            '<div class="col-12">' +
                            '<div class="  carspecspric">' +
                            data.result['price'] +
                            '</div></div>' +
                            '<div class="col-12"><hr></div>' +
                            '<div class="col-12 summarybilldetail edit" id="swap_edit"> Edit</div>' +
                            '</div>' +
                            '<div class="row summarysection">' +
                            '<div class="col-12 summaryheading">' +
                            '<i class="fas fa-file-alt"></i>Car Summary' +
                            '</div>' +
                            '<div class="col-6 summarybillheading " >Purchase type:</div>' +
                            '<div class="col-6 summarybilldetail">Paypal</div>' +
                            '<div class="col-12"><hr></div>' +
                            '<div class="col-6 summarybillheading " >Model:</div>' +
                            '<div class="col-6 summarybilldetail">'+data.result["model"]+'</div>' +
                            '<div class="col-12"><hr></div>' +
                            '<div class="col-6 summarybillheading " >Car Condition:</div>' +
                            '<div class="col-6 summarybilldetail">'+data.result["car_condition"]+'</div>' +
                            '<div class="col-12"><hr></div>' +
                            '<div class="col-6 summarybillheading " >Car Make:</div>' +
                            '<div class="col-6 summarybilldetail">'+data.result["car_make"]+'</div>' +
                            '<div class="col-12"><hr></div>' +
                            '<div class="col-6 summarybillheading " >Car Type:</div>' +
                            '<div class="col-6 summarybilldetail">'+data.result["car_type"]+'</div>' +
                            '<div class="col-12"><hr></div>' +
                            '<div class="col-6 summarybillheading " >Color:</div>' +
                            '<div class="col-6 summarybilldetail">'+data.result["color"]+'</div>' +
                            '<div class="col-12"><hr></div>' +
                            '<div class="col-6 summarybillheading " >Engine Type:</div>' +
                            '<div class="col-6 summarybilldetail">'+data.result["engine_type"]+'</div>' +
                            '<div class="col-12"><hr></div>' +
                            '<div class="col-6 summarybillheading " >Fuel type:</div>' +
                            '<div class="col-6 summarybilldetail">'+data.result["fuel_type"]+'</div>' +
                            '<div class="col-12"><hr></div>' +
                            '<div class="col-6 summarybillheading " >Manifacture:</div>' +
                            '<div class="col-6 summarybilldetail">'+data.result["manufacture"]+'</div>' +
                            '<div class="col-12"><hr></div>' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                             $(".append_Swap_class").prepend(apend);




                }else if(data.status==2){
                    $('#LoginModalSwap').trigger('focus');
                    $('#LoginModalSwap').modal({backdrop: 'static', keyboard: false});
                    $('#LoginModalSwap').modal('show');

                    $(".loader").hide();
                }else{
                    $("#swap_err").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block "});
                    $("#swap_err").html(data.msg);
                    $(".loader").hide();
                }
            }
        });
        });
    });
    function myFunctionurl() {

        var copyText = document.getElementById("car_share_icon");

        copyText.select();

        copyText.setSelectionRange(0, 99999);

        document.execCommand("copy");

        $("#ShareModalCenter").modal("show");



    }
    $(".f-card-name").html(function(index, currentText) {



        var maxLength = 15;

        if(currentText.length >= maxLength) {

            return currentText.substr(0, maxLength) + "...";

        } else {

            return currentText

        }

    });
    $("#image_2").change(function() {
        let numFiles = $(this)[0].files.length;

        if (numFiles > 0) {
            readURL(this, "preview_2");
        } else {
            $('#preview_2').removeAttr('src');
        }


    });

    $("#image_3").change(function() {
        let numFiles = $(this)[0].files.length;

        if (numFiles > 0) {
            readURL(this, "preview_3");
        } else {
            $('#preview_3').removeAttr('src');
        }


    });
    $(document).on("click","#swap_edit",function (e) {
        e.preventDefault();
        $("#swap_car_details").click();





    });
        var max = 10;
  var tot, str;
  $('.text').each(function() {
    str = String($(this).html());
    tot = str.length;
    str = (tot <= max)
        ? str
      : str.substring(0,(max + 1))+"...";
    $(this).html(str);
  });

$(document).ready(function() {
            $('#listview').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
            $('#gridview').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
        });


function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
$('.Brose-slider').css('display','block');
    $(".dis-slider-index-2").css("display","block");
    $(".slider-2-index").css("display","block");

$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
   autoplay:true,
   nav:true,
   navText : ['<i class="fa fa-angle-right r" aria-hidden="true" style="font-size:20px"></i>','<i class="fa fa-angle-left l" aria-hidden="true" style="font-size:20px"></i>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:6

        }
    }
});
    // <=====Script For Slider Add More========>
    $('.AddMore').slick({
        // dots: true,
        infinite: true,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 4,
        prevArrow: '<span class="prev"><i class="fas fa-angle-right"></i></span>',
        nextArrow: '<span class="next"><i class="fas fa-angle-left"></i></span>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    infinite: true,
                    // dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $(".f-card-description").css("display","block");
    $(".slick-slider").css("display","block");
    $(".f-card-name").html(function(index, currentText) {



        var maxLength = $(this).parent().attr('data-maxlength');

        if(currentText.length >= maxLength) {

            return currentText.substr(0, maxLength) + "...";

        } else {

            return currentText

        }

    });
      $(".f-card-description").html(function(index, currentText) {



        var maxLength = $(this).parent().attr('data-maxlength');

        if(currentText.length >= maxLength) {

            return currentText.substr(0, maxLength) + "...";

        } else {

            return currentText

        }

    });
</script>
  <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAddbxUhXJYrPqsX24kbEhFR1cJg37U2vA&libraries=places&callback=initProfileAutocomplete" async defer></script>-->
{{-- <script>$('.newbasicpackagedetail').slick('setPosition');</script> --}}
<script src="{{ config('app.ui_asset_url').'frontend/js/axios.js' }}"></script>
@include('frontend.partials.axios')
@include('frontend.partials.scripts')

</body>

</html>
