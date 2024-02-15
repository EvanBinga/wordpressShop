(function($){

//Функция для toggle text
$.fn.extend({
    toggleText: function(a, b){
        return this.text(this.text() == b ? a : b);
    }
});


if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
  $('.wpc-filters-scroll-container').slideUp(300);      
  $('.wpc-filter-set-widget-title').append('<div class="wpc-filter-toggle">Открыть</div>');
} else {
  $('.wpc-filter-set-widget-title').append('<div class="wpc-filter-toggle">Скрыть</div>');
}

$('.wpc-filter-toggle').click(function(){
  $('.wpc-filters-scroll-container').slideToggle(300);      
  $(".wpc-filter-toggle").toggleText('Открыть', 'Скрыть');
});

$('.up-sells h2').text('Сопутствующие товары');

//Устанавливаем в форму "Имя" и ID товара при клике по кнопке
$('.one-click__btn').on( 'click', function() {
  var productName = $(this).data('name');
  var productId = $(this).data('id');
  $('#f1 .form__subtitle').text(productName);
  $('#f1 input[name="productId"]').val(productId);
  $('#f1 input[name="productName"]').val(productName);
});

//Отключить ссылку на изображение - страница товара
$('.woocommerce-product-gallery__image a').on('click', function() {
  return false;
});

//WPBakery Page Builder - изображение со ссылкой на большое 
$('.section').magnificPopup({
  delegate: '.vc_single_image-wrapper',
  type: 'image',
  tLoading: 'Loading image #%curr%...',
  mainClass: 'mfp-img-mobile',
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
  },
  image: {
    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
    titleSrc: function(item) {
      return item.el.attr('title') + '<small>by Marsel Van Oosten</small>';
    }
  }
});


//Поиск
$('.h-search__wrap').on('click', '.fa-magnifying-glass', function() {
  $('.h-search__wrap form').submit();
});


//Маска для телеофона
$("input[type=tel]").inputmask("+7 (999) 999-99-99");


/**
* To top
*/
$('body').prepend('<a class="anchor" id="to_top"></a>');


// Появление и исчезновение to_top
$(function(f){
    var element = f('.to-top__link');
    f(window).scroll(function(){
        element['fade'+ (f(this).scrollTop() > 200 ? 'In': 'Out')](500);
    });
});


/*--------------------------------------------------------------
# Popup Form
--------------------------------------------------------------*/
jQuery('.callBack__link, a[href="#f1__wrap"], .callBack__wbp-button a, .one-click__btn, .woocommerce-loop-product__samples').magnificPopup({
  type:'inline',
  midClick: true,
  /* заданная цель
  items: {
    src: '#popup',
    type: 'inline'
  }
  */
});

jQuery('.woocommerce-loop-product__time').magnificPopup({
  type:'inline',
  midClick: true,
  //заданная цель
  items: {
    src: '#delivery-time-popup__mfp',
    type: 'inline'
  }
});

//Чтобы не создавать несколько одинаковых форм с разным заголовком
//меняем заголовок формы по умолчанию data-title='Рассчитать стоимость'
jQuery('.woocommerce-loop-product__samples, .callBack__link').on('click', function() {
  var title = $(this).data('title');
  $('#f1__wrap .form__title').text(title);
});


$('.wpb-gallery-row').magnificPopup({
  delegate: 'a',
  type: 'image',
  tLoading: 'Loading image #%curr%...',
  mainClass: 'mfp-img-mobile',
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
  },
  image: {
    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
    titleSrc: function(item) {
      return '<small>Альтаир</small>';
    }
  }
});

$('.wp-block-gallery').magnificPopup({
  delegate: 'a',
  type: 'image',
  tLoading: 'Loading image #%curr%...',
  mainClass: 'mfp-img-mobile',
  gallery: {
    enabled: true,
    navigateByImgClick: true,
    preload: [0,1] // Will preload 0 - before current, and 1 after the current image
  },
  image: {
    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
    titleSrc: function(item) {
      return '<small>Компания</small>';
    }
  }
});


/*--------------------------------------------------------------
# Ajax Form
--------------------------------------------------------------*/
$(".ajax input[name='phone']").on('click', function(event) {
  $(this).removeClass('error').focus();
});

$(".ajax input[name='phone']").keypress(function() {
  $(this).removeClass('error').focus();
});


//Изменяем текст на имя файла
$('.input-file').each(function() {
  var $input = $(this),
      $label = $input.next('.userfile__label'),
      labelVal = $label.html();

  $input.on('change', function(element) {
    var fileName = '';
    if (element.target.value) fileName = element.target.value.split('\\').pop();
    fileName ? $label.addClass('has-file').find('.userfile__text').html(fileName) : $label.removeClass('has-file').html(labelVal);
 });
});


//Отправка формы
$(".ajax").submit(function() {
  var form = $(this);
  var phone = $(this).find('input[name="phone"]');
  var message = $(this).find('.message');
  var btn = $(this).find('.btn');

  if ( phone.val() == "") {
    message.fadeIn(300).addClass('alert-danger').text('Введите Ваш телефон');
    phone.addClass('error').focus();
  } else {
    //отключаем кнопку
    btn.attr("disabled", true);
    phone.removeClass('error').focus();
    message.fadeIn(300).removeClass('alert-danger').addClass('alert-info').text( 'Отправляем...' );
    $.ajax({
      type: "POST",
      url: "/wp-content/themes/ip/mail.php",
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData:false,
      success: function ( response ) {
        var jsonData = JSON.parse(response);
        if (jsonData.success == "1") {
          message.fadeIn(300).removeClass('alert-danger alert-info').addClass('alert-success').text( jsonData.text );
          //включаем кнопку
          btn.removeAttr("disabled");
          //Очищаем форму и прячем сообщение, через 2 секунды
          setTimeout(function(){
            form[0].reset();
            message.hide();
          }, 2000);
        }
        else {
          message.fadeIn(300).removeClass('alert-danger alert-info').addClass('alert-danger').text( jsonData.text );
          //включаем кнопку
          btn.removeAttr("disabled");
        }
      }
    });//ajax
  }//if
return false;
});//submit

})(jQuery);
