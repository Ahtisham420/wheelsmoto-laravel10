<script type="text/javascript">
    getServiceData();

    function getServiceData() {
        $(document).ready(function() {
            let service = $("#service option:selected").text().trim();
            let apiBaseurl = $('meta[name=apiBaseurl]').attr("content");
            axios.post(apiBaseurl + '/general/serviceDetailByName', {
                    title: service
                })
                .then(function(response) {
                    let service_price = response.data.data.price;
                    $("#service_price").val(service_price);
                    if ($('.js-order-service-price').length > 0) {
                        $('.js-order-service-price').text(service_price);
                        dispatchValidate();
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        })
    }

    function updateJobDriver(driver_id, job_id) {
        $(document).ready(function() {
            $(".js-assign-job-btn").attr("disabled", "disabled");
            let apiBaseurl = $('meta[name=apiBaseurl]').attr("content");
            let baseurl = $('meta[name=baseurl]').attr("content");
            axios.post(apiBaseurl + '/jobs/acceptJob', {
                    driver_id: driver_id,
                    job_id: parseInt(job_id)
                })
                .then(function(response) {
                    let status = response.data.code;
                    let msg = response.data.msg;
                    let job_id = response.data.data.id;
                    let redirect = baseurl + "/jobs/edit/" + job_id + "&msg=" + msg;
                    // console.log(redirect);
                    // return;
                    if (status == 200) {
                        window.location.assign(baseurl + "/jobs/edit/" + job_id + "?msg=" + msg);
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        })
    }

    function getUserData(id) {
        $(document).ready(function() {
            let apiBaseurl = $('meta[name=apiBaseurl]').attr("content");
            let appUrl = $('meta[name=appUrl]').attr("content");
            axios.post(apiBaseurl + '/general/get-users-by-id', {
                    id: id
                })
                .then(function(response) {
                    let data = response.data.data;
                    $("#cus_email").val(data.email);
                    $("#cus_phone").val(data.phone);
                    $("#first_name").val(data.first_name);
                    $("#last_name").val(data.last_name);
                    $("#cus_adrs").val(data.address);
                    if (data.avatar != null) {
                        $("#preview_cust_img").attr('src', appUrl + "/storage/app/" + data.avatar);
                    }
                    if ($('.js-order-cust-phone').length > 0) {
                        dispatchValidate();
                        $('.js-order-cust-phone').text(data.phone);
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        })
    }

    function getNearByProviders(km, lat, lng, firstOpen = false) {
        $(document).ready(function() {
            let apiBaseurl = $('meta[name=apiBaseurl]').attr("content");
            let baseurl = $('meta[name=baseurl]').attr("content");
            axios.post(apiBaseurl + '/provider/getNearByProviders', {
                    circle_radius: km * 1000,
                    lat: lat,
                    lng: lng
                })
                .then(function(response) {
                    let data = response.data.data;
                    let html = "";
                    let row = $($("#driver-row").html());
                    for (let i = 0; i < data.length; i++) {
                        $(row).find('.js-select-id').attr('value', data[i].usr_id);
                        $(row).find('.js-select-driver-name').html(data[i].first_name + " " + data[i].last_name);
                        $(row).find('.js-select-driver-status').removeClass("badge-success");
                        $(row).find('.js-select-driver-status').removeClass("badge-secondary");
                        $(row).find('.js-select-driver-status').removeClass("badge-warning");
                        $(row).find('.js-select-driver-status').removeClass("badge-danger");
                        if (data[i].job_status == 0) {
                            $(row).find('.js-select-driver-status').addClass("badge-success");
                            $(row).find('.js-select-driver-status').html("Free");
                        }
                        if (data[i].job_status == 1) {
                            $(row).find('.js-select-driver-status').addClass("badge-secondary");
                            $(row).find('.js-select-driver-status').html("Busy");
                        }
                        if (data[i].job_status == 2) {
                            $(row).find('.js-select-driver-status').addClass("badge-warning");
                            $(row).find('.js-select-driver-status').html("Waiting");
                        }
                        if (data[i].job_status == 3) {
                            $(row).find('.js-select-driver-status').addClass("badge-danger");
                            $(row).find('.js-select-driver-status').html("Signedout");
                        }
                        $(row).find('.js-select-driver-details').attr("href", baseurl + "/providers/edit/" + data[i].usr_id);
                        html += "<tr>" + $(row).html() + "</tr>";
                    }
                    $(".js-change-driver-modal-body-table tbody").html(html);
                    if (firstOpen) {
                        $("#changeDriverModal").modal('show');
                    }
                })
                .catch(function(error) {
                    console.log(error);
                    return false;
                });
        })
    }

    $(document).ready(function() {
        $(document).on('keyup', '#service_price', function() {
            $("#service_price").removeClass('is-invalid');
            $(".service-price-feebdback").css('display', 'none');
        });
        $(document).on('change', '#service', function() {
            getServiceData();
        });
        $(document).on('change', '#customer_select', function() {
            getUserData($(this).val());
        });
        $(document).on('change', '#radius', function() {
            getNearByProviders($(this).val(), $("#lat").val(), $("#lng").val());
        });
        $(document).on('click', '.js-user-payment-btn', function() {
            $("#addUserPaymentModal").modal('show');
        });
    });
    $(document).ready(function() {
        $(document).on('click', '.js-view-drivers-btn', function() {
            let jobFormError = $('#jobFormError');
            let closeBtn = "<button class='close' type='button' data-dismiss='modal' aria-label='Close'" +
                "<span aria-hidden='true'>×</span>" +
                "</button>";
            if ($("#id").val() == 0) {
                jobFormError.find('.modal-header').html('Job must Dispatch!' + closeBtn);
                jobFormError.find('.modal-body').text('Please Dispatch Job then assign driver.');
                jobFormError.modal("show");
                return;
            } else if ($("#lat").val() == 0 && $("#lng").val() == 0) {
                jobFormError.find('.modal-header').html("Job Uncomplete!" + closeBtn);
                jobFormError.find('.modal-body').text("Please select Job Location to assign driver.");
                jobFormError.modal("show");
                return;
            } else {
                getNearByProviders(1, $("#lat").val(), $("#lng").val(), true);
            }
        });
    });
    $(document).ready(function() {
        $(document).on('change', "input[name='driverSelectRadio']", function() {
            $(".js-assign-job-btn").removeAttr("disabled");
        });
    });
    //js-assign-job-btn
    $(document).ready(function() {
        $(document).on('click', '.js-assign-job-btn', function() {
            let job_id = $("#id").val();
            let driver_id = $("input[name='driverSelectRadio']:checked").val();
            console.log(driver_id);
            updateJobDriver(driver_id, job_id);
        });
    });
    //js-assign-job-btn

    $(document).ready(function() {
        $(document).on('click', '.js-cancel-job', function() {
            let id = $(this).attr("data-id");
            let model = $(this).attr("data-model");
            let route = $(this).attr("data-route");
            $('#cancelJobConfirmModal').modal('show');
            $('.job-cancel-btn-confirm').attr('data-id', id);
            $('.job-cancel-btn-confirm').attr('data-model', model);
            let baseurl = $('meta[name=baseurl]').attr("content");
            $('.job-cancel-btn-confirm').attr('href', baseurl + '/jobs/cancel/' + model + '/' + route + '/' + id);
        });
    });

    $(document).ready(function() {
        $(document).on('submit', '#job-form', function(e) {
            e.preventDefault();
            $(".js-save-action-btn").text("Dispatching...")
            let service = $("#service option:selected").text().trim();
            if (!service || !$("#customer_select option:selected").val()) {
                alert("Please fill all fields");
                return;
            }

            let apiBaseurl = $('meta[name=apiBaseurl]').attr("content");
            if ($("#service_price").val() == "") {
                $("#service_price").addClass('is-invalid');
                $(".service-price-feebdback").html('Price is required');
                $(".service-price-feebdback").css('display', 'block');
                return;
            }
            let current_situation_img = document.querySelector('#current_situation_img');
            let after_work_img = document.querySelector('#after_work_img');
            var formData = new FormData();
            formData.append("id", $("#id").val());
            formData.append("title", service);
            formData.append("service_price", $("#service_price").val());
            formData.append("lat", $("#lat").val());
            formData.append("lng", $("#lng").val());
            formData.append("location_address", $("#pac-input").val());
            formData.append("job_status", $("#status option:selected").val() ? $("#status option:selected").val() : 2);
            formData.append("customer_approval", $("#customer_approval option:selected").val() ? $("#customer_approval option:selected").val() : 0);
            formData.append("customer_id", $("#customer_select option:selected").val());
            if (current_situation_img) {
                formData.append("current_situation_img", current_situation_img.files[0]);
            }
            if (after_work_img) {
                formData.append("after_work_img", after_work_img.files[0]);
            }
            axios.post(apiBaseurl + '/jobs/store', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                })
                .then(function(response) {
                    let last_insert_id = response.data.last_insert_id;
                    $("#id").val(last_insert_id);
                    let baseurl = $('meta[name=baseurl]').attr("content");
                    console.log(response.data)
                    if ($(".js-save-action-btn").data('action') == "jobForm") {
                        window.location.assign(baseurl + "/jobs/edit/" + last_insert_id + "?msg=Record Update Successfully");
                    } else {
                        $(".js-save-action-btn").text("Dispatch");
                        $(".js-order-location").text("NA");
                        $(".js-order-cust-name").text("NA");
                        $(".js-order-cust-phone").text("NA");
                        $(".js-save-action-btn").attr("disabled", "disabled");
                        $("#id").val(0);
                        $("#pac-input").val("");
                        $("#customer_select").val(0).trigger('change');;
                        toastr.success('Job Successfully Created.', 'Waiting for Provider to accept!', {
                            timeOut: 5000
                        })

                    }
                })
                .catch(function(error) {
                    console.log(error);
                });
        });

        $(document).on('submit', '#search-user', function(e) {
            e.preventDefault();
            let baseurl = $('meta[name=baseurl]').attr("content");
            var formData = new FormData();
            formData.append("user", $("#user").val());
            axios.post(baseurl + '/users/search', formData)
                .then(function(response) {
                    $('#users-tbody').html(response.data)
                })
                .catch(function(error) {
                    console.log(error);
                });
        });

        $(document).on('submit', '#search-job', function(e) {
            e.preventDefault();
            let baseurl = $('meta[name=baseurl]').attr("content");
            var formData = new FormData();
            formData.append("job", $("#job").val());
            axios.post(baseurl + '/jobs/search', formData)
                .then(function(response) {
                    $('#job-tbody').html(response.data)
                })
                .catch(function(error) {
                    console.log(error);
                });
        });


    });

    function markedNotifyView(url, notifyId) {
        console.log(url, notifyId);
        let apiBaseurl = $('meta[name=apiBaseurl]').attr("content");
        var formData = new FormData();
        formData.append("notification_id", notifyId);
        axios.post(apiBaseurl + '/general/set-notification-marked', formData)
            .then(function(response) {
                window.location.assign(url);
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function userEnable(id) {
        // e.preventDefault();
        let enabledElement = $('#userEnable' + id);
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

    function getnotify() {
        let apiBaseurl = $('meta[name=apiBaseurl]').attr("content");
        axios.get(apiBaseurl + '/general/getNotifications')
            .then(function(response) {
                let createNoty = "";
                var appurl = $('meta[name=appUrl]').attr("content");
                if (response.data.length == 0) {
                    $(".js-dashboard-notification-count").html("");
                    createNoty = "<li>" +
                        "<a class='dropdown-item notify-dropdown-item'>" +
                        "<i class='icon-speedometer text-success'>" +
                        "</i> Notification Empty!</a>" +
                        " </li>";
                    $(".js-dashboard-notification").html(createNoty);
                    return;
                }
                for (let i = 0; i < response.data.length; i++) {
                    let dataArr = response.data;
                    let body = JSON.parse(dataArr[i].data);
                    // console.log(body)
                    createNoty += "<li>" +
                        "<a style='white-space: pre-wrap;' class='dropdown-item notify-dropdown-item' onclick=markedNotifyView('" + appurl + "/" + body.url + "','" + dataArr[i].id + "')>" +
                        "<i class='icon-speedometer text-warning'>" +
                        "</i> Job ID: " + body.job_id + " exeed time limits</a>" +
                        " </li>";
                }
                $(".js-dashboard-notification").html(createNoty);
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function getBookings() {
        let apiBaseurl = $('meta[name=apiBaseurl]').attr("content");
        axios.get(apiBaseurl + '/general/getBookings')
            .then(function(response) {
                console.log(response);
                let createBooking = response.data;
                var appurl = $('meta[name=appUrl]').attr("content");
                $("#dispatcher-booking-ul").html(createBooking);
            })
            .catch(function(error) {
                console.log(error);
            });
    }

    function getDrivers() {
        let apiBaseurl = $('meta[name=apiBaseurl]').attr("content");
        axios.get(apiBaseurl + '/general/getDrivers')
            .then(function(response) {
                console.log(response);
                let createBooking = response.data;
                var appurl = $('meta[name=appUrl]').attr("content");
                $("#dispatcher-bottom-table tbody").html(createBooking);
            })
            .catch(function(error) {
                console.log(error);
            });
    }
    $(document).ready(function() {
        getnotify();
        setInterval(function() {
            getnotify();
        }, 30000);
    });
    $(document).ready(function() {
        if ($(".js-save-action-btn").data("action") == "dispatcher") {
            getBookings();
            getDrivers();
            setInterval(function() {
                getBookings();
                getDrivers();
            }, 1000);
        }
    });
</script>