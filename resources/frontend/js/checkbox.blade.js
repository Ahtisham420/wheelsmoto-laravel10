$(document).ready(

    function() {
        $("#garage-advertisement").hide();
        $("#v-pills-tabContent").show();
        $("#first-next-section").hide();
        $("#second-next-section").hide();
        $("#simplediv").show();
        $("#pkgdiv").hide();
        $("#profilediv").hide();



        $("#garagetab").click(function() {

            $("#simplediv").show();
            $("#pkgdiv").hide();
            $("#profilediv").hide();
            $("#garagetab").css("border-bottom", "3px solid #e4001b");
            $("#powersCar").css("border-bottom", "3px solid transparent");
            $("#profilesection").css("border-bottom", "3px solid transparent");
            $("#currentpackage").css("border-bottom", "3px solid transparent");


            $("#garage-advertisement").show();
            $("#v-pills-tabContent").hide();
            $("#v-pills-tab").click(function() {

                $("#garage-advertisement").hide();

                $("#v-pills-tabContent").show();


            });

        });
        $("#currentpackage").click(function() {
            $("#simplediv").hide();
            $("#pkgdiv").show();
            $("#profilediv").hide();
            $(this).css("border-bottom", "3px solid #e4001b");
            $("#garagetab").css("border-bottom", "3px solid transparent");
            $("#powersCar").css("border-bottom", "3px solid transparent");
            $("#profilesection").css("border-bottom", "3px solid transparent");
        });
        $("#profilesection").click(function() {
            $("#profilediv").show();
            $("#simplediv").hide();
            $("#pkgdiv").hide();
            $("#profilesection").css("border-bottom", "3px solid #e4001b");
            $("#currentpackage").css("border-bottom", "3px solid transparent");
            $("#garagetab").css("border-bottom", "3px solid transparent");
            $("#powersCar").css("border-bottom", "3px solid transparent");

        });


        $("#powersCar").click(function() {
            $("#profilediv").hide();
            $("#simplediv").show();
            $("#pkgdiv").hide();
            $("#powersCar").css("border-bottom", "3px solid #e4001b");
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
            if (flag) {

                $("#first-next-section").hide();
                $("#second-next-section").show();
            }



        });
        $("#previousbtnTo1").click(function() {

            $("#first-next-section").show();
            $("#second-next-section").hide();


        });
        console.log("this is woorhshfsofhdepihrekjh");





      /*  $('#datepicker').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minYear: 1901,
            maxYear: parseInt(moment().format('YYYY'),10)
          });*/
        //   $('.newbasicpackagedetail').slick('refresh');
        //   $('.newbasicpackagedetail').slick('setPosition');



$("#packagemodal").click(function() {
    $('.newbasicpackagedetail').slick('refresh');
    $('.newpackagemodal').modal('show');
});
if ($(window).width() < 576) {
    console.log("this is not working");
    $('.tabs-nav-power').removeClass('flex-column');
    $('.tabs-nav-power').addClass('flex-row');
};






// Run code







});
