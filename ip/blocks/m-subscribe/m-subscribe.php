<?php
/**
 *  Настройки формы в админке
 */
add_action( 'vc_before_init', 'add_m_subscribe' );
function add_m_subscribe() {
  vc_map(
    array(
      "name" => "Форма подписки",
      "base" => "m_subscribe",
      "params" => array()
    )
  );
}

/**
 *  Шорткод
 */

add_shortcode( 'm_subscribe', 'm_subscribe_func' );
function m_subscribe_func( $atts, $content = null ) {
 extract( shortcode_atts( array(
  'class' => '',
  'btn__text' => 'Отправить'
 ), $atts ) );

 $content = wpb_js_remove_wpautop($content, false);

 return "<form class='m-subscribe__form ajax'>
  <div class='m-subscribe__grid'>
    <div class='m-subscribe__input-wrap'>
      <input class='m-subscribe__input' type='email' name='email' placeholder='Ваша почта' required>
    </div>
    <div class='form__item' style='display: none;'>
      <input type='tel' name='phone' placeholder='Телефон' value='+79000000000'>
    </div>
    <div class='m-subscribe__btn-wrap'>
      <input type='submit'  class='m-subscribe__btn' value='Подписаться'>
    </div>
  </div>
  <div class='alert message hidden' style='display: none;' role='alert'></div>
  <div class='m-subscribe__policy'>Нажимая на кнопку, вы даете <a href='/privacy-policy' target='blank'>согласие на обработку своих персональных данных.</a></div>
</form>";
}
