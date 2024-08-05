function trimfield(str) {
    return str.replace(/^\s+|\s+$/g, '');
}
var pg = 0; //progress bar width initially
document.onreadystatechange = function() {
    if (document.readyState == "interactive") {
        var allElem = $("*");
        var length = allElem.length;
        for (var i = 0; i < length; i++) {
            set_elem(allElem[i], length);
        }
    }
}

function set_elem(elem, total) {
    var percent_inc = 100 / total; //equally divide 100 among all elements

    //if element is loaded
    if ($(elem).length == 1) {
        $('#bar').animate({
            width: pg + percent_inc + "%"
        }, 2, function() {
            if (document.getElementById("bar").style.width == "100%") {
                //hide the bar
                $('#bar').fadeOut();
            }
        });
        //update the previous width value
        pg = pg + percent_inc;
    }
}



$(document).ready(

    function() {
        // $(".compare-table").hide();
        // $(".morespecification").on("click" ,function (){
        //     $(".compare-table").slideToggle("slow");
        // });

        //$(".distance-select").select2();

        $("#garage-advertisement").hide();
        $("#miscellaneous-advertisement").hide();
        $("#v-pills-tabContent").show();
        $("#first-next-section").hide();
        $("#second-next-section").hide();
        $("#simplediv").show();
        $("#pkgdiv").hide();
        $("#profilediv").hide();
        // checkbox in american muscle
        //     $('#category i.fa-plus').show();
        //     $('#category i.fa-minus').hide();
        //     $('#price i.fa-plus').show();
        //     $('#price i.fa-minus').hide();
        //     $('.priceshow1').hide();
        // $('input[type="checkbox"]').on('change', function() {
        //     $('input[name="' + this.name + '"]').not(this).prop('checked', false);
        // });
        // $('#category').click( function () {
        //     console.log("this is show and hide");
        //     $('.categoryshow').toggle();
        //     // $('.categoryshow').fadeIn('slow');
        //     $('i',this).toggle();
        // });
        // $('#price').click( function () {
        //     $('.priceshow1').toggle();
        //     $('i',this).toggle();
        // }
        // );
        // end
        $("#garagetab").click(function() {

            $("#simplediv").show();
            $("#pkgdiv").hide();
            $("#profilediv").hide();
            $("#garagetab").css("border-bottom", "3px solid #00a651");
            $("#miscellaneous").css("border-bottom", "3px solid transparent");
            $("#powersCar").css("border-bottom", "3px solid transparent");
            $("#profilesection").css("border-bottom", "3px solid transparent");
            $("#currentpackage").css("border-bottom", "3px solid transparent");


            $("#garage-advertisement").show();
            $("#miscellaneous-advertisement").hide();

            $("#v-pills-tabContent").hide();
            $("#v-pills-tab").click(function() {

                $("#garage-advertisement").hide();
                $("#miscellaneous-advertisement").hide();


                $("#v-pills-tabContent").show();


            });

        });
        $("#miscellaneous").click(function() {

            $("#simplediv").show();
            $("#pkgdiv").hide();
            $("#profilediv").hide();
            $("#miscellaneous").css("border-bottom", "3px solid #00a651");
            $("#garagetab").css("border-bottom", "3px solid transparent");
            $("#powersCar").css("border-bottom", "3px solid transparent");
            $("#profilesection").css("border-bottom", "3px solid transparent");
            $("#currentpackage").css("border-bottom", "3px solid transparent");


            $("#garage-advertisement").hide();
            $("#miscellaneous-advertisement").show();
            $("#v-pills-tabContent").hide();
            $("#v-pills-tab").click(function() {

                $("#garage-advertisement").hide();
                $("#miscellaneous-advertisement").hide();


                $("#v-pills-tabContent").show();


            });

        });
        $("#currentpackage").click(function() {
            $('.packagedetaillogin').slick('refresh');
            $("#simplediv").hide();
            $("#pkgdiv").show();
            $("#profilediv").hide();
            $(this).css("border-bottom", "3px solid #00a651");
            $("#garagetab").css("border-bottom", "3px solid transparent");
            $("#powersCar").css("border-bottom", "3px solid transparent");
            $("#profilesection").css("border-bottom", "3px solid transparent");
        });
        $("#profilesection").click(function() {
            $("#profilediv").show();
            $("#simplediv").hide();
            $("#pkgdiv").hide();
            $("#profilesection").css("border-bottom", "3px solid #00a651");
            $("#currentpackage").css("border-bottom", "3px solid transparent");
            $("#garagetab").css("border-bottom", "3px solid transparent");
            $("#powersCar").css("border-bottom", "3px solid transparent");
        });


        $("#powersCar").click(function() {
            $("#profilediv").hide();
            $("#simplediv").show();
            $("#pkgdiv").hide();
            $("#powersCar").css("border-bottom", "3px solid #00a651");
            $("#profilesection").css("border-bottom", "3px solid transparent");
            $("#currentpackage").css("border-bottom", "3px solid transparent");
            $("#garagetab").css("border-bottom", "3px solid transparent");
        });
        $(document).on("focus", "input,select", function() {
            $(this).removeClass("error");
        });
        $("#carsellarnext0").click(function() {

            var flag = true;
            $(".validate0").each(function(e) {

                if ($(this).val() === "") {
                    flag = false;
                    $(this).addClass("error");
                    }
            });
            if (!flag){
                alert("Please Fill or Select required fields");
                return false;
            }else{
                $("#sell-your-car").hide();
                $("#first-next-section").show();
            }
        });
        $("#previousbtnTo0").click(function() {

            $("#first-next-section").hide();
            $("#sell-your-car").show();

        });
        $("#carsellarnext1").click(function() {
            var flag = true;
            $(".validate1").each(function(e) {
                if ($(this).val() === "") {
                    alert("Please Fill or Select required fields");
                    flag = false;
                    $(this).addClass("error");
                    return false;
                }
            });
            console.log($("#advert_t").val());


            if (flag) {
                if (trimfield($("#advert_t").val()) === "") {
                    $("#advert_t").addClass("error");
                    alert("Please Fill or Select required fields");
                    flag = false;
                    $(this).addClass("error");
                    return false;
                }

                $("#first-next-section").hide();
                $("#second-next-section").show();
            }



        });
        $("#previousbtnTo1").click(function() {

            $("#first-next-section").show();
            $("#second-next-section").hide();


        });
        $('#datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: new Date(),
           // maxYear: parseInt(moment().format('YYYY'), 10)
        });
        //   $('.newbasicpackagedetail').slick('refresh');
        //   $('.newbasicpackagedetail').slick('setPosition');

        $("#packagemodal").click(function() {

           $('.newbasicpackagedetail').slick('refresh');
            $('.newpackagemodal').modal('show');
        });
        if ($(window).width() < 768) {
            $('#collapseOnemobile').addClass('collapse');


        }
        if ($(window).width() > 768) {
            $('#collapseOnemobile').removeClass('collapse');

        }
        $(".currentpackage-tab").click(function() {
            $('.packagedetaillogin').slick('refresh');
        });
        // if($(window).width() >1400)
        // {
        //     $('.header').addClass("container");
        // }
        // if($(window).width() < 1400){
        //     $('.header').removeClass('container');
        // }
        // Run code
        // $('#swapingsection-summary').hide();
        // $('.new-car-img-top').hide();
        // $('#brandsCarswapping').change(function() {
        //     $('#swapingsection-summary').show();
        //     $('.new-car-img-top').show();
        //
        // });


        $(".closebtn-modal").click(function() {

            $(".addfeatureModal").modal("close");
        });
        // $("").inputFilter(function(value) {
        //     return /^\d*$/.test(value); // Allow digits only, using a RegExp
        // });
        $(".new-price-for-car").on("keypress keyup blur", function(event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
            $(this).val($(this).val().replace(/[^0-9\.]/g, ''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
        });
        $("#modalbtndash").on('click',function (e){
             $("#apend_ul").remove();
            $("#append_ul").append('<ul id="apend_ul"></ul>');
            var data = "";
            $(".modal_list_view").each(function () {
              if ($(this).prop('checked')==true){
                  data = $(this).data('col');
                console.log(data);
                $("#apend_ul").append('<li>' + data + '</li>');
              }
            });

            // if($(".modal_list_view").prop("checked")==true){
            //
            //       var enter = $(".new_checkbox_val_enter").html();
            //       var apend = '<ul id="apend_ul"><li>'+enter+'</li></ul>';
            //     //  $("#append_ul").show();
            //       $("#append_ul").append(apend);
            //       console.log(enter);
            //   }
            //   if($(".modal_list_view_safety").prop("checked")==true){
            //       var safety = $(".new_checkbox_val_safety").html();
            //       var apend = '<ul id="apend_ul"><li>'+safety+'</li></ul>';
            //     //  $("#append_ul").show();
            //       $("#append_ul").append(apend);
            //       console.log(safety);
            //   }

            // var safety = $(".modallistviewsafety").val();
            // console.log(safety);

        });
   $(".newmodalopen").on('change',function(e){
          e.preventDefault();
     if($(this).val()=='yes'){
            $('.addfeatureModal').modal('show');
          }
       if($(this).val()=='no'){
           $("#apend_ul").remove();
       }

        });

    });
$(document).ready(function(){
    $("#toggle_div").hide();
    $("#btn_toggle").click(function(){
        $("#toggle_div").slideToggle("slow");
        $(this).text() === 'Advanced Search' ? $(this).text('Sended') : $(this).text('Sended');
      //  $("#toggle_div").fadeToggle(1000);

    });
    $(".mobil-menu-portal").click(function(){
        $("#mobile-my-portal-menu").slideToggle("slow");
      //  $("#toggle_div").fadeToggle(1000);

    });
    $('.cancel-cookies').on('click',function(e){
      $('.coockies-show').css('display','none');
    });
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
      $("#inputTags").tagsinput('items');

      var maxLength = 0;
$('.textareacount textarea').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength+length;
  $('#chars span').text(length);
});
$('.textareacount input').keyup(function() {
  var length = $(this).val().length;
  var length = maxLength+length;
  $('#chars_input span').text(length);
});
 $("#emojitext").emojioneArea();
});
$(".cardescription").html(function(index, currentText) {

    var maxLength = $(this).parent().attr('data-maxlength');
    if(currentText.length >= maxLength) {
        return currentText.substr(0, maxLength) + "...";
    } else {
        return currentText
    }
});
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
