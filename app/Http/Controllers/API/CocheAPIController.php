<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCocheAPIRequest;
use App\Http\Requests\API\UpdateCocheAPIRequest;
use App\Models\Coche;
use App\Repositories\CocheRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CocheController
 * @package App\Http\Controllers\API
 */

class CocheAPIController extends AppBaseController
{
    /** @var  CocheRepository */
    private $cocheRepository;

    public function __construct(CocheRepository $cocheRepo)
    {
        $this->cocheRepository = $cocheRepo;
    }

    /**
     * Display a listing of the Coche.
     * GET|HEAD /coches
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $coches = $this->cocheRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($coches->toArray(), 'Coches retrieved successfully');
    }

    /**
     * Store a newly created Coche in storage.
     * POST /coches
     *
     * @param CreateCocheAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCocheAPIRequest $request)
    {
        $input = $request->all();

        $coche = $this->cocheRepository->create($input);

        return $this->sendResponse($coche->toArray(), 'Coche saved successfully');
    }

    /**
     * Display the specified Coche.
     * GET|HEAD /coches/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Coche $coche */
        $coche = $this->cocheRepository->find($id);

        if (empty($coche)) {
            return $this->sendError('Coche not found');
        }

        return $this->sendResponse($coche->toArray(), 'Coche retrieved successfully');
    }

    /**
     * Update the specified Coche in storage.
     * PUT/PATCH /coches/{id}
     *
     * @param int $id
     * @param UpdateCocheAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCocheAPIRequest $request)
    {
        $input = $request->all();

        /** @var Coche $coche */
        $coche = $this->cocheRepository->find($id);

        if (empty($coche)) {
            return $this->sendError('Coche not found');
        }

        $coche = $this->cocheRepository->update($input, $id);

        return $this->sendResponse($coche->toArray(), 'Coche updated successfully');
    }

    /**
     * Remove the specified Coche from storage.
     * DELETE /coches/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Coche $coche */
        $coche = $this->cocheRepository->find($id);

        if (empty($coche)) {
            return $this->sendError('Coche not found');
        }

        $coche->delete();

        return $this->sendSuccess('Coche deleted successfully');
    }
}
