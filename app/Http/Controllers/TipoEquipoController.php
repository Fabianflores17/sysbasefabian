<?php

namespace App\Http\Controllers;

use App\DataTables\TipoEquipoDataTable;
use App\Http\Requests\CreateTipoEquipoRequest;
use App\Http\Requests\UpdateTipoEquipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\TipoEquipo;
use Illuminate\Http\Request;

class TipoEquipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Tipo Equipos')->only('show');
        $this->middleware('permission:Crear Tipo Equipos')->only(['create','store']);
        $this->middleware('permission:Editar Tipo Equipos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Tipo Equipos')->only('destroy');
    }
    /**
     * Display a listing of the TipoEquipo.
     */
    public function index(TipoEquipoDataTable $tipoEquipoDataTable)
    {
    return $tipoEquipoDataTable->render('tipo_equipos.index');
    }


    /**
     * Show the form for creating a new TipoEquipo.
     */
    public function create()
    {
        return view('tipo_equipos.create');
    }

    /**
     * Store a newly created TipoEquipo in storage.
     */
    public function store(CreateTipoEquipoRequest $request)
    {
        $input = $request->all();

        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = TipoEquipo::create($input);

        flash()->success('Tipo Equipo guardado.');

        return redirect(route('tipoEquipos.index'));
    }

    /**
     * Display the specified TipoEquipo.
     */
    public function show($id)
    {
        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = TipoEquipo::find($id);

        if (empty($tipoEquipo)) {
            flash()->error('Tipo Equipo no encontrado');

            return redirect(route('tipoEquipos.index'));
        }

        return view('tipo_equipos.show')->with('tipoEquipo', $tipoEquipo);
    }

    /**
     * Show the form for editing the specified TipoEquipo.
     */
    public function edit($id)
    {
        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = TipoEquipo::find($id);

        if (empty($tipoEquipo)) {
            flash()->error('Tipo Equipo no encontrado');

            return redirect(route('tipoEquipos.index'));
        }

        return view('tipo_equipos.edit')->with('tipoEquipo', $tipoEquipo);
    }

    /**
     * Update the specified TipoEquipo in storage.
     */
    public function update($id, UpdateTipoEquipoRequest $request)
    {
       // dd($request->all()); mostrar como se esta enviado los datos
        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = TipoEquipo::find($id);

        if (empty($tipoEquipo)) {
            flash()->error('Tipo Equipo no encontrado');

            return redirect(route('tipoEquipos.index'));
        }

        $tipoEquipo->fill($request->all());
        $tipoEquipo->save();

        flash()->success('Tipo Equipo actualizado.');

        return redirect(route('tipoEquipos.index'));
    }

    /**
     * Remove the specified TipoEquipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var TipoEquipo $tipoEquipo */
        $tipoEquipo = TipoEquipo::find($id);

        if (empty($tipoEquipo)) {
            flash()->error('Tipo Equipo no encontrado');

            return redirect(route('tipoEquipos.index'));
        }

        $tipoEquipo->delete();

        flash()->success('Tipo Equipo eliminado.');

        return redirect(route('tipoEquipos.index'));
    }
}
