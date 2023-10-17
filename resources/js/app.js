import './bootstrap';
import 'laravel-datatables-vite';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.onreadystatechange = function () {
    if ( document.readyState == "complete" ) {

        function formatProductsTable ( d ) {
            // // `d` is the original data object for the row
            return '' +
                '<table class="table table-bordered">' +
                '<tr>' +
                '<td>Medida</td><td>' + d.medida + '</td>' +
                '<td>Color</td><td>' + d.color + '</td>' +
                '<td>Costo</td><td>' + d.costo + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td>Nit Proveedor</td><td>' + d.nit_proveedor + '</td>' +
                '<td>Razón Social Proveedor</td><td>' + d.razon_social_proveedor + '</td>' +
                '<td>Fecha Inicio Gestión</td><td>' + d.fecha_inicio_gestion + '</td>' +
                '</tr>' +
                '<tr>' +
                '<td colspan="3">Días Transcurridos</td><td colspan="3">' + d.dias_transcurridos + '</td>' +
                '</tr>' +
                '</table>';
        }

        // Add event listener for opening and closing details
        $( '#products-table tbody' ).on( 'click', 'td.dt-control', function () {
            var tr = $( this ).closest( 'tr' );
            var row = $( '#products-table' ).DataTable().row( tr );

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass( 'shown' );
            }
            else {
                // Open this row
                console.log( row );
                row.child( formatProductsTable( row.data() ) ).show();
                tr.addClass( 'shown' );
            }
        } );
    }
}