<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipo extends Model
{

    use SoftDeletes;
    use HasFactory;

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
        'numero_serie' => 'required|string|max:255',
        'imei' => 'nullable|string|max:255',
        'observaciones' => 'nullable|string|max:65535',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

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
