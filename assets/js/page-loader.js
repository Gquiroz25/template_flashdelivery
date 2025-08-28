/**
 * Jquery for the the preloader
 */
( function( $ ) {

    $( document ).ready(function() {

        //prelaoder fadeout on ready
        $( '.status' ).fadeOut();
        $( '.preloader' ).delay(1000).fadeOut( 'slow' );

    });

})( window.jQuery );