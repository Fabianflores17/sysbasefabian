<?php

namespace App\Repositories;

use App\Models\Servicio;
use App\Repositories\BaseRepository;

class ServicioRepository extends BaseRepository
{
    protected $fieldSearchable = [
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

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Servicio::class;
    }
}
