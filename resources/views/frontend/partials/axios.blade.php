<script>
    var apiBaseUrl = '{{config("app.api_url")}}';
    var baseUrl = '{{config("app.url")}}';
    var assetUrl = '{{config("app.asset_url")}}';
    var uiAssetUrl = '{{config("app.ui_asset_url")}}';

    function purchasePkg(id){
        let userLoggedIn = '{{!empty(session("userLoggedIn")) && session("userLoggedIn") == true ? true:false}}';
        if (!userLoggedIn || userLoggedIn == "false"){
           // var id = encodeURI(id);
         //   var id = $.base64.encode(id);
       //  console.log(id);
            var url='{{route("user-login",["id"=>":id"])}}';
          //  var url = encodeURIComponent(url);
            url=url.replace(":id",id);
            window.location.href = url;
        } else {
            window.location.href = '{{route("user-dashboard",["tab"=>"packages"])}}';
        }

        // var packageid = id;
        // $.ajax({
        //     type: 'POST',
        //     url: "/poweperformance/user/purchase",
        //     data: {
        //         packageid: packageid,
        //         "_token": "{{ csrf_token() }}"
        //     },
        //     success: function(response) {
        //         window.location.href = response.url;
        //     }
        // });
    }

    $(document).on('submit','.form-modal',function(event){
        event.preventDefault();
         var form = this.serialize();
         $.ajax({
             type: 'POST',
             url: "{{ route('form-settings-engine-type') }}",
             data: form,
             success: function(response) {
                 window.location.href = response.url;
             }
         });
    });

</script>
