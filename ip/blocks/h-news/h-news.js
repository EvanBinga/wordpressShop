jQuery(document).ready(function() {


function checkWidth() {
  var windowSize = jQuery(window).width();
  if (windowSize <= 767) {
      /* Слайдер новостей на главной */
      jQuery('.h-news .vc_pageable-slide-wrapper').slick({
        arrows: false,
        dots: false,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 2,
        responsive: [
          {
            breakpoint: 767,//>767
            settings: {
              infinite: true,
              slidesToShow: 2,
              slidesToScroll: 1,
              arrows: false,
              dots: true
            }
          },
          {
            breakpoint: 600,
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
  }
}//checkWidth

// Execute on load
checkWidth();
// Bind event listener
jQuery(window).resize(checkWidth);

});//ready

