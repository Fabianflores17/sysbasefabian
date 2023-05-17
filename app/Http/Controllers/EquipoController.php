<?php

namespace App\Http\Controllers;

use App\DataTables\EquipoDataTable;
use App\Http\Requests\CreateEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\EquipoRepository;
use Illuminate\Http\Request;
use App\Models\Equipo;
use Flash;

class EquipoController extends AppBaseController
{
    /** @var EquipoRepository $equipoRepository*/
    private $equipoRepository;

    public function __construct(EquipoRepository $equipoRepo)
    {
        $this->equipoRepository = $equipoRepo;
    }

    /**
     * Display a listing of the Equipo.
     */
    public function index(EquipoDataTable $equipoDataTable)
    {
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

        $equipo = $this->equipoRepository->create($input);

        Flash::success('Equipo saved successfully.');

        return redirect(route('equipos.index'));
    }

    /**
     * Display the specified Equipo.
     */
    public function show($id)
    {
        $equipo = $this->equipoRepository->find($id);

        if (empty($equipo)) {
            Flash::error('Equipo not found');

            return redirect(route('equipos.index'));
        }

        return view('equipos.show')->with('equipo', $equipo);
    }

    /**
     * Show the form for editing the specified Equipo.
     */
    public function edit($id)
    {
        $equipo = $this->equipoRepository->find($id);

        if (empty($equipo)) {
            Flash::error('Equipo not found');

            return redirect(route('equipos.index'));
        }

        return view('equipos.edit')->with('equipo', $equipo);
    }

    /**
     * Update the specified Equipo in storage.
     */
    public function update($id, UpdateEquipoRequest $request)
    {
        $equipo = $this->equipoRepository->find($id);

        if (empty($equipo)) {
            Flash::error('Equipo not found');

            return redirect(route('equipos.index'));
        }

        $equipo = $this->equipoRepository->update($request->all(), $id);

        Flash::success('Equipo updated successfully.');

        return redirect(route('equipos.index'));
    }

    /**
     * Remove the specified Equipo from storage.
     *
     * @throws \Exception
     */
//     public function destroy($id)
//     {
//         $equipo = $this->equipoRepository->find($id);

//         if (empty($equipo)) {
//             Flash::error('Equipo not found');

//             return redirect(route('equipos.index'));
//         }

//         $this->equipoRepository->delete($id);

//         Flash::success('Equipo deleted successfully.');

//         return redirect(route('equipos.index'));
//     }

public function destroy($id)
{
/** @var equipo $equipo */
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

