<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipoEquipoAPIRequest;
use App\Http\Requests\API\UpdateTipoEquipoAPIRequest;
use App\Models\TipoEquipo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class TipoEquipoAPIController
 */
class TipoEquipoAPIController extends AppBaseController
{
    /**
     * Display a listing of the TipoEquipos.
     * GET|HEAD /tipo-equipos
     */
    public function index(Request $request): JsonResponse
    {
        $query = TipoEquipo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $tipoEquipos = $query->get();

        return $this->sendResponse($tipoEquipos->toArray(), 'Tipo Equipos ');
    }

    /**
     * Store a newly created TipoEquipo in storage.
     * POST /tipo-equipos
     */
    public function store(CreateTipoEquipoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = TipoEquipo::create($input);

        return $this->sendResponse($tipoEquipo->toArray(), 'Tipo Equipo guardado');
    }

    /**
     * Display the specified TipoEquipo.
     * GET|HEAD /tipo-equipos/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = TipoEquipo::find($id);

        if (empty($tipoEquipo)) {
            return $this->sendError('Tipo Equipo no encontrado');
        }

        return $this->sendResponse($tipoEquipo->toArray(), 'Tipo Equipo ');
    }

    /**
     * Update the specified TipoEquipo in storage.
     * PUT/PATCH /tipo-equipos/{id}
     */
    public function update($id, UpdateTipoEquipoAPIRequest $request): JsonResponse
    {
        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = TipoEquipo::find($id);

        if (empty($tipoEquipo)) {
            return $this->sendError('Tipo Equipo no encontrado');
        }

        $tipoEquipo->fill($request->all());
        $tipoEquipo->save();

        return $this->sendResponse($tipoEquipo->toArray(), 'TipoEquipo actualizado');
    }

    /**
     * Remove the specified TipoEquipo from storage.
     * DELETE /tipo-equipos/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = TipoEquipo::find($id);

        if (empty($tipoEquipo)) {
            return $this->sendError('Tipo Equipo no encontrado');
        }

        $tipoEquipo->delete();

        return $this->sendSuccess('Tipo Equipo eliminado');
    }
}
