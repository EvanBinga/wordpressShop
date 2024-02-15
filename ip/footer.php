<?php
/**
 * Popup
 */
require get_template_directory() . '/' . 'blocks/popup-form/popup-form.php';
require get_template_directory() . '/' . 'blocks/delivery-time/delivery-time-popup.php';
/* require get_template_directory() . '/' . 'blocks/one-click/one-click.php'; */

/* require get_template_directory() . '/' . 'blocks/order/order.php'; */

?>
<!-- tut -->
  <a class="to-top__link" href="#to_top"><i class="fa-thin fa-angles-up"></i></a>

<?php /*
  <footer id="colophon" class="site-footer">
    <div class="f-inner">
      <div class="container">
        <div class="site-info">
          <div><?php echo get_option('blogname'); ?> - <?php echo get_option('blogdescription'); ?></div>
            <?php if( get_option('company_address') ) : ?>
              <div><?php echo get_option('company_address'); ?></div>
            <?php endif; ?>
            <?php if( get_option('phone_primary') ) : ?>
              <div class="f-phone">
                <a class="link-light" href="tel:<?php echo str_replace(" ", '', get_option('phone_primary')); ; ?>"><?php echo get_option('phone_primary'); ?></a>
                <a class="link-light" href="mailto:<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a>
              </div>
            <?php endif; ?>
            <div class="f-policy"><a class="link-light" href="/privacy-policy/"><?php _e('Политика конфиденциальности'); ?></a></div>
            <div class="f-date">© 2021-<?php echo date('Y'); ?></div>
        </div><!-- .site-info -->
      </div><!-- .container -->
    </div><!-- .f-inner -->
  </footer><!-- #colophon -->
*/ ?>

  <footer id="colophon" class="site-footer">

    <div class="container">
      <div class="f-grid">

        <div class="col-sm-6 col-md-3">
          <h3 class="footer__title">Информация</h3>
          <?php
          wp_nav_menu( [
            'theme_location'  => 'footer-1',
            'container_class' => 'f-menu__wrap',
            'menu_class'      => 'f-menu',
            'menu'            => '',
          ] );
          ?>
        </div><!-- .col -->

        <div class="col-sm-6 col-md-3">
          <h3 class="footer__title">О компании</h3>
          <?php
          wp_nav_menu( [
            'theme_location'  => 'footer-2',
            'container_class' => 'f-menu__wrap',
            'menu_class'      => 'f-menu',
            'menu'            => '',
          ] );
          ?>
          <div class="qr__wrap">
            <img class="qr" src="/wp-content/uploads/qr.png" alt="О компании">
          </div>
        </div><!-- .col -->

        <div class="col-sm-6 col-md-3">
          <h3 class="footer__title">Контакты1</h3>
          <div class="f-contacts">
            <p class="footer__phone">Телефон:<br><span class="f-contacts__val"><?php echo get_option('phone_primary'); ?></span></p>
              <?php if ( get_option('phone_secondary') != '' ) : ?>
            <p class="footer__phone"><?php echo get_option('phone_secondary'); ?></p>
              <?php endif; ?>
            <p class="footer__address">Адрес:<span class="f-contacts__val"><?php echo get_option('company_address'); ?></span></p>
            <p class="footer__email">Почта:<span class="f-contacts__val"><?php echo get_option('admin_email'); ?></span></p>
            <p>ИНН 7814618624</p>
            <p>ОГРН 1147847268282</p>
          </div>
        </div><!-- .col -->

        <div class="col-sm-6 col-md-3">
          <h3 class="footer__title footer__title_large">Остались вопросы?</h3>
          <div class="f-callBack">
            <a href="#f1__wrap" class="btn btn-primary callBack__link" data-title="Задать вопрос"><i class="fal fa-comment"></i> Задать вопрос</a>
          </div>
          <div class="f-social">
            <div class="f-social__item">
              <a class="f-social__btn f-social__btn_vk" href="https://vk.com/" target="_blank"><i class="fab fa-vk"></i></a>
            </div>
            <div class="f-social__item">
              <a class="f-social__btn f-social__btn_instagram" href="https://instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="f-social__item">
              <a class="f-social__btn f-social__btn_facebook" href="https://facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
            </div>
          </div>
          <div class="site-info">
            <?php bloginfo('name'); ?>
            <div>&copy; <span class="copyright">Все права защищены</span></div>
          </div><!-- .site-info -->
        </div><!-- .col -->

      </div><!-- .row -->
    </div><!-- .container -->

  </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<?php
/*
 * Выпадающее меню при наведении только на десктопах
 */
if( !wp_is_mobile() ) { ?>
<script>
jQuery('ul.nav li.dropdown').hover(function() {
  jQuery('.dropdown-menu', this).fadeIn();
}, function() {
  jQuery('.dropdown-menu', this).fadeOut('fast');
});
</script>
<?php } ?>
</div><!-- #page -->
<?php wp_footer(); ?>

<?require get_template_directory() . '/' . 'sch.php';?>
<script>
    alert('ssss');
</script>


</body>
</html>
