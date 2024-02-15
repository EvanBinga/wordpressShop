<?php
/**
 *  Настройки формы в админке
 */

add_action( 'vc_before_init', 'primaria_add_form' );
function primaria_add_form() {
  vc_map(
    array(
      "name" => __( "Форма", "primaria" ),
      "base" => "primaria_form",
      "params" => array(
        array(
          "type" => "textfield",
          "class" => "",
          "heading" => __( "Заголовок формы", "primaria" ),
          "param_name" => "title",
          "value" => "Заголовок формы",
          "description" => __( "Введите заголовок формы", "primaria" )
        ),
        array(
          "type" => "textfield",
          "class" => "",
          "heading" => __( "Текст на кнопке", "primaria" ),
          "param_name" => "btn__text",
          "value" => "Отправить",
          "description" => __( "Введите текс для кнопки", "primaria" )
        )
      )
    )
  );
}

/**
 *  Шорткод
 */

add_shortcode( 'primaria_form', 'primaria_form_func' );
function primaria_form_func( $atts ) {
 extract( shortcode_atts( array(
  'title' => 'Заголовок',
  'btn__text' => 'Отправить'
 ), $atts ) );

 return "<form class='form ajax' action='javascript();'>
  <h2 class='form__title'>{$title}</h2>
  <div class='form__item'>
    <input type='text' name='name' placeholder='Имя'>
  </div>
  <div class='form__item'>
    <input type='tel' name='phone' placeholder='Телефон'>
  </div>
  <div class='form__item'>
    <textarea rows='4' name='text' placeholder='Сообщение'></textarea>
  </div>
  <div class='form__item'>
    <label class='privacy-policy'><input type='checkbox' checked> я соглашаюсь с <a href='/privacy-policy' target='_blank'>политикой конфиденциальности</a></label>
  </div>
  <div class='alert message hidden' style='display: none;' role='alert'></div>
  <div class='form__item' style='text-align: center;'>
    <input class='btn btn-primary' type='submit' value='{$btn__text}'>
  </div>
</form>";
}
