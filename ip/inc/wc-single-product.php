<?php
/*
 * Страница товара
 * Single Product
 */


/*
 * Настройки слайдера
 * https://github.com/woocommerce/FlexSlider/blob/master/jquery.flexslider.js
 * plugins/woocommerce/includes/class-wc-frontend-scripts.php
 */
add_filter( 'woocommerce_single_product_carousel_options', 'filter_single_product_carousel_options' );
function filter_single_product_carousel_options( $options ) {
    if ( wp_is_mobile() ) {
        $options['smoothHeight'] = true; // Already "true" by default
        $options['controlNav'] = 'thumbnails'; // Option 'thumbnails' by default
        $options['animation'] = "slide"; // Already "slide" by default
        $options['slideshow'] = false; // Already "false" by default
    }
    return $options;
}


// Удаляем кнопку "Добавить в корзину"
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );

// Изменить текст кнопки "Добавить в корзину"
/* add_filter( 'woocommerce_product_single_add_to_cart_text', 'tb_woo_custom_cart_button_text' ); */
/* add_filter( 'woocommerce_product_add_to_cart_text', 'tb_woo_custom_cart_button_text' ); */   
/* function tb_woo_custom_cart_button_text() { */
/*   return __( 'Добавить в заказ', 'woocommerce' ); */
/* } */

//Удаляем краткое описание товара
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

//Выводим информаци о товаре - под заголовком
add_action( 'woocommerce_single_product_summary', function() {
  global $product;
  $id = $product->get_id();
  $name = $product->get_name();
  /* $instock = $product->get_stock_quantity(); */
  $current_date = date('d.m.Y');
?>
  <div class='ip-single-product__desc'>
    <div class='ip-single-product__desc-row ip-single-product__desc-row_1'>
    <div class='ip-single-product__instock'><span>Наличие уточняйте у менеджера<?php //echo $instock; ?></span></div>
    </div>
    <div class='ip-single-product__desc-row ip-single-product__desc-row_2'>
    <div class='single-product'><a href='#f1__wrap' class='btn-altair one-click__btn callBack__link' data-name='<?php echo $name?>' data-id='<?php echo $id?>' data-title='Заказать под проект'>Заказать под проект</a></div>
      <div class=''><a href='#f1__wrap' class='btn-altair one-click__btn callBack__link' data-name='<?php echo $name?>' data-id='<?php echo $id?>' data-title='Запросить образцы'>Запросить образцы</a></div>
    </div>
    <div class='ip-single-product__desc-row ip-single-product__desc-row_3'>
      <?php /* <div class='ip-single-product__date'>Цена действительна на <?php echo $current_date; ?></div> */ ?>
      <div class=''><a href='#f1__wrap' class='btn btn-invert one-click__btn callBack__link' data-name='<?php echo $name?>' data-id='<?php echo $id?>' data-title='Быстрый заказ'>Быстрый заказ</a></div>
    </div>
  </div>
<?php
}, 20 );

// Вкладки - Страница товара
add_filter( 'woocommerce_product_tabs', 'ip_product_tab', 25 );
function ip_product_tab( $tabs ) {
  $tabs[ 'additional_information' ] = array(
   'title'   => '',
   'priority'  => 20
   /* 'callback'  => 'ip_product_feature' */
  );
  /* $tabs[ 'analogi' ] = array( */
  /*  'title'   => 'Аналоги', */
  /*  'priority'  => 25, */
  /*  'callback'  => '' */
  /* ); */
  /* $tabs[ 'delivery' ] = array( */
  /*  'title'   => 'Сроки поставки', */
  /*  'priority'  => 40, */
  /*  'callback'  => 'ip_delivery_time_tab' */
  /* ); */
  return $tabs;
}


function ip_delivery_time_tab() {
  echo "<div class='ait-wrap'>";
  include __DIR__  . "/../blocks/delivery-time/delivery-time.php";
  echo "</div>";
}

function ip_product_feature() {
  global $product;
  $id = $product->get_id();
  the_field( 'product_feature', $id );
}


//Отключаем табы
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
//Подключаем своё содержимое
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_altair', 12 );
function woocommerce_output_product_data_altair() {
  global $product;
  include __DIR__  . "/../blocks/single-product-altair/single-product-altair.php";
}

