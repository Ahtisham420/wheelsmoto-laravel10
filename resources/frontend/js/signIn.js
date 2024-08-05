$(document).ready(
    function(){
        // $("#signin").show();
        // $("#register").hide();
        $("#registerNow").click(function(){
            $("#signin").hide();
            $("#register").hide();
            $("#phone-section").show();
        });

        $("#signinbutton").click(function(){
            $("#register").hide();
            $("#signin").show();
        });



      $(".temrsandconditioncheck input[type=checkbox]").change(function(e){
        if($(this).prop("checked")==true){
          $("#registerBTN").removeAttr("disabled");
        }
        else  {
            $("#registerBTN").attr("disabled","disabled");
        }

        // if($(this).is(":checked")){
        //     $('#btnSubmit').removeAttr("disabled");
        // }
      });
});
