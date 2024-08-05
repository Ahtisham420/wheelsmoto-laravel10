@extends("layouts.app")
@section('content')
<!-- Breadcrumb-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{ url('/admin/home') }}">{{ __('admin/pages/category_items_list.bread_crumb_1') }}</a>
    </li>
    <li class="breadcrumb-item active">
        <a href="{{ route('category-items-create') }}">{{ __('admin/pages/category_items_list.bread_crumb_4') }}</a>
    </li>
    <li class="breadcrumb-item">
      {{ __('admin/pages/category_items_list.bread_crumb_create') }}
    </li>
</ol>
<!-- Breadcrumb-->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{route('category-items-store')}}" id="add_itemsss" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-header">
                        <strong>{{ __('admin/pages/category_items_list.add_product') }}</strong>
                        {{--<small>Form</small>--}}
                    </div>
                    <div  class="container-fluid">
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="product-title-line nd-product-title-line mt-2 col-sm-12 phr">
                                        <h1>Create Items</h1>
                                        <hr style="width:79%!important;">
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12 col-sm-3 order-pending d-flex p-0 fire_sea"
                                                 style="height: 20vh;">
                                                <label for="group_image"
                                                       class="upload-wrapper upload-image-class upload-imgclass-new d-flex"
                                                       id="upload_wrapper_featured" style="z-index: 1; margin:0 auto;">
                                                    <input type="file" class="group_i_p" id="group_image"
                                                           style="display:none;" accept="image/*" data-ch="orginal"/>
                                                    <input type="text" name="feature_image" id="feature_image"
                                                           style="display: none;" value=""/>
                                                    <div id="preview_div_featured" class="centered-image new-centertd-img"
                                                         style="position: relative;">
                                                        <input type="hidden" class="fire_image i_valid" name="group_pic"
                                                               >
                                                        <img id="preview_featured" src=""
                                                             class="img-fluid"/>
                                                        <div class="edit-camera-food">
                                                            <i class="fa fa-camera"></i>
                                                        </div>
                                                        <div class="imageAddLoader" id="group_pic_load"
                                                             style="display:none"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-12 col-sm-6 order-pending ">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Title</label>
                                                    <input type="text" class="form-control i_valid" name="group_title"
                                                            id="exampleInputEmail1"
                                                           placeholder="Enter Group Title" rows="4" style="resize:none;">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail2">Select Category</label>
                                                    <select class="form-control i_valid" name="cat_id" required>
                                                        <option value="">Category</option>
                                                        @if(!empty($cates) && count($cates) > 0 )
                                                        @foreach($cates as $cate)
                                                        <option value="{{$cate->cat_id}}">@if(!empty($cate->category)){{$cate->category['category_name']}}@endif</option>
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-3 p-0 order-pending select-category-drop d-flex align-items-start justify-content-">
                                            </div>
                                            <a class="btn btn-primary mt-3" id="add-item-group-food"
                                               style="color: #fff;">Add Item</a>
                                            <div class="col-12 item-accordion d-block mt-2">
                                                <div id="accordion-food" class="accordion"></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
        <div class="card-footer">
        <button class="btn btn-sm btn-primary" type="submit">
            <i class="fa fa-dot-circle-o"></i> {{ __('admin/pages/category_items_list.submit') }}
        </button>
        <a class="btn btn-sm btn-danger" type="reset" href="{{route('category-items-index')}}">
            <i class="fa fa-ban"></i> {{ __('admin/pages/category_items_list.cancel') }}
        </a>
    </div>
    </form>
</div>
</div>
</div>
</div>
<div id="cat_img_modal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="cat_img_demo"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-warning crop_image_cat">Crop & Upload Image</button>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-storage.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-firestore.js"></script>
<script>

    var config = {
        apiKey: "AIzaSyAXd4ItElm2jE_jwmiqMGB0Uq2NCUPbock",
        authDomain: "dope-chat-e264a.firebaseapp.com",
        databaseURL: "https://dope-chat-e264a-default-rtdb.firebaseio.com",
        projectId: "dope-chat-e264a",
        storageBucket: "dope-chat-e264a.appspot.com",
        messagingSenderId: "598151183632",
        appId: "1:598151183632:web:5dcc4b07959a0e3e1eb995",
        measurementId: "G-3V9EKRKQST"
    };
    // Initialize Firebase
    firebase.initializeApp(config);
    firebase.analytics();
