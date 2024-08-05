<script>
// $(document).on('click','.car-modal-filter',function (e){

//     e.preventDefault();

//     $('.owl-item').removeClass('modalFilterCar');

//     $(this).closest(".owl-item").addClass('modalFilterCar');



// });
$(document).on('click','.car-modal-filter',function (e){

    e.preventDefault();

    $('.car-modal-filter').removeClass('modalFilterCar');

    $(this).addClass('modalFilterCar');



});
$(document).on('click','.load-more-tile' ,function(event) {
    event.preventDefault();
    var last_id = $('.load-more-input').val();
    $("#loda-more-tile-loader").show();
    var curl = this;
   var _url = last_id;
    if (_url){
        _url = _url  + "&key=paginate";
        axios.get(_url).then(function(response) {
            console.log(response);
            if(response.data.status === 1){
                $('.load-more-input').val(response.data.last_id);
                $("#products").append(response.data.result);
                if (response.data.btn == "Ended"){
                    $(curl).html(response.data.btn);
                }else{
                    $(curl).html(response.data.btn+'<div class="loader m-auto" id="loda-more-tile-loader"></div>');
                }

            }else{
                $(curl).html(response.data.btn);
            }
            $("#loda-more-tile-loader").hide();
        });
    }else{
         $(curl).html("Ended");
          $("#loda-more-tile-loader").hide();
    }

});
    $(document).on("change",".filter-input-class",function(e){
        e.preventDefault();
        var car_type = $("#type-filters").val();
        var query='';
        var count=0;

        // sort By

        $(".custom-control-input").each(function(e){

            if($(this).prop("checked")){
                if(count == 0){
                    query='(';
                }
                var col=$(this).data("col");
                var val=$(this).val();
                query+=col +"=" +"'"+ val + "'"+ " or ";
                count++;
            }
        });

        if(count==0){
            query="car_availbilty='"+ car_type +"'";
        }
        else{
            query=query.substring(0,query.length-4);
            query= query+ ")"+"and car_availbilty='"+ car_type +"'";

        }
        var fuel = $("#car-fuel").val();
        var year = $("#car-year").val();
        if(year !== null){
            query = query +"and year='"+year+"'";
            console.log(query);
        }
        if (fuel !== null){
            query = query +"and fuel_type='"+fuel+"'";
            console.log(query);
        }
          console.log(query);
        var url="{{ route('filter-data',['query'=>':val'])}}";
        url=url.replace(":val",query);
        //   url=url.replace(":type",car_type);
        // console.log(val);
        $.ajax({
            method:"get",
            url:url,
            DataType:"json",
            success:function(data){
                  console.log(data);
                $("#apend").remove();
                $(".append_class").append('<div id="apend" class="row m-0" style="width:100%;"></div>');
                if(data.status==1){
                    $(".error-post-code").css({display:'none'});
                    for(x in data.result){
                        if(data.result[x]["car_condition"]==="Used"){
                            var v="Used";
                        }else{
                            var v="new";
                        }
                        if(data.result[x]["car_availbilty"]==="Lease"){
                            var type = '<button class="bidnowbtn">Lease Now</button>';
                        }else if(data.result[x]["car_availbilty"] === "Sell"){
                            var type = '';
                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){
                            var type = '';
                        }else if(data.result[x]["car_availbilty"]==="Auction"){
                            var type = '';
                        }else if(data.result[x]["car_availbilty"]==="Swap"){
                              // console.log(data.user_car_id.includes("54"));
                            var id=  data.result[x]["id"] ;
                              var s_id  =  id.toString();
                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){
                                var type = '<label class="mt-2 swap_label">You already request this car</label>';
                            }else{
                                var id =  btoa(data.result[x]["id"]) ;
                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';
                                url = url.replace(":s_id",id);
                             var type = '<a class="mt-2 bidnowbtn btn_swap_car_swapcar" href="'+url+'">Swap Now</a>';

                            }


                        }else{
                            var type = '<button class="bidnowbtn">Rent Now</button>';
                        }

                        var apend='';
                        var apend='<div  class="col-12 col-sm-6 col-md-3 colwidth"><div class="card" ><div class="cardimage"><p>'+v+'</p>'+
                            '<img class="card-img-top" src="/../../wheelshunt/public/crop_images/'+data.result[x]["crop_image"]
                            +'" alt="Card image cap"></div><div class="card-body"><div class=" row "><div class="col-12 col-sm-12 col-md-12 col-lg-12  americancardbody ">' +' '+data.result[x]["year"]
                              +'  '+ data.result[x]["title"]+ '</div><div class="mt-2 col-6 col-sm-12 col-md-6 "><p class="cardPrice">$'+data.result[x]["price"]+'</p></div>'+
                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0  bidnowbtndiv">'+type+'</div></div><p class="cardescription" style="padding-top:10px">'+
                            data.result[x]["advert_text"]+'</p></div></div></div>';
                        $("#apend").append(apend);


                    }

                }else {
                    $(".error-post-code").html("There is no record against your request");
                    $(".error-post-code").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});
                }


            },
            error:function(data){
                console.log(data);

            }

        });
    });
 $(document).on('change','.brand-select-filter',function (e) {

        $(".f-card-description").css("display","block");

        e.preventDefault();

        var value  = $('option:selected',this).attr('data-id');

        var url = '{{route('model-brand',['id'=>':id'])}}';

url = url.replace(':id',value);

        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){

                console.log(data);

                if(data.status==1){

                    $("#brandModalFilter").empty();

                    $("#brandModalFilter").html('<option value="">Select Model</option>');

                    for(x in data.result){

                        var apend= '<option value="'+data.result[x]['id']+'">'+data.result[x]['_value']+'</option>';

                        $("#brandModalFilter").append(apend);

                    }



                }else {

                    $('#brandModalFilter').html('<option selected disabled>No Data Found</option>');

                    return false;

                }





            },

            error:function(data){

                console.log(data);



            }



        });



    });
        $(document).on("click",".home-year-btn",function(e){

        e.preventDefault();

        var col=$(this).data("col");

        var val1=$("#val1-filter-year").val();

        var val2=$("#val2-filter-year").val();

        if(val1 === "" || val2 === "" ){

            $("#val1-filter-year").css("border", "1px solid #e4001b") ;

            $("#val2-filter-year").css("border", "1px solid #e4001b");

            setTimeout(function () {

                $("#val1-filter-year").css("border", "transparent");

                $("#val2-filter-year").css("border", "transparent");

            },5000);



        }



        var home_query = $("#home-filter").val();

        var query='';

        var count=0;



        // sort By

        if (val1 === "" || val2 === ""){

            if (home_query === "null"){

                query = "null"

            } else {

                query+= home_query;

            }



        }else if(home_query !==null  && home_query !== undefined){

            if (home_query === "all"){

                query+=col +" BETWEEN " +  val1  +  " AND " + val2

            }else{

                query+=home_query + " AND " +  col +" BETWEEN " +  val1  +  " AND " + val2 ;

            }



        }

        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (fuel === "DESC"){

                query = query +"  ORDER BY "+year+" DESC";



            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }


        }




        var url="{{ route('price-filter-data',['query'=>':val'])}}";

        url=url.replace(":val",query);



        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){
                 if(data.status==1){

                   $("#Append_render_data").html(data.result);

                   $(".f-card-name").html(function(index, currentText) {

                       var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        }else {

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



                }else {

                    $(".error-post-code").html("There is no record against your request");

                    $(".error-post-code").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});

                }





            },error:function(data){

              console.log(data);



            }



        });

    });
    $(document).on("click",".home-km-btn",function(e){

        e.preventDefault();

        var col=$(this).data("col");

        var val1=$("#val1-filter-km").val();

        var val2=$("#val2-filter-km").val();

        if(val1 === "" || val2 === "" ){

            $("#val1-filter-km").css("border", "1px solid #e4001b") ;

            $("#val2-filter-km").css("border", "1px solid #e4001b");

            setTimeout(function () {

                $("#val1-filter-km").css("border", "transparent");

                $("#val2-filter-km").css("border", "transparent");

            },5000);



        }



        var home_query = $("#home-filter").val();

        var query='';

        var count=0;



        // sort By

        if (val1 === "" || val2 === ""){

            if (home_query === "null"){

                query = "null"

            } else {

                query+= home_query;

            }



        }else if(home_query !==null  && home_query !== undefined){

            if (home_query === "all"){

                query+=col +" BETWEEN " +  val1  +  " AND " + val2

            }else{

                query+=home_query + " AND " +  col +" BETWEEN " +  val1  +  " AND " + val2 ;

            }



        }

        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (fuel === "DESC"){

                query = query +"  ORDER BY "+year+" DESC";



            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }


        }




        var url="{{ route('price-filter-data',['query'=>':val'])}}";

        url=url.replace(":val",query);



        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){
                 if(data.status==1){

                   $("#Append_render_data").html(data.result);

                   $(".f-card-name").html(function(index, currentText) {

                       var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        }else {

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



                }else {

                    $(".error-post-code").html("There is no record against your request");

                    $(".error-post-code").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});

                }





            },error:function(data){

              console.log(data);



            }



        });

    });
    $(document).on("click",".home-price-btn",function(e){

        e.preventDefault();

        var col=$(this).data("col");

        var val1=$("#val1-filter").val();

        var val2=$("#val2-filter").val();

        if(val1 === "" || val2 === "" ){

            $("#val1-filter").css("border", "1px solid #e4001b") ;

            $("#val2-filter").css("border", "1px solid #e4001b");

            setTimeout(function () {

                $("#val1-filter").css("border", "transparent");

                $("#val2-filter").css("border", "transparent");

            },5000);



        }



        var home_query = $("#home-filter").val();

        var query='';

        var count=0;



        // sort By

        if (val1 === "" || val2 === ""){

            if (home_query === "null"){

                query = "null"

            } else {

                query+= home_query;

            }



        }else if(home_query !==null  && home_query !== undefined){

            if (home_query === "all"){

                query+=col +" BETWEEN " +  val1  +  " AND " + val2

            }else{

                query+=home_query + " AND " +  col +" BETWEEN " +  val1  +  " AND " + val2 ;

            }



        }

        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (fuel === "DESC"){

                query = query +"  ORDER BY "+year+" DESC";



            }else{

                query = query +"  ORDER BY "+year+" ASC";

            }


        }




        var url="{{ route('price-filter-data',['query'=>':val'])}}";

        url=url.replace(":val",query);



        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){
                 if(data.status==1){

                   $("#Append_render_data").html(data.result);

                   $(".f-card-name").html(function(index, currentText) {

                       var maxLength = $(this).parent().attr('data-maxlength');

                        if(currentText.length >= maxLength) {

                            return currentText.substr(0, maxLength) + "...";

                        }else {

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



                }else {

                    $(".error-post-code").html("There is no record against your request");

                    $(".error-post-code").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});

                }





            },error:function(data){

              console.log(data);



            }



        });

    });

    $(document).on("change",".filter-home-class",function(e){
        $(".f-card-description").css("display","block");

        e.preventDefault();

        var car_type = $("#type-filters").val();

        var query='';

        var count=0;

        var home_query = $("#home-filter").val();

        var featured_query = $("#featured-filters").val();



        // sort By

        $(".custom-control-input").each(function(e){

            if($(this).prop("checked")){


                var col=$(this).data("col");

                var val=$(this).val();

                query+= col +" = " +"'"+ val + "'"+ " and ";

                count++;

            }

        });

        if(count==0){

            query =home_query

        }else {

            if (home_query === "" || home_query === "all") {

                query = query.substring(0, query.length - 4);

            } else {

                query =  query.substring(0, query.length - 4);

                query = query  + " and " + home_query;

            }

        }



        var fuel = $("#car-fuel").val();

        var year = $("#car-year").val();

        if(year !== null && year !== ""){

            if (count == 0 && home_query === "all"){

                query = query.substring(0, query.length - 4);

            }

            if (fuel === "DESC"){

                query = query +" ORDER BY `"+year+"` DESC ";

            }else{

                query = query +" ORDER BY  `"+year+"` ASC ";

            }


        }





        if (count == 0){

            query =   query;

            var url="{{ route('filter-data',['query'=>':val','op'=>'null'])}}";

            url=url.replace(":val",query);



        }else{

            var url="{{ route('filter-data',['query'=>':val','op'=>':qr'])}}";

            url=url.replace(":val",query);



        }

        console.log(query);



        $.ajax({

            method:"get",

            url:url,

            DataType:"json",

            success:function(data){
               if(data.status==1){
                    $("#Append_render_data").show();
                    $(".error-post-code").hide();
                    $("#Append_render_data").html(data.result)
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



                }else {

                    $("#Append_render_data").hide();

                    $(".error-post-code").show();

                    $(".error-post-code").html("No Record Match");

                    $(".h-no-record").css({display:'none'});

                    $(".error-post-code").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});

                }





            },

            error:function(data){

                console.log(data);



            }



        });

    });

    $(document).on("click",".input-span-db",function(e){
        e.preventDefault();
        var car_type = $("#type-filters").val();
        console.log(car_type);
        var val=$(".custom-control-btn").val();
        var col=$(".custom-control-btn").data("col");
        console.log(col,val,car_type);
        if(val === "") {
            $(".custom-control-btn").css("border", "1px solid #e4001b");
            $(".input-span-db").css("border", "1px solid #e4001b");
            $("#search-span-valid").html("Please enter postal code.");
            $("#search-span-valid").css({color: "#e4001b", display: "block"});
            setTimeout(function () {
                $(".custom-control-btn").css("border", "1px solid #ced4da");
                $(".input-span-db").css("border", "1px solid #ced4da");
                $("#search-span-valid").html("");
                $("#search-span-valid").css({color: "#ced4da", display: "none"});

            },5000);
            return false;
        }
        var url="{{ route('postal-data',['fill'=>':val','col'=>':col','type'=>':type'])}}";
        url=url.replace(":val",val);
        url=url.replace(":col",col);
        url=url.replace(":type",car_type);
        console.log(val);
        $.ajax({
            method:"get",
            url:url,
            DataType:"json",
            success:function(data){
                console.log(data);
                $("#apend").remove();
                $(".append_class").append('<div id="apend" class="row" style="width:100%;"></div>');
                if(data.status==1){
                    $(".error-post-code").css({display:'none'});
                    for(x in data.result){
                        if(data.result[x]["car_condition"]==="Used"){
                            var v="Used";
                        }else{
                            var v="new";
                        }
                        if(data.result[x]["car_availbilty"]==="Lease"){
                            var type = '<button class="bidnowbtn">Lease Now</button>';
                        }else if(data.result[x]["car_availbilty"] === "Sell"){
                            var type = '';
                        }else if(data.result[x]["car_availbilty"] === "American-Muscle"){
                            var type = '';
                        }else if(data.result[x]["car_availbilty"] === "Auction"){
                            var type = '';
                        }else if(data.result[x]["car_availbilty"]==="Swap"){
                            var id=  data.result[x]["id"] ;
                            var s_id  =  id.toString();
                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){
                                var type = '<label class="mt-2 swap_label">You already request this car</label>';
                            }else{
                                var id = btoa(data.result[x]["id"]);
                                var url = "{{route('frontend-swap-cars',['s_id'=>':id'])}}";
                                url = url.replace(":id",id);
                                var type = '<a class="mt-2 bidnowbtn btn_swap_car_swapcar" href="'+url+'">Swap Now</a>';

                            }
                        }else{
                            var type = '<button class="bidnowbtn">Rent Now</button>';
                        }

                        var apend='';
                        var apend='<div  class="col-12 col-sm-6 col-md-3 colwidth"><div class="card" ><div class="cardimage"><p>'+v+'</p>'+
                            '<img class="card-img-top" src="/../../wheelshunt/public/crop_images/'+data.result[x]["crop_image"]
                            +'" alt="Card image cap"></div><div class="card-body"><div class=" row "><div class="col-12 col-sm-12 col-md-12 col-lg-12  americancardbody ">' +' '+data.result[x]["year"]
                            +'  '+ data.result[x]["title"]+ '</div><div class="mt-2 col-6 col-sm-12 col-md-6 "><p class="cardPrice">$'+data.result[x]["price"]+'</p></div>'+
                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0  bidnowbtndiv">'+type+'</div></div><p class="cardescription" style="padding-top:10px">'+
                            data.result[x]["advert_text"]+'</p></div></div></div>';
                        $("#apend").append(apend);


                    }

                }else {
                    $(".error-post-code").html("Please check your postal code");
                    $(".error-post-code").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});
                    return false;
                }


            },
            error:function(data){
                console.log(data);

            }

        });
    });
    // price filter
    $(document).on("click",".price-filter-btn",function(e){
        e.preventDefault();
        var col=$(this).data("col");
        var val1=$("#val1-filter").val();
        var val2=$("#val2-filter").val();
        if(val1 === "" || val2 === ""  ) {

            $("#val1-filter").css("border", "1px solid #e4001b") ;
            $("#val2-filter").css("border", "1px solid #e4001b");

            setTimeout(function () {
                $("#val1-filter").css("border", "transparent");
                $("#val2-filter").css("border", "transparent");
            },5000);
            return false;
        }

        var car_type = $("#type-filters").val();
        var query='';
        var count=0;

        // sort By
  query+=col +" BETWEEN " +  val1  +  " AND " + val2 +  " AND "  + " car_availbilty" + " = " +"'"+car_type+"'";
        var fuel = $("#car-fuel").val();
        var year = $("#car-year").val();
        if(year !== null){
            query = query +" AND year='"+year+"'";
            console.log(query);
        }
        if (fuel !== null){
            query = query +" AND fuel_type='"+fuel+"'";
            console.log(query);
        }
        console.log(query);
        var url="{{ route('price-filter-data',['query'=>':val'])}}";
        url=url.replace(":val",query);

        $.ajax({
            method:"get",
            url:url,
            DataType:"json",
            success:function(data){
                console.log(data);
                $("#apend").remove();
                $(".append_class").append('<div id="apend" class="row m-0" style="width:100%;"></div>');
                if(data.status==1){
                    $(".error-post-code").css({display:'none'});
                    for(x in data.result){
                        if(data.result[x]["car_condition"]==="Used"){
                            var v="Used";
                        }else{
                            var v="new";
                        }
                        if(data.result[x]["car_availbilty"]==="Lease"){
                            var type = '<button class="bidnowbtn">Lease Now</button>';
                        }else if(data.result[x]["car_availbilty"] === "Sell"){
                            var type = '';
                        }else if (data.result[x]["car_availbilty"]==="American-Muscle"){
                            var type = '';
                        }else if(data.result[x]["car_availbilty"]==="Auction"){
                            var type = '';
                        }else if(data.result[x]["car_availbilty"]==="Swap"){
                            // console.log(data.user_car_id.includes("54"));
                            var id=  data.result[x]["id"] ;
                            var s_id  =  id.toString();
                            if(data.user_car_id.length !== 0 && data.user_car_id.includes(s_id)){
                                var type = '<label class="mt-2 swap_label">You already request this car</label>';
                            }else{
                                var id =  btoa(data.result[x]["id"]) ;
                                var url = '{{route("frontend-swap-cars",["s_id"=>":s_id"])}}';
                                url = url.replace(":s_id",id);
                                var type = '<a class="mt-2 bidnowbtn btn_swap_car_swapcar" href="'+url+'">Swap Now</a>';

                            }


                        }else{
                            var type = '<button class="bidnowbtn">Rent Now</button>';
                        }

                        var apend='';
                        var apend='<div  class="col-12 col-sm-6 col-md-3 colwidth"><div class="card" ><div class="cardimage"><p>'+v+'</p>'+
                            '<img class="card-img-top" src="/../../wheelshunt/public/crop_images/'+data.result[x]["crop_image"]
                            +'" alt="Card image cap"></div><div class="card-body"><div class=" row "><div class="col-12 col-sm-12 col-md-12 col-lg-12  americancardbody ">' +' '+data.result[x]["year"]
                            +'  '+ data.result[x]["title"]+ '</div><div class="mt-2 col-6 col-sm-12 col-md-6 "><p class="cardPrice">$'+data.result[x]["price"]+'</p></div>'+
                            '<div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0  bidnowbtndiv">'+type+'</div></div><p class="cardescription" style="padding-top:10px">'+
                            data.result[x]["advert_text"]+'</p></div></div></div>';
                        $("#apend").append(apend);


                    }

                }else {
                    $(".error-post-code").html("There is no record against your request");
                    $(".error-post-code").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});
                }


            },
            error:function(data){
                console.log(data);

            }

        });
    });

    //  this for search in wanted

    $(document).on("click",".wanted-span-search",function(e){
        e.preventDefault();
        var val=$(".input-search-wanted").val();
        var col=$(".input-search-wanted").data("col");
        if(val === "") {
            $(".input-search-wanted").css("border", "1px solid #e4001b");
            $(".wanted-span-search").css("border", "1px solid #e4001b");

            // $(".input-span-db").css("border", "1px solid #e4001b");

            setTimeout(function () {
                $(".wanted-span-search").css("border", "transparent");
                $(".input-search-wanted").css("border", "transparent");
                //     $(".input-span-db").css("border", "1px solid #ced4da");


            },5000);
            return false;
        }
        var url="{{ route('wanted-search',['fill'=>':val','col'=>':col'])}}";
        url=url.replace(":val",val);
        url=url.replace(":col",col);
        $.ajax({
            method:"get",
            url:url,
            DataType:"json",
            success:function(data){
                console.log(data);
                if(data.status==1){
                    $("#nav-profile").html(data.result);
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


                }else {
                    $("#nav-profile").html('<img class="mt-3" src="{{ config("app.ui_asset_url")."frontend/img/errMsg/error.png" }}" style="width:100%">');
                    // $(".wanted-section-error").html("No Record Match");
                    // $(".wanted-section-error").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});
                    return false;
                }


            },
            error:function(data){
                console.log(data);

            }

        });
    });
    // this for garage search
    $(document).on("click",".garage-section-search-filter",function(e){
        e.preventDefault();
      //  alert("okay");
        var val=$("#garage-search-input").val();
        var col=$("#garage-search-input").data("col");
             if(val === "") {
              $("#garage-search-input").css("border", "1px solid #e4001b");
              $(".garage-section-search-filter").css("border", "1px solid #e4001b");

        setTimeout(function () {
                $("#garage-search-input").css("border", "1px solid #ced4da");
                   $(".garage-section-search-filter").css("border", "transparent");
                   },5000);
                     return false;
             }
        var image1 ="{{ config('app.ui_asset_url').'frontend/img/featuredCar/Group 3236.png' }}";
        var image2 = "{{ config('app.ui_asset_url').'frontend/img/garageicon/badge.png' }}";
        var url="{{ route('garage-search',['col'=>':col','val'=>':val'])}}";
        url=url.replace(":val",val);
        url=url.replace(":col",col);
        console.log(url);
        $.ajax({
            method:"get",
            url:url,
            DataType:"json",
            success:function(data){
                console.log(data);
                $("#apend").remove();
                $(".append_class_garage").append('<div id="apend" class="row"></div>');
                if(data.status==1){
                    $(".garage-section-error").css({display:'none',color:"#e4001b",fontSize:'25px',fontWeight: '500'});
                    for(x in data.result){
                        var c_image = data.result[x]["pic"];
                        var image = JSON.parse(c_image)[0];
                        var f_image = "{{asset('storage/app/public/'.':image')}}";
                        f_image = f_image.replace(":image",image);
                        var apend='';
                        var apend=' <div class="col-12 col-md-6 shop"><div class="row" style="border: 1px solid #e4e0e0;"><div class="col-3 p-0 sidecar"><img src="'+f_image+'" alt=""></div><div class="col-9">' +
                            '<div class="row shopdetailSection"><div class="col-12  shopName"><h3>'+data.result[x]["c_name"]+'</h3><img  src="'+image1+'" alt=""></div>'+
                            ' <div class="col-12  shopdescription"> <p>'+data.result[x]["description"]+'</p></div>' +
                            '<div class="col-12 formgroup"> <form>  <label><span>Your Email:</span> Let us Contact You</label> <div class="input-group mb-3"><input type="text" class="form-control" placeholder="e.g. Trigonsoft@gmail.com" aria-label="Recipient\'s username" aria-describedby="basic-addon2">' +
                            '<div class="input-group-append"><button class="input-group-text" type="submit" id="basic-addon2"><i class=\'fas fa-paper-plane\'></i></button></div></div></form></div>'  +
                            '<div class="col-12"><div class="row"><div class="col-12 col-sm-6 dealsin">WE DEALS IN: <span>VIEW LIST</span></div><div class="col-12 col-sm-6 reportshop">'+
                            '<i class="fas fa-exclamation-triangle" aria-hidden="true"></i>Report this Shop</div></div></div><div class="col-12 topratedSection"><div class="row"><div class="col-8 col-sm-6">' +
                            '</div>' +
                            '<div class="col-12 col-sm-6  visitourwebsitebtn"><button href="#"> Visit our website</button>' +
                            '</div></div></div>' +
                            '</div></div></div></div>' ;
                        $("#apend").append(apend);
                    }

                }else {
                    $(".garage-section-error").html("No Record Match");
                    $(".garage-section-error").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});
                    return false;
                }


            },
            error:function(data){
                console.log(data);

            }

        });
    });
