<?php
	/**
	 * Enqueue scripts and styles.
	 */
	function maximus_scripts() {
		wp_enqueue_style( 'maximus-style', get_stylesheet_directory_uri() . '/dist/assets/css/style.css', array( 'maximus-fontawesome-style' ), MAXIMUS_VERSION );
		wp_style_add_data( 'maximus-style', 'rtl', 'replace' );

		wp_enqueue_script( 'maximus-navigation', get_template_directory_uri() . '/dist/assets/js/navigation.js', array( ), MAXIMUS_VERSION, true );

		wp_enqueue_script( 'maximus-js', get_template_directory_uri() . '/dist/assets/js/bundle.js', array( 'jquery' ), MAXIMUS_VERSION, true );

		wp_localize_script( 'maximus-js', 'js_vars', array(
			'user_email' => wp_get_current_user()->user_email,
			'home_url'  => home_url( '/' ),
			'temp_dir'  => get_template_directory_uri(),
			'ajax_url' => admin_url( 'admin-ajax.php' ),
			'rates' => array(
				'naria_to_cedis' => array(
					'base_currency' => 'NGN',
					'quote_currency' => 'GHS',
					'base_symbol' => '₦',
					'quote_symbol' => '₵',
					'base_flag' => esc_attr( get_template_directory_uri(  ) .'\src\assets\images\flags\nigeria.png' ),
					'quote_flag' => esc_attr( get_template_directory_uri(  ) .'\src\assets\images\flags\ghana.png' ),
					'label' => __( 'Naria To Cedis', 'maximus' ),
					'bid_per_unit' => get_option( 'maximus_ng_gh_bide') ? floatval(get_option( 'maximus_ng_gh_bide')) : 87.7192982,
             		'reverse_per_unit' => get_option( 'maximus_ng_gh_reverse') ? floatval(get_option( 'maximus_ng_gh_reverse')) : 80.6451613,
				 ),
			 ),
		));

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'maximus_scripts' );

	/**
	 * Enqueue scripts and styles.
	 */
	function maximus_fontawesome_scripts() {
		wp_enqueue_style( 'maximus-fontawesome-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css', array(), MAXIMUS_VERSION );

	}
	add_action( 'wp_enqueue_scripts', 'maximus_fontawesome_scripts' );

	/**
	 * Enqueue scripts and styles.
	 */
	function maximus_admin_scripts() {
		wp_enqueue_style( 'maximus-admin-style', get_stylesheet_directory_uri() . '/dist/assets/css/admin.css', array( ), MAXIMUS_VERSION );


		wp_enqueue_script( 'maximus-admin-js', get_template_directory_uri() . '/dist/assets/js/admin.js', array( 'jquery' ), MAXIMUS_VERSION, true );

	}
	add_action( 'admin_enqueue_scripts', 'maximus_admin_scripts' );

	 /**
	  * Enqueue scripts and styles.
	  */
	function maximus_editor_scripts() {
		wp_enqueue_style( 'maximus-editor-css', get_stylesheet_directory_uri() . '/dist/assets/css/editor.css', array(), MAXIMUS_VERSION );

	}
	add_action( 'enqueue_block_editor_assets', 'maximus_editor_scripts' );

