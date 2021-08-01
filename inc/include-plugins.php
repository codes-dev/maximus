<?php
	/**
	 *  File Bundles Supported Plugins With Thene
	 */

	require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

function maximus_include_plugins() {
	// code...

	$plugins = array(
		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'               => 'Maximus Support', // The plugin name.
			'slug'               => 'maximus_support', // The plugin slug (typically the folder name).
			'source'             => get_template_directory() . '/lib/plugins/maximus-support.zip', // The plugin source.
			'required'           => true, // If false, the plugin is only 'recommended' instead of required.
			'version'            => '1.0.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
			'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
			'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
			'external_url'       => '', // If set, overrides default API URL and points to an external URL.
			'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		),

		// recognize the plugin as being installed.
		array(
			'name'        => 'WordPress SEO by Yoast',
			'slug'        => 'wordpress-seo',
			'is_callable' => 'wpseo_init',
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false,
		),
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Elementor',
			'slug'      => 'elementor',
			'required'  => false,
		),
	);
	$config  = array();

	tgmpa( $plugins, $config );
}

	add_action( 'tgmpa_register', 'maximus_include_plugins', 10 );