</script>
<script>
$(".filter_btn").click(function(e){
        e.preventDefault();
         var count = 0;
         var query='';

    $(".filter-price").each(function () {
        if($(this).val() && $(this).val()!==""){
            var pcolname=$(this).attr("name");
            var pvalue=$(this).val();
            count = 1;
                 if (pvalue === "above"){

                query+= pcolname +" >= " + 10000  + " and ";

            }else {
                     query+= pcolname +" between " +  pvalue + " and ";
                 }

        }
        console.log(query);
    });

    $(".filter").each(function () {
            if($(this).val() && $(this).val()!==""){
              var colname=$(this).attr("name");
              var value=$(this).val();
                query+=colname +"= '" + value + "' and ";
            count++;

          }
          console.log(query);
        });
  var cartype =  $(".modalFilterCar").data('col');

        if (cartype != null && cartype != undefined ){

            count = 1;

            query+='car_type' +"= '" + cartype + "' and ";



        }
        if(count==0){
            // $("#filter-btn-error").css('color',"red");
            // $("#filter-btn-error").css('border',"red");
            // $("#filter-btn-error").html('please select any filter');
            alert("please select any filter");
            return false;
        }
        query=query.substring(0,query.length-5);

    var url="{{route('home-filters',["query"=>":url"])}}";
        url=url.replace(":url",query);
        window.location=url;


    });




    //this for dashboard section filters
    $(document).on("click",".filter-dashboard",function(e){
        e.preventDefault();
        //   alert('okay');
        var val = $(this).val();
        var con=$("#check-box-switch").val();
        var url = "{{route('dashboard-filters',['val'=>':val','con'=>':con'])}}";
        var url = url.replace(":val",val);
        url = url.replace(":con",con);
        var update = '';
        //console.log(url);
        $.ajax({
            method:"get",
            url:url,
            DataType:"json",
            success:function(data){
                // console.log(data);
                $("#appned-remove").remove();
                $("#append-div").remove();
                // $(".append_class").append('<div id="apend" class="row" style="width:100%;"></div>');
                $(".appned-dashboard").append('<div class="row" id="append-div"></div>');
                var u="";
                var id="";
                if(data.status==1){
                    $("#span-dashboard-result").css("display","none");
                    //  console.log(data.result);
                    for(x in data.result){
                        // if(data.result[x]["car_condition"]==="Used"){
                        //     var v="Used";
                        // }else{
                        //     var v="new";
                        // }




                        // if(data.result[x]["car_availbilty"]==="Lease"){
                        //     var type = '<button class="bidnowbtn">Lease Now</button>';
                        // }else if(data.result[x]["car_availbilty"] === "Sell"){
                        //     var type = '';
                        // }else{
                        //     var type = '<button class="bidnowbtn">Rent Now</button>';
                        // }

                        //  console.log(update);
                        u="{{ route('user-dashboard', ['key' => 'edit', 'id' =>':id']) }}";
                        id=btoa(btoa(data.result[x]["id"]));
                        u=u.replace(':id',id);
                        var update="{{route('del_car',['id'=>':id'])}}";
                        del=btoa(data.result[x]["id"]);
                        up=update.replace(':id',del);
                        var apend='<div class="col-12 col-sm-6 col-md-3 pb-3 cardetail"><div class="card">'+
                            '<img class="card-img-top" src="/../../wheelshunt/public/crop_images/'+data.result[x]["crop_image"]
                            +'" alt="Card image cap"><div class="card-body"><div class="carname" data-maxlength="10"><div class="d-card-title">'+ data.result[x]["title"]+'</div></div><div class="editordelete">' +
                            '<div class="edit"><a href="'+ u +'">Edit</a></div><div class="divider"></div><div class="delete"><a href="javascript:void(0)" class="car_del" data-delete="'+del+'" >Delete</a><div class="divider"></div></div></div></div></div>';
                        $("#append-div").append(apend);
                    }
                    $(".d-card-title").html(function(index, currentText) {
                        var maxLength = $(this).parent().attr('data-maxlength');
                        if(currentText.length >= maxLength) {
                            return currentText.substr(0, maxLength) + "...";
                        } else {
                            return currentText
                        }
                    });

                }else{
                    $("#span-dashboard-result").html("No Result");
                    $("#span-dashboard-result").css({display:"block",color:"#e4001b",fontSize:"35px",paddingLeft:"230px",fontWeight:"400",});

                }


            },
            error:function(data){
                console.log(data);

            }

        });
    });

