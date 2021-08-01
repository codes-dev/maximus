<?php
if ( ! function_exists( 'maximus_nav_li_class' ) ) {
	// code...
	/**
	 * Filter the CSS class for a nav menu based on a condition.
	 *
	 * @param array  $classes The CSS classes that are applied to the menu item's <li> element.
	 * @param object $item    The current menu item.
	 * @return array (maybe) modified nav menu class.
	 */
	function maximus_nav_li_class( $classes, $item, $args, $depth ) {
		if ( in_array( 'menu-item-has-children', $item->classes ) ) {
			if ( $depth % 2 !== 0 ) {
				# code...
				$classes[] = 'nav-item drop-right';
			}else {
				# code...
				$classes[] = 'nav-item drop-down';
			}
		}else {
			# code...
			$classes[] = 'nav-item';
		}
		return $classes;
	}
	add_filter( 'nav_menu_css_class', 'maximus_nav_li_class', 10, 4 );
}

if ( ! function_exists( 'maximus_nav_menu_link_attributes' ) ) {
	function maximus_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
		// code...
		$class         = 'nav-link '; // or something based on $item
		$atts['id']    = 'menu-link-' . $item->ID;
		$atts['class'] = $class;
		if ( in_array( 'menu-item-has-children', $item->classes ) ) {
			$atts['class']         = 'nav-link dropdown-toggle';
			$atts['href']          = 'javascript:void(0)';
			$atts['role']          = 'button';
			$atts['data-toggle']   = 'dropdown';
			$atts['aria-haspopup'] = 'true';
			$atts['aria-expanded'] = 'false';
		}
		if ( $args->theme_location == 'social-nav' ) {
			$class                  = 'nav-link'; // or something based on $item
			$atts['class']          = $class;
			$atts['data-toggle']    = 'tooltip';
			$atts['data-placement'] = 'bottom';
			$atts['title'] = $item->post_title;
		}
		if ($args->theme_location == 'domain-nav') {
			# code...
			$atts['target'] = '_blank';
			$atts['rel'] = 'nofollow';
		}
		return $atts;
	}
	add_filter( 'nav_menu_link_attributes', 'maximus_nav_menu_link_attributes', 10, 4 );
}



if ( ! function_exists( 'maximus_nav_sub_menu_class' ) ) {
	// code...
	/**
	 * Filter the CSS class for a nav menu based on a condition.
	 *
	 * @param array  $classes The CSS classes that are applied to the menu item's <li> element.
	 * @param object $item    The current menu item.
	 * @return array (maybe) modified nav menu class.
	 */
	function maximus_nav_sub_menu_class( $classes ) {
		$classes[] = 'dropdown-menu';
		return $classes;
	}
	add_filter( 'nav_menu_submenu_css_class', 'maximus_nav_sub_menu_class', 10 );
}

if ( ! function_exists( 'maximus_add_menu_parent_class' ) ) {
	/**
	 * Add a parent CSS class for nav menu items.
	 *
	 * @param array $items The menu items, sorted by each menu item's menu order.
	 * @return array (maybe) modified parent CSS class.
	 */
	function maximus_add_menu_parent_class( $items ) {
		$parents = array();

		// Collect menu items with parents.
		foreach ( $items as $item ) {
			if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
				$parents[] = $item->menu_item_parent;
			}
		}

		// Add class.
		foreach ( $items as $item ) {
			if ( in_array( $item->ID, $parents ) ) {
				$item->classes[] = 'dropdown'; // here attach the class
			} else {
					
			}
		}
		return $items;
	}
	add_filter( 'wp_nav_menu_objects', 'maximus_add_menu_parent_class' );
}

if (!function_exists('maximus_native_auth_buttons')) {
	# code...
	//add_filter( 'wp_nav_menu_items', 'maximus_native_auth_buttons', 11, 2 ); // Change menu to suit - example uses 'top-menu'

	/**
	 * Add WooCommerce Cart Menu Item Shortcode to particular menu
	 */
	function maximus_native_auth_buttons ( $items, $args ) {
		if ($args->theme_location === 'utils-nav' && !is_main_site()) {
			# code...


			ob_start();

			?>
				<li  class="c-topnav__auth-toolbar nav-item dropdown mx-1 my-auto">
					<div class="btn-group" role="group" aria-label="Basic example">
					<a class="nav-link btn" href="javascript:void(0)">
						<i class="fas fa-pen"></i>&nbsp;Register
					</a>
					<a class="nav-link btn" href="javascript:void(0)">
						<i class="fas fa-sign-in-alt"></i>&nbsp;Login
					</a>
					</div>
				</li>
			<?php

			$toggler = ob_get_clean();
			$items .=  $toggler; // Adding the created Icon via the shortcode already created
		}
		
		return $items;
	}
}

if (!function_exists('maximus_search_toggler')) {
	# code...
	add_filter( 'wp_nav_menu_items', 'maximus_search_toggler', 10, 2 ); // Change menu to suit - example uses 'top-menu'

	/**
	 * Add WooCommerce Cart Menu Item Shortcode to particular menu
	 */
	function maximus_search_toggler ( $items, $args ) {
		if ($args->theme_location === 'utils-nav' && maximus_get_site_theme() === 'general') {
			# code...


			ob_start();

			?>
				<li  class="c-topnav__search-toggler nav-item dropdown">
					<a class="nav-link" href="javascript:void(0)">
						<i class="fas fa-search"></i>
					</a>
					<div class="sub-menu dropdown-menu">
						<?php get_search_form( ); ?>
					</div>
				</li>
			<?php

			$toggler = ob_get_clean();
			$items .=  $toggler; // Adding the created Icon via the shortcode already created
		}
		
		return $items;
	}
}


if (!function_exists('maximus_finance_sidenav_toggler')) {
	# code...
	add_filter( 'wp_nav_menu_items', 'maximus_finance_sidenav_toggler', 11, 2 ); // Change menu to suit - example uses 'top-menu'

	/**
	 * Add WooCommerce Cart Menu Item Shortcode to particular menu
	 */
	function maximus_finance_sidenav_toggler ( $items, $args ) {
		if ( $args->theme_location === 'top-nav' && maximus_get_site_theme() === 'finances' ) {
			# code...


			ob_start();

			?>
				<li  class="c-finance_sidenav_toggler nav-item">
					<button type="button" class="btn c-sidenav__openbtn">
						<i class="fas fa-bars"></i>
					</button>
				</li>
			<?php

			$items .=  ob_get_clean(); // Adding the created Icon via the shortcode already created
		}
		
		return $items;
	}
}

if (!function_exists('maximus_finances_search_form')) {
	# code...
	add_filter( 'wp_nav_menu_items', 'maximus_finances_search_form', 10, 2 ); // Change menu to suit - example uses 'top-menu'

	/**
	 * Add WooCommerce Cart Menu Item Shortcode to particular menu
	 */
	function maximus_finances_search_form ( $items, $args ) {
		if ($args->theme_location === 'top-nav' && maximus_get_site_theme() === 'finances') {
			# code...


			ob_start();

			?>
				<li  class="nav-item hide-if-mobile">			
					<?php get_search_form( ); ?>
				</li>
				<li  class="c-topnav__search-toggler nav-item dropdown hide-if-large">
					<a class="nav-link" href="javascript:void(0)">
						<i class="fas fa-search"></i>
					</a>
					<div class="sub-menu dropdown-menu">
						<?php get_search_form( ); ?>
					</div>
				</li>
			<?php

			$toggler = ob_get_clean();
			$items .=  $toggler; // Adding the created Icon via the shortcode already created
		}
		
		return $items;
	}
}
