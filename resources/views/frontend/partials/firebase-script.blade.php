<!-- Firebase App (the core Firebase SDK) -->
<script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-app-compat.js"></script>

<!-- Firebase Analytics -->
<script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-analytics-compat.js"></script>

<!-- Firebase Storage -->
<script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-storage-compat.js"></script>

<!-- Firebase Firestore -->
<script src="https://www.gstatic.com/firebasejs/9.0.0/firebase-firestore-compat.js"></script>

<script>
  //   const firebaseConfig = {
  // apiKey: "AIzaSyAXd4ItElm2jE_jwmiqMGB0Uq2NCUPbock",
  // authDomain: "dope-chat-e264a.firebaseapp.com",
  // databaseURL: "https://dope-chat-e264a-default-rtdb.firebaseio.com",
  // projectId: "dope-chat-e264a",
  // storageBucket: "dope-chat-e264a.appspot.com",
  // messagingSenderId: "598151183632",
  // appId: "1:598151183632:web:5dcc4b07959a0e3e1eb995",
  // measurementId: "G-3V9EKRKQST"
  //   };
//     const firebaseConfig = {
//   apiKey: "AIzaSyB3AOan4AOibppcPk45Fxk_Sd9fXHKDZdQ",
//   authDomain: "wheelsmoto-a9080.firebaseapp.com",
//   projectId: "wheelsmoto-a9080",
//   storageBucket: "wheelsmoto-a9080.appspot.com",
//   messagingSenderId: "875885865256",
//   appId: "1:875885865256:web:525ee25232c2ba833d481d",
//   measurementId: "G-N2VQH8CSZ9"
// };
const firebaseConfig = {
  apiKey: "AIzaSyBr-TJMZSJ0vwA9LUyTtLUrdAzfhgwtnaU",
  authDomain: "wheelsmoto1.firebaseapp.com",
  projectId: "wheelsmoto1",
  storageBucket: "wheelsmoto1.appspot.com",
  messagingSenderId: "862609138610",
  appId: "1:862609138610:web:db1fb89f452e6816727aab"
};
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    firebase.analytics();
    // var firebaseConfig = {
    //     apiKey: "AIzaSyAddbxUhXJYrPqsX24kbEhFR1cJg37U2vA",
    //     authDomain: "trigonsoft-project.firebaseapp.com",
    //     databaseURL: "https://trigonsoft-project.firebaseio.com",
    //     projectId: "trigonsoft-project",
    //     storageBucket: "trigonsoft-project.appspot.com",
    //     messagingSenderId: "720006640137",
    //     appId: "1:720006640137:web:30ec9bff2920fe49be3ed8",
    //     measurementId: "G-H1B8G6FBYZ"
    // };
    // // Initialize Firebase
    // firebase.initializeApp(firebaseConfig);
    // firebase.analytics();
</script>
<script>
    var user_car_pic=[];
    // var user_video=null;
    var wanted_car_pic=null;
    var profile_photo = null;
    // var mis_car_pic=[];
    var garage_car_pic=[];
    @if(!empty($update->pic_url))
            @php $pic_url = json_decode($update->pic_url) @endphp
            @foreach($pic_url as $key => $pic)
        user_car_pic["{{$key}}"]="{{$pic}}";
    @endforeach
            @endif
            @if(!empty($update->video_url))
        user_video="{{$update->video_url}}";
    @endif
            @if(!empty($g_edit->pic))
            @php
                $pic_url = json_decode($g_edit->pic);
            @endphp
            @foreach($pic_url as $key => $pic)
        garage_car_pic["{{$key}}"]="{{$pic}}";
    @endforeach
            @endif
            @if(!empty($misc_edit->pics))
            @php
                $pic_url = json_decode($misc_edit->pics);
            @endphp
            @foreach($pic_url as $key => $pic)
        mis_car_pic["{{$key}}"]="{{$pic}}";
    @endforeach
            @endif
            @if(!empty($w_edit->image))
        wanted_car_pic="{{$w_edit->image}}";
    @endif
    {{--@if(!empty($w_edit->image))--}}
    {{--profile_photo="{{$w_edit->image}}";--}}
    {{--@endif--}}

    function upload(file,cur,folder_type,index=null) {
        var seconds = new Date().getTime() / 1000;
        var user_name="{{session('userDetails')->first_name}}" + "{{session('userDetails')->id}}";
        var path="/power/"+user_name+"/"+folder_type+seconds;
        var storage = firebase.storage();
        var storageRef = storage.ref();
        var success = false;
        var iRef = storageRef.child(path);
        var uploadTask= iRef.put(file);
        var che=0;
        uploadTask.on('state_changed', function(snapshot){
            var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            $("#loader-dashboard").show();
            $("#profile_loader").show();
            console.log(progress);
            if(progress==100){
                if(folder_type==="user_car" || folder_type==="user_car_video"){
                    $("#place_d").prop("disabled",false);
                    $("#loader-dashboard").hide();
                }

                if(folder_type=="wanted_car_photo"){
                    $("#wanted_create_btn").prop("disabled",false);
                    $("#wanted_loader").hide();
                }
                if (folder_type == "profile_pic"){
                    $("#pofile_btn").prop("disabled",false);
                    $("#profile_loader").hide();

                }
                if(folder_type=="garage_car_photo"){
                    $("#garage_loader").hide();
                    $("#garage_btn_advert").prop('disabled',false);
                }
                if(folder_type=="mis_car_photo"){
                    $("#misc_create_btn").prop("disabled",false);
                    $("#misc_loader").hide();
                }
console.log(folder_type);
if (folder_type==="car_pic"){
    $("#add_loader").hide();
    $("#car_btn").prop("disabled",false);
}
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

                if(folder_type==="car_pic"){
                    user_car_pic[index]=downloadURL;
                }

                console.log(user_car_pic);
                if(folder_type==="user_car_video"){
                    user_video=downloadURL;
                }
                if(folder_type=="wanted_car_photo"){
                    wanted_car_pic=downloadURL;
                }
                if (folder_type == "profile_pic"){
                    profile_photo =downloadURL;
                    $("#profile_pic_photo").val(profile_photo);
                    console.log(profile_photo);
                }
                if(folder_type=="garage_car_photo"){
                    garage_car_pic[index]=downloadURL;
                }
                if(folder_type=="mis_car_photo"){
                    mis_car_pic[index]=downloadURL;
                }


            });

        });

    }

