<?php

namespace App\DataTables;

use App\Models\Servicio;
use App\Models\Equipo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;


class ServicioDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
        ->addColumn('action', 'servicios.datatables_actions')
        ->editColumn('usuario_id',function(Servicio $servicio){
            return $servicio->usuario->name ?? '';

        })
        ->editColumn('cliente_id', function(Servicio $servicio){
            return $servicio->cliente->nombres.' '.$servicio->cliente->apellidos ?? '';
        })
        ->editColumn('equipo_id', function(Servicio $servicio){
            return $servicio->equipo->numero_serie ?? '';
        });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Servicio $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Servicio $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    // Enable Buttons as per your need
//                    ['extend' => 'create', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'export', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'print', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reset', 'className' => 'btn btn-default btn-sm no-corner',],
//                    ['extend' => 'reload', 'className' => 'btn btn-default btn-sm no-corner',],
                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'usuario_id'=>['title'=> 'Usuario', 'name' => 'usuario_id', 'data' => 'usuario_id', 'orderable' => 'false'],
            'cliente_id'=>['title'=> 'Cliente', 'name' => 'cliente_id', 'data' => 'cliente_id', 'orderable' => 'false'],
            'equipo_id'=>['title'=> 'Equipo serie', 'name' => 'equipo_id', 'data' => 'equipo_id', 'orderable' => 'false'],
            'problema',
            'solucion',
            'recomendaciones',
            'fecha_recibido',
            'fecha_inicio',
            'fecha_fin',
            'fecha_entrega'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'servicios_datatable_' . time();
    }
}
