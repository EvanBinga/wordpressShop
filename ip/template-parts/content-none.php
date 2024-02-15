<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ip
 */

?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Ни чего не найдено', 'ip' ); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p>' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Готовы опубликовать свою первую статью? <a href="%1$s">Начните от сюда</a>.', 'ip' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p><?php esc_html_e( 'Извините, но ничего не соответствовало вашим поисковым запросам. Пожалуйста, попытайтесь снова с другими ключевыми словами.', 'ip' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p><?php esc_html_e( 'Кажется, мы не можем найти то, что вы ищете.', 'ip' ); ?></p>
			<?php
		endif;
		?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
