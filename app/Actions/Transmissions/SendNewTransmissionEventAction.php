<?php

namespace App\Actions\Transmissions;

use App\Events\NewTransmission;
use App\Models\Transmission;

class SendNewTransmissionEventAction
{

    public function __construct()
    {

    }

    public function execute(Transmission $transmission)
    {
        event(new NewTransmission($transmission));
    }
}
