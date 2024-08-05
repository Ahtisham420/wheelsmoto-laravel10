<div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <label for="blog_title">Event Name</label>
        <input type="text" class="form-control" required  placeholder="Event Name" aria-describedby="blog_title_help" name='event_name'
            value="{{old("event_name",$post->event_name)}}">
        <small id="blog_title_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_title_description') }}</small>
    </div>

    <div class="form-group">
        <label for="blog_subtitle">Event Host</label>
        <input type="text" class="form-control"  placeholder="Event Host" aria-describedby="blog_subtitle_help" name='event_host'
            value='{{old("event_host",$post->event_host)}}'>
        <small id="blog_subtitle_help"
            class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_subtitle_description') }}</small>
    </div>


        <div class="form-group">
            <label for="blog_subtitle">Event Description</label>
            <input type="text" class="form-control"  placeholder="Event Description" aria-describedby="blog_subtitle_help" name='event_decription'
                   value='{{old("event_description",$post->event_description)}}'>
            <small id="blog_subtitle_help"
                   class="form-text text-muted">{{ __('admin/pages/blog_post_list.post_subtitle_description') }}</small>
        </div>
        <div class="row">
        <div class="form-row col-6">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02">* Start Date: </label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12 ">
                        <input type="text" class="form-control" name="start_date" id="datepickeradmin2"  placeholder="e.g. 1-2-2016" value="{{old("started_date",$post->started_date)}}" required>


                    </div>

                </div>
            </div>

        </div>
        <div class="form-row col-6">
            <div class="col-md-3 mb-3">
                <div class="form-row">
                    <div class="col-12 labelalign">
                        <label for="validationCustom02">*End Date: </label>

                    </div>

                </div>
            </div>
            <div class="col-md-9 mb-3">
                <div class="form-row">
                    <div class="col-12 ">
                        <input type="text" class="form-control"  name="end_date" id="datepickeradmin"  placeholder="e.g. 1-2-2016" value="{{old("end_date",$post->end_date)}}" required>


                    </div>

                </div>
            </div>

        </div>
        </div>





        <div class="form-group">
            <label for="blog_subtitle">Location</label>
            <input type="text" class="form-control"  placeholder="Enter Location" aria-describedby="blog_subtitle_help" id="profileMapInput" name='location'
                   value='{{old("location",$post->location)}}'>
            <small id="location" class="form-text text-muted">Location</small>
        </div>



        <div class="form-row">
           <input type="hidden" name="maplat" id="EventMapLat" value="{{old("map_lat",$post->map_lat)}}">
            <input type="hidden" name="maplng" id="EventMapLng" value="{{old("map_lng",$post->map_lng)}}">
            <div class="col-xs-12 col-sm-12 Map">
                <div id="profilemap" style="height:200px; width:100%;">
                    Map
                </div>
            </div>

        </div>
    <div class="form-group">

    </div>
    <div class="form-group">


    </div>


    <div class="bg-white pt-4 px-4 pb-0 my-2 mb-4 rounded border">
        <div class="float-right m-2" style="max-width:55px;">
            @if(!empty($post->img)) <img style="width: 55px;height: 25.313px;" id="blah2" src="/../../livepowerperformance/public/event_images/{{$post->img}}"/>
            @else
                <img id="blah2">
            @endif
        </div>
        <h4>Featured Images</h4>
        <div class="form-group mb-4 p-2">
            <label for="blog_feature_img">Image - (required)</label>
            <small id="blog__help" class="form-text text-muted">Upload image -
                {{-- <code>&times;px</code> - it will --}}
                it will show on blog and single post
            </small>
            <input class="form-control" onchange="readURL(this);" type="file" name="image"
                aria-describedby="blog_help">

        </div>
    </div>



</div>
@push('scripts')

<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"
    integrity="sha384-BpuqJd0Xizmp9PSp/NTwb/RSBCHK+rVdGWTrwcepj1ADQjNYPWT2GDfnfAr6/5dn" crossorigin="anonymous">
</script>
<script src="{{ asset('public/js/jquery.tagsinput-revisited.min.js') }}"></script>
{{--<script>--}}
    {{--CKEDITOR.replace('post_body');--}}
        {{--if( typeof(CKEDITOR) !== "undefined" ) {--}}
                {{--CKEDITOR.replace('post_body');--}}
            {{--}--}}
{{--</script>--}}
<link rel="stylesheet" href="{{ asset('public/css/jquery.tagsinput-revisited.min.css') }}">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
{{-- @foreach ($tags as $tag)
   []
@endforeach --}}

<script>
    $('#datepickeradmin').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate: new Date(),
        // maxYear: parseInt(moment().format('YYYY'), 10)
    });
    $('#datepickeradmin2').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate: new Date(),
        // maxYear: parseInt(moment().format('YYYY'), 10)
    });
  // map api settings
    function activaTab(hidetab, showtab, tabChanged = null) {
        $('#' + hidetab).hide();
        $('#' + showtab).show();
        if (!tabChanged) {
            $('a[href="#' + showtab + '"]').click();
        }
    }


    function initAutocomplete() {
        let mapLat = Number('{{!empty($post->map_lat) ? $post->map_lat : "40.6971494"}}');
        let mapLng = Number('{{!empty($post->map_lng) ? $post->map_lng : "-74.2598655"}}');

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

                $('#EventMapLat').val(places[0].geometry.location.lat());
                $('#EventMapLng').val(places[0].geometry.location.lng());
                // var addr=places[0].address_components;
                // for (var x in addr){
                //     console.log(addr[x].types);
                //     if(addr[x].types[0]==="country"){
                //         $(".s_country option[value='"+ addr[x].long_name +"']").prop("selected",true);
                //         $(".s_country").prop("disabled",true);
                //         $("#profileCountry").val(addr[x].long_name);
                //     }
                //     else if(addr[x].types[0]==="administrative_area_level_2"){
                //         $("input[name='city']").val(addr[x].long_name);
                //         $("#city").val(addr[x].long_name);
                //
                //     }
                // }



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




    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah2')
                    .attr('src', e.target.result)
                    .width(55)
                    .height(25.313);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDRThsOQmQXD3F7FpoUnTkAWJtFY3gKCNc&libraries=places&callback=initAutocomplete" async defer></script>
@endpush
