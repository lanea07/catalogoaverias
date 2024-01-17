<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function ($user) {
            return $user->created_at ?? $user->created_at->timezone('America/Bogota');
            })
            ->editColumn('updated_at', function ($user) {
            return $user->created_at ?? $user->updated_at->timezone('America/Bogota');
            })
            ->addColumn('role', function ($user) {
            return $user->roles->map(function ($roles) {
                return $roles->name;
            })->implode('<br>');
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->with(['roles'])->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1, 'asc')
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                // Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ])
            ->createdRow('function ( row, data, dataIndex ) {
                if ( !data[ "valid_id" ] ) {
                  $( row ).children().addClass( "text-body-tertiary" );
                }
              }');
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('name')->title(__('Name')),
            Column::make('email')->title(__('Email')),
            Column::make('role')->title(trans_choice('Role|Roles', 1))->name('roles.name')->orderable(false),
            Column::make('created_at')->title(__('Created at'))->searchable(false)->orderable(false),
            Column::make('updated_at')->title(__('Updated at'))->searchable(false)->orderable(false),
            Column::make(__('Options'))->render('\'<a class="btn btn-sm btn-outline-warning" href="users/\' + full.id + \'">Detalles</a>\'')->searchable(false)->orderable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
