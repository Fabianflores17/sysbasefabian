<?php

namespace App\Http\Controllers;
use App\DataTables\Scopes\ScopeEquipoDataTable;
use App\DataTables\EquipoDataTable;
use App\Http\Requests\CreateEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Equipo;
use Illuminate\Http\Request;

class EquipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Equipos')->only('show');
        $this->middleware('permission:Crear Equipos')->only(['create','store']);
        $this->middleware('permission:Editar Equipos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Equipos')->only('destroy');
    }
    /**
     * Display a listing of the Equipo.
     */
    public function index(EquipoDataTable $equipoDataTable)
    {
        $scope = new ScopeEquipoDataTable();
        $equipoDataTable->addScope($scope);


    return $equipoDataTable->render('equipos.index');
    }


    /**
     * Show the form for creating a new Equipo.
     */
    public function create()
    {
        return view('equipos.create');
    }

    /**
     * Store a newly created Equipo in storage.
     */
    public function store(CreateEquipoRequest $request)
    {
        $input = $request->all();
    $nuevo  = Equipo::all();
        /** @var Equipo $equipo */
        $equipo =Equipo::create($input);
//        if ($request->hasFile('imagen')) {
//            $imagen = $request->file('imagen');
//            $equipo->addMedia($imagen)->toMediaCollection('imagenes');
//        }

        if ($request->hasFile('imagen')){
            $equipo->addMediaFromRequest('imagen')->toMediaCollection('fotoEquipo');
        }


        flash()->success('Equipo guardado.');

        return redirect(route('equipos.index'));
    }

    /**
     * Display the specified Equipo.
     */
    public function show($id)
    {
        /** @var Equipo $equipo */
        $equipo = Equipo::find($id);

        if (empty($equipo)) {
            flash()->error('Equipo no encontrado');

            return redirect(route('equipos.index'));
        }

        return view('equipos.show')->with('equipo', $equipo);
    }

    /**
     * Show the form for editing the specified Equipo.
     */
    public function edit($id)
    {
        /** @var Equipo $equipo */
        $equipo = Equipo::find($id);

        if (empty($equipo)) {
            flash()->error('Equipo no encontrado');

            return redirect(route('equipos.index'));
        }

        return view('equipos.edit')->with('equipo', $equipo);
    }

    /**
     * Update the specified Equipo in storage.
     */
    public function update($id, UpdateEquipoRequest $request)
    {
        /** @var Equipo $equipo */
        $equipo = Equipo::find($id);

        if (empty($equipo)) {
            flash()->error('Equipo no encontrado');

            return redirect(route('equipos.index'));
        }

        $equipo->fill($request->all());
        $equipo->save();
        if ($request->hasFile('imagen')){
            $equipo->addMediaFromRequest('imagen')->toMediaCollection('fotoEquipo');
        }

        flash()->success('Equipo actualizado.');

        return redirect(route('equipos.index'));
    }

    /**
     * Remove the specified Equipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Equipo $equipo */
        $equipo = Equipo::find($id);

        if (empty($equipo)) {
            flash()->error('Equipo no encontrado');

            return redirect(route('equipos.index'));
        }

        $equipo->delete();

        flash()->success('Equipo eliminado.');

        return redirect(route('equipos.index'));
    }
}
