<?php
	/**
	 * 
	 */

function maximus_delete_post() {
	// code...
	if ( isset( $_GET['action'] ) && $_GET['action'] === 'maximus_delete_post' ) {
		// code...
		if ( ! isset( $_GET['nonce'] ) || ! wp_verify_nonce( $_GET['nonce'], 'maximus_delete_post_' . $_GET['post'] ) ) {
			// code...
			return;
		}
		$postID = isset( $_GET['post'] ) ? $_GET['post'] : null;
		$post   = get_post( (int) $postID );

		if ( empty( $post ) ) {
			// code...
			return;
		}

		if ( current_user_can( 'delete_post', $postID ) ) {
			// code...
			wp_trash_post( $postID );

			if ( wp_get_referer() ) {
				wp_safe_redirect( wp_get_referer() );
			} else {
				wp_safe_redirect( get_home_url() );
			}
		}

		die;
	}
}
	add_action( 'init', 'maximus_delete_post', 10 );