//    this for switch button
    $(document).on("change","#check-box-switch",function(e){

        e.preventDefault();

        if(!$(this).is(":checked")){

            $(this).val("New");

        }else{

              $(this).val("Used");

        }

        var con = $(this).val();
        var url = "{{route('new-filters',['con'=>':con'])}}";
        var url = url.replace(":con",con);
        var update = '';
        console.log($(this).val());

        $.ajax({
            method:"get",
            url:url,
            DataType:"json",
            success:function(data){
                // console.log(data);
                // $("#appned-remove").remove();
                // $("#append-div").remove();
                // $(".append_class").append('<div id="apend" class="row" style="width:100%;"></div>');
                // $(".appned-dashboard").append('<div class="row" id="append-div"></div>');
                // var u="";
                // var id="";
                if(data.status==1){
                    $("#span-dashboard-result").hide();
                    console.log(data);
                    {{--$("#span-dashboard-result").css("display","none");--}}
                    {{--  console.log(data.result);--}}
                    {{--for(x in data.result){--}}
                    {{--    u="{{ route('user-dashboard', ['key' => 'edit', 'id' =>':id']) }}";--}}
                    {{--    id=btoa(btoa(data.result[x]["id"]));--}}
                    {{--    u=u.replace(':id',id);--}}
                    {{--    var update="{{route('del_car',['id'=>':id'])}}";--}}
                    {{--    del=btoa(data.result[x]["id"]);--}}
                    {{--    var show="{{route('car-detail',['id'=>':idS'])}}";--}}
                    {{--   var SID=btoa(btoa(data.result[x]["id"]));--}}
                    {{--    show  =  show.replace(":idS",SID);--}}
                    {{--    var pic_url = JSON.parse(data.result[x]["pic_url"])[0];--}}
                    {{--    up=update.replace(':id',del);--}}
                    {{--    var apend='<div class="col-12 col-sm-6 col-md-3 mb-3 cardetail"><div class="card tile-dash">'+--}}
                    {{--        '<img class="card-img-top" src="'+pic_url+'" alt="Card image cap"><div class="card-body"><div class="carname" data-maxlength="10"><div class="d-card-title">'+ data.result[x]["title"]+'</div></div><div class="editordelete">' +--}}
                    {{--        '<div class="edit"><a href="'+ u +'">Edit</a></div><div class="divider"></div><div class="delete"><a href="javascript:void(0)" class="car_del" data-delete="'+del+'" >Delete</a></div><div class="divider"></div><div class="delete"><a href="'+show+'" target="_blank">Preview</a></div></div></div></div></div>';--}}
                    {{--    $("#append-div").append(apend);--}}
                    {{--}--}}
                    {{--$(".d-card-title").html(function(index, currentText) {--}}
                    {{--    var maxLength = $(this).parent().attr('data-maxlength');--}}
                    {{--    if(currentText.length >= maxLength) {--}}
                    {{--        return currentText.substr(0, maxLength) + "...";--}}
                    {{--    } else {--}}
                    {{--        return currentText--}}
                    {{--    }--}}
                    {{--});--}}
                    $(".appned-dashboard").html(data.result);

                }else{
                    $(".appned-dashboard").html("");
                    $("#span-dashboard-result").show();
                    $("#span-dashboard-result").html("No Result");
                    $("#span-dashboard-result").css({display:"block",color:"#e4001b",fontSize:"35px",paddingLeft:"230px",fontWeight:"400",});

                }


            },
            error:function(data){
                console.log(data);

            }

        });


        });

