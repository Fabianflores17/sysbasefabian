<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEquipoAPIRequest;
use App\Http\Requests\API\UpdateEquipoAPIRequest;
use App\Models\Equipo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class EquipoAPIController
 */
class EquipoAPIController extends AppBaseController
{
    /**
     * Display a listing of the Equipos.
     * GET|HEAD /equipos
     */
    public function index(Request $request): JsonResponse
    {
        $query = Equipo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $equipos = $query->get();

        return $this->sendResponse($equipos->toArray(), 'Equipos ');
    }

    /**
     * Store a newly created Equipo in storage.
     * POST /equipos
     */
    public function store(CreateEquipoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Equipo $equipo */
        $equipo = Equipo::create($input);

        return $this->sendResponse($equipo->toArray(), 'Equipo guardado');
    }

    /**
     * Display the specified Equipo.
     * GET|HEAD /equipos/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Equipo $equipo */
        $equipo = Equipo::find($id);

        if (empty($equipo)) {
            return $this->sendError('Equipo no encontrado');
        }

        return $this->sendResponse($equipo->toArray(), 'Equipo ');
    }

    /**
     * Update the specified Equipo in storage.
     * PUT/PATCH /equipos/{id}
     */
    public function update($id, UpdateEquipoAPIRequest $request): JsonResponse
    {
        /** @var Equipo $equipo */
        $equipo = Equipo::find($id);

        if (empty($equipo)) {
            return $this->sendError('Equipo no encontrado');
        }

        $equipo->fill($request->all());
        $equipo->save();

        return $this->sendResponse($equipo->toArray(), 'Equipo actualizado');
    }

    /**
     * Remove the specified Equipo from storage.
     * DELETE /equipos/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Equipo $equipo */
        $equipo = Equipo::find($id);

        if (empty($equipo)) {
            return $this->sendError('Equipo no encontrado');
        }

        $equipo->delete();

        return $this->sendSuccess('Equipo eliminado');
    }
}
