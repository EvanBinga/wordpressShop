<?php
/**
 * ip functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ip
 */

if ( ! defined( '_S_VERSION' ) ) {
  // Replace the version number of the theme on each release.
  define( '_S_VERSION', '1.0.8' );
}

if ( ! function_exists( 'ip_setup' ) ) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function ip_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on ip, use a find and replace
     * to change 'ip' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'ip', get_template_directory() . '/languages' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support( 'post-thumbnails' );

    /*
     * Включаем короткое описание для страниц
     */
    add_post_type_support( 'page', array('excerpt') );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
      array(
        'menu-1' => esc_html__( 'Главное меню', 'ip' ),
        'footer-1' => esc_html__( 'Footer 1', 'ip' ),
        'footer-2' => esc_html__( 'Footer 2', 'ip' ),
      )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
      'html5',
      array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
      )
    );

    // Set up the WordPress core custom background feature.
    add_theme_support(
      'custom-background',
      apply_filters(
        'ip_custom_background_args',
        array(
          'default-color' => 'ffffff',
          'default-image' => '',
        )
      )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 73,
        'width'       => 222,
        'flex-width'  => true,
        'flex-height' => true,
      )
    );
  }
endif;
add_action( 'after_setup_theme', 'ip_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ip_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'ip_content_width', 640 );
}
add_action( 'after_setup_theme', 'ip_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ip_widgets_init() {
  register_sidebar(
    array(
      'name'          => esc_html__( 'Sidebar', 'ip' ),
      'id'            => 'sidebar-1',
      'description'   => esc_html__( 'Add widgets here.', 'ip' ),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h2 class="widget-title">',
      'after_title'   => '</h2>',
    )
  );
}
add_action( 'widgets_init', 'ip_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ip_scripts() {
  wp_enqueue_style( 'ip-style', get_stylesheet_uri(), array('js_composer_front', 'wpc-filter-everything'), _S_VERSION );
  /* wp_style_add_data( 'ip-style', 'rtl', 'replace' ); */

  wp_register_script( 'slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.9.0', true );
  wp_enqueue_script( 'slick' );

  wp_enqueue_script( 'jquery-inputmask', get_template_directory_uri() . '/js/jquery.inputmask.bundle.js', array('jquery'), '4', true );
  wp_enqueue_script( 'magnific-popup-js', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array('jquery'), '', true );
  wp_enqueue_script( 'ip-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

  wp_enqueue_script( 'blocks', get_template_directory_uri() . '/js/blocks.js', array('jquery'), _S_VERSION, true );
  wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), _S_VERSION, true );

  wp_register_script( 'api-maps-yandex', 'https://api-maps.yandex.ru/2.1/?lang=ru_RU', array('jquery'), '', true );

  /*
  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
  */
}
add_action( 'wp_enqueue_scripts', 'ip_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/' . 'inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/' . 'inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/' . 'inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/' . 'inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
  require get_template_directory() . '/' . 'inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
  require get_template_directory() . '/' . 'inc/woocommerce.php';
}

/**
 * Настройки темы
 */
require get_template_directory() . '/' . 'inc/options.php';

/**
 * WPBakery Page Builder blocks
 * и другие блоки
 */
require get_template_directory() . '/' . 'inc/wpb_blocks.php';

/**
 * CEO
 */
require get_template_directory() . '/' . 'inc/seo.php';


 

