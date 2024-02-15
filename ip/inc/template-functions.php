<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package ip
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function ip_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
  if ( ! is_active_sidebar( 'sidebar-1' ) OR
    ! is_product_category( array(1091, 1105, 1109, 136, 152, 161, 169, 183, 192, 215, 217, 326, 363, 377, 390, 417, 492, 493, 561, 59, 60, 62, 64, 65, 66, 67, 725, 788, 939) )
    //этот же массив используется в
    // sidebar.php
    // woocommerce/loop/loop-start.php
    // inc/template-functions.php
  ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'ip_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function ip_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'ip_pingback_header' );
