<?php get_header(); ?>

<div class="container">

  <main id="primary" class="site-main">

    <?php
    while ( have_posts() ) :
      the_post();

      the_content();

    endwhile; // End of the loop.
    ?>

  </main><!-- #main -->

</div><!-- .container -->

<?php get_footer(); ?>
