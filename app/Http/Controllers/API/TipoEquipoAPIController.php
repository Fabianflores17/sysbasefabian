<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTipoEquipoAPIRequest;
use App\Http\Requests\API\UpdateTipoEquipoAPIRequest;
use App\Models\TipoEquipo;
use App\Repositories\TipoEquipoRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class TipoEquipoAPIController
 */
class TipoEquipoAPIController extends AppBaseController
{
    private TipoEquipoRepository $tipoEquipoRepository;

    public function __construct(TipoEquipoRepository $tipoEquipoRepo)
    {
        $this->tipoEquipoRepository = $tipoEquipoRepo;
    }

    /**
     * Display a listing of the TipoEquipos.
     * GET|HEAD /tipo-equipos
     */
    public function index(Request $request): JsonResponse
    {
        $tipoEquipos = $this->tipoEquipoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($tipoEquipos->toArray(), 'Tipo Equipos retrieved successfully');
    }

    /**
     * Store a newly created TipoEquipo in storage.
     * POST /tipo-equipos
     */
    public function store(CreateTipoEquipoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $tipoEquipo = $this->tipoEquipoRepository->create($input);

        return $this->sendResponse($tipoEquipo->toArray(), 'Tipo Equipo saved successfully');
    }

    /**
     * Display the specified TipoEquipo.
     * GET|HEAD /tipo-equipos/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            return $this->sendError('Tipo Equipo not found');
        }

        return $this->sendResponse($tipoEquipo->toArray(), 'Tipo Equipo retrieved successfully');
    }

    /**
     * Update the specified TipoEquipo in storage.
     * PUT/PATCH /tipo-equipos/{id}
     */
    public function update($id, UpdateTipoEquipoAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            return $this->sendError('Tipo Equipo not found');
        }

        $tipoEquipo = $this->tipoEquipoRepository->update($input, $id);

        return $this->sendResponse($tipoEquipo->toArray(), 'TipoEquipo updated successfully');
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
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            return $this->sendError('Tipo Equipo not found');
        }

        $tipoEquipo->delete();

        return $this->sendSuccess('Tipo Equipo deleted successfully');
    }
}
