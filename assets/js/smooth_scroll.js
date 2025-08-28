/**
 * Jquery for the scroll to the section (frontpage)
 */
( function( $ ) {

    $( document ).ready(function() {

        //scroll smooth on anchor
        $('a[href^="#"]').on('click',function(e) {

            if ( ! $(this).hasClass( 'up_scrollup' ) ) {

                e.preventDefault();

                var target = this.hash;

                var $target = $(target);

                $( 'html, body' ).stop().animate({
                 'scrollTop' : $target.offset().top
                });

            }
        });
    });

})( window.jQuery );