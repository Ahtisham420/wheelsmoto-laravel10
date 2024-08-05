<div class="card-body">
    <div class="row">


        <div class="col-sm-12 col-md-12">
            <div class="col-6">
            <div class="form-group">
                <label for="blog_title">{{ __('admin/pages/food_category.category_name') }}</label>
                <input type="text" class="form-control" required id="blog_title" placeholder="Enter Titltle" aria-describedby="blog_title_help" name="name" value="{{old("name",$post->category_name)}}">
            </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12">

            <div class="col-6">
            <div class="form-group">
                <label for="blog_is_published">{{ __('admin/pages/food_category.img') }}</label>
                <input type="file" id="category_image" class="form-control m-input">
                <input type="hidden" id="img_cat" name="category_image" value="{{old("category_image",$post->category_image)}}">
                <div class="imageAddLoader" id="group_pic_load"  style="display:none;top: 60%;left: 9%;"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i></div>
                <img id="imageResult" src="{{old("category_image",$post->category_image)}}" width="150" height="100" alt="image"  style="@if(isset($post) && isset($post->category_image)) display: block; @else display: none; @endif margin-top: 15px;margin-left: 10px">
            </div>
            </div>
        </div>

    </div>
</div>
















</div>
@push('scripts')
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-analytics.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-storage.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.0.0/firebase-firestore.js"></script>
    <script>

        var firebaseConfig = {
            apiKey: "AIzaSyAddbxUhXJYrPqsX24kbEhFR1cJg37U2vA",
            authDomain: "trigonsoft-project.firebaseapp.com",
            databaseURL: "https://trigonsoft-project.firebaseio.com",
            projectId: "trigonsoft-project",
            storageBucket: "trigonsoft-project.appspot.com",
            messagingSenderId: "720006640137",
            appId: "1:720006640137:web:30ec9bff2920fe49be3ed8",
            measurementId: "G-H1B8G6FBYZ"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>
    <script>
        function upload(file,cur) {

            var seconds = new Date().getTime() / 1000;
            var path="Food/category/"+seconds;
            var storageRef = firebase.storage().ref();
            var success = false;
            var iRef = storageRef.child(path);
            var uploadTask= iRef.put(file);

            uploadTask.on('state_changed', function(snapshot){
                var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                console.log(progress);
                if(progress==100){


                }
                switch(snapshot.state) {
                    case firebase.storage.TaskState.PAUSED: // or 'paused'
                        console.log('Upload is paused');
                        break;
                    case firebase.storage.TaskState.RUNNING: // or 'running'

                        break;
                }
            }, function(error) {
                $(".btn").prop("disabled",false);
                $("#group_pic_load").hide();
            }, function() {
                uploadTask.snapshot.ref.getDownloadURL().then(function(downloadURL) {
                    $("#img_cat").val(downloadURL);
                    $(".btn").prop("disabled",false);
                    $("#group_pic_load").hide();
                    $("#imageResult").css("opacity","1.0");
                });

            });

        }
        $(document).on("change","#category_image", function(e){
            var uploadFile = $(this);
            var cur=$(this);
            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support

            if (/^image/.test( files[0].type)){
                $(".btn").prop("disabled",true);
                $("#group_pic_load").show();
                $("#imageResult").show();
                $("#imageResult").css("opacity","0.1");

                upload($(this)[0].files[0],cur);
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]);
                reader.onloadend = function(){
                    $("#imageResult").attr("src",this.result);

                }
            }

        });
        $("#submit_cat").submit(function(e){
            if($("#category_name").val() ==="" || $("#img_cat").val() ===""){
                alert("please fill all the fields ");
                return false;
            }
            $("#cat_s").prop("disabled",true);
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"
            integrity="sha384-BpuqJd0Xizmp9PSp/NTwb/RSBCHK+rVdGWTrwcepj1ADQjNYPWT2GDfnfAr6/5dn" crossorigin="anonymous">
    </script>
    <script src="{{ asset('public/js/jquery.tagsinput-revisited.min.js') }}"></script>
    <script>
        CKEDITOR.replace('mail_body');
        if( typeof(CKEDITOR) !== "undefined" ) {
            CKEDITOR.replace('mail_body');
        }
    </script>
    <link rel="stylesheet" href="{{ asset('public/css/jquery.tagsinput-revisited.min.css') }}">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
            integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

@endpush
