/**
 * Jquery on frontpage
 * Handles the wide image on the media section
 */
( function( $ ) {
	
	var windowsSize = $( window ).height();
	var sidebarAdminSize = $( '#wpadminbar' ).height() || 0;
	var sidebarTopSize = $( '.sidebar-top' ).height() || 0;
	var navBarSize = $( '.navbar-main' ).height();
	var defaultOffset = 40;
	if ( ! window.matchMedia( '(max-width: 767px)' ).matches ){
		$( '.custom-header' ).css( 'height', ( windowsSize - ( navBarSize + sidebarTopSize + sidebarAdminSize + defaultOffset ) ) );
	}
})( window.jQuery );