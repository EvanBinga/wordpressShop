<?php

add_action( 'wp_head', 'ipavel_meta', 1000 );
function ipavel_meta() {
  echo '<meta name="author" lang="ru" content="Создание сайтов Ишутин Павел | веб-мастер Ишутин Павел | Почта: ishutin-pavel@mail.ru | Сайт: https://ишутин.рф/" />'.PHP_EOL;
}

/*
 * Уведомление о заголовке
 */
      /* <p>Менять тут: <a href="/wp-admin/theme-editor.php?file=inc%2Fseo.php&theme=ip">/inc/seo.php</a> - тутже ставится код Яндекс Метрики</p> */
      /* <p>Дескрипшен и ключевые слова изменять на главной странице в произвольных полях снизу.</p> */
add_action( 'admin_notices', 'ip_admin_notice' );
function ip_admin_notice(){
  echo '
    <div id="message" class="notice notice-info is-dismissible">
      <p>Размеры используемых изображений ШхВ: 300х225 и 800х600</p>
      <p>Если не отключить генерацию дополнительных размеров изображений, то 11 тыс товаров умножить на 3 размера ...</p>
      <p>Размеры изображений для СЛАЙДЕРА ШхВ: 1920х400px</p>
    </div>';
}

/*
 * Убрать слово «Рубрика» на страницах рубрик
 */
add_filter( 'get_the_archive_title', 'artabr_remove_name_cat' );
function artabr_remove_name_cat( $title ){
  if ( is_category() ) {
    $title = single_cat_title( '', false );
  } elseif ( is_tag() ) {
    $title = single_tag_title( '', false );
  }
  return $title;
}

/**
 * Удалить пользователей из карты сайта
 */
function remove_author_category_pages_from_sitemap($provider, $name) {
  if ('users' === $name) {
      return false;
  }
  return $provider;
}
add_filter('wp_sitemaps_add_provider', 'remove_author_category_pages_from_sitemap', 10, 2);
