<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEquipo extends Model
{
    public $table = 'soporte_equipo_tipos';

    public $fillable = [
        'nombre',
        'activo'
    ];

    protected $casts = [
        'nombre' => 'string',
        'activo' => 'string'
    ];

    public static $rules = [
        'nombre' => 'required|string',
        'activo' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function soporteEquipos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\SoporteEquipo::class, 'tipo_id');
    }
}
