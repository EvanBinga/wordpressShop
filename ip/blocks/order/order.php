<?php /*
          <h2 class='ip-order__title'>Оставить заявку</h2>
          <div class="ip-order__subtitle">Заполните форму обратной связи, наш специалист свяжется с вами в ближайшее рабочее время</div>
 */ ?>
<div id='ip-order' class='ip-order ip-order_theme_dark'>

  <div class="container">

    <div class="ip-order__inner">

        <?php if( is_page('reviews') ) {  ?>
          <h2 class='ip-order__title'>Оставить отзыв</h2>
        <?php  } elseif( is_page(12) ) { ?>
          <h2 class='ip-order__title'>Заказать бесплатные образцы</h2>
        <?php  } else { ?>
          <h2 class='ip-order__title'>Задать вопрос</h2>
        <?php } ?>

        <?php if( !is_page('reviews') ) {  ?>
          <div class="ip-order__subtitle">Заполните форму обратной связи и мы свяжемся с вами в ближайшее время</div>
        <?php  } else { ?>
          <div class="ip-order__subtitle">Спасибо за обращение в нашу компанию! Оставьте Ваш отзыв, это поможет нам и далее предоставлять профессиональные услуги и поможет потенциальным покупателям в принятии уверенных решений.</div>
        <?php } ?>

        <form action='javascript();' class='ajax ip-order-form' enctype="multipart/form-data">

          <div class='ip-order-form__item'>
            <input type='text' name='name' placeholder='Ваше имя'>
          </div>

          <div class='ip-order-form__item'>
            <input type='tel' name='phone' placeholder='Контактный телефон*' required>
          </div>

        <?php if( false ) {  ?>
          <div class='ip-order-form__item'>
            <input id="userfile" class="userfile input-file" type="file" accept=".jpg, .jpeg, .png, .pdf" name="userfile" />
            <label for="userfile" class="userfile__label">
              <i class="fa fa-cloud-upload"></i>
              <span class="userfile__text">Загрузить чертёж</span>
            </label>
          </div>
        <?php } ?>

        <?php if( is_page('reviews') ) {  ?>
          <div class='ip-order-form__item'>
            <textarea rows='5' name='text' placeholder='Отзыв ...'></textarea>
          </div>
        <?php  } else { ?>
          <div class='ip-order-form__item'>
            <textarea rows='5' name='text' placeholder='Сообщение ...'></textarea>
          </div>
        <?php } ?>

          <div class='alert message hidden' style='display: none;' role='alert'></div>

          <input type="hidden" name="url" value="<?php echo $_SERVER['HTTP_HOST']; ?>" >

          <div class='ip-order-form__item'>
            <input type="checkbox" name="personal-data" checked>
            <span class="personal-data__desc">Нажимая на кнопку, вы даете согласие на обработку <a href="/?p=136" class="link-light">своих персональных данных</a>.</span>
          </div>

          <div class='ip-order-form__item ip-order-form__btn-wrap'>
            <input class='btn btn-primary ip-order-form__submit' type='submit' value='Отправить'>
          </div>

        </form>

    </div><!-- .order__inner -->

  </div><!-- .container -->

</div><!-- .order -->
