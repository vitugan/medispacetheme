/**
 * Header behaviour (all pages):
 * - Overlay header: transparent over the hero, solid once the page is scrolled
 *   (.is-scrolled on header.is-overlay).
 * - Mobile menu overlay: submenus (Services) collapse and expand on tap instead of being
 *   always open (.is-expanded on the submenu item), as in the design.
 * The look lives in assets/css/patterns.css.
 */
( function () {
	const header = document.querySelector( 'header.is-overlay' );
	if ( header ) {
		const update = () => header.classList.toggle( 'is-scrolled', window.scrollY > 10 );
		update();
		window.addEventListener( 'scroll', update, { passive: true } );
	}

	document.addEventListener( 'click', ( event ) => {
		const trigger = event.target.closest(
			'.site-header__nav .is-menu-open .has-child > .wp-block-navigation-item__content'
		);
		if ( ! trigger ) {
			return;
		}
		event.preventDefault();
		const item = trigger.parentElement;
		const expanded = item.classList.toggle( 'is-expanded' );
		trigger.setAttribute( 'aria-expanded', expanded ? 'true' : 'false' );
	} );
} )();
