/* global jQuery */
/**
 * Ajax Api Callbacks
 *
 */

( function( $ ) {
    let count = $('.maximus_currencies_div .maximus_currencies_list li').length;
    if (!count) {
        $('.maximus_currencies_div .maximus_currencies_list').prop('innerHTML', '<p>No Currency Available.</p>');
    }
}( jQuery ) );