function check(e,value){
    //Check Charater
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (value.indexOf(".") != -1)if( unicode == 46 )return false;
    if (unicode!=8)if((unicode<48||unicode>57)&&unicode!=46)return false;
    console.log(value > 2021,value,2021,value.length);
    if (value !=""){
    if(value.length < 4){
        $("#txtF").css("border-color","#00a651");
        $("#yerar_validation").show();
        $("#yerar_validation").html("Year must be 4 Characters.");
    }else{

        var current_year = new Date().getFullYear();
        if (value > current_year){
            $("#txtF").css("border-color","#dc3545");
            $("#yerar_validation").show();
            $("#yerar_validation").html("Year has a maximum value of "+current_year);
            return false;
        }else if(value < 1900){
            $("#txtF").css("border-color","#dc3545");
            $("#yerar_validation").show();
            $("#yerar_validation").html("Year has a minimum value of 1900.");
            return false;
        }else{
            $("#txtF").css("border-color","#dc3545");
            $("#yerar_validation").hide();
        }

    }
    }

}
function checkLength(){
    var fieldLength = document.getElementById('txtF').value.length;
    //Suppose u want 4 number of character
    if(fieldLength <= 4){
        return true;
    } else{
        var str = document.getElementById('txtF').value;
        str = str.substring(0, str.length - 1);
        document.getElementById('txtF').value = str;
    }
}
function checkPhoneNumber(e,value){
    //Check Charater
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (value.indexOf(".") != -1)if( unicode == 46 )return false;
    if (unicode!=8)if((unicode<48||unicode>57)&&unicode!=46)return false;
    console.log(value.length);
    if (value !=""){
        if(value.length < 11){
            $("#Number_contact").css("border-color","#00a651");
            $(".span_92").css("border-color","#00a651");
            $("#phone_validation").show();
            $("#phone_validation").html("Numbers must be 11 Characters.");
        }else{
            if (value.length > 11){
                $("#Number_contact").css("border-color","#00a651");
                $("#phone_validation").show();
                $("#phone_validation").html("Numbers must be 11 Characters.");
                return false;
            }else{
                $("#Number_contact").css("border-color","#ced4da");
                $(".span_92").css("border-color","transparent");
                $("#phone_validation").hide();
            }

        }
    }

}
function checkLengthPhoneNumber(){
    var fieldLength = document.getElementById('Number_contact').value.length;
    //Suppose u want 4 number of character
    if(fieldLength <= 11){
        return true;
    } else{
        var str = document.getElementById('Number_contact').value;
        str = str.substring(0, str.length - 1);
        document.getElementById('Number_contact').value = str;
    }
}
function checkPrice(e,value){
    //Check Charater
    var unicode=e.charCode? e.charCode : e.keyCode;
    if (value.indexOf(".") != -1)if( unicode == 46 )return false;
    if (unicode!=8)if((unicode<48||unicode>57)&&unicode!=46)return false;
    console.log(value.length);
    if (value !=""){
        if(value.length < 5){
            $("#rs_input_valid").css("border-color","#00a651");
            $(".span_rs").css("border-color","#00a651");
            $("#rs_validation").show();
            $("#rs_validation").html("The minimum allowed value is 50000.");
            $("#rs_validation").css("color","#00a651");
        }else{
            if (value.length > 9){
                $("#rs_input_valid").css("border-color","#00a651");
                $("#rs_validation").show();
                $("#rs_validation").html("The maximum allowed value is 100000000.");
                $("#rs_validation").css("color","#00a651");
                return false;
            }else{
                $("#rs_input_valid").css("border-color","#ced4da");
                $(".span_rs").css("border-color","transparent");
                $("#rs_validation").hide();
            }

        }
    }

}
function checkLengthPrice(){
    var fieldLength = document.getElementById('rs_input_valid').value.length;
    //Suppose u want 4 number of character
    if(fieldLength <= 99){
        return true;
    } else{
        var str = document.getElementById('rs_input_valid').value;
        str = str.substring(0, str.length - 1);
        document.getElementById('rs_input_valid').value = str;
    }
}
    //
    // $(document).on("keypress",".garage-search-input-filter",function(e) {
    //    // e.preventDefault();
    //     //alert("pakistan");
    //     setTimeout(() => {
    //         var a = $(".garage-search-input-filter").val();
    //         console.log(a);
    //     }, 2000);
    //
    // });

$(document).on('change','.brand-select-base',function (e) {
    e.preventDefault();
    var value  =   $(this).find(':selected').val();
    if(value != ""){
        console.log(value);
        var url = '{{route('model-brand',['id'=>':id'])}}';
        url = url.replace(':id',value);
    }else {
        return false;
    }
    $("#model_show_sell").show();
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            if(data.status==1){
                $(".make-brand-append").empty();
                $(".make-brand-append").html('<option value="">Select Model</option>');
                for(x in data.result){
                    var apend= '<option value="'+data.result[x]['id']+'">'+data.result[x]['_value']+'</option>';
                    $(".make-brand-append").append(apend);
                }

            }else {
                $('.make-brand-append').html('<option selected disabled>No Data Found</option>');
                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });

});
$(document).on('change','.brand-select-base-auto',function (e) {
    e.preventDefault();
    var value  =   $(this).find(':selected').val();
    if(value != ""){
        console.log(value);
        var url = '{{route('model-brand',['id'=>':id'])}}';
        url = url.replace(':id',value);
    }else {
        return false;
    }
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            if(data.status==1){
                $(".make-brand-append-auto").empty();
                $(".make-brand-append-auto").html('<option value="">Select Model</option>');
                for(x in data.result){
                    var apend= '<option value="'+data.result[x]['id']+'">'+data.result[x]['_value']+'</option>';
                    $(".make-brand-append-auto").append(apend);
                }

            }else {
                $('.make-brand-append-auto').html('<option selected disabled>No Data Found</option>');
                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });

});
$(document).on('click','.HomeFilterHeart',function (e) {
    e.preventDefault();
    @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
    var cur  = $(this);
    var value  =  $(this).data('id');
    var type  =  $(this).data('type');
    var  url_name = "{{route('heart.like.frontend',["id"=>":value","type"=>":type"])}}";
    url_name = url_name.replace(":value",value);
    url_name = url_name.replace(":type",type);
    // var url = '{{route('heart.like.frontend',['id'=>':id'])}}';
    // url = url.replace(':id',value);
    $.ajax({
        method:"get",
        url:url_name,
        DataType:"json",
        success:function(data){
            console.log(data);
            if(data.status==1){
                cur.css('color','red');
           cur.find("i").toggleClass("save_like00");
            }else if (data.status==2){

                cur.find("i").toggleClass("save_like00");
            }
            else {

                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });
    @else
    $("#likeCarModal").modal("show");
    @endif


});
$(document).on('click','.0likeByUser0',function (e) {
    e.preventDefault();
            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
    var cur  = $(this);
    var value  =  $(this).data('id');
    var type  =  $(this).data('type');
    var url = "{{route('heart.like.frontend',["id"=>":id","type"=>":type"])}}";
        url = url.replace(':id',value);
        url = url.replace(":type",type);
     console.log(url,type);
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            if(data.status==1){
                cur.find("i").toggleClass("save_like00");

            }else if (data.status==2){

                cur.find("i").toggleClass("save_like00");
            }
            else {

                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });
    @else
     $("#likeCarModal").modal("show");
    @endif


});
$(document).on('click','.likeByUserCarDetail',function (e) {
    e.preventDefault();
     @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
    var cur  = $(this);
    var value  =  $(this).data('id');
    var url = '{{route('heart.like.frontend',['id'=>':id','type'=>'car'])}}';
        url = url.replace(':id',value);
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            if(data.status==1){
                cur.toggleClass("save_like00");

            }else if (data.status==2){

                cur.toggleClass("save_like00");
            }
            else {

                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });
    @else
     $("#likeCarModal").modal("show");
    @endif


});
$(document).on('change','.brand-select-base-buyer',function (e) {
    e.preventDefault();
    var value  =   $(this).find(':selected').val();
    if(value != ""){
        console.log(value);
        var url = '{{route('model-brand',['id'=>':id'])}}';
        url = url.replace(':id',value);
    }else {
        return false;
    }
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            if(data.status==1){
                $(".make-append-model-buyer").empty();
                $(".make-append-model-buyer").html('<option value="">Select Model</option>');
                for(x in data.result){
                    var apend= '<option value="'+data.result[x]['id']+'">'+data.result[x]['_value']+'</option>';
                    $(".make-append-model-buyer").append(apend);
                }

            }else {
                $('.make-append-model-buyer').html('<option selected disabled>No Data Found</option>');
                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });

});


