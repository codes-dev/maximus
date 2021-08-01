<?php
/**
 * Maximus Theme Customizer
 *
 * @package maximus
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function maximus_customize_register( $wp_customize ) {
	require_once get_template_directory() . '/inc/customizer/customizer-options/color -options.php';
	require_once get_template_directory() . '/inc/customizer/customizer-options/footer-options.php';
	require_once get_template_directory() . '/inc/customizer/customizer-options/global-options.php';
	require_once get_template_directory() . '/inc/customizer/customizer-options/multisite-options.php';

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'maximus_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'maximus_customize_partial_blogdescription',
			)
		);
	};

	maximus_globals_options( $wp_customize );
	maximus_colors_options( $wp_customize );
	maximus_footer_options( $wp_customize );
	maximus_multisite_options( $wp_customize );
}
add_action( 'customize_register', 'maximus_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function maximus_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function maximus_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function maximus_customize_preview_js() {
	wp_enqueue_script( 'maximus-customizer', get_template_directory_uri() . '/dist/assets/js/customizer.js', array( 'customize-preview' ), MAXIMUS_VERSION, true );
}
add_action( 'customize_preview_init', 'maximus_customize_preview_js' );
