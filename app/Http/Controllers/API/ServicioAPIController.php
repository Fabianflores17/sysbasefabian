<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateServicioAPIRequest;
use App\Http\Requests\API\UpdateServicioAPIRequest;
use App\Models\Servicio;
use App\Repositories\ServicioRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ServicioAPIController
 */
class ServicioAPIController extends AppBaseController
{
    private ServicioRepository $servicioRepository;

    public function __construct(ServicioRepository $servicioRepo)
    {
        $this->servicioRepository = $servicioRepo;
    }

    /**
     * Display a listing of the Servicios.
     * GET|HEAD /servicios
     */
    public function index(Request $request): JsonResponse
    {
        $servicios = $this->servicioRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($servicios->toArray(), 'Servicios retrieved successfully');
    }

    /**
     * Store a newly created Servicio in storage.
     * POST /servicios
     */
    public function store(CreateServicioAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $servicio = $this->servicioRepository->create($input);

        return $this->sendResponse($servicio->toArray(), 'Servicio saved successfully');
    }

    /**
     * Display the specified Servicio.
     * GET|HEAD /servicios/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Servicio $servicio */
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            return $this->sendError('Servicio not found');
        }

        return $this->sendResponse($servicio->toArray(), 'Servicio retrieved successfully');
    }

    /**
     * Update the specified Servicio in storage.
     * PUT/PATCH /servicios/{id}
     */
    public function update($id, UpdateServicioAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Servicio $servicio */
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            return $this->sendError('Servicio not found');
        }

        $servicio = $this->servicioRepository->update($input, $id);

        return $this->sendResponse($servicio->toArray(), 'Servicio updated successfully');
    }

    /**
     * Remove the specified Servicio from storage.
     * DELETE /servicios/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Servicio $servicio */
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            return $this->sendError('Servicio not found');
        }

        $servicio->delete();

        return $this->sendSuccess('Servicio deleted successfully');
    }
}
