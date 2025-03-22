<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostTransmission;
use App\Http\Requests\PutTransmission;
use App\Http\Resources\TransmissionCollection;
use App\Http\Resources\TransmissionUserResource;
use App\Models\Transmission;
use App\Services\TransmissionService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use function React\Promise\all;

class TransmissionController extends Controller
{
    private TransmissionService $transmissionService;

    public function __construct(TransmissionService $transmissionService)
    {
        $this->transmissionService = $transmissionService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transmissions = Transmission::all();
        return new TransmissionCollection($transmissions);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(PostTransmission $request)
    {
        //Lanza un evento
        $transmission = $this->transmissionService->createTransmission($request->all());
        $this->transmissionService->sendNewTransmissionEvent($transmission);

        return new TransmissionUserResource($transmission);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transmission = Transmission::findOrFail($id);
        return new TransmissionUserResource($transmission);

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PutTransmission $request)
    {
        //dd($request->all());
        $transmission = $this->transmissionService->updateTransmission( $request->all());

        return new TransmissionUserResource($transmission);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $transmission = $this->transmissionService->deleteTransmission($id);
        return new TransmissionUserResource($transmission);
    }
}
