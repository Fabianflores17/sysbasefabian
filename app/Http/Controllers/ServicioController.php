<?php

namespace App\Http\Controllers;

use App\DataTables\ServicioDataTable;
use App\Http\Requests\CreateServicioRequest;
use App\Http\Requests\UpdateServicioRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ServicioRepository;
use Illuminate\Http\Request;
use Flash;

class ServicioController extends AppBaseController
{
    /** @var ServicioRepository $servicioRepository*/
    private $servicioRepository;

    public function __construct(ServicioRepository $servicioRepo)
    {
        $this->servicioRepository = $servicioRepo;
    }

    /**
     * Display a listing of the Servicio.
     */
    public function index(ServicioDataTable $servicioDataTable)
    {
    return $servicioDataTable->render('servicios.index');
    }


    /**
     * Show the form for creating a new Servicio.
     */
    public function create()
    {
        return view('servicios.create');
    }

    /**
     * Store a newly created Servicio in storage.
     */
    public function store(CreateServicioRequest $request)
    {
        $input = $request->all();

        $servicio = $this->servicioRepository->create($input);

        Flash::success('Servicio saved successfully.');

        return redirect(route('servicios.index'));
    }

    /**
     * Display the specified Servicio.
     */
    public function show($id)
    {
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        return view('servicios.show')->with('servicio', $servicio);
    }

    /**
     * Show the form for editing the specified Servicio.
     */
    public function edit($id)
    {
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        return view('servicios.edit')->with('servicio', $servicio);
    }

    /**
     * Update the specified Servicio in storage.
     */
    public function update($id, UpdateServicioRequest $request)
    {
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        $servicio = $this->servicioRepository->update($request->all(), $id);

        Flash::success('Servicio updated successfully.');

        return redirect(route('servicios.index'));
    }

    /**
     * Remove the specified Servicio from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $servicio = $this->servicioRepository->find($id);

        if (empty($servicio)) {
            Flash::error('Servicio not found');

            return redirect(route('servicios.index'));
        }

        $this->servicioRepository->delete($id);

        Flash::success('Servicio deleted successfully.');

        return redirect(route('servicios.index'));
    }
}
