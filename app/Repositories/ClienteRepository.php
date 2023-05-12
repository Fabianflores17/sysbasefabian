<?php

namespace App\Repositories;

use App\Models\Cliente;
use App\Repositories\BaseRepository;

class ClienteRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nombres',
        'apellidos',
        'dpi',
        'telefono',
        'direccion',
        'correo'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Cliente::class;
    }
}
