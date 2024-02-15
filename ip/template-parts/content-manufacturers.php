<article id="post-<?php the_ID(); ?>" <?php post_class('news__item'); ?>>
  <div class="news__img">
    <?php ip_post_thumbnail(); ?>
  </div>

	<div class="news__content">
      <?php the_title( '<h2 class="entry-title news__title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
    <div class="news__excerpt">
      <?php the_excerpt(); ?>
    </div>
    <div class="more-link">
      <a href="<?php echo the_permalink(); ?>">Подробнее</a>
    </div>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
