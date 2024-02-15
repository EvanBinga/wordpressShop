<?php

add_action( 'vc_before_init', 'ip_icon_left_admin' );
function ip_icon_left_admin() {
  vc_map(
    array(
      "name" => __( "Блок с иконкой с лева", "ip" ),
      "base" => "ip_icon_left",
      "params" => array(
        array(
          "type" => "attach_image",
          "heading" => __( "Изображение", "ip" ),
          "param_name" => "icon_id",
          "description" => __( "При выборе изображения иконку выбирать не нужно", "ip" )
        ),
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
          "type" => "textarea_html",
          "holder" => "div",
          "class" => "",
          "heading" => __( "Содержимое", "ip" ),
          "param_name" => "content",
          "description" => __( "Введите описание", "ip" )
        )
      )
    )
  );
}



add_shortcode( 'ip_icon_left', 'ip_icon_left_func' );
function ip_icon_left_func( $atts, $content = null ) {
 extract( shortcode_atts( array(
  'icon_id' => '',
  'icon' => 'fa-address-book',
  'type' => 'fa-light',
  'title' => '',
 ), $atts ) );

// print_r($atts);

$content = wpb_js_remove_wpautop($content, true); // fix unclosed/unwanted paragraph tags in $content 

$image_url = wp_get_attachment_image_src($icon_id, 'full');
$image_url = $image_url[0];


if( isset($atts['icon_id']) ) {
  $icon = "<div class='icon-left__icon-wrap'><img class='icon-left__icon' src='{$image_url}'></div>";
} else {
  $icon = "<div class='icon-left__fa'><div class='icon-left__inner'><i class='{$type} {$icon}'></i></div></div>";
}

if( !$title == '') {
$title_html = "<div class='icon-left__title'>{$title}</div>";
}

if( !$content == '') {
$content_html = "<div class='icon-left__content'>{$content}</div>";
}

return "
<div class='icon-left'>
  {$icon}
  <div class='icon-left__text'>
    {$title_html}
    {$content_html}
  </div>
</div>";
}
