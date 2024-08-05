$(document).ready(
    function(){
        $('#category i.fa-plus').show();
        $('#category i.fa-minus').hide();
        $('#price i.fa-plus').show();
        $('#price i.fa-minus').hide();
        $('.priceshow1').hide();
        $('.categoryshow').hide();
    
    $('input[type="checkbox"]').on('change', function() {
        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
    });
    $('#category').click( function () {

        $('.categoryshow').toggle();
       
        $('i',this).toggle();
    });

    $('#price').click( function () {
        $('.priceshow1').toggle();
        $('i',this).toggle();
    }
    );
    }
);