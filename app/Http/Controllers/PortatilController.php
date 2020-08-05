<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePortatilRequest;
use App\Http\Requests\UpdatePortatilRequest;
use App\Repositories\PortatilRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class PortatilController extends AppBaseController
{
    /** @var  PortatilRepository */
    private $portatilRepository;

    public function __construct(PortatilRepository $portatilRepo)
    {
        $this->portatilRepository = $portatilRepo;
    }

    /**
     * Display a listing of the Portatil.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $portatils = $this->portatilRepository->all();

        return view('portatils.index')
            ->with('portatils', $portatils);
    }

    /**
     * Show the form for creating a new Portatil.
     *
     * @return Response
     */
    public function create()
    {
        return view('portatils.create');
    }

    /**
     * Store a newly created Portatil in storage.
     *
     * @param CreatePortatilRequest $request
     *
     * @return Response
     */
    public function store(CreatePortatilRequest $request)
    {
        $input = $request->all();

        $portatil = $this->portatilRepository->create($input);

        Flash::success('Portatil saved successfully.');

        return redirect(route('portatils.index'));
    }

    /**
     * Display the specified Portatil.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $portatil = $this->portatilRepository->find($id);

        if (empty($portatil)) {
            Flash::error('Portatil not found');

            return redirect(route('portatils.index'));
        }

        return view('portatils.show')->with('portatil', $portatil);
    }

    /**
     * Show the form for editing the specified Portatil.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $portatil = $this->portatilRepository->find($id);

        if (empty($portatil)) {
            Flash::error('Portatil not found');

            return redirect(route('portatils.index'));
        }

        return view('portatils.edit')->with('portatil', $portatil);
    }

    /**
     * Update the specified Portatil in storage.
     *
     * @param int $id
     * @param UpdatePortatilRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePortatilRequest $request)
    {
        $portatil = $this->portatilRepository->find($id);

        if (empty($portatil)) {
            Flash::error('Portatil not found');

            return redirect(route('portatils.index'));
        }

        $portatil = $this->portatilRepository->update($request->all(), $id);

        Flash::success('Portatil updated successfully.');

        return redirect(route('portatils.index'));
    }

    /**
     * Remove the specified Portatil from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $portatil = $this->portatilRepository->find($id);

        if (empty($portatil)) {
            Flash::error('Portatil not found');

            return redirect(route('portatils.index'));
        }

        $this->portatilRepository->delete($id);

        Flash::success('Portatil deleted successfully.');

        return redirect(route('portatils.index'));
    }
}
