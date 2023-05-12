<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClienteAPIRequest;
use App\Http\Requests\API\UpdateClienteAPIRequest;
use App\Models\Cliente;
use App\Repositories\ClienteRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;

/**
 * Class ClienteAPIController
 */
class ClienteAPIController extends AppBaseController
{
    private ClienteRepository $clienteRepository;

    public function __construct(ClienteRepository $clienteRepo)
    {
        $this->clienteRepository = $clienteRepo;
    }

    /**
     * Display a listing of the Clientes.
     * GET|HEAD /clientes
     */
    public function index(Request $request): JsonResponse
    {
        $clientes = $this->clienteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientes->toArray(), 'Clientes retrieved successfully');
    }

    /**
     * Store a newly created Cliente in storage.
     * POST /clientes
     */
    public function store(CreateClienteAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        $cliente = $this->clienteRepository->create($input);

        return $this->sendResponse($cliente->toArray(), 'Cliente saved successfully');
    }

    /**
     * Display the specified Cliente.
     * GET|HEAD /clientes/{id}
     */
    public function show($id): JsonResponse
    {
        /** @var Cliente $cliente */
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente not found');
        }

        return $this->sendResponse($cliente->toArray(), 'Cliente retrieved successfully');
    }

    /**
     * Update the specified Cliente in storage.
     * PUT/PATCH /clientes/{id}
     */
    public function update($id, UpdateClienteAPIRequest $request): JsonResponse
    {
        $input = $request->all();

        /** @var Cliente $cliente */
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente not found');
        }

        $cliente = $this->clienteRepository->update($input, $id);

        return $this->sendResponse($cliente->toArray(), 'Cliente updated successfully');
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
        $cliente = $this->clienteRepository->find($id);

        if (empty($cliente)) {
            return $this->sendError('Cliente not found');
        }

        $cliente->delete();

        return $this->sendSuccess('Cliente deleted successfully');
    }
}
