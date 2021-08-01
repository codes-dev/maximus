<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 * 
 * @package maximus
 */
function maximus_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'maximus' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add Sidebar widgets here.', 'maximus' ),
			'before_widget' => '<section id="%1$s" class="widget c-sidebar-widget mb-3 %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	$columns = intval( get_theme_mod( 'maximus_footer_columns', '4' ) );

	for ( $i = 0; $i < $columns; $i++ ) { 
		// code...
		register_sidebar(
			array(
				'id'            => 'footer-widgets-' . ( $i + 1 ),
				/* translators: %s is widget area id */
				'name'          => sprintf( esc_html__( 'Footer Widgets Area %s', 'maximus' ), ( $i + 1 ) ),
				'description'   => esc_html__( 'This sidebar appears in our footer section', 'maximus' ),
				'before_widget' => '<section id="%1$s" class="c-footer-widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}
}
	add_action( 'widgets_init', 'maximus_widgets_init' );

