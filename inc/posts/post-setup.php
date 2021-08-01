<?php
function maximus_custom_post_formats_setup() {
	// add post-formats to post_type 'page'
	add_post_type_support( 'post', 'post-formats' );
		
	// add post-formats to post_type 'my_custom_post_type'
	// add_post_type_support( 'my_custom_post_type', 'post-formats' );
}
	add_action( 'init', 'maximus_custom_post_formats_setup' );

