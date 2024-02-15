<?php

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'ip_woocommerce_header_cart' ) ) {
			ip_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'ip_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function ip_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		ip_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'ip_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'ip_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
      <span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo esc_html( $item_count_text ); ?></span>
	 */
	function ip_woocommerce_cart_link() {
		?>
		<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'Просмотр вашей корзины', 'ip' ); ?>">
			<?php
			$ip_count =	WC()->cart->get_cart_contents_count();
      if( $ip_count == 0 ) {
        $item_count_text = 'Корзина';
      } elseif( $ip_count > 5 ) {
        $item_count_text = $ip_count . ' товаров';
      } else {
        $item_count_text = sprintf(
          /* translators: number of items in the mini cart. */
          _n( '%d товар', '%d товара', WC()->cart->get_cart_contents_count(), 'ip' ),
          WC()->cart->get_cart_contents_count()
        );
      }

      if( $ip_count == 0 ) {
        echo 'Корзина';
      } else {
        echo 'Корзина';
        /* echo '<span class="amount">' . wp_kses_data( WC()->cart->get_cart_subtotal() ) . '</span> <span class="count">' . esc_html( $item_count_text ) . '</span>'; */
      }
    ?>
		</a>
		<?php
	}
}

if ( ! function_exists( 'ip_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function ip_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="site-header-cart__data">
				<?php ip_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
				$instance = array(
					'title' => '',
				);

				the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}
