<?php

/**
 * Customizser Filters
 */

	require get_template_directory() . '/inc/customizer/customizer-variables.php';

function maximus_customize_css() {
	/**
	 * Customize theme css
	 */
	global $maximus_default_colors;
	?>
			 <style type="text/css">
				body{
					color: <?php echo get_theme_mod( 'maximus_text_color', $maximus_default_colors['body']['text'] ); ?>
				}
				.c-topnav{background: <?php echo get_theme_mod( 'maximus_top_navigation_background', $maximus_default_colors['primary']['normal'] ); ?>}
				.c-topnav .navbar-brand{color: <?php echo get_theme_mod( 'maximus_top_navigation_brand', $maximus_default_colors['navbar_brand']['normal'] ); ?>}
				.c-topnav .navbar-brand:hover, .c-topnav .navbar-brand:focus {color: <?php echo get_theme_mod( 'maximus_top_navigation_brand_hover', $maximus_default_colors['navbar_brand']['hover'] ); ?>}
				.c-topnav .c-top-navigation .nav-link, .c-topnav .navbar-toggler{
					color: <?php echo get_theme_mod( 'maximus_top_navigation_links', $maximus_default_colors['navbar_links']['normal'] ); ?>
				}
				.c-topnav .c-top-navigation .nav-link:hover, 
				.c-topnav .navbar-toggler:hover{
					color: <?php echo get_theme_mod( 'maximus_top_navigation_links_hover', $maximus_default_colors['navbar_links']['hover'] ); ?>
				}
				.c-topnav .c-top-navigation .nav-link:focus, 
				.c-topnav .navbar-toggler:focus{
					color: <?php echo get_theme_mod( 'maximus_top_navigation_links_hover', $maximus_default_colors['navbar_links']['focus'] ); ?>
				}
				.c-topnav .c-top-navigation .sub-menu .nav-link{
					color: <?php echo get_theme_mod( 'maximus_top_navigation_dropdown_links', $maximus_default_colors['dropdowns']['links'] ); ?>
				}
				.c-topnav .c-top-navigation .sub-menu .nav-link:hover, .c-topnav .c-top-navigation .sub-menu .nav-link:focus{
					color: <?php echo get_theme_mod( 'maximus_top_navigation_dropdown_links_hover', $maximus_default_colors['dropdowns']['links_hover'] ); ?>
				}
				.c-topnav .c-top-navigation .dropdown-menu{
					background: <?php echo get_theme_mod( 'maximus_top_navigation_dropdown_background', $maximus_default_colors['dropdowns']['background'] ); ?>
				}
				a{
					color: <?php echo get_theme_mod( 'maximus_body_links', $maximus_default_colors['body_links']['normal'] ); ?>
				}
				a:hover, a:focus, a:active{
					color: <?php echo get_theme_mod( 'maximus_body_links_hover', $maximus_default_colors['body_links']['hover'] ); ?>
				}
				a:visited{
					color: <?php echo get_theme_mod( 'maximus_body_links_focus', $maximus_default_colors['body_links']['focus'] ); ?>
				}
				.c-footer .c-footer-widgets-area { background: <?php echo get_theme_mod( 'maximus_footer_widgets_background', $maximus_default_colors['footer']['widgets_area']['background'] ); ?>; }
				.c-footer .c-site-credit { background: <?php echo get_theme_mod( 'maximus_footer_credits_background', $maximus_default_colors['footer']['credits_area']['background'] ); ?>; }
			 </style>
		<?php
}
	add_action( 'wp_head', 'maximus_customize_css' );
?>
