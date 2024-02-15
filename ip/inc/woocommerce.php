<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package ip
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */
function ip_woocommerce_setup() {
  add_theme_support(
    'woocommerce',
    array(
      //Изображения в категориях/каталоге
      //Пропорции обрезки изображения для каталога задаются в настройках
      //"Внешний вид ▸ Настройка ▸ WooCommerce ▸ Изображения товаров
      'thumbnail_image_width' => 150,

      //Миниатюры в слайдере
      'gallery_thumbnail_image_width' => 'thumbnail',

      //Изображения на странице товара
      'single_image_width' => 300,

			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 1,
				'default_columns' => 3,
				'min_columns'     => 1,
				'max_columns'     => 6,
			),
		)
	);
	/* add_theme_support( 'wc-product-gallery-zoom' ); */
	/* add_theme_support( 'wc-product-gallery-lightbox' ); */
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'ip_woocommerce_setup' );

/*
 * Размеры изображений в WooCommerce
 * https://misha.agency/woocommerce/razmery-izobrazhenij.html
 * Выводим полное изображение в категории товаров
 */
add_filter( 'single_product_archive_thumbnail_size', 'true_catalog_size' );
function true_catalog_size( $size ) {
  return 'full';
}

/*
 * Отключить размеры изображений в WooCommerce
 * https://misha.agency/woocommerce/razmery-izobrazhenij.html
 */
/* add_action( 'init', 'true_remove_woo_image_sizes' ); */
 
/* function true_remove_woo_image_sizes() { */
 
/* 	// woocommerce_single */
/* 	remove_image_size( 'woocommerce_single' ); */
/* 	remove_image_size( 'shop_single' ); */
 
/* 	// woocommerce_thumbnail */
/* 	remove_image_size( 'woocommerce_thumbnail' ); */
/* 	remove_image_size( 'shop_catalog' ); */
 
 
/* 	// woocommerce_gallery_thumbnail */
/*  	remove_image_size( 'woocommerce_gallery_thumbnail' ); */
/* 	remove_image_size( 'shop_thumbnail' ); */
 
/* } */

/*
 * Отключаем генерацию размеров изображений
 * https://misha.agency/wordpress/razmeryi-izobrazheniy.html
 * Force Regenerate Thumbnails - удаляет и перегенерирует изображения
 */
