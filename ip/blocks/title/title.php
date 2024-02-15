<?php

/**
 *  Настройки заголовка в админке
 */

add_action( 'vc_before_init', 'primaria_add_title' );
function primaria_add_title() {
  vc_map(
    array(
      "name" => __( "Заголовок", "ip" ),
      "base" => "primaria_title",
      "params" => array(
        array(
          "type" => "textfield",
          "class" => "",
          "heading" => __( "Заголовок", "ip" ),
          "admin_label" => true,
          "param_name" => "title",
          "value" => "",
          "description" => __( "Введите заголовок", "ip" )
        ),
        array(
          "type" => "textfield",
          "class" => "",
          "heading" => __( "Класс", "ip" ),
          "param_name" => "class",
          "value" => "",
          "description" => __( "Введите произвольный класс", "ip" )
        )
      )
    )
  );
}

/**
 *  Шорткод
 */

add_shortcode( 'primaria_title', 'primaria_title_func' );
function primaria_title_func( $atts ) {
 extract( shortcode_atts( array(
  'title' => 'Заголовок',
  'class' => ''
 ), $atts ) );

 /* return "<h2 class='title {$class}'><span class='title__text'>{$title}</span><span class='title__line'></span></h2>"; */
 return "<h2 class='title {$class}'><span class='title__text'>{$title}</span></h2>";
}
