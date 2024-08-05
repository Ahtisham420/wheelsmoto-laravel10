$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    autoplay:true,
    nav:true,
    dots:false,
    navText : ['<i class="fa fa-angle-right r" aria-hidden="true" style="font-size:20px"></i>','<i class="fa fa-angle-left l" aria-hidden="true" style="font-size:20px"></i>'],
    responsive:{
        0:{

            items:1
        },
        600:{

            items:3
        },
        1000:{

            items:6

        }
    }
});
$( document ).ready(function() {
    $('.BrowseUsedCars').slick({
        rows: 2,
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 3,
        // slidesToScroll: -1,
        nextArrow: '<span class="prev-a"> <i class="fas fa-chevron-left" ></i></span>',
        prevArrow: '<span class="next-a"> <i class="fas fa-chevron-right"></i></span>' ,


        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });
    $('.make').slick({
        rows: 2,
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 3,
        // slidesToScroll: -1,
        nextArrow: '<span class="prev-a"> <i class="fas fa-chevron-left" ></i></span>',
        prevArrow: '<span class="next-a"> <i class="fas fa-chevron-right"></i></span>' ,


        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
        ]
    });



});
$('.newbasicpackagedetail').slick({
    arrows:true,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: false,
    prevArrow: '<i class="fas fa-chevron-left"></i>' ,
    nextArrow: '<i class="fas fa-chevron-right"></i>',


    responsive: [
        {
            breakpoint: 992,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]

});

$('.packagedetaillogin').slick({
    arrows:true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,

    prevArrow: '<i class="fas fa-chevron-left"></i>' ,
    nextArrow: '<i class="fas fa-chevron-right"></i>',
    responsive: [
        {
            breakpoint: 992,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 2
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]

});

$('.home-produc-slider').slick({
    arrows:true,
    slidesToShow: 7,
    slidesToScroll: 1,
    autoplay: false,
    centerMode:true,
    // centerPadding: '30px',
    prevArrow: '<div class="left-main-arrow"><i class="fas fa-chevron-left"></i></div>' ,
    nextArrow: '<div class="right-main-arrow"><i class="fas fa-chevron-right"></i></div>',


    responsive: [
        {
            breakpoint: 992,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 4,

            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                arrows: true,
                centerMode: true,
                centerPadding: '40px',
                slidesToShow: 1
            }
        }
    ]

});


