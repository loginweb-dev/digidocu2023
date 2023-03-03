<?php

namespace App\DataTables;

use App\Comunicaciones;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;

class ComunicacionDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'comunicaciones.datatables_actions');
    }
    public function query(Comunicaciones $model)
    {
        $query = $model->newQuery();
        return $query;
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom' => 'Bfrtip',
                'stateSave' => true,
                'order' => [[0, 'desc']],
                'buttons' => [
                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    protected function getColumns()
    {
        return [
            'id',
            'dirigido_id',
            'via_id',
            'de_id',
            'hojaderuta_id',
            'document_id',
            // 'referencia',
            // 'nota',
            'fecha',
            'hora'
        ];
    }

}
