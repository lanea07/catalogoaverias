import './bootstrap';
import Alpine from 'alpinejs';
import imagesLoaded from 'imagesloaded';

window.Alpine = Alpine;
Alpine.start();

$( '#masonry-container' ).imagesLoaded( function () {
    var grid = document.querySelector( '#masonry-container' );
    if ( grid ) {
        var msnry = new Masonry( grid );
        msnry.reloadItems();
    }
} );


const exampleModal = document.getElementById( 'images-modal' )
if ( exampleModal ) {
    exampleModal.addEventListener( 'show.bs.modal', event => {
        const button = event.relatedTarget
        const recipient = button.getAttribute( 'data-bs-img-path' )
        const modalImage = exampleModal.querySelector( '.modal-body img' )
        modalImage.src = "data:image/png;base64," + recipient
    } );
}