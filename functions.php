<?php
/**
 * Maximus functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package maximus
 */

if ( ! defined( 'MAXIMUS_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'MAXIMUS_VERSION', '1.0.0' );
}

/**
 * CONFIGURATIONS FOR THEME SETUP
 */
require_once get_template_directory() . '/inc/setup.php';

/** 
 * Register widget area.
 */
require_once get_template_directory() . '/inc/widgets.php';

/**
 * Enqueue scripts and styles.
 */
require_once get_template_directory() . '/inc/enqueue-assets.php';

/**
 * Navigation scripts
 */

require_once get_template_directory() . '/inc/navigation/navigation.php';

/**
 * Posts Filters
 */

require_once get_template_directory() . '/inc/posts/post-filters.php';

/**
 * Posts Setup
 */

require_once get_template_directory() . '/inc/posts/post-setup.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/init-functions.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer/customizer-filters.php';

/**
 * Comments additions.
 */
require get_template_directory() . '/inc/comments/comment-callback.php';

/**
 * Search Filters.
 */
require get_template_directory() . '/inc/search/search-filters.php';

/**
 * Globals Filters.
 */
require get_template_directory() . '/inc/globals/global-filters.php';

/**
 * GF Actions.
 */
require get_template_directory() . '/inc/plugins/gravity-forms/actions.php';

/**
 * Ulimate Member.
 */
require get_template_directory() . '/inc/plugins/ulimate-member/tabs.php';

/**
 * Admin Include Pages.
 */
require get_template_directory() . '/inc/admin/pages.php';

/**
 * Shortcodes.
 */
require get_template_directory() . '/inc/shortcodes/currency-converter.php';

/**
 * Ajax.
 */
require get_template_directory() . '/inc/ajax/requests.php';

/**
 * Include Plugins.
 */
require get_template_directory() . '/inc/include-plugins.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
