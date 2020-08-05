<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePortatilAPIRequest;
use App\Http\Requests\API\UpdatePortatilAPIRequest;
use App\Models\Portatil;
use App\Repositories\PortatilRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PortatilController
 * @package App\Http\Controllers\API
 */

class PortatilAPIController extends AppBaseController
{
    /** @var  PortatilRepository */
    private $portatilRepository;

    public function __construct(PortatilRepository $portatilRepo)
    {
        $this->portatilRepository = $portatilRepo;
    }

    /**
     * Display a listing of the Portatil.
     * GET|HEAD /portatils
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $portatils = $this->portatilRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($portatils->toArray(), 'Portatils retrieved successfully');
    }

    /**
     * Store a newly created Portatil in storage.
     * POST /portatils
     *
     * @param CreatePortatilAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePortatilAPIRequest $request)
    {
        $input = $request->all();

        $portatil = $this->portatilRepository->create($input);

        return $this->sendResponse($portatil->toArray(), 'Portatil saved successfully');
    }

    /**
     * Display the specified Portatil.
     * GET|HEAD /portatils/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Portatil $portatil */
        $portatil = $this->portatilRepository->find($id);

        if (empty($portatil)) {
            return $this->sendError('Portatil not found');
        }

        return $this->sendResponse($portatil->toArray(), 'Portatil retrieved successfully');
    }

    /**
     * Update the specified Portatil in storage.
     * PUT/PATCH /portatils/{id}
     *
     * @param int $id
     * @param UpdatePortatilAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePortatilAPIRequest $request)
    {
        $input = $request->all();

        /** @var Portatil $portatil */
        $portatil = $this->portatilRepository->find($id);

        if (empty($portatil)) {
            return $this->sendError('Portatil not found');
        }

        $portatil = $this->portatilRepository->update($input, $id);

        return $this->sendResponse($portatil->toArray(), 'Portatil updated successfully');
    }

    /**
     * Remove the specified Portatil from storage.
     * DELETE /portatils/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Portatil $portatil */
        $portatil = $this->portatilRepository->find($id);

        if (empty($portatil)) {
            return $this->sendError('Portatil not found');
        }

        $portatil->delete();

        return $this->sendSuccess('Portatil deleted successfully');
    }
}
