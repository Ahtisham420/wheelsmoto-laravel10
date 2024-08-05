$('.slickslidercontent').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 2
      }
    },
    {
      breakpoint: 700,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '10px',
        slidesToShow: 1
      }
    }
  ]
});

// $('.popularBrands').slick({
//   infinite: true,
//   slidesToShow: 3,
//   slidesToScroll: 3
// });
$('.popularBrands').slick({
  slidesToShow: 9,
  slidesToScroll: 1,
    centerMode:true,
    centerPadding:'0px',
    arrows:true,
  autoplay: false,
  autoplaySpeed: 2000,
    prevArrow: '<div class="left-main-arrow"><i class="fas fa-chevron-left"></i></div>' ,
    nextArrow: '<div class="right-main-arrow"><i class="fas fa-chevron-right"></i></div>',
    responsive: [
    {
      breakpoint: 992,
      settings: {
        arrows: true,
        autoplay: true,
        autoplaySpeed: 2000,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 5
      }
    },
    {
      breakpoint: 768,
      settings: {
        arrows: true,
        centerMode: true,
        autoplay: true,
        autoplaySpeed: 2000,
        centerPadding: '40px',
        slidesToShow: 4
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: true,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 2000,
        centerPadding: '40px',
        slidesToShow: 3
      }
    }

  ]
});
