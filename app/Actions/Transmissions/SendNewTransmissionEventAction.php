<?php

namespace App\Actions\Transmissions;

use App\Events\NewTransmission;
use App\Models\Transmission;
use Exception;

class SendNewTransmissionEventAction
{

    public function __construct()
    {

    }

    public function execute(Transmission $transmission)
    {
        try{
            event(new NewTransmission($transmission));
        }
        catch(Exception $e)
        {

        }

    }
}