$(document).on('change','.model-base-variant',function (e) {
    e.preventDefault();
    var value  =   $('option:selected',this).val();
    var url = '{{route('model-variant',['id'=>':id'])}}';
    url = url.replace(':id',value);
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            if(data.status==1){
                $(".variant-dashboard-brand").empty();
                $(".variant-dashboard-brand").html('<option value="">Select Variant</option>');
                for(x in data.result){
                    var apend= '<option value="'+data.result[x]['id']+'">'+data.result[x]['_value']+'</option>';
                    $(".variant-dashboard-brand").append(apend);
                }

            }else {
                $('.variant-dashboard-brand').html('<option value="">No Data Found</option>');
                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });

});



$(".index-filter-selection").click(function(){
    $('.index-filter-selection').removeClass('index-newCarFilter');
    $('.index-filter-selection').addClass('all');
    $(this).removeClass('all').addClass('index-newCarFilter');
});


$("#search-filter-btn-index").click(function(e){
    e.preventDefault();
    var count = 0;
    var query='';
    var budget = '';
    var first_condition = $(".index-newCarFilter").data('col');
    $(".price-filter-range").each(function () {
        if($(this).val() && $(this).val()!==""){
            budget = $(this).val();
        }

    });
    var brand = '';
    var model = '';
    var year = '';
    $(".filter-index").each(function () {
        if($(this).val() && $(this).val()!==""){
            var colname=$(this).attr("name");
            var selectedText = '';
            var value=$(this).val();

            if($(this).is('select')) {
                var selectedIndex = $(this).prop('selectedIndex');
                if (selectedIndex > 0){
                    selectedText = $(this).find("option:selected").text();
                }
            }else{
                selectedText = value;
            }
            if (colname === "brand"){
                brand = selectedText;
            }else if (colname === "modal"){
                model = selectedText;
            }else{
                year = value;
            }
            query+=colname +"= '" + value + "' and ";
            count++;
        }
    });
    query = query.replace(/ and $/, '');
    query=query.substring(0,query.length-5);
    // console.log(query);

    query = btoa(query);

    var url="{{route('index-filter-search',["b"=>":brand","m"=>":model","y"=>":year","bg"=>":budget"])}}";
    if (brand != ''){
        url=url.replace(":brand",encodeURIComponent(brand));
    }
    if (model != ''){
        url=url.replace(":model",encodeURIComponent(model));
    } else{
        url=url.replace(":model", '');
    }
    if (year != ''){
        url=url.replace(":year",year);
    }
    if (budget != ''){
        url=url.replace(":budget",budget);
    } else{
        url=url.replace(":budget", '');
    }
    url = url.replace(/([^:])\/\//g, '$1/');
    window.location=url;

});
$(document).on('change','.state-select-base',function (e) {
    e.preventDefault();
    var value  =   $(this).find(':selected').val();
    if(value != ""){
        console.log(value);
        var url = '{{route('state-city',['id'=>':id'])}}';
        url = url.replace(':id',value);
    }else {
        return false;
    }
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            if(data.status==1){
                $(".state-city-append").empty();
                $(".state-city-append").html('<option value="">Select State</option>');
                for(x in data.result){
                    var apend= '<option value="'+data.result[x]['id']+'">'+data.result[x]['_value']+'</option>';
                    $(".state-city-append").append(apend);
                }

            }else {
                $('.state-city-append').html('<option selected disabled>No Data Found</option>');
                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });

});






$(document).on("change",".filter-input-wanted",function(e){
    e.preventDefault();
    var query='';
    var count=0;
$(".custom-control-input").each(function(e){

        if($(this).prop("checked")){
            if(count == 0){
                query='(';
            }
            var col=$(this).data("col");
            var val=$(this).val();
            query+=col +"=" +"'"+ val + "' "+ "or ";
            count++;
        }
    });
//console.log($(this).closest("span"));
    query=query.substring(0,query.length-4);
    query= query+ ")";
    var url="{{ route('wanted-filters',['query'=>':val'])}}";
    url=url.replace(":val",query);
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
              console.log(data);
            $("#apend").remove();
            $(".append_class_wanted").append('<div id="apend" class="row m-0"></div>');
            if(data.status==1){

                $(".wanted-section-error").css({display:'none'});
                for(x in data.result){
                    var c_img = data.result[x]["image"];
                    var img =   "{{asset('storage/app/public/'.":img")}}";
                        img = img.replace(':img',c_img);
                    var s_class="";
                    var s_span = 'save';
                    if(data.s_user_id.length!== 0 && data.s_user_id.includes(data.result[x]["id"])){
                        s_class="save_list";
                        s_span = 'saved';

                    }
                    var form_text = "";
                            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
                    var session_id= "{{session('userDetails')->id}}";
                    if (session_id  == data.result[x]["user_id"]){
                        form_text ="";
                    }else {
                        form_text ='<form action="{{route("chat-wanted")}}" class="form-chat-wanted" method="post" id="chat_wanted" style="width: 100%;">'+
                            '<div class="row">'+
                            '<input type="hidden" name="car_id" value="'+data.result[x]["id"]+'">'+
                            '<input type="hidden" name="to_id" value="'+data.result[x]["user_id"]+'">'+
                            '<div class="form-group col-md-8">'+
                            '<label for="inputEmail4">Your Query was</label>'+
                            '<input type="text" name="query1" class="form-control" id="query_input" placeholder="Enter Your Query">'+
                            '</div>'+
                            '<div class="form-group col-md-4">'+
                            '<label for="inputEmail4">Your proposal was</label>'+
                            '<input type="text" class="form-control" name="query2" id="porposal_input" placeholder="Prices">'+
                            '</div>'+
                            '<div class="col-12 col-sm-4 ml-auto">'+
                            '<button id="btn_toggle"  class="btn-show-more-filter mb-3">Delete your Proposal</button>'+
                            '</div>'+
                            '</div>'+
                            '</form>';
                    }
                    @endif
                    //console.log(form_text,session_id,data.result[x]["user_id"]);
                    if (data.result[x]["user_number"] !== null){
                        var con = '<h5>Contact Member :<span>'+data.result[x]["user_number"]+'</span></h5>';
                    }else {
                        con = "";
                    }
                    var sesion = '@if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true) <a class="wanted-save-list" data-col="'+data.result[x]["id"]+'"><i class="fas fa-heart '+s_class+'" style="display: flex;color:wheat;padding-left: 12px;"></i><span class="span-heart '+s_class+'" style="color:wheat;">'+s_span+'</span></a> @endif';

                    var apend='';

                    var apend='<div class="row m-0 mb-3 mt-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-10 save-list-heading"><h3>'+data.result[x]["title"]+'</h3>' +
                        '<p>'+data.result[x]["describe"]+'</p><a href="'+img+'" class="download-btn"  download><i class="fas fa-paperclip"></i>Download Attachment</a></div>'+
                        '<div class="col-2 d-flex align-items-start justify-content-end  wanted-heart-fvrt">'+sesion+'</div>' +
                        '<div class="col-7 wanted-client-budget">' +
                        '<h5>'+data.result[x]["brand_wanted"]["name"]+'-<span>Client Budget :</span> <span>$ '+data.result[x]["budget"]+' </span></h5>' +
                        ' '+con+'<span></span></div>' +
                        '<div class="col-5 ask-question-wanted Veiw-detail-wanted d-flex align-items-center justify-content-end"><h6 class="m-0">View Details </h6>'  +
                        ' <div class="round-question"><i class="fas fa-caret-down"></i></div>'+
                        '</div></div></div>' +
                        '<div class="col-12 detailDiv-query"><div class="col-12 p-0"><hr/></div><div class="row m-0"><div class="col-12"><div class="form-row">' +
                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control"   value="'+data.result[x]["brand_wanted"]['name']+'" readonly></div>' +
                        ' <div class="form-group col-6 col-md-6"><label for="inputEmail4">Vehicle</label>  <input type="text" class="form-control"   value="'+data.result[x]["brand_wanted"]['name']+'" readonly> </div>' +
                        ' <div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label>  <input type="text" class="form-control"   value="'+data.result[x]["model_wanted"]['_value']+'" readonly> </div>' +
                        ' <div class="form-group col-6 col-md-6"><label for="inputEmail4">Varient</label>  <input type="text" class="form-control"   value="'+data.result[x]["varient_wanted"]['_value']+'" readonly> </div>' +
                        form_text +'</div></div></div>' +
                        '</div></div>' ;
                    $("#apend").append(apend);
                        }

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


            }else {
                $(".wanted-section-error").html("No Record Match");
                $(".wanted-section-error").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});
                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });
});

$(document).on("click",".wanted-save-list",function(e) {
    e.preventDefault();
   var c_id = $(this).data("col");
    var cur=$(this);
    console.log(c_id);
    var url="{{ route('wanted-save-list',['c_id'=>':val'])}}";
    url=url.replace(":val",c_id);
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            if(data.status==1){
                cur.find("i").toggleClass("save_list");
                cur.find("span").toggleClass("save_list");
                // if(data.result === "Car deleted"){
                //     cur.find("span").text("save");
                // }else {
                //     cur.find("span").text("saved");
                // }
            }else{
                alert(data.result);
            }
            },
        error:function(data){
            console.log(data);

        }

    });

});

