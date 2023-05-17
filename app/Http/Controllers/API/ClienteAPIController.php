<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClienteAPIRequest;
use App\Http\Requests\API\UpdateClienteAPIRequest;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ClienteAPIController
 */
class ClienteAPIController extends AppBaseController
{
    /**
     * Display a listing of the Clientes.
     * GET|HEAD /clientes
     */
    public function index(Request $request): JsonResponse
    {
        $query = Cliente::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $clientes = $query->get();

        return $this->sendResponse($clientes->toArray(), 'Clientes ');
    }

    /**
     * Store a newly created Cliente in storage.
     * POST /clientes
     */
    public function store(CreateClienteAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Cliente $cliente */
        $cliente = Cliente::create($input);

        return $this->sendResponse($cliente->toArray(), 'Cliente guardado');
    }

    /**
     * Display the specified Cliente.
     * GET|HEAD /clientes/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente no encontrado');
        }

        return $this->sendResponse($cliente->toArray(), 'Cliente ');
    }

    /**
     * Update the specified Cliente in storage.
     * PUT/PATCH /clientes/{id}
     */
    public function update($id, UpdateClienteAPIRequest $request): JsonResponse
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente no encontrado');
        }

        $cliente->fill($request->all());
        $cliente->save();

        return $this->sendResponse($cliente->toArray(), 'Cliente actualizado');
    }

    /**
     * Remove the specified Cliente from storage.
     * DELETE /clientes/{id}
     *
     * @throws \Exception
     */
    public function destroy($id): JsonResponse
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente no encontrado');
        }

        $cliente->delete();

        return $this->sendSuccess('Cliente eliminado');
    }
}
