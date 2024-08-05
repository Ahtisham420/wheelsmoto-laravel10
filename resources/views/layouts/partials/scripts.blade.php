<!-- <script type="text/javascript">
    // alert('fdfdfdf');
    function readURL(input, preview) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#' + preview).attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#current_situation_img").change(function () {
        readURL(this, "preview_current_situation_img");
    });
    $("#after_work_img").change(function () {
        readURL(this, "preview_after_work_img");
    });

    $(document).ready(function () {
        $(".select2").select2();
    });
    var circle;
    var marker


    function initMap() {
        if ($("#job-form").length > 0) {
            var lat = "{{ !empty($results->lat) ? $results->lat : -33.8688 }}";
            var lng = "{{ !empty($results->lng) ? $results->lng : 151.2195 }}";
            var map = new google.maps.Map(document.getElementById('location-map'), {
                center: new google.maps.LatLng(parseFloat(lat), parseFloat(lng)),
                zoom: 12,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
            var input = document.getElementById('pac-input');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);
            autocomplete.setFields(
                ['address_components', 'geometry', 'icon', 'name']);
            @if(!empty($results))
                marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(parseFloat(lat), parseFloat(lng)),
                position: new google.maps.LatLng(parseFloat(lat), parseFloat(lng)),
                title: document.getElementById("pac-input").value
            });
            // Add circle overlay and bind to marker
            circle = new google.maps.Circle({
                map: map,
                // radius: 1000 * document.getElementById("radius").value,    // metres
                fillColor: '#aa0000'
            });
            circle.bindTo('center', marker, 'position');
            @endif
            autocomplete.addListener('place_changed', function () {
                @if(!empty($results))
                marker.setVisible(false);
                        @endif
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(12);
                }
                @if(empty($results))
                    marker = new google.maps.Marker({
                    map: map,
                    // anchorPoint: new google.maps.Point(parseFloat(lat), parseFloat(lng)),
                    // position: new google.maps.LatLng(parseFloat(lat), parseFloat(lng)),
                    title: document.getElementById("pac-input").value
                });
                @endif
                marker.setPosition(place.geometry.location);
                document.getElementById("lat").value = place.geometry.location.lat();
                document.getElementById("lng").value = place.geometry.location.lng();
                marker.setVisible(true);
                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }
                @if(!empty($results))
                circle.setVisible(false);
                @endif
                    circle = new google.maps.Circle({
                    map: map,
                    // radius: 1000 * document.getElementById("radius").value,    // metres
                    fillColor: '#aa0000'
                });
                circle.bindTo('center', marker, 'position');
                if ($(".js-order-location").length > 0) {
                    console.log($("#pac-input").val());
                    $('.js-order-location').text($("#pac-input").val());
                }
            });
        }
    }
</script>


<script type="text/javascript">
    $(function () {

        var start = moment().subtract(29, 'days');
        var end = moment();

        function cb(start, end) {
            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }

        $('#reportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });

    function usersFilterBox() {
        var x = document.getElementById("usersFilterDiv");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function jobsFilterBox() {
        var x = document.getElementById("jobsFilterDiv");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function usersReset() {
        $("#users-table").load(location.href + " #users-table");
    }

    function jobsReset() {
        $("#jobs-table").load(location.href + " #jobs-table");
    }

    function usersReport() {
        var startDate = $("#reportrange").data('daterangepicker').startDate.format('YYYY-MM-DD');
        var endDate = $("#reportrange").data('daterangepicker').endDate.format('YYYY-MM-DD');
        $("#usersReport").submit(function (eventObj) {
            $("<input />").attr("type", "hidden")
                .attr("name", "from")
                .attr("value", startDate)
                .appendTo(this);
            $("<input />").attr("type", "hidden")
                .attr("name", "to")
                .attr("value", endDate)
                .appendTo(this);
            return true;
        });
    }

    function usersReportCsv() {
        var startDate = $("#reportrange").data('daterangepicker').startDate.format('YYYY-MM-DD');
        var endDate = $("#reportrange").data('daterangepicker').endDate.format('YYYY-MM-DD');
        $("#usersReportCsv").submit(function (eventObj) {
            $("<input />").attr("type", "hidden")
                .attr("name", "from")
                .attr("value", startDate)
                .appendTo(this);
            $("<input />").attr("type", "hidden")
                .attr("name", "to")
                .attr("value", endDate)
                .appendTo(this);
            return true;
        });
    }

    function jobsReport() {
        var startDate = $("#reportrange").data('daterangepicker').startDate.format('YYYY-MM-DD');
        var endDate = $("#reportrange").data('daterangepicker').endDate.format('YYYY-MM-DD');
        $("#jobsReport").submit(function (eventObj) {
            $("<input />").attr("type", "hidden")
                .attr("name", "from")
                .attr("value", startDate)
                .appendTo(this);
            $("<input />").attr("type", "hidden")
                .attr("name", "to")
                .attr("value", endDate)
                .appendTo(this);
            return true;
        });
    }

    function jobsReportCsv() {
        var startDate = $("#reportrange").data('daterangepicker').startDate.format('YYYY-MM-DD');
        var endDate = $("#reportrange").data('daterangepicker').endDate.format('YYYY-MM-DD');
        $("#jobsReportCsv").submit(function (eventObj) {
            $("<input />").attr("type", "hidden")
                .attr("name", "from")
                .attr("value", startDate)
                .appendTo(this);
            $("<input />").attr("type", "hidden")
                .attr("name", "to")
                .attr("value", endDate)
                .appendTo(this);
            return true;
        });
    }

    function jobsCompleteReport() {
        var startDate = $("#reportrange").data('daterangepicker').startDate.format('YYYY-MM-DD');
        var endDate = $("#reportrange").data('daterangepicker').endDate.format('YYYY-MM-DD');
        $("#jobsCompleteReport").submit(function (eventObj) {
            $("<input />").attr("type", "hidden")
                .attr("name", "from")
                .attr("value", startDate)
                .appendTo(this);
            $("<input />").attr("type", "hidden")
                .attr("name", "to")
                .attr("value", endDate)
                .appendTo(this);
            return true;
        });
    }

    $(document).ready(function () {
        dispatchValidate();
        $('.js-order-service-name').text($("#service option:selected").text());
       // console.log($("#service_price").text());
        $('.js-order-service-price').text($("#service_price").val());
    });
    $(document).on('change', '#service', function (e) {
        $('.js-order-service-name').text($("#service option:selected").text());
        $('.js-order-service-price').text($("#service_price").val());
        dispatchValidate();
    });
    $(document).on('change', '#customer_select', function (e) {
        $('.js-order-cust-name').text($("#customer_select option:selected").text());
        dispatchValidate();
    });

    $(document).on('click','.add-popup-btn',function(){
        $(".fromModal").modal("show");
    });

    function dispatchValidate() {
        if(
            $(".js-order-location").text() == "NA" ||
            $(".js-order-service-name").text() == "NA" ||
            $(".js-order-cust-name").text() == "NA"
        ){
            $(".js-save-action-btn").attr('disabled','disabled')
        }else{
            $(".js-save-action-btn").removeAttr('disabled')
        }
    }



</script>
 -->