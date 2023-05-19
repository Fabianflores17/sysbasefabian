<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 use Illuminate\Database\Eloquent\SoftDeletes;
 use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{

    use SoftDeletes;
    use HasFactory;

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
        'nombres' => 'required|string|max:255',
        'apellidos' => 'required|string|max:255',
        'dpi' => 'required|string|max:13',
        'telefono' => 'required|string|max:20',
        'direccion' => 'nullable|string|max:255',
        'correo' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable'
    ];

    public static $messages = [

    ];

    public function servicio(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Servicio::class, 'cliente_id');
    }

    // public function scopenombres($query, $nombres)
    // {
    //     // if ($nombres=null)
    //     // return $query->where('nombres', $nombres);
    //     if ($nombres){
    //         $query->whereHas('nombres', function($q){

    //         $q->wherenombre($this->nombres);
    //     });
    //     }
    // }

    // public function scopenombres($query, $nombres)
    // {

    //     if (isset($nombres)) return $query->where('nombres', $nombres);

    // }
    // public function scopeapellidos($query, $apellidos)
    // {

    //     if (isset($apellidos)) return $query->where('apellidos', $apellidos);

    // }
}
