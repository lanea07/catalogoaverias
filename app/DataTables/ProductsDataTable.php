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
            //->dom('Bfrtip')
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
                            'type' => 'column',
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
            Column::make('ticket')->render('\'<a target="_blank" href="products/\' + full.id + \'">\' + full.ticket + \'</a>\''),
            Column::make('queue'),
            Column::make('ean'),
            Column::make('negocio'),
            Column::make('departamento'),
            Column::make('grupo'),
            Column::make('categoria'),
            Column::make('subcategoria'),
            Column::make('descripcion'),
            Column::make('referencia'),
            Column::make('marca'),
            Column::make('medida'),
            Column::make('color'),
            Column::make('costo'),
            Column::make('nit_proveedor'),
            Column::make('razon_social_proveedor'),
            Column::make('fecha_inicio_gestion'),
            Column::make('dias_transcurridos'),
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
