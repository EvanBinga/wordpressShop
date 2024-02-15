<?php
global $wp;
$popup_current_url = home_url( $wp->request )
    /* <input type="hidden" name="url" value="<?php echo $_SERVER['HTTP_HOST']; ?>" > */
?>
<div id="f1__wrap" class="white-popup mfp-hide">

  <form id="f1" class="ajax form" action="javascript();">

    <div class="form__title" data-title="Заказать звонок">Заказать звонок</div>
    <div class="form__subtitle" style="text-align: center;"></div>

    <div class="form__item">
      <input type="text" name="name" placeholder="Имя">
    </div>

    <div class="form__item">
      <input id="f1__phone" type="tel" name="phone" placeholder="+7 (___) ___-__-__">
    </div>

    <div class='form__item'>
      <input type='text' name='text' placeholder='Сообщение'>
    </div>

    <div class="alert message hidden" style="display: none;" role="alert"></div>

    <input type="hidden" name="url" value="<?php echo $popup_current_url; ?>" >
      <input type="hidden" name="form_name" value="Заказать звонок">
    <input type="hidden" name="productName" value="">
    <input type="hidden" name="productId" value="">

    <div class="ip-order-form__item">
      <input type="checkbox" name="personal-data" checked="">
      <span class="personal-data__desc">Нажимая на кнопку, вы даете согласие на обработку <a href="/?p=136">своих персональных данных</a>.</span>
          </div>

    <div class="form__item" style="text-align: center;">
      <input class="btn btn-primary" type="submit" value="Отправить">
    </div>

  </form>

</div>