</script>
    <script src="{{ config('app.coure_ui_asset_url').'croppie/croppie.js' }}"></script>
  <script>
      function upload_cat_file(file,cur,mimetype=null,count=null){
          var product_id=$("#org_product_id").val();
          var seconds = new Date().getTime() / 1000;
          //var c_id=$("#classification_id").val();
          var user_name="{{$user->first_name}}" + "{{$user->id}}";
          // if(mimetype==="terms"){
          //     var path="/"+user_name+"/class_"+c_id+"/product_"+product_id+"/termscondition/"+seconds;
          // }
          // else{
          //     var path="/"+user_name+"/class_"+c_id+"/product_"+product_id+"/"+seconds;
          // }
          var path="/"+user_name+"/category/"+seconds;
          var storageRef = firebase.storage().ref();
          var success = false;
          var iRef = storageRef.child(path);
          var uploadTask= iRef.put(file);

          uploadTask.on('state_changed', function(snapshot){
              var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
              console.log(progress);
              if(progress==100){
                  $("#cat_load").hide();
                  cur.closest("label").find("#preview_featured").css("opacity","1.0");
                  cur.closest(".imgUp-food").find(".imagePreview-food").css("opacity","1.0");
                  $("#group_pic_load").hide();
                  $("#add-item-group-food").prop("disabled",false);
                  cur.closest(".imgUp-food").find('.imageAddLoader').hide();
                  $(".save-item-group,.remove-item-group").each(function(e){
                      $(this).prop("disabled",false);
                  });
                  $("#upload_cat").prop("disabled",false);

              }
              switch (snapshot.state) {
                  case firebase.storage.TaskState.PAUSED: // or 'paused'
                      console.log('Upload is paused');
                      break;
                  case firebase.storage.TaskState.RUNNING: // or 'running'

                      break;
              }
          }, function(error) {

          }, function() {
              uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {

                  cur.closest(".fire_sea").find(".fire_image").val(downloadURL);
                  $("#cate_img").val(downloadURL);
                  $(".btn").prop("disabled",false);

              });

          });

      }
      var count = 1;
      $image_crop = $('#cat_img_demo').croppie({
          enableExif: true,
          viewport: {
              width: 350,
              height: 350,
              type: 'square' //circle
          },
          boundary: {
              width: 350,
              height: 350
          },
          format: 'png'
      });
      $("#add-item-group-food").click(function () {
          console.log("what the hell is this");
          @if(isset($items_list2))
          var addTable;
          addTable = '<select class="form-control addon_add_food" name="profile_item" data-ch="'+count+'" data-count="'+count+'" data-fid="">';
          addTable += '<option  value="">Select Items:</option>';
          <?php
              if(count($items_list2) > 0)
              {
              foreach ($items_list2  as $row)
              {
              ?>
              addTable += '<option id="items_val" value="<?php echo $row->id; ?>"> <?php echo $row->group_name; ?></option>';
          <?php
              }
              }
              ?>
              addTable += '</select>';

          @endif
          var foodItem = '<div class="card mb-0 main_item_div">' +
              '<div class="card-header first collapsed" data-toggle="collapse" href="#' + count + '">' +
              '<a class="card-title">' +
              'Item ' + count + '' +
              '</a>' +
              '</div>' +
              '<div id="' + count + '" class="card-body collapse" data-parent="#accordion-food">' +
              '<div class="row fire_sea">' +
              '<div class="col-3 imgUp-food" style="height: 270px;">' +
              '<div class="imagePreview-food" style="box-shadow: 0px -3px 17px 3px rgba(0,0,0,0.2);"></div>' +
              '<div class="imageAddLoader" style="display:none;"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>' +
              '<label class="btn btn-primary label-primary" style="background: #20a8d8; border-color: #20a8d8;font-weight: 300;">' +
              'Upload<input type="file" class="uploadFile-food img group_i_p" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" data-ch="item_img">' +
              '</label>' +
              '<input type="hidden" class="fire_image i_valid" name="item_pic[]" value="0" >' +
              '<input type="hidden" value="' + count + '" name="ch_count[]">' +
              '</div>' +
              '<div class="col-5 menu-item-description d-flex  flex-column">' +
              '<div class="form-group instruction-rider mt-0">' +
              '<label for="exampleInputEmail1">Title</label>' +
              '<input type="text" name="title[]" class="form-control i_valid" placeholder="Enter title">' +
              '</div>' +
              // '<div class="d-flex align-items-center pb-3">' +
              // '<p class="m-0">Add On:</p>' +
              // '<a class="ml-auto btn save-item-group addon_add_food" data-ch="' + count + '" style="color: white;">Add +</a>' +
              // '</div>' +
              '<div class="form-group instruction-rider mt-0 "><label for="exampleInputEmail1">Item</label>'+
              addTable+
              '</div>'+
              '<div id="addfood_' + count + '"></div>' +
              ' </div>' +
              '<div class="col-4 extra-instruction d-flex flex-column">' +
              '<div class="">' +
              '<div class="form-row">' +
              ' <div class="col pl-0">' +
              '  <p class="m-0">Quantity </p>' +
              '<input type="number" name="quantity[]" class="form-control i_valid" placeholder="0">' +
              '</div>' +
              '<div class="col">' +
              '<p class="m-0">Price </p>' +
              '<input type="text" name="price[]" class="form-control i_valid" placeholder= "0 $">' +
              '</div>' +
              '</div>' +
              '</div>' +
              '<div class="instruction-rider ">' +
              '<label for="">Description</label>' +
              '<textarea name="item_desc[]" class="i_valid"  rows="8" cols="42" style="border: 0.1px solid #d5d5d5;"></textarea>' +
              '</div>' +
              '</div>' +
              '<div class="col-12 pt-3 d-flex align-items-center justify-content-end">' +
              '<button class="btn btn-primary mr-2" >Save</button>' +
              '<button class="btn btn-danger remove-item-group" >Remove</button>' +
              '</div>' +
              '</div>' +
              '</div>' +
              '</div>';


          $('#accordion-food').append(foodItem);
          count++;
      });
      $(document).on('change',".group_i_p",function(e) {
          cur_img = $(this);
          var reader = new FileReader();
          reader.onload = function (event) {
              $image_crop.croppie('bind', {
                  url: event.target.result
              }).then(function () {

              });
          }
          reader.readAsDataURL(this.files[0]);
          $('#cat_img_modal').modal('show');
      });
      $(document).on("click",".crop_image_cat",function(e){
          $image_crop.croppie('result', {
              type: 'canvas',
              size: 'viewport'
          }).then(function(response) {
              if (response) {
                  $(".save-item-group,.remove-item-group").each(function(e){
                      $(this).prop("disabled",true);
                  });
                  if(cur_img.attr("data-ch")==="orginal"){
                      cur_img.closest("label").find(".imageAddLoader").show();
                      cur_img.closest("label").find("#preview_featured").attr("src",response);
                      cur_img.closest("label").find("#preview_featured").css("opacity","0.1");
                      cur_img.closest("label").find("#preview_div_featured").show();
                      cur_img.closest("label").find("#upload_div_featured").hide();
                      $("#add-item-group-food").prop("disabled",true);
                      $(".btn").prop("disabled",true);
                      $("#group_pic_load").show();
                  }
                  else{
                      cur_img.closest(".imgUp-food").find(".imageAddLoader").show();
                      cur_img.closest(".imgUp-food").find(".imagePreview-food").css({"background":"url("+response+")","background-size":"180px","opacity":"0.1"});

                  }
                  var byteString = atob(response.split(',')[1]);
                  var ab = new ArrayBuffer(byteString.length);
                  var ia = new Uint8Array(ab);
                  for (var i = 0; i < byteString.length; i++) {
                      ia[i] = byteString.charCodeAt(i);
                  }
                  blob=new Blob([ab], { type: 'image/jpeg' });
                  upload_cat_file(blob,cur_img);
                  $('#cat_img_modal').modal('hide');



              }


          })
      });
      $(document).on("click",".remove-item-group",function(e){
          $(this).closest(".main_item_div").remove();
      });
      var items_count = 0;
      var append_xount_items = 1;
      $(document).on("change",".addon_add_food",function(e){
          var ch=$(this).data("ch");
          var f_id = $(this).data("fid")+1;
          var id=$(this).val();
          var ap_count = $(this).data("count");
          items_count = 0;
          count ++;
          var vallll= "";
          var vallll11= "";
          var $flag = false;
          var breakOut = false;
          var breakOut2 = false;
          $(this).closest('div').nextAll('.menu-add-on').each(function() {
              vallll =   $(this).find('.valid_id_itm').val();
              console.log("1st=>",vallll);
              if (vallll != id){
                  $flag = true;
              }else {
                  $flag = false;
                  breakOut = true;
                  return false;
              }

          });

          if(breakOut) {
              swal({
                  title: "Ooops!",
                  text: "Already Added",
                  icon: "error",
                  button: "Okay",
              });
              breakOut = false;
              return false;
          }
          $("#addfood_"+ch).find('.valid_id_itm').each(function() {
              vallll11 =   $(this).val();
              console.log("2nd=>",vallll11);
              if (vallll11 != id){
                  $flag = true;
              }else{
                  $flag = false;
                  breakOut2 = true;
                  return false;
              }
          });
          if(breakOut2) {
              swal({
                  title: "Ooops!",
                  text: "Already Added",
                  icon: "error",
                  button: "Okay",
              });
              breakOut2 = false;
              return false;
          }
          if (vallll11 == "" && vallll11 == ""){
              $flag = true;
          }
          // var allids = [];
          // var sl_val=$(this).val();
          // var $flag = false;
          // var arr_items= $("#valid_items").val();
          // if (arr_items.includes(id)){
          //     $flag = false;
          // }else {
          //     $flag = true;
          // }
          var url = "{{route("fetch_item_g",["id"=>":ch"])}}";
          url = url.replace(":ch",id);
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          console.log($flag);
          if($flag){
              @if(isset($items_list2) && !empty($items_list2))
                  @foreach($items_list2 as $items)
              if (id == {{$items->id}}){
                  var text ='{{$items->group_name}}';
                  var main_id  = '{{$items->id}}';
                  var foodItem = '<div class="menu-add-on card mb-0 main_item_div" id="valid-append'+count+'"><input type="hidden" name="addon_fid'+ap_count+'[]" value="'+f_id+'"><input type="hidden" name="add_profile_index[]" value="'+ch+'">' +
                      '<input type="hidden" class="i_valid valid_id_itm" value="'+id+'" name="add_profile_id'+ap_count+'[]"><input type="hidden" class="i_valid" value="'+text+'" name="add_profile'+ap_count+'[]">'+
                      '<div class="card-header first collapsed" data-toggle="collapse" href="#' + count + '">' +
                      '<a class="card-title">' +
                      text +
                      '</a>' +
                      '</div>' +
                      '<div id="' + count + '" class="card-body collapse pt-0" data-parent="#accordion-food'+count+'">' +
                      '<div class="row" id="style-2" style="height: 250px;overflow:auto;">' +
                      '<table>'+
                      '<tbody class="table" id="modal-body-food-items'+count+'" >'+
                      '</tbody></table>'+
                      '</div><button class="mt-5 btn btn-danger remove-item-group float-right">Remove</button>' +
                      '<label class="mt-3" style="font-size: medium">Max selection by user </label><input type="number" class="form-control" name="selection_user'+ap_count+'[]" style="width:50%" min="0"/>'+
                      '</div>' +
                      '</div>';
                  $("#addfood_"+ch).append(foodItem);
                  @if(isset($items->fooditems))
                  @foreach($items->fooditems as $detail )
                  var id = '{{$detail->id}}';
                  var title = '{{$detail->title}}';
                  var price = '{{$detail->price}}';
                  var pic_url = '{{$detail->item_pic}}';

                  var table_tr = '<tr>' +
                      '<td style="vertical-align: middle;"><input type="hidden" value="'+title+'" name="'+main_id+'_add_title'+ap_count+'[]"><input type="checkbox" name="'+main_id+'_add_id'+ap_count+'[]"  id="'+title+'" value="'+id+'"></td>' +
                      '<td style="vertical-align: middle;"><img src="'+pic_url+'" width="30%" height="30%">'+
                      '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<label for="'+title+'" class="col-form-label">'+title+'</label></td>'+
                      '<td style="vertical-align: middle;"><label for="price'+ch+'" class="col-form-label pb-0">Price</label><input id="price'+ch+'" type="number" value="'+price+'" name="'+main_id+'_add_price'+ap_count+'[]" min="0" style="width: 80%"></td>'+
                      '<input type="hidden" name="'+main_id+'_add_img'+ap_count+'[]" value="'+pic_url+'"></tr>';
                  $("#modal-body-food-items"+count).append(table_tr);
                  @endforeach
                      @endif
                      count++;
              }
              @endforeach
              @endif
          }


      });
      $(document).on("submit","#add_itemsss",function(e){
          e.preventDefault();
          var v = this;
          var flag=true;
          $(".i_valid").each(function(e){
              if($(this).val()==="" || $(this).val()== -1){
                  alert("all fields are required");
                  flag=false;
                  return false;
              }
          });

          if(flag==false){
              return false;
          }
          v.submit();

      });
  </script>
    @endpush
