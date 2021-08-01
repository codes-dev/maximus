<?php
	/**
	 * CONFIGURATIONS FOR THEME SETUP
	 * 
	 * @package maximus
	 */

if ( ! function_exists( 'maximus_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function maximus_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on maximus, use a find and replace
		 * to change 'maximus' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'maximus', get_template_directory() . '/languages' );
	
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
				'menu-1' => esc_html__( 'Primary', 'maximus' ),
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
				'maximus_custom_background_args',
				array(
					'default-color' => '#f8fbf8',
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
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		// Supported Plugins.
		add_theme_support( 'yoast-seo-breadcrumbs' );
		
	}
	endif;
	add_action( 'after_setup_theme', 'maximus_setup' );

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
function maximus_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'maximus_content_width', 640 );
}
add_action( 'after_setup_theme', 'maximus_content_width', 0 );


function maximus_post_formats_setup() {
	// Post format setup.
	add_theme_support(
		'post-formats',
		array( 
			'aside',
			'gallery',
			'link',
			'audio',
			'video',
			'quote', 
		) 
	);

}
add_action( 'after_setup_theme', 'maximus_post_formats_setup' );

function maximus_get_rates(){
	require_once get_template_directory(  ) . '/inc/admin/lib/rates.php';
	return $maximus_exchange_rates;
}


