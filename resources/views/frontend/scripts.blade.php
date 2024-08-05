<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2GojwDjxSqzMVqmg3m7mMIF1LoXFAuV0&libraries=places"></script>

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

    function initProfileAutocomplete() {
        let mapLat = Number('{{!empty(session("userDetails")->lat) ? session("userDetails")->lat : "40.6971494"}}');
        let mapLng = Number('{{!empty(session("userDetails")->lng) ? session("userDetails")->lng : "-74.2598655"}}');

        var map = new google.maps.Map(document.getElementById('profilemap'), {
            center: {
                lat: mapLat,
                lng: mapLng
            },
            draggable: false,
            zoom: 8,
            mapTypeId: 'roadmap'
        });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('profileMapInput');

        var searchBox = new google.maps.places.SearchBox(input);

        var marker;
        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());

            if (marker) {
                marker.setMap(null);
            }

            marker = new google.maps.Marker({
                map: map,
                position: map.getCenter(),
                title: "Location"
            });

        });

        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            $('#profileMapLat').val('');
            $('#profileMapLng').val('');
            $('#profileMapInput').removeClass('border border-danger');

            var places = searchBox.getPlaces();
console.log(places[0]);
            if (places.length == 0) {
                $('#profileMapInput').addClass('border border-danger');
                $('#profileMapLat').val('');
                $('#profileMapLng').val('');

                return;
            }

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();

            if (places.length == 1) {
                if (!places[0].geometry) {
                    $('#profileMapInput').addClass('border border-danger');
                    console.log("Returned place contains no geometry");
                    return;
                }

                $('#profileMapLat').val(places[0].geometry.location.lat());
                $('#profileMapLng').val(places[0].geometry.location.lng());
                var addr=places[0].address_components;
                for (var x in addr){
                    console.log(addr[x].types);
                    if(addr[x].types[0]==="country"){
                        $(".s_country option[value='"+ addr[x].long_name +"']").prop("selected",true);
                        $(".s_country").prop("disabled",true);
                        $("#profileCountry").val(addr[x].long_name);
                    }
                    else if(addr[x].types[0]==="administrative_area_level_2"){
                    $("input[name='city']").val(addr[x].long_name);
                    $("#city").val(addr[x].long_name);

                    }
                }



            } else {
                $('#profileMapInput').addClass('border border-danger');
                $('#profileMapLat').val('');
                $('#profileMapLng').val('');


                console.log("error in results");
                return;
            }

            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    }

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
{{--    --}}
// $("#image_1").change(function() {
//     let numFiles = $(this)[0].files.length;
//
//     if (numFiles > 0) {
//         readURL(this, "preview_1");
//     } else {
//         $('#preview_1').removeAttr('src');
//     }
//
//
// });
$("#image_2").change(function() {
    let numFiles = $(this)[0].files.length;

    if (numFiles > 0) {
        readURL(this, "preview_2");
    } else {
        $('#preview_2').removeAttr('src');
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

{{--    --}}
{{--    var newcropimg;--}}
{{--    // $(".gambar").attr("src", "https://user.gadjian.com/static/images/personnel_boy.png");--}}
{{--    var $uploadCrop,--}}
{{--        tempFilename,--}}
{{--        rawImg,--}}
{{--        imageId;--}}
{{--    function readFile(input) {--}}
{{--        if (input.files && input.files[0]) {--}}
{{--            var reader = new FileReader();--}}
{{--            reader.onload = function (e) {--}}
{{--                // $('.upload-demo').addClass('ready');--}}
{{--                // $('#cropImagePop').modal('show');--}}
{{--                rawImg = e.target.result;--}}
{{--            }--}}
{{--            reader.readAsDataURL(input.files[0]);--}}
{{--        }--}}
{{--        else {--}}
{{--            swal("Sorry - you're browser doesn't support the FileReader API");--}}
{{--        }--}}
{{--    }--}}
{{--    //--}}
{{--    // $uploadCrop = $('#upload-demo').croppie({--}}
{{--    //     viewport: {--}}
{{--    //         width: 200,--}}
{{--    //         height: 250,--}}
{{--    //     },--}}
{{--    //     enforceBoundary: false,--}}
{{--    //     enableExif: true--}}
{{--    // });--}}
{{--    // $('#cropImagePop').on('shown.bs.modal', function(){--}}
{{--    //     // alert('Shown pop');--}}
{{--    //     $uploadCrop.croppie('bind', {--}}
{{--    //         url: rawImg--}}
{{--    //     }).then(function(){--}}
{{--    //         console.log('jQuery bind complete');--}}
{{--    //     });--}}
{{--    // });--}}

{{--    $('.item-img').on('change', function () {--}}

{{--        imageId = $(this).data('id');--}}
{{--        newcropimg = $(this);--}}
{{--        tempFilename = $(this).val();--}}

{{--        newcropimg.closest(".cabinet").find('img').attr('src',rawImg);--}}
{{--        console.log(rawImg);--}}

{{--        $('#cancelCropBtn').data('id', imageId); readFile(this); });--}}
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
