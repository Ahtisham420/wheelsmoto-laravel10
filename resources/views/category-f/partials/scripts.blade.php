<script>
    function filters(_export = false){
        var _string = queryString("filter_search", $(".js-filter-search").val());
        if($(".js-filter-country").val() != undefined) {
            _string = queryString("filter_country", $(".js-filter-country").val(), _string);
        }
        if($(".js-filter-age").val() != undefined) {
            _string = queryString("filter_age", $(".js-filter-age").val(), _string);
        }
        if($(".js-filter-id-type").val() != undefined) {
            _string = queryString("filter_id_type", $(".js-filter-id-type").val(), _string);
        }
        if($(".js-filter-id-verification").val() != undefined) {
            _string = queryString("filter_id_verification", $(".js-filter-id-verification").val(), _string);
        }
        if($(".js-filter-user-types").val() != undefined) {
            _string = queryString("filter_user_types", $(".js-filter-user-types").val(), _string);
        }
        if($(".js-filter-gender").val() != undefined) {
            _string = queryString("filter_gender", $(".js-filter-gender").val(), _string);
        }
        if($(".js-filter-status").val()) {
            _string = queryString("filter_status", $(".js-filter-status").val(), _string);
        }
        if($(".js-filter-from-date").val() != undefined){
            _string = queryString("filter_from_date", $(".js-filter-from-date").val(),_string);
        }
        if($(".js-filter-to-date").val() != undefined) {
            _string = queryString("filter_to_date", $(".js-filter-to-date").val(), _string);
        }
        if(_export){
            _string = queryString("filter_csv_export", true, _string);
        }
        return _string;
    }

    function queryString(key, dataString, string = ''){
        var _qString = "";
        if(string === ''){
            _qString = "?key=filters&"+key + "=" +dataString;
        }else{
            _qString = string + "&" + key + "=" + dataString;
        }
        return _qString;
    }

    $(document).on('click','.js-filter-export' ,function() {
        let baseurl = $('meta[name=baseurl]').attr("content");
        var _string = filters(true);
        window.open(baseurl + '/food-cat'+_string, '_blank');
    });
    $(document).on('click','.js-filter-apply' ,function() {
            let baseurl = $('meta[name=baseurl]').attr("content");
            var _string = filters();
            console.log(_string)
            axios.get(baseurl + '/food-cat'+_string)
                .then(function(response) {
                    console.log(_string)
                    $(".js-index-table").html(response.data);
                })
        });
    $(document).on('click','.js-filter-search-btn' ,function() {
        let baseurl = $('meta[name=baseurl]').attr("content");
        var _string = queryString("filter_search", $(".js-filter-search").val());
        console.log(_string)
        axios.get(baseurl + '/food-cat'+_string)
            .then(function(response) {
                console.log(response)
                $(".js-index-table").html(response.data);
            })
    });
    $(document).on('click','.page-link' ,function(event) {
        event.preventDefault();
        let baseurl = $('meta[name=baseurl]').attr("content");
        var _url = $(this).attr('href');
        @if(!isset($_GET['key']))
            _url = _url  + "&key=paginate";
        @endif
        axios.get(_url)
            .then(function(response) {
                $(".js-index-table").html(response.data);
            })
    });
    $(document).on('click','.js-filter-reset' ,function() {
        let baseurl = $('meta[name=baseurl]').attr("content");
        window.location.assign(baseurl + '/food-cat');
    });
    $(document).on('click','.js-restriction-reason-submit' ,function() {
        event.preventDefault();
        let baseurl = $('meta[name=baseurl]').attr("content");
        var formData = new FormData();
        var user_id = $(this).attr("data-id");
        var reason = $(".js-restriction-reason-text").val();
        // alert(reason);
        formData.append("user_id", user_id);
        formData.append("reason", reason);
        axios.post(baseurl + '/food-cat', formData, {})
            .then(function(response) {
                console.log(response)
                if (response['data']['success_msg'] != undefined) {
                    $('.modal').modal('hide');
                    $('#FailedMessage').hide();
                    $('#SuccessMessage').html("<p>"+response['data']['success_msg']+"<p>");
                    $('#status').val("1");
                    $('.js-restriction-reason-text').text(response['data']['reason']);
                    $('#SuccessMessage').show();
                } else {
                    $('#SuccessMessage').hide();
                    $('#FailedMessage').show();
                }
                setTimeout(function(){
                    $('#FailedMessage').hide();
                    $('#SuccessMessage').hide();
                }, 3000);
            })
            .catch(function(error) {
                console.log(error);
                $('#SuccessMessage').hide();
                $('#FailedMessage').show();
            });
    });
    $(document).on('click', '.js-del-btn-food-cate', function() {
        let id = $(this).attr("data-id");
        let model = $(this).attr("data-model");
        let route = $(this).attr("data-route");
        let route_params = null;
        let axios_param = null;

        if (typeof $(this).attr('data-route-params') !== typeof undefined && $(this).attr('data-route-params') !== false) {
            route_params = $(this).attr("data-route-params");
        }

        if (typeof $(this).attr('data-axios') !== typeof undefined && $(this).attr('data-axios') !== false) {
            axios_param = $(this).attr('data-axios');
        }

        $('#deleteConfirmModal').modal('show');
        $('.del-btn-confirm').attr('data-id', id);
        $('.del-btn-confirm').attr('data-model', model);
        let baseurl = $('meta[name=baseurl]').attr("content");

        if(axios_param == "1"){
            $('.del-btn-confirm').attr('onclick', "deleteCustomField("+id+")");
            return;
        }

        if (route_params) {
            $('.del-btn-confirm').attr('href', baseurl + '/cate-delete/' + id + '?' + route_params);
        } else {
            $('.del-btn-confirm').attr('href', baseurl + '/cate-delete/'+ id);
        }
        // $('.del-btn-confirm').attr('href',baseurl+'/delete/'+model+'/'+route+'/'+id);
        // axios.get('/user?ID=12345')
        //     .then(function (response) {
        //         console.log(response);
        //     })
        //     .catch(function (error) {
        //         console.log(error);
        //     });
    });
</script>
