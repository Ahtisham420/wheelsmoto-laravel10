
/**
 * First, we will load all of this project's Javascript utilities and other
 * dependencies. Then, we will be ready to develop a robust and powerful
 * application frontend using useful Laravel and JavaScript libraries.
 */

require('./bootstrap');

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#preview-avatar123456').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#avatar_file123456").change(function() {
    readURL(this);
});

$(document).on('click','.js-del-btn',function(){
    let id = $(this).attr("data-id");
    let model = $(this).attr("data-model");
    let route = $(this).attr("data-route");
    $('#deleteConfirmModal').modal('show');
    $('.del-btn-confirm').attr('data-id',id);
    $('.del-btn-confirm').attr('data-model',model);
    let baseurl = $('meta[name=baseurl]').attr("content");
    $('.del-btn-confirm').attr('href',baseurl+'/delete/'+model+'/'+route+'/'+id);
    // axios.get('/user?ID=12345')
    //     .then(function (response) {
    //         console.log(response);
    //     })
    //     .catch(function (error) {
    //         console.log(error);
    //     });
});

$(document).on('hidden.bs.modal','#deleteConfirmModal',function(){
    $('.del-btn-confirm').attr('data-id',"#");
    $('.del-btn-confirm').attr('data-model',"#");
});