</script>
<script>

    $("#filemy").change(function(e){

        console.log(this.files[0].size);
        var cur=$(this);
        if(this.files[0].size > 4000000){

            alert('File size is less than 5MB!');
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
        user_car_pic=[];
        for (var i = 0; i < 3; i++) {
            if (i == 0) {
                $("#place_d").prop("disabled",true);
                upload(this.files[0],cur,"user_car",0);
                var image = document.getElementById('output1');
                image.src = URL.createObjectURL(e.target.files[i]);

            } else if (i == 1) {
                $("#place_d").prop("disabled",true);
                upload(this.files[1],cur,"user_car",1);
                var image = document.getElementById('output2');
                image.src = URL.createObjectURL(e.target.files[i]);

            } else if (i == 2) {
                $("#place_d").prop("disabled",true);
                upload(this.files[2],cur,"user_car",2);
                var image1 = document.getElementById('output3');
                image1.src = URL.createObjectURL(e.target.files[i]);
            } else {
                $("#place_d").prop("disabled",true);
                upload(this.files[0],cur,"user_car",0);
                var image = document.getElementById('output1');
                image.src = URL.createObjectURL(e.target.files[0]);

            }

        }

    });
    $("#video-upload").change(function(e){
        if(this.files[0].size > (1000000 * 15)){
            alert('File size is less than 16MB!');
            return false;
        }
        var cur=$(this);
        $("#videos_err").show();
        $("#place_d").prop("disabled",true);
        var reader = new FileReader();
        reader.onload = function (e) {
        };
        reader.readAsDataURL(this.files[0]);
        user_video=null;
        upload(this.files[0],cur,"user_car_video",2);
        console.log(user_video);
        $("video1").removeAttr("src");
        var image = document.getElementById('video1');
        $("#video1").show();
        image.src = URL.createObjectURL(e.target.files[0]);
    });
    $("#file_misc").change(function (e){
        $("#misc-image-preview").show();
        $("#misc_loader").show();
        var cur=$(this);
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
            // if (i == 0) {
            //     $("#misc_loader").show();
            //     $("#misc_create_btn").prop("disabled",true);
            //     upload(this.files[0],cur,"mis_car_photo",0);
            //     var image = document.getElementById('m_p_1');
            //     image.src = URL.createObjectURL(e.target.files[i]);
            //
            // } else if (i == 1) {
            //     $("#misc_loader").show();
            //     $("#misc_create_btn").prop("disabled",true);
            //     upload(this.files[1],cur,"mis_car_photo",1);
            //     var image = document.getElementById('m_p_2');
            //     image.src = URL.createObjectURL(e.target.files[i]);
            //
            // } else if (i == 2) {
            //     $("#misc_loader").show();
            //     $("#misc_create_btn").prop("disabled",true);
            //     upload(this.files[1],cur,"mis_car_photo",1);
            //     var image = document.getElementById('m_p_2');
            //     image.src = URL.createObjectURL(e.target.files[i]);
            // } else {
            //     $("#misc_loader").show();
            //     $("#misc_create_btn").prop("disabled",true);
            //     upload(this.files[1],cur,"mis_car_photo",1);
            //     var image = document.getElementById('m_p_2');
            //     image.src = URL.createObjectURL(e.target.files[0]);
            //     $("#place_d").prop("disabled",true);
            //     upload(this.files[0],cur,"user_car",0);
            //     var image = document.getElementById('output1');
            //     image.src = URL.createObjectURL(e.target.files[0]);
            //
            // }
            $("#misc_loader").show();
            $("#misc_create_btn").prop("disabled",true);
            upload(this.files[i],cur,"mis_car_photo",i);
            var image = document.getElementById('m_p_'+c);
            image.src = URL.createObjectURL(e.target.files[i]);
            c++;
        }
    });
    $("#file1").change(function (e){
        $("#garage-image-preview").show();
        $("#garage_loader").show();
        $("#garage_btn_advert").prop('disabled',true);
        var cur=$(this);
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
            upload(this.files[i],cur,"garage_car_photo",i);
            var image = document.getElementById('g_p_'+c);
            image.src = URL.createObjectURL(e.target.files[i]);
            c++;
        }
    });
    $(".image_dash").change(function (e){
        if(this.files[0].size > 4000000){
            $("#5MBlimitImGE").modal("show");
            return false;
        }
        var cur=$(this);
        var id =$(this).data("id");
        $("#add_loader").show();
        $("#car_btn").prop("disabled",true);
        var reader = new FileReader();
        var image = document.getElementById('preview_'+id);
        image.src = URL.createObjectURL(e.target.files[0]);
        reader.readAsDataURL(this.files[0]);
        upload(this.files[0],cur,"car_pic",id);
        console.log(user_car_pic);

    });
    $("#file12").change(function (e){
        var cur=$(this);
        $("#pofile_btn").prop("disabled",true);
        upload(this.files[0],cur,"profile_pic");
        var image = document.getElementById('profilephoto1');
        image.src = URL.createObjectURL(e.target.files[0]);
        console.log(image.src);
        $(".delete_w_p").show();
    });
</script>
