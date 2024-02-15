<?php
/*
 *  Добавить в functions.php:
 *  wp_register_script( 'api-maps-yandex', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', array('jquery'), '', true );
 */

/**
 *  Настройки блока для вывода в админке
 */
add_action( 'vc_before_init', 'ip_yandex_map_wpb' );
function ip_yandex_map_wpb() {
  vc_map(
    array(
      "name" => __( "Яндекс карта", "ip" ),
      "base" => "ip_yandex_map",
      "params" => array(
        array(
          "type" => "textfield",
          "heading" => __( "id карты", "ip" ),
          "param_name" => "id",
          "value" => "yandex-map",
          "description" => __( "Введите уникальный идентификатор карты", "ip" )
        ),
        array(
          "type" => "dropdown",
          "heading" => __( "Масштаб", "ip" ),
          "param_name" => "zoom",
          "value" => array('16','8','9','10','11','12','13','14','15')
        )
      )
    )
  );
}

/**
 *  Шорткод
 */
add_shortcode( 'ip_yandex_map', 'ip_yandex_map_func' );
function ip_yandex_map_func( $atts ) {
  extract( shortcode_atts( array(
    'id' => 'yandex-map',
    'zoom' => '16',
    'class' => ''
  ), $atts ) );
  
  wp_enqueue_script( 'api-maps-yandex' );

  $coordinates = get_option( 'coordinates' );
  $coordinates_center = get_option( 'coordinates_center' );
  $company_address = get_option( 'company_address' );
  $company_name = get_bloginfo( 'name' );
  $preset = get_option( 'preset' );

  return "<div id='$id' class='$id'></div>
<script>
  jQuery(document).ready(function() {

  ymaps.ready(init);
  var myMap;

  function init(){
    myMap = new ymaps.Map('$id', {
        center: [$coordinates_center],
        zoom: $zoom,
        behaviors: [ 'multiTouch', 'drag' ],
        controls: ['zoomControl']
    });

    myPlacemark_1 = new ymaps.Placemark([$coordinates], {
      hintContent: '$company_address',
      balloonContent: '$company_address',
      iconContent: '{$company_name}'
      },
      { preset: $preset }
    );
    myMap.geoObjects.add(myPlacemark_1);

    function checkWidth() {
      var windowSize = jQuery(window).width();
      if (windowSize <= 1199) {
        myMap.behaviors.disable('drag');
        // console.log('Отключили перемещение карты при нажатой левой кнопке мыши либо одиночным касанием');

        myMap.behaviors.enable('multiTouch');
        // console.log('Включили масштабирование карты двойным касанием (например, пальцами на сенсорном экране)');
      } else if (windowSize >= 1200) {
          myMap.behaviors.enable('drag');
          // console.log('Включили перемещение карты при нажатой левой кнопке мыши либо одиночным касанием');
        }
    }//checkWidth

    // Execute on load
    checkWidth();
    // Bind event listener
    jQuery(window).resize(checkWidth);

  }//init

  });//ready
</script>
";
}

