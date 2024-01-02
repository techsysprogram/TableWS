
/*
jQuery( document ).ready( function( $ ) {
    $( '#btnStock' ).click( function() {
        alert( 'Attention' );
    } );
} );
*/

jQuery(document).ready(function($) {
    // Sélectionne le bouton par son ID ou sa classe CSS
    var bouton = $('#btnStock');

    // Ajoute un gestionnaire d'événement pour le clic sur le bouton
    bouton.on('click', function() {
        // Change la couleur du bouton en rouge
        bouton.css('background-color', 'red');
    });
});
