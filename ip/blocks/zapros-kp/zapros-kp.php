<?php
/**
 *  Настройки формы в админке
 */

add_action( 'vc_before_init', 'ip_zapros_kp_add_form' );
function ip_zapros_kp_add_form() {
  vc_map(
    array(
      "name" => __( "Заказ КП", "ip" ),
      "base" => "ip_zapros_kp_form",
      "params" => array()
    )
  );
}

/**
 *  Шорткод
 */

add_shortcode( 'ip_zapros_kp_form', 'ip_zapros_kp_form_func' );
function ip_zapros_kp_form_func( $atts ) {
 extract( shortcode_atts( array(
  'title' => 'Заказ образцов',
  'btn__text' => 'Отправить'
 ), $atts ) );

 return "<form class='form form_zapros-kp ajax' enctype='multipart/form-data' action='javascript();'>
  <div class='zapros-kp__grid'>
    <div class='form__item'>
      <input type='text' name='name' placeholder='Ваше имя'>
    </div>
    <div class='form__item'>
      <input type='text' name='company' placeholder='Организация'>
    </div>
    <div class='form__item'>
      <input type='tel' name='phone' placeholder='Телефон'>
    </div>
    <div class='form__item'>
      <input type='email' name='email' placeholder='Ваша почта'>
    </div>
  </div>

  <div class='zapros-kp__grid'>
    <div class='form__item'>
      <input id='userfile' class='userfile input-file' type='file' accept='.xlsx, .docx, .xslx, .jpg, .jpeg, .png, .pdf' name='userfile' />
      <label for='userfile' class='userfile__label'>
        <i class='fa fa-cloud-upload'></i>
        <span class='userfile__text'>Прикрепить файл</span>
      </label>
    </div>
    <div class='form__item'>
      <label class='privacy-policy'><input type='checkbox' checked> я соглашаюсь с <a href='/privacy-policy' target='_blank'>политикой конфиденциальности</a></label>
    </div>
    <div class='form__item'></div>
    <div class='form__item' style='text-align: center;'>
      <input class='btn btn-primary' type='submit' value='{$btn__text}'>
    </div>
  </div>
  <div class='alert message hidden' style='display: none;' role='alert'></div>

</form>";
}
