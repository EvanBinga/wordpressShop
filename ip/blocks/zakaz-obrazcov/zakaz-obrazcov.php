<?php
/**
 *  Настройки формы в админке
 */

add_action( 'vc_before_init', 'ip_zakaz_obrazcov_add_form' );
function ip_zakaz_obrazcov_add_form() {
  vc_map(
    array(
      "name" => __( "Заказ образцов", "ip" ),
      "base" => "ip_zakaz_obrazcov_form",
      "params" => array()
    )
  );
}

/**
 *  Шорткод
 */

add_shortcode( 'ip_zakaz_obrazcov_form', 'ip_zakaz_obrazcov_form_func' );
function ip_zakaz_obrazcov_form_func( $atts ) {
 extract( shortcode_atts( array(
  'title' => 'Заказ образцов',
  'btn__text' => 'Отправить'
 ), $atts ) );

 return "<form class='form form_zakaz-obrazcov ajax' action='javascript();'>

  <div class='zakaz-obrazcov__grid'>
    <div class='form__item'>
      <input type='text' name='name' placeholder='Ваше имя'>
    </div>
    <div class='form__item'>
      <input type='text' name='company' placeholder='Название организации'>
    </div>
    <div class='form__item'>
      <input type='tel' name='phone' placeholder='Телефон'>
    </div>
    <div class='form__item'>
      <input type='text' name='text' placeholder='Интересуемая продукция'>
    </div>
  </div>

  <div class='zakaz-obrazcov__grid'>
    <div class='form__item'>
      <input type='text' name='kolichestvo' placeholder='Объём потребления компонентов'>
    </div>
    <div class='form__item form__btn-wrap'>
      <input class='btn btn-primary' type='submit' value='{$btn__text}'>
    </div>
  </div>
  <div class='form__item'>
    <label class='privacy-policy'><input type='checkbox' checked> я соглашаюсь с <a href='/privacy-policy' target='_blank'>политикой конфиденциальности</a></label>
  </div>
  <div class='alert message hidden' style='display: none;' role='alert'></div>
</form>";
}
