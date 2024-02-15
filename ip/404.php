<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ip
 */

get_header();
?>

<div class="container">

  <div class="site">

    <main id="primary" class="site-main">

      <section class="error-404 not-found">
        <header class="page-header">
          <h1 class="page-title"><?php esc_html_e( 'Ой! Эту страницу нельзя найти.', 'ip' ); ?></h1>
        </header><!-- .page-header -->

        <div class="page-content">
          <p><?php esc_html_e( 'Похоже, в этом месте ничего не было найдено. Может быть, используйте меню или поиск?', 'ip' ); ?></p>

            <?php
            //get_search_form();

            //the_widget( 'WP_Widget_Recent_Posts' );
            ?>

<?php /*
            <div class="widget widget_categories">
              <h2 class="widget-title"><?php esc_html_e( 'Популярные категории', 'ip' ); ?></h2>
              <ul>
                <?php
                wp_list_categories(
                  array(
                    'orderby'    => 'count',
                    'order'      => 'DESC',
                    'show_count' => 1,
                    'title_li'   => '',
                    'number'     => 10,
                  )
                );
                ?>
              </ul>
            </div><!-- .widget -->
 */ ?>

            <?php
            /* translators: %1$s: smiley */
            /*
            $ip_archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s', 'ip' ), convert_smilies( ':)' ) ) . '</p>';
            the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=</h2>$ip_archive_content" );

            the_widget( 'WP_Widget_Tag_Cloud' );
             */
            ?>

        </div><!-- .page-content -->
      </section><!-- .error-404 -->

    </main><!-- #main -->

  </div><!-- .site -->

</div><!-- .container -->

<?php
get_footer();
