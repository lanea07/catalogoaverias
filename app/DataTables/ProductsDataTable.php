<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', '')
            ->addColumn(__('Options'), '')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('products-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            // ->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                //Button::make('csv'),
                //Button::make('pdf'),
                //Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ])
            ->parameters(
                [
                    'responsive' => [
                        'details' => [
                        'type' => 'inline',
                            'target' => 'tr',
                            'renderer' => 'function (api, rowIdx, columns) {
                                let data = columns.map((col, i) => {
                                    return col.hidden
                                        ? \'<tr data-dt-row="\' +
                                                col.rowIndex +
                                                \'" data-dt-column="\' +
                                                col.columnIndex +
                                                \'">\' +
                                                \'<td>\' +
                                                col.title +
                                                \':\' +
                                                \'</td> \' +
                                                \'<td>\' +
                                                col.data +
                                                \'</td>\' +
                                                \'</tr>\'
                                        : \'\';
                                }).join(\'\');
                 
                                let table = document.createElement(\'table\');
                                table.innerHTML = data;
                                table.classList.add(\'table\');
                                table.classList.add(\'table-hover\');
                 
                                return data ? table : false;
                            }',
                        ],
                    ],
                'initComplete' => 'function() { 
                    var table = $( "#products-table" ).DataTable();
                    table.columns().flatten().each( function ( colIdx ) {
                        // Create the select list and search operation
                        if(colIdx !== 0) {
                            var select = $( "<select />" )
                                .appendTo(
                                    table.column( colIdx ).footer()
                                )
                                .on( "change", function () {
                                    table
                                        .column( colIdx )
                                        .search( $( this ).val() )
                                        .draw();
                                }
                            );
                            select.append( $("<option value=\'\'>---</option>") )
                            // Get the search data for the first column and add to the select list
                            table
                                .column( colIdx )
                                .data()
                                .sort()
                                .unique()
                                .each( function ( d ) {
                                    if(d) { select.append( $( "<option value=" + d + ">" + d + "</option>" ) ); }
                                } );
                        }

                    } );
                }'
                    // 'columnDefs' => [
                    //     ['responsivePriority' => 0, 'targets' => [0, 1, 2, 3, 4]],
                    //     ['responsivePriority' => 1, 'targets' => [5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17]]
                    // ]
                ]
            );
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('dt-control')
                ->title(__('Details')),
            Column::make('ticket')->render(
                '\'<a class="link-primary" target="_blank" href="products/\' + full.id + \'">\' + data + \'</a>\''
            )->title(__('Ticket')),
            Column::make('img_path')->title(__('Has Images?')),
            Column::make('queue')->title(__('Queue')),
            Column::make('ean')->title(__('EAN')),
            Column::make('negocio')->title(__('Business Unit')),
            Column::make('departamento')->title(__('Department')),
            Column::make('grupo')->title(__('Group')),
            Column::make('categoria')->title(__('Category')),
            Column::make('subcategoria')->title(__('Subcategory')),
            Column::make('descripcion')->title(__('Description')),
            Column::make('referencia')->title(__('Reference')),
            Column::make('marca')->title(__('Brand')),
            Column::make('medida')->title(__('Measure')),
            Column::make('color')->title(__('Color')),
            Column::make('costo')->title(__('Cost')),
            Column::make('nit_proveedor')->title(__('Provider NIT')),
            Column::make('razon_social_proveedor')->title(__('Provider Name')),
            Column::make('fecha_inicio_gestion')->title(__('Starting Date')),
            Column::make('dias_transcurridos')->title(__('Days Passed')),
            Column::make('observaciones')->title(__('Notes')),
            Column::make(__('Options'))
                ->render('\'<div class="dropdown"><a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . __('Options') . '</a><ul class="dropdown-menu"><li><a target="_blank" class="dropdown-item" href="products/\' + full.id + \'">' . __('View') . '</a></li><li><a target="_blank" class="dropdown-item" href="products/\' + full.id + \'/edit">' . __('Edit') . '</a></li></ul></div>\''),
            // ->render('\'<a href="products/\' + full.id + \'">Detalles</a>\''),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Products_' . date('YmdHis');
    }
}
