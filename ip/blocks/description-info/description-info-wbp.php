<?php

/**
 *  Настройки блока для вывода в админке
 */
add_action( 'vc_before_init', 'description_info_wpb' );
function description_info_wpb() {
  vc_map(
    array(
      "name" => __( "Преимущества", "ip" ),
      "base" => "description_info",
      "params" => array(
      )
    )
  );
}

/**
 *  Шорткод
 */
add_shortcode( 'description_info', 'description_info_func' );
function description_info_func( $atts ) {
  ob_start();
  require "description-info.php";
  return ob_get_clean();
}

/*
 * Шаблон
 */
add_action( 'vc_load_default_templates_action','ip_description_info_template' );
function ip_description_info_template() {
  $data = array(); // Create new array
  $data['name'] = __( 'Преимущества v2', 'ip' ); // Assign name for your custom template
  $data['weight'] = 1; // Weight of your template in the template list
  $data['custom_class'] = ''; // CSS class name
  $data['content']  = <<<CONTENT
[vc_row full_width="stretch_row" el_class="description-info"][vc_column][description_info][/vc_column][/vc_row]
CONTENT;

  vc_add_default_templates( $data );
}
