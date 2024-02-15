<?php
/*
 * Страница "Каталога" и "Категории"
 */

/*
 * Перемещение сайтбара
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
add_action('woocommerce_after_main_content', 'woocommerce_get_sidebar', 20, 0 );

/*
 * Удаление инфорации о сортировке
 */
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );



//Удалить кнопку "В корзину"
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

//Удалить цену товара
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);

// Переместить описание категории вниз
remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
add_action( 'woocommerce_after_main_content', 'woocommerce_taxonomy_archive_description', 5 );
add_action( 'woocommerce_after_main_content', 'woocommerce_product_archive_description', 5 );

/*
 * Добавить HTML теги в описании категорий товаров в WooCommerce
 */
foreach ( array( 'pre_term_description' ) as $filter ) {
  remove_filter( $filter, 'wp_filter_kses' );
}
foreach ( array( 'term_description' ) as $filter ) {
  remove_filter( $filter, 'wp_kses_data' );
}


//Вывод короткого описания товара в категории
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 15 );


//Оборачиваем заголовок и описание
add_action( 'woocommerce_before_shop_loop_item_title', function(){
  echo "<div class='woocommerce_shop_loop__desc_wrap'>";
}, 20 );
add_action( 'woocommerce_after_shop_loop_item', function(){
  //Выводим произвольное поле
  if( get_field('minimalorder') ) {
      echo "<p class='minimalorder'>от " . get_field('minimalorder') . " шт.</p>";
  } else {
      echo "<p class='minimalorder'>от 1 шт.</p>";
  }
  echo "</div>";
}, 3 );


//Оборачиваем кнопки
add_action( 'woocommerce_after_shop_loop_item', function() {
  echo "<div class='woocommerce_shop_loop__buttons'>";
}, 7 );
add_action( 'woocommerce_after_shop_loop_item', function() {
  echo "</div>";
}, 50);


//Вывод дополнительных кнопок
add_action( 'woocommerce_after_shop_loop_item', function() {
  global $product;
  $id = $product->get_id();
  $name = $product->get_name();
  //$current_date = date('d.m.Y');
  //echo "<div class='ip-loop-product__instock'><span>На складе: " . $current_date . "</span></div>";
  echo "<div class='ip-loop-product__instock'><span>Наличие уточняйте у менеджера</span></div>";
  echo "<div class='woocommerce-loop-product__samples-wrap'><a href='#f1__wrap' class='woocommerce-loop-product__samples one-click__btn callBack__link' data-name='" . $name . "' data-id='" . $id . "' data-title='Заказать образцы'>Образцы</a></div>";
  echo "<div class=''><a href='#f1__wrap' class='button one-click__btn callBack__link' data-name='" . $name . "' data-id='" . $id . "' data-title='Запросить предложение'>Цена по запросу</a></div>";
}, 20);



/*
 * Обернём изображение товара в категории
 * чтобы задать высоту блока
 * чтобы были все одинаковой высоты
 * стили тут sass/plugins/woocommerce/_archive.scss
 */
function ip_woocommerce_image_wrapper_open() {
  echo '<div class="woocommerce-loop-product__img-wrap">';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'ip_woocommerce_image_wrapper_open', 5 );

function ip_woocommerce_image_wrapper_close() {
  echo '</div>';
}
add_action( 'woocommerce_before_shop_loop_item_title', 'ip_woocommerce_image_wrapper_close', 15 );

/*
 * Обернём изображение ПОДКАТЕГОРИИ в категории
 * чтобы задать высоту блока
 * чтобы были все одинаковой высоты
 * стили тут sass/plugins/woocommerce/_archive.scss
 */
function ip_woocommerce_subcategory_image_wrapper_open() {
  echo '<div class="woocommerce-loop-product__img-wrap">';
}
add_action( 'woocommerce_before_subcategory_title', 'ip_woocommerce_subcategory_image_wrapper_open', 5 );

function ip_woocommerce_subcategory_image_wrapper_close() {
  echo '</div>';
}
add_action( 'woocommerce_before_subcategory_title', 'ip_woocommerce_subcategory_image_wrapper_close', 15 );