add_filter( 'intermediate_image_sizes_advanced', 'true_remove_default_sizes' );
function true_remove_default_sizes( $sizes ) {
	/* unset( $sizes[ 'thumbnail' ] ); // миниатюра */
	/* unset( $sizes[ 'medium' ] ); // средний */
	/* unset( $sizes[ 'large' ] ); // крупный */
	unset( $sizes[ 'medium_large' ] ); // с шириной 768
	unset( $sizes[ '1536x1536' ] );
	unset( $sizes[ '2048x2048' ] );
	return $sizes;
}

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function ip_woocommerce_scripts() {
	wp_enqueue_style( 'ip-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION );

	/* $font_path   = WC()->plugin_url() . '/assets/fonts/'; */
	/* $inline_font = '@font-face { */
	/* 		font-family: "star"; */
	/* 		src: url("' . $font_path . 'star.eot"); */
	/* 		src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"), */
	/* 			url("' . $font_path . 'star.woff") format("woff"), */
	/* 			url("' . $font_path . 'star.ttf") format("truetype"), */
	/* 			url("' . $font_path . 'star.svg#star") format("svg"); */
	/* 		font-weight: normal; */
	/* 		font-style: normal; */
	/* 	}'; */

	/* wp_add_inline_style( 'ip-woocommerce-style', $inline_font ); */
}
add_action( 'wp_enqueue_scripts', 'ip_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function ip_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'ip_woocommerce_active_body_class' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function ip_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 4,
		'columns'        => 4,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'ip_woocommerce_related_products_args' );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'ip_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function ip_woocommerce_wrapper_before() {
		?>
			<main id="primary" class="site-main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'ip_woocommerce_wrapper_before' );

if ( ! function_exists( 'ip_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function ip_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'ip_woocommerce_wrapper_after' );


//Header Cart
require 'wc-header-cart.php';

//Страница товара Single Product
require 'wc-single-product.php';

// Страница "Каталога" и "Категории"
require 'wc-category.php';

//Страца корзины
require 'wc-cart.php';

//Страница магазина
//require 'wc-catalog.php'


/*
 * Remove WooCommerce BreadCrumbs
 */
add_action('template_redirect', 'remove_shop_breadcrumbs' );
function remove_shop_breadcrumbs() {
  remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
}

/*
 * Мой контейнер в WooCommerce
 */
add_action('woocommerce_before_main_content', 'wc_ip_container_start', 0, 0 );
function wc_ip_container_start() {
  echo '<div class="container"><div class="site">';
}
add_action('woocommerce_after_main_content', 'wc_ip_container_end', 30, 0 );
function wc_ip_container_end() {
  echo '</div><!-- .site --></div><!-- .container -->';
}


/*
 * Колличество товаров на странице магазина
 */
/* add_filter( 'loop_shop_per_page', function($cols) { return 30; }, 20); */


/*
 * One Click
 */
/* add_action( 'woocommerce_single_product_summary', function() { */
/*   echo "<div class='one-click__wrap'><a href='#f2__wrap' class='btn one-click__btn'>В 1 клик</a></div>"; */
/* }, 30); */

/* add_action( 'woocommerce_after_shop_loop_item_title', function() { */
/*   echo "<div class='one-click__wrap'><a href='#f2__wrap' class='btn one-click__btn'>В 1 клик</a></div>"; */
/* }, 20); */

/*
 * Вывод категорий верхнего уровня
 */
/*
function get_top_cat () {
  $args = array(
    'taxonomy'     => 'product_cat',
    'orderby'      => 'name',
    'show_count'   => 0,
    'pad_counts'   => 0,
    'hierarchical' => 1,
    'title_li'     => '',
    'hide_empty'   => 0
  );
  $all_categories = get_categories( $args );
  //print_r($all_categories);
  echo '<div class="brands">';
  foreach ($all_categories as $cat) {
    //print_r($cat);
    if($cat->category_parent == 0) {
      $category_id = $cat->term_id;
      $term_url = get_term_link( $cat->term_id, $taxonomy );
      $term_id = $cat->term_id;
      $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
      $image_url = wp_get_attachment_image_src($thumbnail_id, $size='full', $icon = false);

      //echo '<br /><a href="'. get_term_link($cat->slug, 'product_cat') .'">'. $cat->name .'</a>';
?>
<div class="brands__item">
  <a href="<? echo $term_url; ?>" class="brands__link" title="<? echo $cat->name; ?>">
    <img class="brands__img" src="<? echo $image_url[0] ?>" alt="<? echo $cat->name; ?>">
    <span class="brands__title"><? echo $cat->name; ?></span>
  </a>
</div>
<?php
    }    
  }
  echo '</div>';
}
*/

/*
 * Вывод ПОДкатегорий указанной категории
 */
/*
function get_catalog_category() {
  $args = array(
    'taxonomy'     => 'product_cat',
    //'child_of'     => '48',//id категории подкатегории которой нужно вывести. Может быть 0 - для самого верхнего уровня.
    'orderby'      => 'name',
    'show_count'   => 0,
    'pad_counts'   => 0,
    'hierarchical' => 1,
    'title_li'     => '',
    'hide_empty'   => 0
  );
  $all_categories = get_categories( $args );
  //print_r($all_categories);
  echo '<div class="brands">';
  foreach ($all_categories as $cat) {
    //print_r($cat);
    if($cat->parent == 48) { // указываем id категории подкатегории которой нужно вывести
      $category_id = $cat->term_id;
      $term_url = get_term_link( $cat->term_id, $taxonomy );
      $term_id = $cat->term_id;
      $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
      $image_url = wp_get_attachment_image_src($thumbnail_id, $size='full', $icon = false);
?>
<div class="brands__item">
  <a href="<? echo $term_url; ?>" class="brands__link" title="<? echo $cat->name; ?>">
    <img class="brands__img" src="<? echo $image_url[0] ?>" alt="<? echo $cat->name; ?>">
    <span class="brands__title"><? echo $cat->name; ?></span>
  </a>
</div>
<?php
    }    
  }
  echo '</div>';
}

*/


/*
 * Шорткод вывода категорий на главной
 */
/* add_shortcode( 'ip_cat', 'ip_cat_func' ); */
/* function ip_cat_func( $atts ) { */
/*   get_catalog_category(); */
/* } */


/*
 * Вывод подкатегорий
 */
/*
add_action( 'woocommerce_archive_description', 'ip_subcategories', 0 );
function ip_subcategories() {
if ( is_product_category() ) {
//Вывод дочерних категорий
//Получаем информацию о текущем объекте
$queried_object  = get_queried_object();

$children = get_terms( $queried_object->taxonomy, array(
  'parent'    => $queried_object->term_id,
  'hide_empty' => false
) );

if ( $children ) {
  echo '<div class="subcat">';
  foreach( $children as $subcat ) {
    //$term_description = term_description( $child_id, $taxonomy );
    $term_url = get_term_link( $subcat->term_id, $taxonomy );
    $term_id = $subcat->term_id;
    //image
    $thumbnail_id = get_term_meta( $subcat->term_id, 'thumbnail_id', true );
    $image_url = wp_get_attachment_url( $thumbnail_id );
?>
<div class="subcat__item">
  <a href="<? echo $term_url; ?>" class="subcat__link" title="<? echo $subcat->name; ?>">
    <div class="subcat__img-wrap">
      <img class="subcat__img" src="<? echo $image_url ?>" alt="<? echo $subcat->name; ?>">
    </div>
    <div class="subcat__title"><? echo $subcat->name; ?></div>
  </a>
</div>
<?php

  }//перебор подкатегорий
  echo '</div>';
}//если есть подкатегории
}//if
}

*/


/* add_action( 'woocommerce_before_shop_loop', 'ip_woocommerce-grid', 15 ); */



/*
 * Получить дочернии категории
 */
/*
$args = array(
  'parent' => 100 // id of the direct parent
);
$cats = get_terms( 'product_cat', $args );
// echo '<pre>';
// var_dump($cats);
// echo '</pre>';
foreach( $cats as $cat ) {
  echo $cat->name;
}
*/
