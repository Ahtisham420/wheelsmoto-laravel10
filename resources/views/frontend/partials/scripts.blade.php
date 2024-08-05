

@if(!empty($tab) && $tab == 'packages')
<script>
    $(document).ready(function() {
        document.getElementById("currentpackage").click();
    });
</script>
@endif
@if(!empty($tab) && $tab == 'wantedsection')
    <script>
        $(document).ready(function() {
            document.getElementById("powersCar").click();
            document.getElementById("v-pills-wanted-tab").click();
        });
    </script>
@endif
@if(!empty($tab) && $tab == 'newmyadverts')
    <script>
        $(document).ready(function() {
            document.getElementById("powersCar").click();
            document.getElementById("v-pills-wanted-section-tab").click();
        });
    </script>
@endif
@if(!empty($tab) && $tab == 'wmyadverts')
    <script>
        $(document).ready(function() {
            document.getElementById("powersCar").click();
            document.getElementById("v-pills-garage-adverts-list-tab").click();
        });
    </script>
@endif
@if(!empty($tab) && $tab == 'garageadvert')
    <script>
        $(document).ready(function() {

            document.getElementById("garagetab").click();
        });
    </script>
@endif
@if(!empty($tab) && $tab == 'miscellaneous')
    <script>
        $(document).ready(function() {
            document.getElementById("miscellaneous").click();
        });
    </script>
@endif

@if(!empty($tab) && $tab == 'mymiscellaneous')
    <script>
        $(document).ready(function() {
            document.getElementById("powersCar").click();
            document.getElementById("v-pills-misecellinous-adverts-list-tab").click();
        });
    </script>
@endif
@if(!empty($tab) && $tab == 'profile')
<script>
    $(document).ready(function(){
        document.getElementById("profilesection").click();
    });
</script>
@endif
@if(!empty($tab) && $tab == 'myadvert')
<script>
    $(document).ready(function() {
        document.getElementById("powersCar").click();
    });
</script>
@endif
@if(!empty($tab) && $tab == 'edit')
    <script>
        $(document).ready(function() {
            document.getElementById("powersCar").click();
            $("#v-pills-profile-tab").click();

        });
    </script>
@endif
@if(!empty($tab) && $tab == 'swap')
    <script>
        $(document).ready(function() {
            document.getElementById("powersCar").click();
            $("#v-pills-profile-tab").click();

        });
    </script>
@endif
@if(!empty($tab) && $tab == 'findcar')
    <script>
        $(document).ready(function() {
            document.getElementById("powersCar").click();
            $("#v-pills-profile-tab").click();

        });
    </script>
@endif
<script>
    function activaTab(hidetab, showtab, tabChanged = null) {
        $('#' + hidetab).hide();
        $('#' + showtab).show();
        if (!tabChanged) {
            $('a[href="#' + showtab + '"]').click();
        }
    }
    // if ($('#profilemap').length) {
    //     google.maps.event.addDomListener(window, 'load', initProfileAutocomplete);
    // }



    function changeCountry(val) {
        $('#profileCountry').val(val);
    }

  
</script>
<script>

    function readURL(input, preview) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#' + preview).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // $('#cropImageBtn').on('click', function (ev) {
    //     $uploadCrop.croppie('result', {
    //         type: 'base64',
    //         format: 'jpeg',
    //         size: {width: 150, height: 200}
    //     }).then(function (resp) {
    //         newcropimg.closest(".cabinet").find('img').attr('src',resp);
    //         // $('.item-img-output').attr('src', resp);
    //         $('#cropImagePop').modal('hide');
    //     });
    // });
</script>
