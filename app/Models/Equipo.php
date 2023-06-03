<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property string thumb
 * @property string img
 */
class Equipo extends Model implements HasMedia
{
    Use InteractsWithMedia;
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
    public function getImgAttribute()
    {
        $media = $this->getMedia('avatars')->last();
        return $media ? $media->getUrl() : '';
    }
    public static $messages = [

    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(250)
            ->height(250);
    }

    public function getThumbAttribute()
    {
        $media = $this->getMedia('fotoEquipo')->last();
        return $media ? $media->getUrl('thumb') : '';
    }
    public function tipo(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\TipoEquipo::class, 'tipo_id');
    }

    public function soporteServicios(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\Servicio::class, 'equipo_id');
    }
}
