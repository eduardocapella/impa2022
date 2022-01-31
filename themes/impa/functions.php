<?php
/**
 * impa functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package impa
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'impa_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function impa_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on impa, use a find and replace
		 * to change 'impa' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'impa', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'impa' ),
				'menu-2' => esc_html__( 'Footer', 'impa' ),
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
				'impa_custom_background_args',
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
				'height'      => 92,
				'width'       => 52,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'impa_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function impa_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'impa_content_width', 640 );
}
add_action( 'after_setup_theme', 'impa_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function impa_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'impa' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'impa' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'impa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function impa_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), _S_VERSION );
	
	wp_enqueue_style( 'impa-style', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION );
	
	/* FONT AWESOME */
	wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/0d1506af8d.js', array(), true );
	
	/* BOOTSTRAP JS */
	if ( is_page( 'como-ingressar') || is_page( 'videos' ) ) {
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array ( 'jquery' ), _S_VERSION, true );
	}
	
	wp_enqueue_script( 'impa-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	
	wp_enqueue_script( 'impa-script', get_template_directory_uri() . '/assets/js/script.js', array ( 'jquery' ), _S_VERSION, true );

}
add_action( 'wp_enqueue_scripts', 'impa_scripts' );


function my_custom_admin_css() {
	wp_enqueue_style( 'style-admin', get_template_directory_uri() . '/style-admin.css', array(), _S_VERSION );
}
add_action( 'admin_head', 'my_custom_admin_css' );


function wpse_cpt_enqueue( $hook_suffix ){
	 $cpt = 'vagas';

	 if( in_array( $hook_suffix, array('post.php', 'post-new.php' ) ) ){
		  $screen = get_current_screen();

		  if( is_object( $screen ) && $cpt == $screen->post_type ) {

				// Register, enqueue scripts and styles here
				wp_enqueue_script( 'impa-script', get_template_directory_uri() . '/assets/js/vagas.js', array ( 'jquery' ), _S_VERSION, true );
				
		  }
	 }
}

add_action( 'admin_enqueue_scripts', 'wpse_cpt_enqueue');



/**
 * CPT Divulgação da Matemática
 */
require get_template_directory() . '/inc/cpts/cpt-divulgacao-da-matematica.php';

/**
 * CPT Eventos Científicos
 */
require get_template_directory() . '/inc/cpts/cpt-evento-cientifico.php';

/**
 * CPT Livro
 */
require get_template_directory() . '/inc/cpts/cpt-livro.php';

/**
 * CPT Autor
 */
require get_template_directory() . '/inc/cpts/cpt-autor.php';

/**
 * CPT Vagas
 */
require get_template_directory() . '/inc/cpts/cpt-vagas.php';

/**
 * CPT Defesa de Tese
 */
require get_template_directory() . '/inc/cpts/cpt-defesa-de-tese.php';





/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Página de Configurações do Tema
 */
require get_template_directory() . '/inc/config-page.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



// Disable emojis in WordPress
add_action( 'init', 'smartwp_disable_emojis' );

function smartwp_disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
   remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
   remove_action( 'wp_print_styles', 'print_emoji_styles' );
   remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
   remove_action( 'admin_print_styles', 'print_emoji_styles' );
   remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
   remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
   add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
}

function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}
// FIM - Disable emojis in WordPress



