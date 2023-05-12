<?php

namespace App\Repositories;

use App\Models\TipoEquipo;
use App\Repositories\BaseRepository;

class TipoEquipoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombre',
        'activo'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return TipoEquipo::class;
    }
}
