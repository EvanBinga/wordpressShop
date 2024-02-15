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


jQuery(document).ready(function() {

jQuery(".ip-responsive-table__wrap").each(function() {
  let titles = new Array();
  jQuery(this).find('thead th').each(function() {
    titles.push( jQuery( this ).text() );
  });
  jQuery(this).find('tbody tr').each(function() {
    let count = 0;
      // console.log( this );
    jQuery(this).find('td').each(function() {
      jQuery(this).attr("data-label", titles[count]);
      // console.log( this );
      // console.log( count );
      count++;
    });
  });
  // console.log(titles);
  // console.log(titles.length);
});//table

});//ready

jQuery(document).ready(function() {

/* Слайдер категорий на главной */
jQuery('.m-why').slick({
  arrows: true,
  dots: true,
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1900,//>1900
      settings: {
        slidesToShow: 5,
        slidesToScroll: 2,
        arrows: true
      }
    },
    {
      breakpoint: 1300,//>1300
      settings: {
        slidesToShow: 5,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 800,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 2,
        dots: true
      }
    },
    {
      breakpoint: 600,
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

(function($){
$('.good__accord__it.active .good__accord__it__cnt').fadeIn(0);

$('.good__accord__it__title').on('click', function(event) {
	var th = $(this),
		par = th.closest('.good__accord__it'),
		cnt = par.find('.good__accord__it__cnt');
	if (par.hasClass('active')) {
		par.removeClass('active');
		cnt.slideUp(300);
	} else {
		par.addClass('active');
		cnt.slideDown(300);
	}
	event.preventDefault();
});
})(jQuery);

/*
jQuery(document).ready(function() {
  //Slider
  jQuery('.ip-slider').slick({
    // autoplay: true,
    // autoplaySpeed: 5000,
    arrows: true,
    dots: false,
    infinite: true,
    pauseOnHover: false,
    slidesToShow: 1,
    slidesToScroll: 1,
    // responsive: [
    //     {
    //       breakpoint: 1200,
    //       settings: {
    //         arrows: true,
    //         dots: false
    //       }
    //     },
    //     {
    //       breakpoint: 900,
    //       settings: {
    //         arrows: false,
    //         dots: true
    //       }
    //     },
    //     {
    //       breakpoint: 480,
    //       settings: {
    //         arrows: false,
    //         dots: true
    //       }
    //     }
    //   ]
  });
});//ready
*/

jQuery(document).ready(function() {

function set_title_line_width() {
  jQuery(".title__text").each(function() {
    var widthTitleText = jQuery(this).width();
    jQuery(this).parent().find('.title__line').css('width', widthTitleText);
  });
}
set_title_line_width();
jQuery( window ).resize(function(event) {
  set_title_line_width();
});

});//ready
