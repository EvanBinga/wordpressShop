<?php

add_action( 'vc_before_init', 'ip_m_why_admin' );
function ip_m_why_admin() {
  vc_map(
    array(
      "name" => __( "Иконка m-why", "ip" ),
      "base" => "m_why",
      "params" => array(
        array(
          "type" => "textfield",
          "class" => "",
          "heading" => __( "Иконка", "ip" ),
          "param_name" => "icon",
          "value" => "",
          "description" => __( "Иконка fontawesome", "ip" )
        ),
        array(
          "type" => "dropdown",
          "class" => "",
          "heading" => __( "Тип", "ip" ),
          "param_name" => "type",
          "value" => array('fa-light', 'fa-solid', 'fa-regular', 'fa-thin', 'fa-doutone'),
          "description" => __( "Тип иконки fontawesome", "ip" )
        ),
        array(
          "type" => "textfield",
          "class" => "",
          "heading" => __( "Заголовок", "ip" ),
          "param_name" => "title",
          "admin_label" => true,
          "value" => "",
          "description" => __( "Введите заголовок", "ip" )
        ),
        array(
          "type" => "textfield",
          "class" => "",
          "heading" => __( "Подзаголовок", "ip" ),
          "param_name" => "subtitle",
          "value" => "",
          "description" => __( "Подзаголовок", "ip" )
        ),
        array(
          "type" => "vc_link",
          "class" => "",
          "heading" => __( "Ссылка", "ip" ),
          "param_name" => "href",
          "description" => __( "Ссылка", "ip" )
        )
      )
    )
  );
}

add_shortcode( 'm_why', 'm_why_func' );
function m_why_func( $atts ) {
 extract( shortcode_atts( array(
  'title' => '',
  'icon' => 'fa-angles-down',
  'type' => 'fa-light',
  'subtitle' => '',
  'href' => ''
 ), $atts ) );

 $href = vc_build_link( $href );
 $href = $href['url'];
 /* var_dump($href); */

 return "
<div class='m-why__item {$class}'>
  <a href='{$href}'>
    <div class='m-why_img'><i class='{$type} {$icon}'></i></div>
    <div class='m-why_txt'>{$title_html} <br>{$subtitle_html}</div>
  </a>
</div>";

}
