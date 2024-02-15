<?php get_header(); ?>

<div class="container">

  <div class="site">

    <main id="primary" class="site-main">

    <?php if ( have_posts() ) : ?>

      <header class="page-header">
        <?php
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
      </header><!-- .page-header -->

      <?php
      /* Start the Loop */
      while ( have_posts() ) :
        the_post();

        /*
         * Include the Post-Type-specific template for the content.
         * If you want to override this in a child theme, then include a file
         * called content-___.php (where ___ is the Post Type name) and that will be used instead.
         */
        if ( is_singular() ) :
          get_template_part( 'template-parts/content', get_post_type() );
        elseif( is_category('manufacturers') ) :
          get_template_part( 'template-parts/content', 'manufacturers' );
        elseif( is_category('articles') ) :
          get_template_part( 'template-parts/content', 'news' );
        elseif( is_category('news') ) :
          get_template_part( 'template-parts/content', 'news' );
        else :
          get_template_part( 'template-parts/content', 'category' );
        endif;

      endwhile;

      $args_pagination = array(
        'show_all'     => true, // показаны все страницы участвующие в пагинации
        /* 'end_size'     => 1,     // количество страниц на концах */
        /* 'mid_size'     => 1,     // количество страниц вокруг текущей */
        /* 'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница". */
        /* 'prev_text'    => __('« Previous'), */
        /* 'next_text'    => __('Next »'), */
        /* 'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам. */
        /* 'add_fragment' => '',     // Текст который добавиться ко всем ссылкам. */
        /* 'screen_reader_text' => __( 'Posts navigation' ), */
        /* 'class'        => 'pagination', // CSS класс, добавлено в 5.5.0. */
      );
      the_posts_pagination($args_pagination);
      /* the_posts_navigation(); */

    else :

      get_template_part( 'template-parts/content', 'none' );

    endif;
    ?>

    </main><!-- #main -->

    <?php get_sidebar(); ?>

  </div><!-- .site -->

</div><!-- .container -->

<?php get_footer(); ?>
