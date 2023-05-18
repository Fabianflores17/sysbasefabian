<?php

namespace App\DataTables;

use App\Models\Servicio;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Services\DataTable;

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

        return datatables()
            ->eloquent($query)
            ->addColumn('action', function(Servicio $servicio){
                $id = $servicio->id;
                return view('servicios.datatables_actions',compact('servicio','id'));
            })
            ->editColumn('id',function (Servicio $servicio){

                return $servicio->id;

            })
            ->rawColumns(['action'])
            ->editColumn('cliente.nombres', function(Servicio $servicio){
                return $servicio->cliente->nombres ?? '';
            })
            ->editColumn('cliente.apellidos', function(Servicio $servicio){
                return $servicio->cliente->apellidos ?? '';
            })
            ->editColumn('equipo.tipo.nombre', function(Servicio $equipo){
                 return $equipo->Equipo->tipo->nombre ?? '';
             })

            ->editColumn('equipo.numero_serie', function(Servicio $servicio){
                return $servicio->equipo->numero_serie ?? '';

            })
            ->editColumn('usuario.name', function(Servicio $equipo){
                return $equipo->usuario->name ?? '';

            })
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Servicio $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Servicio $model)
    {
       // return $model->newQuery()->select($model->getTable().'.*');
       return $model->newQuery()->select($model->getTable().'.*')
       ->with(['usuario'])
       ->with(['cliente'])
       ->with(['equipo'])
       ->with(['equipo.tipo'])
    //    ->whereIn('equipo_id',function ($q){
        // $q->select('id')->from('soporte_equipos')->whereNull('deleted_at');
        // })

        // ->whereIn('cliente_id',function ($q){
        // $q->select('id')->from('soporte_clientes')->whereNull('deleted_at');
        // })

        // ->whereIn('usuario_id',function ($q){
        // $q->select('id')->from('users')->whereNull('deleted_at');
        // })
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
                ->ajax([
                'data' => "function(data) { formatDataDataTables($('#formFiltersDatatables').serializeArray(), data);   }"
                ])
                ->info(true)
                ->language(['url' => asset('js/SpanishDataTables.json')])
                ->responsive(true)
                ->stateSave(false)
                ->orderBy(1,'desc')
                ->dom('
                    <"row mb-2"
                    <"col-sm-12 col-md-6" B>
                    <"col-sm-12 col-md-6" f>
                    >
                    rt
                    <"row"
                    <"col-sm-6 order-2 order-sm-1" ip>
                    <"col-sm-6 order-1 order-sm-2 text-right" l>
                    >
                ')
                ->buttons(

                    Button::make('reset')
                        ->addClass('')
                        ->text('<i class="fa fa-undo"></i> <span class="d-none d-sm-inline">Reiniciar</span>'),

                    Button::make('export')
                        ->extend('collection')
                        ->addClass('')
                        ->text('<i class="fa fa-download"></i> <span class="d-none d-sm-inline">Exportar</span>')
                        ->buttons([
                            Button::make('print')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-print"></i> <span class="d-none d-sm-inline"> Imprimir</span>'),
                            Button::make('csv')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-csv"></i> <span class="d-none d-sm-inline"> Csv</span>'),
                            Button::make('pdf')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-pdf"></i> <span class="d-none d-sm-inline"> Pdf</span>'),
                            Button::make('excel')
                                ->addClass('dropdown-item')
                                ->text('<i class="fa fa-file-excel"></i> <span class="d-none d-sm-inline"> Excel</span>'),
                        ]),
                );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id'),
            Column::make('usuario.name'),
            //Column::make('cliente.nombres'), se mostraba nombre y apellid junto
            Column::make('nombres')
            ->data('cliente.nombres')
            ->name('cliente.nombres')
            ->visible(true),

            Column::make('apellidos')
            ->data('cliente.apellidos')//el attributo del objeto
            ->name('cliente.apellidos')//donde busca
            ->visible(true),
            Column::make('equipo.numero_serie'),
            Column::make('equipo.tipo.nombre'),
            Column::make('problema'),
            Column::make('solucion'),
            Column::make('recomendaciones'),
            Column::make('fecha_recibido'),
            Column::make('fecha_inicio'),
            Column::make('fecha_fin'),
            Column::make('fecha_entrega'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width('20%')
                ->addClass('text-center')
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
