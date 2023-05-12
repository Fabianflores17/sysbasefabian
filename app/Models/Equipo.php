<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public $table = 'soporte_equipos';

    public $fillable = [
        'tipo_id',
        'numero_serie',
        'imei',
        'observaciones'
    ];

    protected $casts = [
        'numero_serie' => 'string',
        'imei' => 'string',
        'observaciones' => 'string'
    ];

    public static $rules = [
        'tipo_id' => 'required',
        'numero_serie' => 'required|string',
        'imei' => 'nullable|string',
        'observaciones' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function tipo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\SoporteEquipoTipo::class, 'tipo_id');
    }

    public function soporteServicios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\SoporteServicio::class, 'equipo_id');
    }
}
