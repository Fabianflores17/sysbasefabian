<?php

namespace App\Http\Controllers;

use App\DataTables\TipoEquipoDataTable;
use App\Http\Requests\CreateTipoEquipoRequest;
use App\Http\Requests\UpdateTipoEquipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TipoEquipoRepository;
use Illuminate\Http\Request;
use Flash;

class TipoEquipoController extends AppBaseController
{
    /** @var TipoEquipoRepository $tipoEquipoRepository*/
    private $tipoEquipoRepository;

    public function __construct(TipoEquipoRepository $tipoEquipoRepo)
    {
        $this->tipoEquipoRepository = $tipoEquipoRepo;
    }

    /**
     * Display a listing of the TipoEquipo.
     */
    public function index(TipoEquipoDataTable $tipoEquipoDataTable)
    {
    return $tipoEquipoDataTable->render('tipoequipos.index');
    }


    /**
     * Show the form for creating a new TipoEquipo.
     */
    public function create()
    {
        return view('tipoequipos.create');
    }

    /**
     * Store a newly created TipoEquipo in storage.
     */
    public function store(CreateTipoEquipoRequest $request)
    {
        $input = $request->all();

        $tipoEquipo = $this->tipoEquipoRepository->create($input);

        Flash::success('Tipo Equipo saved successfully.');

        return redirect(route('tipoequipos.index'));
    }

    /**
     * Display the specified TipoEquipo.
     */
    public function show($id)
    {
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            Flash::error('Tipo Equipo not found');

            return redirect(route('tipoequipos.index'));
        }

        return view('tipoequipos.show')->with('tipoEquipo', $tipoEquipo);
    }

    /**
     * Show the form for editing the specified TipoEquipo.
     */
    public function edit($id)
    {
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            Flash::error('Tipo Equipo not found');

            return redirect(route('tipoequipos.index'));
        }

        return view('tipoequipos.edit')->with('tipoEquipo', $tipoEquipo);
    }

    /**
     * Update the specified TipoEquipo in storage.
     */
    public function update($id, UpdateTipoEquipoRequest $request)
    {
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            Flash::error('Tipo Equipo not found');

            return redirect(route('tipoequipos.index'));
        }

        $tipoEquipo = $this->tipoEquipoRepository->update($request->all(), $id);

        Flash::success('Tipo Equipo updated successfully.');

        return redirect(route('tipoequipos.index'));
    }

    /**
     * Remove the specified TipoEquipo from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoEquipo = $this->tipoEquipoRepository->find($id);

        if (empty($tipoEquipo)) {
            Flash::error('Tipo Equipo not found');

            return redirect(route('tipoequipos.index'));
        }

        $this->tipoEquipoRepository->delete($id);

        Flash::success('Tipo Equipo deleted successfully.');

        return redirect(route('tipoequipos.index'));
    }
}
