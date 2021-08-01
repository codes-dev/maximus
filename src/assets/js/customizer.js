/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute',
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					color: to,
				} );
			}
		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_text_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('color', newval );
		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_top_navigation_background', function( value ) {
		value.bind( function( newval ) {
			$('.c-topnav').css('background', newval );
		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_top_navigation_brand', function( value ) {
		value.bind( function( newval ) {
			$('.c-topnav .navbar-brand').css('color', newval );
		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_top_navigation_brand_hover', function( value ) {
		value.bind( function( newval ) {
			let prevColor = $('.c-topnav .navbar-brand').css('color');
			$('.c-topnav .navbar-brand').on('mouseenter', function(event) {
				$(this).css('color', newval );
			}).on('mouseleave', function(event) {
				$(this).css('color', prevColor );
			});

		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_top_navigation_links', function( value ) {
		value.bind( function( newval ) {
			$('.c-topnav .c-top-navigation .nav-link').css('color', newval );
			$('.c-topnav .navbar-toggler').css('color', newval );
		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_top_navigation_links_hover', function( value ) {
		value.bind( function( newval ) {
			let prevColor = $('.c-topnav .c-top-navigation .nav-link').css('color');
			$('.c-topnav .c-top-navigation .nav-link').on('mouseenter', function(event) {
				$(this).css('color', newval );
			}).on('mouseleave', function(event) {
				$(this).css('color', prevColor );
			});

			$('.c-topnav .navbar-toggler').on('mouseenter', function(event) {
				$(this).css('color', newval );
			}).on('mouseleave', function(event) {
				$(this).css('color', prevColor );
			});

		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_top_navigation_links_focus', function( value ) {
		value.bind( function( newval ) {
			let prevColor = $('.c-topnav .c-top-navigation .nav-link').css('color');
			$('.c-topnav .c-top-navigation .nav-link').on('focusin', function(event) {
				$(this).css('color', newval );
			}).on('focusout', function(event) {
				$(this).css('color', prevColor );
			});

			$('.c-topnav .navbar-toggler').on('focus', function(event) {
				$(this).css('color', newval );
			}).on('focusout', function(event) {
				$(this).css('color', prevColor );
			});

		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_top_navigation_dropdown_links', function( value ) {
		value.bind( function( newval ) {
			$('.c-topnav .c-top-navigation .sub-menu .nav-link').css('color', newval );
		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_top_navigation_dropdown_links_hover', function( value ) {
		value.bind( function( newval ) {
			let prevColor = $('.c-topnav .c-top-navigation .sub-menu .nav-link').css('color');
			$('.c-topnav .c-top-navigation .sub-menu .nav-link').on('mouseenter', function(event) {
				$(this).css('color', newval );
			}).on('mouseleave', function(event) {
				$(this).css('color', prevColor );
			});

		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_top_navigation_dropdown_background', function( value ) {
		value.bind( function( newval ) {
			$('.c-topnav .c-top-navigation .dropdown-menu').css('background', newval );
		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'backgroundcolor', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background', newval );
		} );
	} );

	//Update site footer widget area background color...
	wp.customize( 'maximus_footer_widgets_background', function( value ) {
		value.bind( function( newval ) {
			$('.c-footer .c-footer-widgets-area').css('background', newval );
		} );
	} );

	//Update site credit background color...
	wp.customize( 'maximus_footer_credits_background', function( value ) {
		value.bind( function( newval ) {
			$('.c-footer .c-site-credit').css('background', newval );
		} );
	} );

	//Footer Credit
	wp.customize( 'maximus_footer_credit', function( value ) {
		value.bind( function( to ) {
			$( '.c-site-credit' ).text( to );
		} );
	} );
}( jQuery ) );
