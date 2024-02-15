<?php

add_action( 'vc_before_init', 'primaria_block_with_icon_admin' );
function primaria_block_with_icon_admin() {
  vc_map(
    array(
      "name" => __( "Иконка ip", "ip" ),
      "base" => "ip_icon",
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

add_shortcode( 'ip_icon', 'primaria_block_with_icon_func' );
function primaria_block_with_icon_func( $atts ) {
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

 if( !$subtitle == '') {
  $subtitle_html = "<div class='icon__subtitle'>{$subtitle}</div>";
 }

 if( !$title == '') {
  $title_html = "<div class='icon__title'>{$title}</div>";
 }

 return "<div class='icon'>
   <a href='{$href}'>
  <div class='icon__fa'>
    <div class='icon__inner'>
      <i class='{$type} {$icon}'></i>
    </div>
  </div>
 {$title_html}
 {$subtitle_html}
 </a>
</div>";

}


/*
 * Шаблон
 */
add_action( 'vc_load_default_templates_action','ip_onetwotheefor_template' );
function ip_onetwotheefor_template() {
  $data = array(); // Create new array
  $data['name'] = __( 'Блок с иконками - 1 2 3 4', 'ip' ); // Assign name for your custom template
  $data['weight'] = 1; // Weight of your template in the template list
  $data['custom_class'] = ''; // CSS class name
  $data['content']  = <<<CONTENT
[vc_row el_class="section"][vc_column][primaria_title title="Заголовок"][vc_row_inner][vc_column_inner width="1/4"][ip_icon icon="fa-1" type="fa-thin" title="Первый"][/vc_column_inner][vc_column_inner width="1/4"][ip_icon icon="fa-2" type="fa-thin" title="Второй"][/vc_column_inner][vc_column_inner width="1/4"][ip_icon icon="fa-3" type="fa-thin" title="Третий"][/vc_column_inner][vc_column_inner width="1/4"][ip_icon icon="fa-4" type="fa-thin" title="Четвёртый"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;

  vc_add_default_templates( $data );
}