$(document).on("click","#nav-contact-tab",function(e) {
    e.preventDefault();
    $("#save-wanted-list").empty();
    $("#save-wanted-list").append('<div id="s_w_append" class="row m-0"></div>');
 var url  = "{{route('wanted-save-list-view')}}";
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            if(data.status== 1){
                console.log(data.result["data"]);
                $(".wanted-section-error").css({display:'none'});
               var d= data.result["data"];
                for(x in d){
                    var c_img = d[x]["image"];
                    var img =   "{{asset('storage/app/public/'.":img")}}";
                    img = img.replace(':img',c_img);
                    var apend='';
                    var apend=' <div class="row m-0 mb-3 mt-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-10 save-list-heading"><h3>'+d[x]["title"]+'</h3>' +
                        '<p>'+d[x]["describe"]+'</p><a href="'+img+'" class="download-btn"  download><i class="fas fa-paperclip"></i>Download Attachment</a></div>'+
                        '<div class="col-2 d-flex align-items-start justify-content-end  wanted-heart-fvrt"><a><i class="fas fa-heart" style="display: flex;padding-left: 12px;"></i><span  style="color:#00a651;">saved</span></a></div>' +
                        '<div class="col-12 col-sm-7 wanted-client-budget">' +
                        '<h5>'+d[x]["brand_wanted"]["name"]+'-<span>Client Budget :</span> <span>$ '+d[x]["budget"]+' </span></h5>' +
                        '<h5>Contact Member :<span>'+d[x]["user_number"]+'</span></h5><span></span></div>' +
                        '<div class="col-12 col-sm-5 ask-question-wanted Veiw-detail-wanted d-flex align-items-center justify-content-end"><h6 class="m-0">View Details </h6>'  +
                        ' <div class="round-question"><i class="fas fa-caret-down"></i></div>'+
                        '</div></div></div>' +
                        '<div class="col-12 detailDiv-query"><div class="col-12 p-0"><hr/></div><div class="row m-0"><div class="col-12"><div class="form-row">' +
                        '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control"   value="'+d[x]["brand_wanted"]["name"]+'" readonly></div>' +
                        ' <div class="form-group col-6 col-md-6"><label for="inputEmail4">Vehicle</label>  <input type="text" class="form-control"   value="'+d[x]["brand_wanted"]["name"]+'" readonly> </div>' +
                        ' <div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label>  <input type="text" class="form-control"   value="'+d[x]["model_wanted"]["_value"]+'" readonly> </div>' +
                        ' <div class="form-group col-6 col-md-6"><label for="inputEmail4">Varient</label>  <input type="text" class="form-control"   value="'+d[x]["varient_wanted"]["_value"]+'" readonly> </div>' +
                        '<div class="form-group col-md-8"><label for="inputEmail4">Your Query was</label><input type="text" class="form-control" id="inputEmail4" placeholder="Enter Your Query"></div>' +
                        '<div class="form-group col-md-4"> <label for="inputEmail4">Your proposal was</label><input type="text" class="form-control" id="inputEmail4" placeholder="Prices"></div>' +
                        '<div class="col-12 col-sm-3 ml-auto"><button id="btn_toggle" class="btn-show-more-filter mb-3">Delete your Proposal</button></div>' +
                        '</div></div></div>' +
                        '</div></div>' ;
                    $("#s_w_append").append(apend);
                }


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


            }else{

            }
        },
        error:function(data){
            console.log(data);

        }

    });

});



$(document).on("submit",".garage_btn_email",function(e) {
    e.preventDefault();
// var email = $(this).closest(".input-group").find(".g_email").val();
// var user_id  = $(this).closest(".input-group").find(".g_userId").val();
//     if (email === '') {
//
//       alert("Please fill email");
//         $(this).closest(".input-group").find(".g_email").css("border","1px solid #e4001b");
//         setTimeout(function(){
//             $(this).closest(".input-group").find(".g_email").css("border","1px solid #ced4da");
//         }, 5000);
//
//         return false;
//     }
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
            if(data.status== 1){
                $("#g_email").val("");
             alert("your email has been send");
             console.log(data.result);
            }else{
            }
        },
        error:function(data){
            console.log(data);

        }

    });

});
//misc mail

$(document).on("submit",".misc_btn_email",function(e) {
    e.preventDefault();
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
            if(data.status== 1){
                $("#g_email").val("");
                alert("your email has been send");
                console.log(data.result);
            }else{
            }
        },
        error:function(data){
            console.log(data);

        }

    });

});





$("#contact_Checkbox").on("change",function(e) {
    e.preventDefault();
if($(this).is(':checked') == true){
    $("#contact_numbr").css("display","block");
    }else{
        $("#contact_numbr").css("display","none");
    }

});
$("#contact_Checkbox_nmbr").on("change",function(e) {
    e.preventDefault();
    $("#contact_numbr").css("display","none");
});
$("#misc_Checkbox").on("change",function(e) {
    e.preventDefault();
    $("#misc_numbr").css("display","block");
    if($(this).is(':checked') == true){
        $("#misc_contact").css("display","block");
    }else{
        $("#misc_contact").css("display","none");
    }

});
$("#misc_Checkbox_nmbr").on("change",function(e) {
    e.preventDefault();
    $("#misc_contact").css("display","none");


});




// $(document).ready(function(e) {
//     var se = "@if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true) login @endif";
//     if(se === " login "){

//         // $('#PayModalCenter').modal({backdrop: 'static', keyboard: false});
//         // setTimeout(function(){
//         //     $('#PayModalCenter').trigger('focus');
//         //     $("#PayModalCenter").modal("show");
//         // }, 3000);

//     }else{
//         $('#exampleModalCenter').modal({backdrop: 'static', keyboard: false});
//         setTimeout(function(){
//             $('#exampleModalCenter').trigger('focus');
//             $("#exampleModalCenter").modal("show");
//         }, 3000);
//     }


// });
// $(document).on("click","#garage_change_value",function(e) {
//     $("#garage_user_value_input").val("1");
// });

$(document).on("change",".filter-radio-misc",function(e){
    e.preventDefault();
    var query='';
    var count=0;
    $(".filter-radio-misc").each(function(e){
        if($(this).prop("checked")){
            var col=$(this).data("col");
            var val=$(this).val();
            query+=col +"=" +"'"+ val + "'"+ " or ";
            count++;
        }else{
            console.log('okay');
        }
    });
    query=query.substring(0,query.length-4);
    var search = $("#input-filter-search-misc").val();
    if (search !== ""){
        var url="{{ route('filter-misc',['query'=>':val','search'=>':srch'])}}";
        url=url.replace(":val",query);
        url = url.replace(":srch",search) ;
    }else {
         url="{{ route('filter-misc',['query'=>':val'])}}";
        url=url.replace(":val",query);
    }

    console.log(url,query);
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            $("#apend").remove();
            $(".append_class_misc").append('<div id="apend" style="width:100%;"></div>');
            if(data.status==1){
                $(".error-post-code-misc").css({display:'none'});
                $("#apend").append(data.result);
            }else{
                $(".error-post-code-misc").html("No Record Match");
                $(".error-post-code-misc").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});
                return false;
            }


        },error:function(data){
            console.log(data);

        }

    });
});
// $(document).on("change",".filter-radio-misc",function(e){
//     e.preventDefault();

//     var query='';
//     var count=0;
//     $(".filter-radio-misc").each(function(e){
//         if($(this).prop("checked")){
//             var col=$(this).data("col");
//             var val=$(this).val();
//             console.log(col,val);
//             query+=col +"=" +"'"+ val + "'"+ " or ";
//             count++;
//         }
//     });
//     query=query.substring(0,query.length-4);
//     var search = $("#input-filter-search-misc").val();
//     console.log(query);
//     if (search !== ""){
//         var url="{{ route('filter-misc',['query'=>':val','search'=>':srch'])}}";
//         url=url.replace(":val",query);
//         url = url.replace(":srch",search) ;
//     }else {
//          url="{{ route('filter-misc',['query'=>':val'])}}";
//         url=url.replace(":val",query);
//     }

//     console.log(url);
//     //   url=url.replace(":type",car_type);
//     // console.log(val);
//     $.ajax({
//         method:"get",
//         url:url,
//         DataType:"json",
//         success:function(data){
//             console.log(data);
//             $("#apend").remove();
//             $(".append_class_misc").append('<div id="apend" style="width:100%;"></div>');
//             if(data.status==1){
//                 $(".error-post-code-misc").css({display:'none'});
//                 for(x in data.result){
//                if (data.result[x]["number"] !== ""){
//                  var nmbr =  '<div class="form-group col-12 col-md-12"><label for="inputEmail4">Contact Number</label><input type="text" class="form-control" value="'+data.result[x]["number"]+'" readonly=""></div>';
//                 }else {
//                    var nmbr= "";
//                }

//                   var rout = "{{route('miscemail')}}";
//                     var form_text = "";
//                             @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
//                     var session_id= "{{session('userDetails')->id}}";
//                     if (session_id  == data.result[x]["user_id"]){
//                         form_text ="";
//                     }else{
//                         form_text =    '<div class="form-group col-12 formgroup"><label>Email:</label><form class="misc_btn_email" action="'+rout+'" method="post"><div class="input-group mb-3"><input type="hidden" value="'+data.result[x]["user_id"]+'" name="m_userId" class="m_userId"><input type="email"  style="background-color: #e9ecef;" class="form-control g_email" name="email"  placeholder="e.g. Trigonsoft@gmail.com" aria-label="Recipient,s username" aria-describedby="basic-addon2" required>' +
//                             '<div class="input-group-append"><button class="input-group-text" id="basic-addon2"><i class="fas fa-paper-plane"></i></button></div>'+
//                             '</div> </form></div>';
//                     }
//                             @endif

//                     var apend='';
//                     var apend='<div class="row m-0 mb-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-8 save-list-heading">' +
//                             '<h3>'+data.result[x]["car_part"]+'</h3><div class="row"><div class="col-12"><div class="form-row"><div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control" value="'+data.result[x]["brand_misc"]["name"]+'" readonly="" ></div>' +
//                         '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label><input type="text" class="form-control" value="'+data.result[x]["model_misc"]["_value"]+'" readonly="" ></div>' +
//                         '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Condition</label><input type="text" class="form-control" value="'+data.result[x]["part_condition"]+'" readonly=""></div>' +
//                         '<div class="form-group col-6 col-md-6"><label for="inputEmail4">price</label><input type="text" class="form-control" value="$'+data.result[x]["price"]+'" readonly="" style="font-weight: 700"></div>' +
//                         '</div></div></div>' +
//                         nmbr +
//                         form_text +
//                         '</div>'+
//                             '<div class="col-4 d-flex align-items-start justify-content-end  wanted-heart-fvrt"><img class="card-img-top" src="/../../pwrprfrmance/public/crop_images/'+data.result[x]["feature_img"]+'"></div>'+
//                         '</div></div></div>';
//                     $("#apend").append(apend);


//                 }

//             }else {
//                 $(".error-post-code-misc").html("No Record Match");
//                 $(".error-post-code-misc").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});
//                 return false;
//             }


//         },
//         error:function(data){
//             console.log(data);

//         }

//     });
// });
$(document).on("click",".input-search-misc",function(e){
    e.preventDefault();
    var val=$("#input-filter-search-misc").val();
    if(val === "") {
        $("#input-filter-search-misc").css("border", "1px solid #e4001b");
        $(".input-search-misc").css("border", "1px solid #e4001b");

        setTimeout(function () {
            $("#input-filter-search-misc").css("border", "transparent");
            $(".input-search-misc").css("border", "transparent");
        },5000);
        return false;
    }
    var url="{{ route('misc-search',['val'=>':val'])}}";
    url=url.replace(":val",val);
    console.log(url);
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            $("#apend").remove();
            $(".append_class_misc").append('<div id="apend" style="width:100%;"></div>');
            if(data.status==1){
                $(".error-post-code-misc").css({display:'none'});
                $("#apend").html(data.result);

            }else {
                $(".error-post-code-misc").html("No Record Match");
                $(".error-post-code-misc").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});
                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });
});

