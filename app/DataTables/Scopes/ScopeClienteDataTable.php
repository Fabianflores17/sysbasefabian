<?php

namespace App\DataTables\Scopes;

use Yajra\DataTables\Contracts\DataTableScope;

class ScopeClienteDataTable implements DataTableScope
{

    public $nombres;
    public $apellidos;
    public $dpi;
    public $telefono;
    public $direccion;
    public $correo;


    public function __construct(array $filtros=null)
    {
        $this->nombres = request()->nombres ?? null;
        $this->apellidos = request()->apellidos ?? null;
        $this->dpi = request()->dpi ?? null;
        $this->telefono = request()->telefono ?? null;
        $this->direccion = request()->direccion ?? null;
        $this->correo = request()->correo ?? null;

    }
    /**
     * Apply a query scope.
     *
     * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
     * @return mixed
     */
    public function apply($query)
    {


        // return $query->where('id', 1);
        if (!is_null($this->nombres)){
            if (is_array($this->nombres)){
                $query->whereIn('nombres',$this->nombres);
            }else{
                $query->where('nombres',$this->nombres);
            }

        }
        if (!is_null($this->apellidos)){
            if (is_array($this->apellidos)){
                $query->whereIn('apellidos',$this->apellidos);
            }else{
                $query->where('apellidos',$this->apellidos);
            }

        }
        if (!is_null($this->dpi)){
            if (is_array($this->dpi)){
                $query->whereIn('dpi',$this->dpi);
            }else{
                $query->where('dpi',$this->dpi);
            }

        }
        if (!is_null($this->telefono)){
            if (is_array($this->telefono)){
                $query->whereIn('telefono',$this->telefono);
            }else{
                $query->where('telefono',$this->telefono);
            }

        }
        if (!is_null($this->direccion)){
            if (is_array($this->direccion)){
                $query->whereIn('direccion',$this->direccion);
            }else{
                $query->where('direccion',$this->direccion);
            }

        }
        if (!is_null($this->correo)){
            if (is_array($this->correo)){
                $query->whereIn('correo',$this->correo);
            }else{
                $query->where('correo',$this->correo);
            }

        }

    }

    }

