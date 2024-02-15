jQuery(document).ready(function() {

jQuery('.description-info__grid').slick({
  arrows: false,
  dots: false,
  infinite: true,
  slidesToShow: 6,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 2,
        arrows: true
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
        arrows: false
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: false
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});



/*
$window = jQuery(window);
$slick_slider = jQuery('.description-info__grid');
settings = {
  mobileFirst: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  infinite: true,
  responsive: [
    {
      breakpoint: 1200,
      settings: "unslick"
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 450,
      settings: {
        slidesToShow: 1
      }
    }
  ]
};

$slick_slider.slick(settings);

$window.on('resize', function() {
  if ($window.width() > 1201) {
    //отключаем
    if ($slick_slider.hasClass('slick-initialized'))
      $slick_slider.slick('unslick');
    return
  }
  if ( ! $slick_slider.hasClass('slick-initialized')) {
    return $slick_slider.slick(settings);
  }
});
*/

});//ready

