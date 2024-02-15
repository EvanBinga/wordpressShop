<?php get_header(); ?>

<div class="container">

  <div class="site">

    <main id="primary" class="site-main">

      <?php
      while ( have_posts() ) :
        the_post();

        get_template_part( 'template-parts/content', 'page' );

      endwhile; // End of the loop.
      ?>

    </main><!-- #main -->

    <?php get_sidebar(); ?>

  </div><!-- .site -->

</div><!-- .container -->

<?php get_footer(); ?>
