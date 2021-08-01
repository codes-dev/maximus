<?php
if ( ! function_exists( 'maximus_register_menus' ) ) {
	function maximus_register_menus() {
		 // code...
		
		 register_nav_menus(
			array(
				'main-nav' => esc_html__( 'Main Navigation Menu', 'maximus' ),
				'domain-nav'    => esc_html__( 'Sub Domains Navigation Menu', 'maximus' ),
				'utils-nav'    => esc_html__( 'Utility Navigation Menu', 'maximus' ),
				'top-nav'    => esc_html__( 'Top Navigation Menu', 'maximus' ),
				'social-nav' => esc_html__( 'Social Navigation Menu', 'maximus' ),
			)
		);
	}
	add_action( 'init', 'maximus_register_menus' );
}

	/**
	 * NAVIGATION FILTERS
	 */
	require_once get_template_directory() . '/inc/navigation/navigation-filters.php';

