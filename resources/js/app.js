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