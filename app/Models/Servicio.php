<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    public $table = 'soporte_servicios';

    public $fillable = [
        'usuario_id',
        'cliente_id',
        'equipo_id',
        'problema',
        'solucion',
        'recomendaciones',
        'fecha_recibido',
        'fecha_inicio',
        'fecha_fin',
        'fecha_entrega'
    ];

    protected $casts = [
        'problema' => 'string',
        'solucion' => 'string',
        'recomendaciones' => 'string',
        'fecha_recibido' => 'date:Y-m-d',
        'fecha_inicio' => 'date:Y-m-d',
        'fecha_fin' => 'date:Y-m-d',
        'fecha_entrega' => 'date:Y-m-d'
    ];

    public static $rules = [
        'usuario_id' => 'required',
        'cliente_id' => 'required',
        'equipo_id' => 'required',
        'problema' => 'required|string',
        'solucion' => 'required|string',
        'recomendaciones' => 'nullable|string',
        'fecha_recibido' => 'required',
        'fecha_inicio' => 'nullable',
        'fecha_fin' => 'nullable',
        'fecha_entrega' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function cliente(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Cliente::class, 'cliente_id');
    }

    public function equipo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Equipo::class, 'equipo_id');
    }

    public function usuario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\User::class, 'usuario_id');
    }
}
