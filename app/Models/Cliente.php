<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    public $table = 'soporte_clientes';

    public $fillable = [
        'nombres',
        'apellidos',
        'dpi',
        'telefono',
        'direccion',
        'correo'
    ];

    protected $casts = [
        'nombres' => 'string',
        'apellidos' => 'string',
        'dpi' => 'string',
        'telefono' => 'string',
        'direccion' => 'string',
        'correo' => 'string'
    ];

    public static $rules = [
        'nombres' => 'required|string',
        'apellidos' => 'required|string',
        'dpi' => 'required|string',
        'telefono' => 'required|string',
        'direccion' => 'nullable|string',
        'correo' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public function soporteServicios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\SoporteServicio::class, 'cliente_id');
    }
}