// search for miscellanous
// $(document).on("click",".input-search-misc",function(e){
//     e.preventDefault();
//     //  alert("okay");
//     var val=$("#input-filter-search-misc").val();
//     if(val === "") {
//         $("#input-filter-search-misc").css("border", "1px solid #e4001b");
//         $(".input-search-misc").css("border", "1px solid #e4001b");

//         setTimeout(function () {
//             $("#input-filter-search-misc").css("border", "transparent");
//             $(".input-search-misc").css("border", "transparent");
//         },5000);
//         return false;
//     }
//     var url="{{ route('misc-search',['val'=>':val'])}}";
//     url=url.replace(":val",val);
//     console.log(url);
//     $.ajax({
//         method:"get",
//         url:url,
//         DataType:"json",
//         success:function(data){
//             console.log(data);
//             $("#apend").remove();
//             $(".append_class_misc").append('<div id="apend" style="width:100%;"></div>');
//             if(data.status==1){
//                 $(".error-post-code-misc").css({display:'none'});
//                 for(x in data.result){
//                     if (data.result[x]["number"] !== ""){
//                         var nmbr =  '<div class="form-group col-12 col-md-12"><label for="inputEmail4">Contact Number</label><input type="text" class="form-control" value="'+data.result[x]["number"]+'" readonly=""></div>';
//                     }else {
//                         var nmbr= "";
//                     }
//                     var rout = "{{route('miscemail')}}";
//                     var form_text = "";
//                             @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
//                     var session_id= "{{session('userDetails')->id}}";
//                     if (session_id  == data.result[x]["user_id"]){
//                         form_text ="";
//                     }else{
//                         form_text =    '<div class="form-group col-12 formgroup"><label>Email:</label><form class="misc_btn_email" action="'+rout+'" method="post"><div class="input-group mb-3"><input type="hidden" value="'+data.result[x]["user_id"]+'" name="m_userId" class="m_userId"><input type="email"  style="background-color: #e9ecef;" class="form-control g_email" name="email"  placeholder="e.g. Trigonsoft@gmail.com" aria-label="Recipient,s username" aria-describedby="basic-addon2" required>' +
//                             '<div class="input-group-append"><button class="input-group-text" id="basic-addon2"><i class="fas fa-paper-plane"></i></button></div>'+
//                             '</div> </form></div>';
//                     }
//                             @endif

//                     var apend='';
//                     var apend='<div class="row m-0 mb-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-8 save-list-heading">' +
//                         '<h3>'+data.result[x]["car_part"]+'</h3><div class="row"><div class="col-12"><div class="form-row"><div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control" value="'+data.result[x]["brand_misc"]["name"]+'" readonly="" ></div>' +
//                         '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label><input type="text" class="form-control" value="'+data.result[x]["model_misc"]["_value"]+'" readonly="" ></div>' +
//                         '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Condition</label><input type="text" class="form-control" value="'+data.result[x]["part_condition"]+'" readonly=""></div>' +
//                         '<div class="form-group col-6 col-md-6"><label for="inputEmail4">price</label><input type="text" class="form-control" value="$'+data.result[x]["price"]+'" readonly="" style="font-weight: 700"></div>' +
//                         '</div></div></div>' +
//                         nmbr +
//                         form_text +
//                         '</div>'+
//                         '<div class="col-4 d-flex align-items-start justify-content-end  wanted-heart-fvrt"><img class="card-img-top" src="/../../pwrprfrmance/public/crop_images/'+data.result[x]["feature_img"]+'"></div>'+
//                         '</div></div></div>';
//                     $("#apend").append(apend);


//                 }

//             }else {
//                 $(".error-post-code-misc").html("No Record Match");
//                 $(".error-post-code-misc").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});
//                 return false;
//             }


//         },
//         error:function(data){
//             console.log(data);

//         }

//     });
// });


$(document).on("click","#price-misc-filter",function(e){
    e.preventDefault();
    //  alert("okay");
    var val1=$("#val1").val();
    var val2=$("#val2").val();
    if(val1 === "" || val2 === ""  ) {

        $("#val1").css("border", "1px solid #e4001b") ;
        $("#val2").css("border", "1px solid #e4001b");

        setTimeout(function () {
            $("#val1").css("border", "transparent");
            $("#val2").css("border", "transparent");
        },5000);
        return false;
    }

var search = $("#input-filter-search-misc").val();
    var url="{{ route('misc-price-filter',['val1'=>':val1','val2'=>':val2','search'=>':val'])}}";
    url=url.replace(":val1",val1);
    url=url.replace(":val2",val2);
    url=url.replace(":val",search);
    console.log(url);
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            $("#apend").remove();
            $(".append_class_misc").append('<div id="apend" style="width:100%;"></div>');
            if(data.status==1){
                $(".error-post-code-misc").css({display:'none'});
                 $("#apend").html(data.result);
                // for(x in data.result){
                //     if (data.result[x]["number"] !== ""){
                //         var nmbr =  '<div class="form-group col-12 col-md-12"><label for="inputEmail4">Contact Number</label><input type="text" class="form-control" value="'+data.result[x]["number"]+'" readonly=""></div>';
                //     }else {
                //         var nmbr= "";
                //     }
                //     var rout = "{{route('miscemail')}}";
                //     var apend='';
                //     var apend='<div class="row m-0 mb-3 pt-4  save-lis-wanted"><div class="col-12 pl-0"><div class="row m-0"><div class="col-8 save-list-heading">' +
                //         '<h3>'+data.result[x]["car_part"]+'</h3><div class="row"><div class="col-12"><div class="form-row"><div class="form-group col-6 col-md-6"><label for="inputEmail4">Brand</label><input type="text" class="form-control" value="'+data.result[x]["brand_misc"]["name"]+'" readonly="" ></div>' +
                //         '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Model</label><input type="text" class="form-control" value="'+data.result[x]["model_misc"]["_value"]+'" readonly="" ></div>' +
                //         '<div class="form-group col-6 col-md-6"><label for="inputEmail4">Condition</label><input type="text" class="form-control" value="'+data.result[x]["part_condition"]+'" readonly=""></div>' +
                //         '<div class="form-group col-6 col-md-6"><label for="inputEmail4">price</label><input type="text" class="form-control" value="$'+data.result[x]["price"]+'" readonly="" style="font-weight: 700"></div>' +
                //         '</div></div></div>' +
                //         nmbr +
                //         '<div class="form-group col-12 formgroup"><label>Email:</label><form class="misc_btn_email" action="'+rout+'" method="post"><div class="input-group mb-3"><input type="hidden" value="'+data.result[x]["user_id"]+'" name="m_userId" class="m_userId"><input type="email"  style="background-color: #e9ecef;" class="form-control g_email" name="email"  placeholder="e.g. Trigonsoft@gmail.com" aria-label="Recipient,s username" aria-describedby="basic-addon2" required>' +
                //         '<div class="input-group-append"><button class="input-group-text" id="basic-addon2"><i class="fas fa-paper-plane"></i></button></div>'+
                //         '</div> </form></div>' +
                //         '</div>'+
                //         '<div class="col-4 d-flex align-items-start justify-content-end  wanted-heart-fvrt"><img class="card-img-top" src="/../../pwrprfrmance/public/crop_images/'+data.result[x]["feature_img"]+'"></div>'+
                //         '</div></div></div>';
                //     $("#apend").append(apend);


                // }

            }else {
                $(".error-post-code-misc").html("No Record Match");
                $(".error-post-code-misc").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});
                return false;
            }


        },
        error:function(data){
            console.log(data);

        }

    });
});



// preappend for swap
$(document).on("click",".swap-my-car",function (e) {
    e.preventDefault();
var id = $(this).data("col");
var url = '{{route("swap-pricing",["p_id"=>":id"])}}';
url = url.replace(":id",id);
    $.ajax({
        url:url,
        method:"get",
        DataType:"json",
        success:function(data){
            if(data.status==1){
                console.log(data.result);
                $(".loader").hide();
                $("#swap_err").css({display:"none"});
                $("#swap_pricing_tab").click();
                $("#append_swap").remove();
                $("#get_swap_id").val(data.result['id']);
                var c_img = data.result["crop_image"];
                var img ='{{asset("/public/crop_images/".":image")}}';
                img = img.replace(":image",c_img);
                var apend = '<div class="card" id="append_swap">' +
                    '<div class="card-header p-0">' +
                    '<h3>'+data.result["model"]["_value"]+'</h3>' +
                    '<p>'+data.result["carmake"]["_value"]+','+data.result["cartype"]["_value"]+','+data.result["enginetype"]["_value"]+'</p>' +
                    '</div>' +
                    '<div class="cardimageswap-car">' +
                    '<img class="card-img-top" src="'+img+'" alt="Card image cap">' +
                    '</div>' +
                    '<div class="card-body p-0">' +
                    '<div class="row">' +
                    '<div class="col-12 carworth">Your Car Worth</div>' +
                    '<div class="col-12">' +
                    '<div class="  carspecspric">$' +
                    data.result['price'] +
                    '</div></div>' +
                    '<div class="col-12"><hr></div>' +
                    '</div>' +
                    '<div class="row summarysection">' +
                    '<div class="col-12 summaryheading">' +
                    '<i class="fas fa-file-alt"></i>Car Summary' +
                    '</div>' +
                    '<div class="col-6 summarybillheading " >Purchase type:</div>' +
                    '<div class="col-6 summarybilldetail">Paypal</div>' +
                    '<div class="col-12"><hr></div>' +
                    '<div class="col-6 summarybillheading " >Model:</div>' +
                    '<div class="col-6 summarybilldetail">'+data.result["model"]["_value"]+'</div>' +
                    '<div class="col-12"><hr></div>' +
                    '<div class="col-6 summarybillheading " >Car Condition:</div>' +
                    '<div class="col-6 summarybilldetail">'+data.result["car_condition"]+'</div>' +
                    '<div class="col-12"><hr></div>' +
                    '<div class="col-6 summarybillheading " >Car Make:</div>' +
                    '<div class="col-6 summarybilldetail">'+data.result["carmake"]["_value"]+'</div>' +
                    '<div class="col-12"><hr></div>' +
                    '<div class="col-6 summarybillheading " >Car Type:</div>' +
                    '<div class="col-6 summarybilldetail">'+data.result["cartype"]["_value"]+'</div>' +
                    '<div class="col-12"><hr></div>' +
                    '<div class="col-6 summarybillheading " >Color:</div>' +
                    '<div class="col-6 summarybilldetail">'+data.result["color"]+'</div>' +
                    '<div class="col-12"><hr></div>' +
                    '<div class="col-6 summarybillheading " >Engine Type:</div>' +
                    '<div class="col-6 summarybilldetail">'+data.result["enginetype"]["_value"]+'</div>' +
                    '<div class="col-12"><hr></div>' +
                    '<div class="col-6 summarybillheading " >Fuel type:</div>' +
                    '<div class="col-6 summarybilldetail">'+data.result["fuel_type"]+'</div>' +
                    '<div class="col-12"><hr></div>' +
                    '<div class="col-6 summarybillheading " >Manifacture:</div>' +
                    '<div class="col-6 summarybilldetail">'+data.result["brand"]+'</div>' +
                    '<div class="col-12"><hr></div>' +
                    '</div>' +
                    '</div>' +
                    '</div>';
                $("#swap_append_class").prepend(apend);

            }else{
                $("#swap_err").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block"});
                $("#swap_err").html(data.msg);
                $(".loader").hide();
            }
        }
    });



});
// create swap_id
$(document).on("submit","#swap_id_form",function (e){
    e.preventDefault();
    var swapcar = $("#get_swap_id").val();
    $("#btn-swap-dis").prop("disabled",true);
    if (swapcar === ""){
        $("#span_err_swap").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block"});
        $("#span_err_swap").html("Please select your car");
        setTimeout(function () {
            $("#span_err_swap").css("display","none");
            $("#swap_car_details").click();
        },5000);
        return false;

    }
    var formdata=new FormData(this);
    var url=$(this).attr("action");

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

                    $("#swap_loader").hide();
                    window.location = "{{route('frontend-swap-list')}}";
                    alert(data.msg);

                    setTimeout(function () {
                        $(".error-post-code-swap").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});
                        $(".error-post-code-swap").html(data.msg);
                    }, 5000);


                }else{
                    $("#span_err_swap").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block"});
                    $("#span_err_swap").html(data.msg);
                    $("#swap_loader").hide();
                }
            }
        });

});
// new and used

