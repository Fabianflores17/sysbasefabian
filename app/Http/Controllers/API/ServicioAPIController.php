<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateServicioAPIRequest;
use App\Http\Requests\API\UpdateServicioAPIRequest;
use App\Models\Servicio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ServicioAPIController
 */
class ServicioAPIController extends AppBaseController
{
    /**
     * Display a listing of the Servicios.
     * GET|HEAD /servicios
     */
    public function index(Request $request): JsonResponse
    {
        $query = Servicio::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $servicios = $query->get();

        return $this->sendResponse($servicios->toArray(), 'Servicios ');
    }

    /**
     * Store a newly created Servicio in storage.
     * POST /servicios
     */
    public function store(CreateServicioAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Servicio $servicio */
        $servicio = Servicio::create($input);

        return $this->sendResponse($servicio->toArray(), 'Servicio guardado');
    }

    /**
     * Display the specified Servicio.
     * GET|HEAD /servicios/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Servicio $servicio */
        $servicio = Servicio::find($id);

        if (empty($servicio)) {
            return $this->sendError('Servicio no encontrado');
        }

        return $this->sendResponse($servicio->toArray(), 'Servicio ');
    }

    /**
     * Update the specified Servicio in storage.
     * PUT/PATCH /servicios/{id}
     */
    public function update($id, UpdateServicioAPIRequest $request): JsonResponse
    {
        /** @var Servicio $servicio */
        $servicio = Servicio::find($id);

        if (empty($servicio)) {
            return $this->sendError('Servicio no encontrado');
        }

        $servicio->fill($request->all());
        $servicio->save();

        return $this->sendResponse($servicio->toArray(), 'Servicio actualizado');
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
        $servicio = Servicio::find($id);

        if (empty($servicio)) {
            return $this->sendError('Servicio no encontrado');
        }

        $servicio->delete();

        return $this->sendSuccess('Servicio eliminado');
    }
}
