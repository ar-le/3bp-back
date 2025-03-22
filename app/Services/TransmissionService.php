<?php

namespace App\Services;

use App\Actions\Transmissions\CreateTransmissionAction;
use App\Actions\Transmissions\DeleteTransmissionAction;
use App\Actions\Transmissions\SendNewTransmissionEvent;
use App\Actions\Transmissions\SendNewTransmissionEventAction;
use App\Actions\Transmissions\UpdateTransmissionAction;
use App\Models\Transmission;

class TransmissionService
{
    /**
     * Create a new class instance.
     */
    private CreateTransmissionAction $createTransmissionAction;
    private SendNewTransmissionEventAction $sendNewTransmissionEventAction;
    private DeleteTransmissionAction $deleteTransmissionAction;
    private UpdateTransmissionAction $updateTransmissionAction;

    public function __construct(
        CreateTransmissionAction $createTransmissionAction,
        SendNewTransmissionEventAction $sendNewTransmissionEventAction,
        UpdateTransmissionAction $updateTransmissionAction,
        DeleteTransmissionAction $deleteTransmissionAction
        )
    {
        $this->createTransmissionAction = $createTransmissionAction;
        $this->sendNewTransmissionEventAction = $sendNewTransmissionEventAction;
        $this->updateTransmissionAction = $updateTransmissionAction;
        $this->deleteTransmissionAction = $deleteTransmissionAction;
    }

    public function createTransmission(array $request)
    {
        return $this->createTransmissionAction->execute($request);
    }

    public function sendNewTransmissionEvent(Transmission $transmission)
    {
        return $this->sendNewTransmissionEventAction->execute($transmission);
    }

    public function updateTransmission(array $request)
    {
        return $this->updateTransmissionAction->execute( $request);
    }

    public function deleteTransmission($id)
    {
        return $this->deleteTransmissionAction->execute($id);
    }
}
