<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$cat_ids_level_1_2 = array(25);
$args = array(
  'parent' => 25
);
$cats = get_terms( 'product_cat', $args );
foreach( $cats as $cat ) {
  $cat_ids_level_1_2[] = $cat->term_id;
}

if(
  is_product_category( array(1091, 1105, 1109, 136, 152, 161, 169, 183, 192, 215, 217, 326, 363, 377, 390, 417, 492, 493, 561, 59, 60, 62, 64, 65, 66, 67, 725, 788, 939) )
    //этот же массив используется в
    // sidebar.php
    // woocommerce/loop/loop-start.php
    // inc/template-functions.php
) {
  echo '<ul class="products columns-1">';
} else { ?>
  <ul class="products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
<?
}
