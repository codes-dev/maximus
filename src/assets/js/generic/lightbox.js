import 'magnific-popup/dist/jquery.magnific-popup';

( function( $ ) {
    // Add it after jquery.magnific-popup.js and before first initialization code
    $.extend(true, $.magnificPopup.defaults, {
        tClose: 'Close (Esc)', // Alt text on close button
        tLoading: 'Loading...', // Text that is displayed during loading. Can contain %curr% and %total% keys
        gallery: {
        tPrev: 'Previous (Left arrow key)', // Alt text on left arrow
        tNext: 'Next (Right arrow key)', // Alt text on right arrow
        tCounter: '%curr% of %total%' // Markup for "1 of 7" counter
        },
        image: {
        tError: '<a href="%url%">The image</a> could not be loaded.' // Error message when image could not be loaded
        },
        ajax: {
        tError: '<a href="%url%">The content</a> could not be loaded.' // Error message when ajax request failed
        }
    });
    $('.gallery a').magnificPopup({
        type:'image',
        gallery: {enabled:true}, 
        preload: [1,3],
        // Delay in milliseconds before popup is removed
        removalDelay: 300,

        // Class that is added to popup wrapper and background
        // make it unique to apply your CSS animations just to this exact popup
        mainClass: 'mfp-fade mfp-with-zoom',

        retina: {
            ratio: 1, // Increase this number to enable retina image support.
            // Image in popup will be scaled down by this number.
            // Option can also be a function which should return a number (in case you support multiple ratios). For example:
            // ratio: function() { return window.devicePixelRatio === 1.5 ? 1.5 : 2  }
        
        
            replaceSrc: function(item, ratio) {
                return item.src.replace(/\.\w+$/, function(m) { return '@2x' + m; });
            } // function that changes image source
        }, 

        zoom: {
            enabled: true, // By default it's false, so don't forget to enable it
        
            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out', // CSS transition easing function
        
            // The "opener" function should return the element from which popup will be zoomed in
            // and to which popup will be scaled down
            // By defailt it looks for an image tag:
            opener: function(openerElement) {
              // openerElement is the element on which popup was initialized, in this case its <a> tag
              // you don't need to add "opener" option if this code matches your needs, it's defailt one.
              return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        }
    });
}( jQuery ) );


