<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
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
            ->dom('Bfrtip')
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
            ->parameters([
                'responsive' => true,
            ]);
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
                ->addClass('dt-control'),
            Column::make('ticket'),
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
