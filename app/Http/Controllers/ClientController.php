<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Repositories\ClientRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Segment;
use App\Models\Client;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ClientController extends AppBaseController
{
    /** @var  ClientRepository */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Display a listing of the Client.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientRepository->pushCriteria(new RequestCriteria($request));
        $clients = $this->clientRepository->all();

        return view('clients.index')
            ->with('clients', $clients);
    }

    /**
     * Show the form for creating a new Client.
     *
     * @return Response
     */
    public function create()
    {
        $segments = Segment::where('is_deleted', false)
                        ->orderBy('name', 'ASC')
                        ->pluck('name', 'id_segment');

        return view('clients.create')->with('segments', $segments);
    }

    /**
     * Store a newly created Client in storage.
     *
     * @param CreateClientRequest $request
     *
     * @return Response
     */
    public function store(CreateClientRequest $request)
    {
        $input = $request->all();

        $input['created_by_id'] = auth()->user()->id;
        $input['updated_by_id'] = auth()->user()->id;
        $input['is_deleted'] = 0;

        $client = $this->clientRepository->create($input);

        Flash::success('Client saved successfully.')->important();

        return redirect(route('clients.index'));
    }

    /**
     * Display the specified Client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found')->important();

            return redirect(route('clients.index'));
        }

        return view('clients.show')->with('client', $client);
    }

    /**
     * Show the form for editing the specified Client.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found')->important();

            return redirect(route('clients.index'));
        }

        if ($client->isLocked()) {
            if($client->lockedBy()->id != auth()->user()->id) {
                Flash::error('Resource you are trying to access is locked until '.$client->lockedUntil())->important();

                return back();
            }
        }
        else {
            $token = $client->lock('5 minutes', auth()->user());
        }

        $segments = Segment::where('is_deleted', false)
                            ->orderBy('name', 'ASC')
                            ->pluck('name', 'id_segment');

        return view('clients.edit')->with('client', $client)
                                    ->with('segments', $segments);
    }

    /**
     * Update the specified Client in storage.
     *
     * @param  int              $id
     * @param UpdateClientRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientRequest $request)
    {
        $client = $this->clientRepository->findWithoutFail($id);
        
        if (empty($client)) {
            Flash::error('Client not found')->important();

            return redirect(route('clients.index'));
        }

        if ($client->isAccessible()) {
            $token = $client->lock('5 minutes', auth()->user());
        }
        else {
            if ($client->lockedBy()->id != auth()->user()->id) {
                Flash::error('Resource you are trying to access is locked until '.$client->lockedUntil())->important();
    
                return back();
            }
        }

        $input = $request->all();
        $input['updated_by_id'] = auth()->user()->id;
        $client = $this->clientRepository->update($input, $id);

        $client->unlock();

        Flash::success('Client updated successfully.')->important();

        return redirect(route('clients.index'));
    }

    /**
     * Remove the specified Client from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            Flash::error('Client not found')->important();

            return redirect(route('clients.index'));
        }

        if ($client->isAccessible()) {
            $token = $client->lock('5 minutes', auth()->user());
        }
        else {
            if ($client->lockedBy()->id != auth()->user()->id) {
                Flash::error('Resource you are trying to access is locked until '.$client->lockedUntil())->important();
    
                return back();
            }
        }

        $client->is_deleted = 1;
        $client->updated_by_id = auth()->user()->id;

        $client = $this->clientRepository->update($client->toArray(), $id);
        // $this->clientRepository->delete($id);

        $client->unlock();

        Flash::success('Client deleted successfully.')->important();

        return redirect(route('clients.index'));
    }
}
