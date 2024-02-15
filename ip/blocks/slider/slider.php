<?php
/**
 *  Создание элемента плагин WPBakery Page Builder
 */
add_action( 'vc_before_init', 'ip_add_slider' );
function ip_add_slider() {
  vc_map( array(
    "name" => "IP Slider",
    "base" => "ip_slider",
    "as_parent" => array('only' => 'ip_slide'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "is_container" => true,
    "params" => array(
      array(
        "type" => "textfield",
        "heading" => "Класс",
        "param_name" => "slider_class",
        "description" => "Класс слайдера"
      )
    ),
    "js_view" => 'VcColumnView'
  ) );

  vc_map( array(
    "name" => "IP Slide",
    "base" => "ip_slide",
    "content_element" => true,
    "as_child" => array('only' => 'ip_slider'),
    "params" => array(
      array(
        "type" => "textfield",
        "heading" => "Идентификатор слайда",
        "param_name" => "id",
        "description" => "Укажите номер или идентификатор слайда"
      ),
      array(
        "type" => "vc_link",
        "heading" => "Ссылка",
        "param_name" => "link",
        "description" => "Выберите ссылку слайда"
      ),
      array(
        "type" => "attach_image",
        "heading" => "Изображение слайда",
        "param_name" => "image_id",
        "description" => "Выберите изображение слайда"
      ),
      array(
        "type" => "textfield",
        "heading" => "Заголовок слайда",
        "param_name" => "title",
        "admin_label" => true,
        "value" => "",
        "description" => "Введите заголовок слайда"
      ),
      array(
        "type" => "textarea_html",
        "holder" => "div",
        "class" => "",
        "heading" => "Описание",
        "param_name" => "content",
        "value" => "",
        "description" => "Введите описание"
      )
    )
  ) );
}

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_IP_Slider extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_IP_Slide extends WPBakeryShortCode {
  }
}



/**
 *  Слайдер
 */
add_shortcode( 'ip_slider', 'ip_slider_func' );
function ip_slider_func( $atts, $content = null ) {
 extract( shortcode_atts( array(
  'slider_class' => '',
 ), $atts ) );

 $content = wpb_js_remove_wpautop($content, true);

 return "<div class='ip-slider {$slider_class}'>{$content}</div>

<script>
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
</script>

";
}


/**
 *  Слайд
 */
add_shortcode( 'ip_slide', 'ip_slide_func' );
function ip_slide_func( $atts,  $content = null ) {
  extract( shortcode_atts( array(
  'image_id' => '',
  'id' => '',
  'title' => '',
  'link' => '',
  ), $atts ) );

  wp_enqueue_script( 'slick' );

  $link = vc_build_link( $link );
  $link_href = $link['url'];
  /* $link_href = print_r($link); */
  $image_url = wp_get_attachment_image_src($image_id, 'full');
  $image_url = $image_url[0];
  /*
   * true - закрыть тег <p>
   * fix unclosed/unwanted paragraph tags in $content
   * https://kb.wpbakery.com/docs/inner-api/vc_map/
      <img src='{$image_url}'>
    <a href='{$link_href}' class='ip-slide__link'>
    </a>
  <div class='ip-slide' style='background-image: url({$image_url});'>
      <div class='ip-slide__text'>
        <div class='ip-slide__inner'>
          <div class='ip-slide__title'>{$title}</div>
          <div class='ip-slide__desc'>{$content}</div>
        </div>
      </div>
  </div>
   */
  $content = wpb_js_remove_wpautop($content, false);

  if($id) {
    $id = 'ip-slide_' . $id;
  }

  return "
  <div class='ip-slide {$id}' style='background-image: url({$image_url});'>
    <div class='ip-slide__inner'>
      <div class='container'>
        <div class='ip-slide__title'>{$title}</div>
        <div class='ip-slide__grid'>
          <div class='ip-slide__desc'>{$content}</div>
          <div class='ip-slide__btn'>
            <a class='btn btn-primary' href='{$link['url']}' title='{$link['title']}'>Подробнее</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  ";
}
