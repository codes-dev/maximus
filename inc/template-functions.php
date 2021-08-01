<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package maximus
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function maximus_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'maximus_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function maximus_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'maximus_pingback_header' );

/**
 * Adds post pagination
 */
function maximus_post_pagination() {
	?>
		<div class="container my-5">
			<?php
				the_post_navigation(
					array(
						'prev_text' => '<span data-mdb-toggle="tooltip" title="' . esc_html__( '%title', 'maximus' ) . '" class="nav-subtitle"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;' . esc_html__( 'Previous', 'maximus' ),
						'next_text' => '<span data-mdb-toggle="tooltip" title="' . esc_html__( '%title', 'maximus' ) . '" class="nav-subtitle">' . esc_html__( 'Next', 'maximus' ) . '</span>&nbsp;&nbsp;<i class="fas fa-arrow-right"></i>',
					)
				);
			?>
		</div>
	<?php
}

function maximus_page_layout_classes( $component ) {
	// code...

	// Page Layout Classes.
	$maximus_container_classes = 'class="row w-100 mx-auto c-page"';
	$maximus_content_classes   = '';
	$maximus_sidebar_classes   = '';

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		// code...
		$maximus_content_classes = 'class="col col-12 col-md-8 col-lg-9 container"';
		$maximus_sidebar_classes = 'class="col col-12 col-md-4 col-lg-3"';
	} else {
		$maximus_content_classes = 'class="col col-12 container"';
		$maximus_sidebar_classes = 'class="col d-none"';
	}

	$maximus_classes = array(
		'container_classes' => $maximus_container_classes,
		'content_classes'   => $maximus_content_classes,
		'sidebar_classes'   => $maximus_sidebar_classes,
	);

	echo $maximus_classes[ $component . '_classes' ];   
}

function maximus_post_layout_classes( $maximus_hide_sidebar, $component ) {
	// code...
	
	// Post Layout Classes.
	$maximus_container_classes = 'class="row w-100 mx-auto c-post"';
	$maximus_content_classes   = '';
	$maximus_sidebar_classes   = '';

	if ( is_active_sidebar( 'sidebar-1' ) ) {
		// code...
		if ( ! $maximus_hide_sidebar ) {
			// code...
			$maximus_content_classes = 'class="col col-12 col-md-8 col-lg-9 container"';
			$maximus_sidebar_classes = 'class="col col-12 col-md-4 col-lg-3"';
		} else {
			// code...
			$maximus_content_classes = 'class="col col-12 container"';
			$maximus_sidebar_classes = 'class="col d-none"';
		}
	} else {
		$maximus_content_classes = 'class="col col-12 container"';
		$maximus_sidebar_classes = 'class="col d-none"';
	}

	$maximus_classes = array(
		'container_classes' => $maximus_container_classes,
		'content_classes'   => $maximus_content_classes,
		'sidebar_classes'   => $maximus_sidebar_classes,
	);

	echo $maximus_classes[ $component . '_classes' ];   
}

function maximus_delete_post_url() {
	// code...

	// Delete Post Link.
	$url = add_query_arg(
		array(
			'action' => 'maximus_delete_post',
			'post'   => get_the_ID(),
			'nonce'  => wp_create_nonce( 'maximus_delete_post_' . get_the_ID() ),
		),
		home_url()
	);
	if ( current_user_can( 'delete_post', get_the_ID() ) ) {
		// code...
		return $url;
	}
}

function maximus_get_site_theme()
{
	# code...
	
	$site_theme = get_theme_mod( 'maximus_site_theme', 'general' );
	return $site_theme;
}

