<?php

namespace App\DataTables;

use App\Models\Admin;
use Yajra\DataTables\Services\DataTable;

class AdminDatatable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        return datatables($query)
            ->addColumn('checkbox', 'admin.templates.dataTablesColumns.checkbox')
            ->addColumn('actions', 'admin.templates.dataTablesColumns.actions')
            ->rawColumns([
                'checkbox',
                'actions',
            ])
            ->editColumn('created_at', function ($request) {
                return $request->created_at->toDayDateTimeString();
            })
            ->editColumn('updated_at', function ($request) {
                return $request->updated_at->toDayDateTimeString();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Admin $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query() {
        return Admin::query();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->addAction(['width' => '80px'])
            //->parameters($this->getBuilderParameters());
            ->parameters([
                'dom'        => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, 100]],
                'buttons'    => [
                    ['text'   => '<i class="fa fa-plus" style="margin-right:2px;"></i> ' . trans('admin.add'), 'className' => 'btn btn-info ajax-create'],
                    ['text'   => '<i class="fa fa-trash"></i>', 'className' => 'btn btn-danger delBtn'],
                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fas fa-file-csv" style="margin:0 2px;"></i> ' . trans('admin.ex_csv')],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fas fa-file-excel" style="margin:0 2px;"></i> ' . trans('admin.ex_excel')],
                    ['extend' => 'pdfHtml5', 'className' => 'btn btn-warning', 'text' => '<i class="fas fa-file-pdf" style="margin:0 2px;"></i> ' . trans('admin.ex_pdf')],
                    ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fas fa-print"></i>'],
                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fas fa-sync-alt"></i>'],
                ],
                'initComplete' => ' function () {
                            this.api().columns([1,2,3,4,5]).every(function () {
                                var column = this;
                                var input = document.createElement("input");
                                $(input).appendTo($(column.footer()).empty())
                                .on("keyup", function () {
                                    column.search($(this).val(), false, false, true).draw();
                                });
                            });
                        }',
                'language'   => datatableLang(),
                'responsive' => true,
                'autoWidth'  => true,

            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        //return ['id', 'name', 'email', 'created_at', 'updated_at', 'edit', 'delete'];
        return [
            [
                'name'          => 'checkbox',
                'data'          => 'checkbox',
                'title'         => '<input type="checkbox" class="check_all" onclick="check_all()" style="width:20px"/>',
                'exportable'    => false,
                'printable'     => false,
                'orderable'     => false,
                'searchable'    => false,
            ], [
                'name'  => 'id',
                'data'  => 'id',
                'title' => trans('admin.admin_id'),
            ], [
                'name'  => 'name_' . session('lang'),
                'data'  => 'name_' . session('lang'),
                'title' => trans('admin.name'),
            ], [
                'name'  => 'email',
                'data'  => 'email',
                'title' => trans('admin.email'),
            ], [
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => trans('admin.created_at'),
            ], [
                'name'  => 'updated_at',
                'data'  => 'updated_at',
                'title' => trans('admin.updated_at'),
            ], [
                'name'       => 'actions',
                'data'       => 'actions',
                'title'      => trans('admin.actions'),
                'exportable' => false,
                'printable'  => false,
                'orderable'  => false,
                'searchable' => false,
            ],

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Admin_' . date('YmdHis');
    }
}
