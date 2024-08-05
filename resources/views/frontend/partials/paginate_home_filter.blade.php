<script>
    $(document).on('click','.page-link' ,function(event) {
        event.preventDefault();
        let baseurl = $('meta[name=baseurl]').attr("content");
        var _url = $(this).attr('href');

        @if(!isset($_GET['key']))
            _url = _url  + "&key=paginate";
        @endif
        axios.get(_url)
            .then(function(response) {
                $("#Append_render_data").html(response.data);
            });


    });
</script>
