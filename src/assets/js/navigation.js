/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
window.addEventListener('load', (event) => {
	( function() {
		const siteNavigation = document.getElementById( 'c-top-navigation' );
	
		// Return early if the navigation don't exist.
		if ( ! siteNavigation ) {
			return;
		}
	
		const togglers = Array.from(siteNavigation.getElementsByClassName('dropdown-toggle'));
		togglers.forEach(element => {
			element.addEventListener('click', (event) => {
				event.preventDefault();
				if (element.nextElementSibling) {
					if (element.nextElementSibling.classList) {
						let arr = element.nextElementSibling.classList;
						if (arr.contains('show')) {
							arr.remove('show');
							closeSubDropdowns(element);
						} else {
							closeTlDropdowns(siteNavigation, element);
							arr.add('show');
							
						}
					} else {
						let arr = element.nextElementSibling.className.split(" ");
						if (arr.indexOf("show") > 0) {
							arr.replace(/\b show\b/g, "");
							closeSubDropdowns(element);
						} else {
							closeTlDropdowns(siteNavigation, element);
							element.className += " show";							
						}
					}
				}
			})
			element.addEventListener('mousedown', (event) => {
				event.preventDefault();
			});
		});

		function closeTlDropdowns(container, clicked) {
			let subMenus = Array.from(container.getElementsByClassName('sub-menu'));
			subMenus.forEach(element => {
				if (!element.parentElement.parentElement.classList.contains('sub-menu') || element.parentElement.parentElement.className.split(" ").indexOf('sub-menu') < 0) {
					if (element.classList.contains('show') || element.className.split(" ").indexOf('show') > 0) {
						if (Array.from(element.getElementsByClassName('dropdown-toggle')).indexOf(clicked) < 0) {
							if (element.classList) {
								element.classList.remove('show');
							} else {
								element.className.replace(/\b show\b/g, "");
							}
							Array.from(element.getElementsByClassName('sub-menu')).forEach(element => {
								if (element.classList) {
									element.classList.remove('show');
								} else {
									element.replace(/\b show\b/g, "");
								}
							});
						}
					}
				}
			});
		}

		function closeSubDropdowns(parentDropdown) {
			if (parentDropdown.nextElementSibling !== null) {
				if (parentDropdown.nextElementSibling.classList.contains("sub-menu") || parentDropdown.className.split(" ").indexOf("sub-menu") > 0) {
	
					let arr = Array.from(parentDropdown.nextElementSibling.getElementsByClassName('sub-menu'));
	
					arr.forEach(element => {
						if (element.classList) {
							let arr = element.classList;
							if (arr.contains('show')) {
								arr.remove('show');
							}
						} else {
							let arr = element.className.split(" ");
							if (arr.indexOf("show") > 0) {
								arr.replace(/\b show\b/g, "");
							}
						}
					});
				}
			}
		}
	
		/*const button = siteNavigation.getElementsByTagName( 'button' )[ 0 ];
	
		// Return early if the button don't exist.
		if ( 'undefined' === typeof button ) {
			return;
		}
	
	
	
		const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];
	
		// Hide menu toggle button if menu is empty and return early.
		if ( 'undefined' === typeof menu ) {
			button.style.display = 'none';
			return;
		}
	
		if ( ! menu.classList.contains( 'nav-menu' ) ) {
			menu.classList.add( 'nav-menu' );
		}*/
	
		// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
		/*button.addEventListener( 'click', function() {
			siteNavigation.classList.toggle( 'toggled' );
	
			if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
				button.setAttribute( 'aria-expanded', 'false' );
			} else {
				button.setAttribute( 'aria-expanded', 'true' );
			}
		} );*/
	
		/*// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
		document.addEventListener( 'click', function( event ) {
			const isClickInside = siteNavigation.contains( event.target );
	
			if ( ! isClickInside ) {
				siteNavigation.classList.remove( 'toggled' );
				button.setAttribute( 'aria-expanded', 'false' );
			}
		} );
	
		// Get all the link elements within the menu.
		const links = menu.getElementsByTagName( 'a' );
	
		// Get all the link elements with children within the menu.
		const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );
	
		// Toggle focus each time a menu link is focused or blurred.
		for ( const link of links ) {
			link.addEventListener( 'focus', toggleFocus, true );
			link.addEventListener( 'blur', toggleFocus, true );
		}
	
		// Toggle focus each time a menu link with children receive a touch event.
		for ( const link of linksWithChildren ) {
			link.addEventListener( 'touchstart', toggleFocus, false );
		}
	
		/**
		 * Sets or removes .focus class on an element.
		 */
		/*function toggleFocus() {
			if ( event.type === 'focus' || event.type === 'blur' ) {
				let self = this;
				// Move up through the ancestors of the current link until we hit .nav-menu.
				while ( ! self.classList.contains( 'nav-menu' ) ) {
					// On li elements toggle the class .focus.
					if ( 'li' === self.tagName.toLowerCase() ) {
						self.classList.toggle( 'focus' );
					}
					self = self.parentNode;
				}
			}
	
			if ( event.type === 'touchstart' ) {
				const menuItem = this.parentNode;
				event.preventDefault();
				for ( const link of menuItem.parentNode.children ) {
					if ( menuItem !== link ) {
						link.classList.remove( 'focus' );
					}
				}
				menuItem.classList.toggle( 'focus' );
			}
		}*/
	}() );
});
