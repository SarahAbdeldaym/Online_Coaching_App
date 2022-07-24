<?php

namespace App\DataTables;

use App\Models\Feedback;

use Yajra\DataTables\Services\DataTable;

class FeedbackDatatable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        return datatables($query)
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
     * @param \App\Models\DegreeDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query() {
        return Feedback::query()->with(['coach', 'client']);
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
            ->parameters([
                'dom'        => 'Blfrtip',
                'lengthMenu' => [[10, 25, 50, 100], [10, 25, 50, 100]],
                'buttons'    => [
                    ['extend' => 'csv', 'className' => 'btn btn-info', 'text' => '<i class="fas fa-file-csv" style="margin:0 2px;"></i> ' . trans('admin.ex_csv')],
                    ['extend' => 'excel', 'className' => 'btn btn-success', 'text' => '<i class="fas fa-file-excel" style="margin:0 2px;"></i> ' . trans('admin.ex_excel')],
                    ['extend' => 'pdfHtml5', 'className' => 'btn btn-warning', 'text' => '<i class="fas fa-file-pdf" style="margin:0 2px;"></i> ' . trans('admin.ex_pdf')],
                    ['extend' => 'print', 'className' => 'btn btn-primary', 'text' => '<i class="fas fa-print"></i>'],
                    ['extend' => 'reload', 'className' => 'btn btn-default', 'text' => '<i class="fas fa-sync-alt"></i>'],
                ],
                'initComplete' => ' function () {
                this.api().columns([2,3,4]).every(function () {
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
        return [
            [
                'name'  => 'id',
                'data'  => 'id',
                'title' => trans('admin.admin_id'),
            ], [
                'name'  => 'coach_id',
                'data'  => 'coach.name_' . session('lang'),
                'title' => 'Coach Name',
            ], [
                'name'  => 'client_id',
                'data'  => 'client.name_' . session('lang'),
                'title' => 'Client Name',
            ], [
                'name'  => 'comment',
                'data'  => 'comment',
                'title' => 'Comment',
            ], [
                'name'  => 'created_at',
                'data'  => 'created_at',
                'title' => trans('admin.created_at'),
            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'Feedbacks_' . date('YmdHis');
    }
}
