<?php

namespace App\DataTables;

use App\Models\Servicio;
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
        ->editColumn('tipo_id', function(Servicio $equipo){
            return $equipo->Equipo->tipo->nombre ?? '';
        })
        ->editColumn('equipo_id', function(Servicio $equipo){
            return $equipo->equipo->numero_serie ?? '';
            @dd($equipo);
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
        return $model->newQuery()
        ->with(['usuario:id,name'])
        ->with(['cliente:id,nombres'])
        ->with(['equipo:id,numero_serie'])
        //->with(['equipo:id,numero_serie'])

       // ->with('usuario.unidad:id,nombre')
        //->with('usuario.puesto:id,nombre')
        ;
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
            'usuario_id'=>['title'=> 'Usuario', 'name' => 'usuario.name', 'data' => 'usuario.name', 'orderable' => 'false'],
            'cliente_id'=>['title'=> 'Cliente', 'name' => 'cliente.nombres', 'data' => 'cliente.nombres', 'orderable' => 'false'],
            'equipo_id'=>['title'=> 'Equipo', 'name' => 'equipo.numero_serie', 'data' => 'equipo.numero_serie', 'orderable' => 'false'],
            //'tipo_id'=>['title'=> 'numero serie', 'name' => 'equipo_id', 'data' => 'tipo_id', 'orderable' => 'false'],
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
