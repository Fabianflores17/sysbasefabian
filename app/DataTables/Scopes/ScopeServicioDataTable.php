<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ScopeServicioDataTable implements DataTableScope
{
    public $usuario_id;
    public $cliente_id;
    public $equipo_id;
    public $fecha_recibido;
    public $fecha_inicio;
    public $fecha_fin;
    public $fecha_entrega;



    public function __construct()
    {
        $this->usuario_id = request()->usuario_id ?? null;
        $this->cliente_id = request()->cliente_id ?? null;
        $this->equipo_id = request()->equipo_id ?? null;
        $this->fecha_recibido = request()->fecha_recibido ?? null;
        $this->fecha_inicio = request()->fecha_inicio ?? null;
        $this->fecha_fin = request()->fecha_fin ?? null;
        $this->fecha_entrega = request()->fecha_entrega ?? null;


    }
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if (!is_null($this->usuario_id)){
            if (is_array($this->usuario_id)){
                $query->whereIn('usuario_id',$this->usuario_id);
            }else{
                $query->where('usuario_id',$this->usuario_id);
            }
        }
        if (!is_null($this->cliente_id)){
            if (is_array($this->cliente_id)){
                $query->whereIn('cliente_id',$this->cliente_id);
            }else{
                $query->where('cliente_id',$this->cliente_id);
            }
        }
        if (!is_null($this->equipo_id)){
            if (is_array($this->equipo_id)){
                $query->whereIn('equipo_id',$this->equipo_id);
            }else{
                $query->where('equipo_id',$this->equipo_id);
            }
        }
        if (!is_null($this->fecha_recibido)){
            if (is_array($this->fecha_recibido)){
                $query->whereIn('fecha_recibido',$this->fecha_recibido);
            }else{
                $query->where('fecha_recibido',$this->fecha_recibido);
            }
        }
        if (!is_null($this->fecha_inicio)){
            if (is_array($this->fecha_inicio)){
                $query->whereIn('fecha_inicio',$this->fecha_inicio);
            }else{
                $query->where('fecha_inicio',$this->fecha_inicio);
            }
        }
        if (!is_null($this->fecha_fin)){
            if (is_array($this->fecha_fin)){
                $query->whereIn('fecha_fin',$this->fecha_fin);
            }else{
                $query->where('fecha_fin',$this->fecha_fin);
            }
        }
        if (!is_null($this->fecha_entrega)){
            if (is_array($this->fecha_entrega)){
                $query->whereIn('fecha_entrega',$this->fecha_entrega);
            }else{
                $query->where('fecha_entrega',$this->fecha_entrega);
            }
        }
        // return $query->where('id', 1);
    }
}
