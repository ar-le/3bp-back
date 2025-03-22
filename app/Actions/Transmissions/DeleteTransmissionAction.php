<?php

namespace App\Actions\Transmissions;

use App\Models\Transmission;

class DeleteTransmissionAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute($id)
    {
        $transmission = Transmission::findOrFail($id);
        $transmission->delete();
        return $transmission;
    }
}
