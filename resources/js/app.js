import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

setTimeout( () => {
    var grid = document.querySelector( '#masonry-container' );
    if ( grid ) {
        var msnry = new Masonry( grid );
        msnry.reloadItems();
    }
}, 2000 );

const exampleModal = document.getElementById( 'images-modal' )
if ( exampleModal ) {
    exampleModal.addEventListener( 'show.bs.modal', event => {
        // Button that triggered the modal
        const button = event.relatedTarget
        // Extract info from data-bs-* attributes
        const recipient = button.getAttribute( 'data-bs-img-path' )
        // If necessary, you could initiate an Ajax request here
        // and then do the updating in a callback.

        // Update the modal's content.
        const modalImage = exampleModal.querySelector( '.modal-body img' )

        // modalTitle.textContent = `New message to ${recipient}`
        // modalBodyInput.value = recipient
        modalImage.src = recipient
    } )
}