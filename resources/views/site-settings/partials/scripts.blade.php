<script>
    function postEnable(id,model) {
        // e.preventDefault();
        let enabledElement = $('#'+model+'Enable' + id);
        let enabledStatus = enabledElement.prop('checked') ? 1 : 0;
        let apiBaseurl = $('meta[name=apiBaseurl]').attr("content");
        var formData = new FormData();
        formData.append("user", id);
        formData.append("enabled", enabledStatus);
        axios.post(apiBaseurl + '/user/enable', formData)
            .then(function(response) {
                if (response['data']['code'] && response['data']['code'] == 200) {
                    (response['data']['data']['enabled'] == 1) ? enabledElement.prop('checked', true): enabledElement.prop('checked', false)
                } else {
                    alert(response['data']['error_msg']);
                    enabledElement.prop('checked', !enabledElement.prop('checked'));
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function postReset(model) {
        $("#"+model+"-table").load(location.href + " #users-table");
    }

    function postFilterBox(model) {
        var x = document.getElementById(model + "-div");
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>