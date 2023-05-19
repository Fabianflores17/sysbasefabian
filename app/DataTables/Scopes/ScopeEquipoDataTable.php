<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ScopeEquipoDataTable implements DataTableScope
{


  public $tipo_id;
  public  $numero_serie;
  public  $imei;
  public  $observaciones;

  public function __construct()
  {
      $this->tipo_id = request()->tipo_id ?? null;
      $this->numero_serie = request()->numero_serie ?? null;
      $this->imei = request()->imei ?? null;
      $this->observaciones = request()->observaciones ?? null;

  }
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {
        if (!is_null($this->tipo_id)){
            if (is_array($this->tipo_id)){
                $query->whereIn('tipo_id',$this->tipo_id);
            }else{
                $query->where('tipo_id',$this->tipo_id);
            }
        }
        if (!is_null($this->numero_serie)){
            if (is_array($this->numero_serie)){
                $query->whereIn('numero_serie',$this->numero_serie);
            }else{
                $query->where('numero_serie',$this->numero_serie);
            }

        }
        if (!is_null($this->imei)){
            if (is_array($this->imei)){
                $query->whereIn('imei',$this->imei);
            }else{
                $query->where('imei',$this->imei);
            }

        }
        if (!is_null($this->observaciones)){
            if (is_array($this->observaciones)){
                $query->whereIn('observaciones',$this->observaciones);
            }else{
                $query->where('observaciones',$this->observaciones);
            }
        // return $query->where('id', 1);
    }
}
}
