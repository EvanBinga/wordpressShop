<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page">
  <header id="masthead" class="site-header">
    <div class="container">
      <div class="header__inner">

        <div class="h-item  h-item_1">
          <div class="site-branding">
          <?php
            if( has_custom_logo() ) {
              the_custom_logo();
              echo "<span class='logo__desc'>" . get_option('blogdescription') . "</span>";
            } else { ?>
              <a href="/" class="logo__link">
                <span class="logo__img-wrap">
                  <img src="/wp-content/themes/ip/blocks/logo/logo.png" class="custom-logo" alt="<?php echo get_option('blogname'); ?>">
                </span>
                <span class="logo__separator"></span>
                <span class="logo__text">
                  <?php /*
                  <i class="fa-thin fa-tree"></i>
                  <img src="/wp-content/themes/ip/blocks/logo/logo.png" class="custom-logo" alt="<?php echo get_option('blogname'); ?>">
                  <span class="logo__title">&laquo;<?php echo get_option('blogname'); ?>&raquo;</span>
                  */ ?>
                  <span class="logo__title"><?php echo get_option('blogname'); ?></span>
                  <span class="logo__desc"><?php echo get_option('blogdescription'); ?></span>
                </span>
              </a>
          <?php } ?>
          </div><!-- .site-branding -->
        </div><!-- .h-item -->
        

        <div class="h-item  h-item_2">
          <?php if( get_option('phone_primary') ) : ?>
            <div class="h-phone">
              <a class="h-phone__link" href="tel:<?php echo str_replace(" ", '', get_option('phone_primary')); ; ?>"><?php echo get_option('phone_primary'); ?></a>
            </div>
          <?php endif; ?>
          <?php if( get_option('phone_secondary') ) : ?>
            <div class="h-phone">
              <a class="h-phone__link" href="tel:<?php echo str_replace(" ", '', get_option('phone_secondary')); ; ?>"><?php echo get_option('phone_secondary'); ?></a>
            </div>
          <?php endif; ?>
          <?php if( get_option('work_time') ) : ?>
            <div class="h-time__wrap">
              <a class="h-time" href="#f1__wrap"><?php echo get_option('work_time'); ?></a>
            </div>
          <?php endif; ?>
          <?php if( get_option('admin_email') ) : ?>
            <div class="h-email__wrap">
              <a class="h-email" href="mailto:<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a>
            </div>
          <?php endif; ?>
        </div>
        <div class="h-item  h-item_3">
          <div class="h-search__wrap">

            <form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <div class="wc-block-product-search__fields">
                <input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>" class="wc-block-product-search__field" placeholder="<?php echo esc_attr__( 'Search products&hellip;', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                <input type="hidden" name="post_type" value="product">
                <i class="fa-light fa-magnifying-glass"></i>
              </div>
            </form>


          </div>
        </div>
        <?php /*
        <div class="h-item  h-item_2">
          <?php if( get_option('admin_email') ) : ?>
            <div class="h-email__wrap">
              <a class="h-email" href="mailto:<?php echo get_option('admin_email'); ?>"><?php echo get_option('admin_email'); ?></a>
            </div>
          <?php endif; ?>
          <?php if( get_option('company_address') ) : ?>
            <div class="h-address__wrap">
              <a class="h-address" href="/#yandex-map"><?php echo get_option('company_address'); ?></a>
            </div>
          <?php endif; ?>

          <?php if( get_option('work_time') ) : ?>
            <div class="h-time__wrap">
              <a class="h-time" href="#f1__wrap"><?php echo get_option('work_time'); ?></a>
            </div>
          <?php endif; ?>

          <div class="h-search__wrap">
            <form role="search" method="get" action="/">
              <div class="wc-block-product-search__fields">
                <i class="fa-light fa-magnifying-glass"></i>
                <input type="search" id="wc-block-search__input-1" class="wc-block-product-search__field" placeholder="Поиск ..." name="s">
                <input type="hidden" name="post_type" value="product">
              </div>
            </form>
          </div>
        </div><!-- .h-item -->

        <div class="h-item h-item_3">
          <?php if( get_option('phone_primary') ) : ?>
            <div class="h-phone">
              <a class="h-phone__link" href="tel:<?php echo str_replace(" ", '', get_option('phone_primary')); ; ?>"><?php echo get_option('phone_primary'); ?></a>
            </div>
          <?php endif; ?>
          <?php if( get_option('phone_secondary') ) : ?>
            <div class="h-phone">
              <a class="h-phone__link" href="tel:<?php echo str_replace(" ", '', get_option('phone_secondary')); ; ?>"><?php echo get_option('phone_secondary'); ?></a>
            </div>
          <?php endif; ?>
          <div class="h-soc">
            <?php if( get_option('whatsapp') ) : ?>
              <a class="h-whatsapp" target="_blank" href="https://api.whatsapp.com/send?phone=<?php echo get_option('whatsapp'); ?>">Whatsapp</a>
            <?php endif; ?>

            <?php if( get_option('telegram') ) : ?>
              <a class="h-telegram" target="_blank" href="https://telegram.me/<?php echo get_option('telegram'); ?>">Telegram</a>
            <?php endif; ?>


            <?php if( get_option('viber') ) : ?>
              <a class="h-viber" target="_blank" href="viber://chat?number=<?php echo get_option('viber'); ?>">Viber</a>
            <?php endif; ?>
            <?php if( get_option('instagram') ) : ?>
              <a class="h-instagram" target="_blank" href="<?php echo get_option('instagram'); ?>">Instagram</a>
            <?php endif; ?>

            <?php if( get_option('youtube') ) : ?>
            <a class="h-youtube" target="_blank" href="<?php echo get_option('youtube'); ?>">Youtube</a>
            <?php endif; ?>

            <?php if( get_option('vk') ) : ?>
            <a class="h-vk" target="_blank" href="<?php echo get_option('vk'); ?>">Вконтакте</a>
            <?php endif; ?>

            <?php if( get_option('ok') ) : ?>
            <a class="h-ok" target="_blank" href="<?php echo get_option('ok'); ?>">Одноклассники</a>
            <?php endif; ?>
          </div>
        </div>
        <div class="h-item h-item_4">
          <div class="callBack">
            <a href="#f1__wrap" class="btn callBack__link">Оставить заявку</a>
          </div>
            <?php
              if ( function_exists( 'ip_woocommerce_header_cart' ) ) {
                ip_woocommerce_header_cart();
              }
           ?>
        </div>

              <a class="h-account" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','ip'); ?>"><?php _e('My Account','ip'); ?></a>
       */?>

        <div class="h-item h-item_4">
          <div class="callBack">
            <a href="#f1__wrap" class="btn callBack__link" data-title="Заказать звонок">Заказать звонок</a>
          </div>
<?php /*
          <div class="h-woocommerce">
            <div class="h-account__wrap">
              <a class="h-account" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>">Аккаунт</a>
            </div>
            <?php
              if ( function_exists( 'ip_woocommerce_header_cart' ) ) {
                ip_woocommerce_header_cart();
              }
            ?>
          </div>
 */ ?>
        </div>

    </div><!-- .header__inner -->
  </div><!-- .container -->

    <div class="main-navigation__wrap">
      <div class="container">
        <nav id="site-navigation" class="main-navigation">
          <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><svg viewBox="0 0 24 24" preserveAspectRatio="xMidYMid meet" focusable="false"><g><path d="M21,6H3V5h18V6z M21,11H3v1h18V11z M21,17H3v1h18V17z"></path></g></svg><?php esc_html_e( 'Меню', 'ip' ); ?></button>
          <?php
          wp_nav_menu(
            array(
              'theme_location' => 'menu-1',
              'menu_id'        => 'primary-menu',
            )
          );
          ?>
        </nav><!-- #site-navigation -->
      </div>
    </div>
  </header><!-- #masthead -->

<?php
/*
 * Слайдер категории товаров
 */
/*
$term = get_queried_object();
$images = get_field('cat_gallery', $term);
if( $images ): ?>
  <div id="ip-slider" class="ip-slider">
    <?php foreach( $images as $image ): ?>
    <div class='ip-slide' style='background-image: url(<?php echo $image['url']; ?>);'>
      <div class='ip-slide__inner'>
        <div class='container'>
          <div class='ip-slide__title'><?php echo $image['title']; ?></div>
          <div class='ip-slide__desc'><?php echo $image['caption']; ?></div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
 endif;
 */
?>

<?php
/*
 * Баннер категории товаров
 */
$term = get_queried_object();
$category_banner = get_field('category_banner', $term);
/* $category_banner_link = get_field('category_banner_link', $term); */
if( $category_banner ): ?>
  <div id="category_banner" class="category-banner">
    <a href="#f1__wrap" class="category-banner__link callBack__link" data-title="Запрос предложения">
      <img src="<?php echo $category_banner['url']; ?>" alt="<?php echo $category_banner['title']; ?>"  class="category-banner__link">
    </a>
  </div>
<?php endif; ?>

<?php
  if ( function_exists( 'ip_woocommerce_header_cart' ) ) {
    echo "<div class=\"container\">";
    woocommerce_breadcrumb();
    echo "</div>";
  }
?>
