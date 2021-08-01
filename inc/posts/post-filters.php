<?php
function maximus_excerpt_length( $length ) {
	return 20;
}
	add_filter( 'excerpt_length', 'maximus_excerpt_length', 999 );

function maximus_filter_post_title( $title ) {
	$length = 60;
	if ( strlen( $title ) > $length ) {
		$title = substr( $title, 0, $length );
		return $title . '<span class="c-post-card__title-truncate">...</span>';
	} else {
		return $title;
	}
	// return 'Hooked: '.$title;
}

