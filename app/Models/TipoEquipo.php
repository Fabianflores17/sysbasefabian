<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class TipoEquipo extends Model
{

    use SoftDeletes;
    use HasFactory;

    public $table = 'soporte_equipo_tipos';

    public $fillable = [
        'nombre',
        'activo'
    ];

    public $appends = [
        'color_estado',

    ];

    protected $casts = [
        'nombre' => 'string',
        'activo' => 'string'
    ];

    public static $rules = [
        'nombre' => 'required|string|max:255',
        'activo' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function soporteEquipos(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\SoporteEquipo::class, 'tipo_id');
    }


    public function getColorEstadoAttribute(){
        return $this->activo == 'si' ? 'badge-success' : 'badge-danger';
    }
}