$(".blog-span-search").click(function (e) {
    e.preventDefault();
    var val = $(".input-blog").val();
    if (val === ""){
        $(".input-blog").css("border","1px solid #e4001b");
        $(".blog-span-search").css("border","1px solid #e4001b");
        setTimeout(function () {
            $(".input-blog").css("border", "1px solid #ced4da");
            $(".blog-span-search").css("border", "transparent");
        },5000);
        return false;
    }
    var url  = '{{route('blog-search',['search'=>':val'])}}';
    url = url.replace(":val",val);
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            $("#apend_blog").remove();
            if(data.status==1){
                console.log(data.result);
                $("#blog-search-popular").html("Search Blog");
                for(x in data.result){
                    console.log(data.result[x]);
                    var a_url = '{{route("frontend-blog",["id"=>":id"])}}';
                    var a_origanal = btoa(data.result[x]["id"]);
                    a_url = a_url.replace(":id",a_origanal);
                    var time =moment(data.result[x]['created_at']).format('YYYY-MM-DD');
                    var img = '{{ asset('public/blog_images/'.':img') }}';
                    img=img.replace(":img",data.result[x]["image_large"]);
                    var apend='<div class="col-12 blogcard">'
                        +   '<div class="card">' +
                        '<a href="'+a_url+'"><img class="card-img-top" src="'+img+'" alt="Card image cap"> </a>' +
                        ' <div class="card-body"> ' +
                        '  <div class="row">' +
                        ' <div class="col-12 blogcardheading">' +
                        data.result[x]['title']
                        + ' </div>' +
                        ' <div class="col-12 blogwritername">'+data.result[x]['author_name']+' | '+time+'</div>' +
                        '  </div> ' +
                        '</div>' +
                        '</div>' +
                        ' </div>';
                    $("#append_id_blog").append(apend);


                }

            }else {
                $(".error-post-code").html("There is no record against your request");
                $(".error-post-code").css({display:'block',color:"#00c29f",fontSize:'25px',fontWeight: '500'});
            }


        },
        error:function(data){
            console.log(data);

        }

    });
});




// Garage Home Filter
$(document).on("submit",".Garage_Home_Filter",function (e){
    e.preventDefault();

    // var swapcar = $("#get_swap_id").val();
    // $("#btn-swap-dis").prop("disabled",true);
    //     if (swapcar === ""){
    //     $("#span_err_swap").css({backgroundColor:"#f8d7da",textAlign:"center",display:"block"});
    //     $("#span_err_swap").html("Please select your car");
    //     setTimeout(function () {
    //         $("#span_err_swap").css("display","none");
    //         $("#swap_car_details").click();
    //     },5000);
    //     return false;
    //
    // }
    var formdata=new FormData(this);
    var url=$(this).attr("action");

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

                    $("#swap_loader").hide();
                    //window.location = "{{route('frontend-swap-list')}}";
                   // alert(data.msg);

                    // setTimeout(function () {
                    //     $(".error-post-code-swap").css({backgroundColor:"#d4edda",textAlign:"center",display:"block"});
                    //     $(".error-post-code-swap").html(data.msg);
                    // }, 5000);


                }else{

                }
            }
        });

});
$(".select-swap-index-filter").change(function () {

   var value =   $(this).val();
   var col = $(this).data("col");
    var query='';
    var count=0;
    query+=col +"=" +"'"+ value + "'"+ " or ";
    count++;
    query=query.substring(0,query.length-4);
    query= query + " and  car_availbilty  =  'Swap'";
    console.log(query);
    var url = "{{route('frontend-swap-index',['query'=>':query'])}}";
    url = url.replace(":query",query);
    $.ajax({
        url:url,
        method:"get",
        DataType:"json",
        success:function(data){
            if(data.status==1){
                if (data.result !== null){
                console.log(data.result);
          $("#swap-btn-index").remove();
          $("#swap-img-index").remove();
          $("#swap-img-index-append").append('<div id="swap-img-index"></div>');
          $("#swap-btn-index-append").append('<div id="swap-btn-index"></div>');
        var url_r = '{{route("frontend-swap-cars",["s_id"=>":id"])}}';
     var id   = btoa(data.result["id"]);
     url_r = url_r.replace(":id",id);
         var apend = '<button class="becomrental becomrental1" style="margin-top: 20px;"><a href="'+url_r+'" style="color: white">Swap</a></button>';
          $("#swap-btn-index").prepend(apend);
          var img = '{{asset("/public/crop_images/".":image")}}';
          img=img.replace(":image",data.result["crop_image"]);
          var apend_img =  '<img class="" src="'+img+'" style="height:473px!important;">';
             $("#swap-img-index").prepend(apend_img);
                }
            }else{

            }
        }
    });

});



$(".like-in-blog").click(function (e) {
    e.preventDefault();
            @if(!empty(session("userLoggedIn")) && session("userLoggedIn") == true)
    var col = $(this).data('col');
    console.log(col);
    var url  = '{{route('Blog-Save-List',['c_id'=>':col'])}}';
    url = url.replace(":col",col);
    @else
    $('#blogModalCenter').modal("show");
    return false;
    @endif
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            console.log(data);
            if(data.status==1){
                // cur.find("i").toggleClass("save_list");
                // cur.find("span").toggleClass("save_list");
                if(data.result === "Car deleted"){
                    $(".like-in-blog").css("color","#707070");
                    $(".count-lik-blog").html(data.count + " people like this" );
                    $(".count-lik-blog").html();
                    // cur.find("span").text("save");
                }else {
                    $(".like-in-blog").css("color","#fd001e");
                    $(".count-lik-blog").html(data.count + " people like this" );
                    // cur.find("span").text("saved");
                }




            }else{
                alert(data.result);
            }
        },
        error:function(data){
            console.log(data);

        }

    });


});
$(".event-span-search").click(function (e) {
    e.preventDefault();
    var val = $(".input-event").val();
    if (val === ""){
        $(".input-event").css("border","1px solid #e4001b");
        $(".event-span-search").css("border","1px solid #e4001b");
        setTimeout(function () {
            $(".input-event").css("border", "1px solid #ced4da");
            $(".event-span-search").css("border", "transparent");
        },5000);
        return false;
    }
    var url  = '{{route('event-search',['search'=>':val'])}}';
    url = url.replace(":val",val);
    $.ajax({
        method:"get",
        url:url,
        DataType:"json",
        success:function(data){
            $("#append_id_event").empty();
            if(data.status==1){
                console.log(data.result);
                $("#event-search-popular").html("Search Events");
                for(x in data.result){
                    console.log(data.result[x]);
                    var a_url = '{{route("event-detail",["id"=>":id"])}}';
                    var a_origanal = btoa(data.result[x]["id"]);
                    a_url = a_url.replace(":id",a_origanal);
                    var time =moment(data.result[x]['created_at']).format('YYYY-MM-DD');
                    var img = '{{ asset('public/event_images/'.':img') }}';
                    img=img.replace(":img",data.result[x]["img"]);
                    var apend='<div class="col-12 blogcard">'
                        +   '<div class="card">' +
                        '<a href="'+a_url+'"><img class="card-img-top" src="'+img+'" alt="Card image cap"> </a>' +
                        ' <div class="card-body"> ' +
                        '  <div class="row">' +
                        ' <div class="col-12 blogcardheading">' +
                        data.result[x]['event_name']
                        + ' </div>' +
                        ' <div class="col-12 blogwritername">'+data.result[x]['event_host']+' | '+time+'</div>' +
                        '  </div> ' +
                        '</div>' +
                        '</div>' +
                        ' </div>';
                    $("#append_id_event").append(apend);


                }

            }else {
                $("#append_id_event").html("<span class='ml-5'>No Data Found</span>");
                $("#append_id_event").css({display:'block',color:"#e4001b",fontSize:'25px',fontWeight: '500'});
            }


        },
        error:function(data){
            console.log(data);

        }

    });
});
// main page show more
$(document).on('click','.show-more-btn' ,function(event) {
    event.preventDefault();
    var last_id = $('.load-more-input').val();
    $("#loda-more-tile-loader").show();
    var curl = this;
    var _url = last_id;
    if (_url){
        _url = _url  + "&key=paginate";
        axios.get(_url).then(function(response) {
            console.log(response);
            if(response.data.status === 1){
                $('.load-more-input').val(response.data.last_id);
                $("#products").append(response.data.result);
                if (response.data.btn == "Ended"){
                    $(curl).html(response.data.btn);
                }else{
                    $(curl).html(response.data.btn+'<div class="loader m-auto" id="loda-more-tile-loader"></div>');
                }

            }else{
                $(curl).html(response.data.btn);
            }
            $("#loda-more-tile-loader").hide();
        });
    }else{
        $(curl).html("Ended");
        $("#loda-more-tile-loader").hide();
    }

});
</script>
