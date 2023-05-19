<?php

namespace App\Http\Controllers;
use App\DataTables\Scopes\ScopeClienteDataTable;
use App\DataTables\ClienteDataTable;
use App\Http\Requests\CreateClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Clientes')->only('show');
        $this->middleware('permission:Crear Clientes')->only(['create','store']);
        $this->middleware('permission:Editar Clientes')->only(['edit','update']);
        $this->middleware('permission:Eliminar Clientes')->only('destroy');
    }
    /**
     * Display a listing of the Cliente.
     */
    public function index(ClienteDataTable $clienteDataTable)
    {

        $scope = new ScopeClienteDataTable();
        $clienteDataTable->addScope($scope);

        return $clienteDataTable->render('clientes.index');
    }

    public function buscador(Request $request)
        {
            ini_set('memory_limit', -1);
            $request->flash();
            $showResult = false;
            $clientes = [];

            $campos['nombres'] = $request->input('nombres');
            $campos['apellidos'] = $request->input('apellidos');
            // $campos['dpi'] = $request->input('dpi');
            // $campos['telefono'] = $request->input('telefono');
            // $campos['direccion'] = $request->input('direccion');
            // $campos['correo'] = $request->input('correo');

            $camposCheck = $campos;

            foreach ($camposCheck as $key => $value) {
                if (empty($value)) {
                    unset($camposCheck[$key]);
                }
            }

            if(!empty($camposCheck)) {

                $showResult = true;

                $clientes = Cliente::nombres($campos['nombres'])
                ->apellidos($campos['apellidos'])
                // ->where('apellidos', $campos['apellidos'])
                // ->where('dpi', $campos['dpi'])
                // ->where('telefono', $campos['telefono'])
                // ->where('direccion', $campos['direccion'])
                // ->where('correo', $campos['correo'])
                ->get();

                //@dd($clientes);

     }


    return view('clientes.buscador',compact('clientes', 'showResult'));

        }
    /**
     * Show the form for creating a new Cliente.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created Cliente in storage.
     */
    public function store(CreateClienteRequest $request)
    {
        $input = $request->all();

        /** @var Cliente $cliente */
        $cliente = Cliente::create($input);

        flash()->success('Cliente guardado.');

        return redirect(route('clientes.index'));
    }

    /**
     * Display the specified Cliente.
     */
    public function show($id)
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            flash()->error('Cliente no encontrado');

            return redirect(route('clientes.index'));
        }

        return view('clientes.show')->with('cliente', $cliente);
    }

    /**
     * Show the form for editing the specified Cliente.
     */
    public function edit($id)
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            flash()->error('Cliente no encontrado');

            return redirect(route('clientes.index'));
        }

        return view('clientes.edit')->with('cliente', $cliente);
    }

    /**
     * Update the specified Cliente in storage.
     */
    public function update($id, UpdateClienteRequest $request)
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            flash()->error('Cliente no encontrado');

            return redirect(route('clientes.index'));
        }

        $cliente->fill($request->all());
        $cliente->save();

        flash()->success('Cliente actualizado.');

        return redirect(route('clientes.index'));
    }

    /**
     * Remove the specified Cliente from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Cliente $cliente */
        $cliente = Cliente::find($id);

        if (empty($cliente)) {
            flash()->error('Cliente no encontrado');

            return redirect(route('clientes.index'));
        }

        $cliente->delete();

        flash()->success('Cliente eliminado.');

        return redirect(route('clientes.index'));
    }
}
