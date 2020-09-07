<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientAPIRequest;
use App\Http\Requests\API\UpdateClientAPIRequest;
use App\Models\Client;
use App\Repositories\ClientRepository;
use App\Repositories\CompteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class ClientController
 * @package App\Http\Controllers\API
 */

class ClientAPIController extends AppBaseController
{
    /** @var  ClientRepository */
    private $clientRepository;
    private $compteRepo;

    public function __construct(ClientRepository $clientRepo,CompteRepository $repoCompte)
    {
        $this->clientRepository = $clientRepo;
        $this->compteRepo = $repoCompte;
    }

    /**
     * Display a listing of the Client.
     * GET|HEAD /clients
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clients = $this->clientRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clients->toArray(), 'Clients retrieved successfully');
    }

    /**
     * Store a newly created Client in storage.
     * POST /clients
     *
     * @param CreateClientAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientAPIRequest $request)
    {
        $input = $request->all();

        $client = $this->clientRepository->create($input);

        return $this->sendResponse($client->toArray(), 'Client saved successfully');
    }

    /**
     * Display the specified Client.
     * GET|HEAD /clients/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Client $client */
        $client = $this->clientRepository->find($id);
       
        if (empty($client)) {
            return $this->sendError('Client not found');
        }

        return datatables()->of(DB::select("SELECT * from clients cl , comptes c , operations op 
        where c.client_id = $id and op.compte_id = c.id"))->toJson();
        
    }

    /**
     * Update the specified Client in storage.
     * PUT/PATCH /clients/{id}
     *
     * @param int $id
     * @param UpdateClientAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientAPIRequest $request)
    {
        $input = $request->all();

        /** @var Client $client */
        $client = $this->clientRepository->find($id);

        if (empty($client)) {
            return $this->sendError('Client not found');
        }

        $client = $this->clientRepository->update($input, $id);

        return $this->sendResponse($client->toArray(), 'Client updated successfully');
    }

    /**
     * Remove the specified Client from storage.
     * DELETE /clients/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Client $client */
        $client = $this->clientRepository->find($id);

        if (empty($client)) {
            return $this->sendError('Client not found');
        }

        $client->delete();

        return $this->sendSuccess('Client deleted successfully');
    }
}
