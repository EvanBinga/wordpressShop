jQuery(document).ready(function() {

/* Слайдер категорий на главной */
jQuery('.h-catalog .products').slick({
  arrows: true,
  dots: true,
  infinite: true,
  slidesToShow: 6,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1300,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});

});//ready
