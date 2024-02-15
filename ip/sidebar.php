<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ip
 */

/*
 * Функция вывода класса для изменения сетки сайта
 * с сайтбаром или без тут:
 * inc/template-functions.php
 */
//Условия вывода сайтбара
if ( ! is_active_sidebar( 'sidebar-1' ) OR
  ! is_product_category( array(1091, 1105, 1109, 136, 152, 161, 169, 183, 192, 215, 217, 326, 363, 377, 390, 417, 492, 493, 561, 59, 60, 62, 64, 65, 66, 67, 725, 788, 939) )
    //этот же массив используется в
    // sidebar.php
    // woocommerce/loop/loop-start.php
    // inc/template-functions.php
) {
	return;
}
?>

<aside id="secondary" class="widget-area">
<?php
dynamic_sidebar( 'sidebar-1' );
?>
</aside><!-- #secondary -->
