<?php get_header(); ?>

<div class="container">

  <div class="site">

    <main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

      /*
			the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Предыдущая статья:', 'ip' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Следующая статья:', 'ip' ) . '</span> <span class="nav-title">%title</span>',
				)
			);
       */

			// If comments are open or we have at least one comment, load up the comment template.
      /*
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
       */

		endwhile; // End of the loop.
		?>

    </main><!-- #main -->

    <?php get_sidebar(); ?>

  </div><!-- .site -->

</div><!-- .container -->

<?php get_footer(); ?>
