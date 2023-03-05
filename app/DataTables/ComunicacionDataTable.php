<?php

namespace App\DataTables;

use App\Comunicaciones;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class ComunicacionDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);
        return $dataTable->addColumn('action', 'comunicaciones.datatables_actions');
    }
    public function query(Comunicaciones $model)
    {
        $query = $model->newQuery()->where("de_id", Auth::user()->id)->with(["dirigido", "via", "hr"]);
        return $query;
    }

    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            // ->addColumn(['data' => 'dirigido_id'])
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
            ['data' => 'dirigido.name', 'title' => 'Para'],
            ['data' => 'via.name', 'title' => 'Via'],
            ['data' => 'hr.name', 'title' => 'HojaRuta'],
            'fecha',
            'hora',
            'document_id',
        ];
    }

}
