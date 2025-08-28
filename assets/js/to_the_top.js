/**
 * Jquery for the scroll to the top (all-pages)
 */
( function( $ ) {

    $( document ).ready(function() {

        //show sign
        $( window ).scroll(function () {
            if ( $(this).scrollTop() > 100 ) {
                $( '.up_scrollup' ).fadeIn();
            } else {
                $( '.up_scrollup' ).fadeOut();
            }
        });
    
        //function scroll smooth
        $( '.up_scrollup' ).click(function () {
            $( 'html, body' ).animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });

})( window.jQuery );