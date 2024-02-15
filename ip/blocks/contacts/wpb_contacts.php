<?php
add_action( 'vc_load_default_templates_action','ip_contacts_template' );

function ip_contacts_template() {
  $data = array(); // Create new array
  $data['name'] = __( 'Контакты', 'ip' ); // Assign name for your custom template
  $data['weight'] = 0; // Weight of your template in the template list
  $data['custom_class'] = 'custom_template_for_vc_custom_template'; // CSS class name
  $data['content']  = <<<CONTENT
[vc_row el_class="section"][vc_column width="1/4"][ip_icon icon="fa-phone" subtitle="+7 900 111 22 33"][/vc_column][vc_column width="1/4"][ip_icon icon="fa-mobile-button" subtitle="+7 903 253 45 66"][/vc_column][vc_column width="1/4"][ip_icon icon="fa-at" subtitle="info@site.ru"][/vc_column][vc_column width="1/4"][ip_icon icon="fa-location-check" subtitle="г. Москва"][/vc_column][/vc_row]
CONTENT;

  vc_add_default_templates( $data );
}

