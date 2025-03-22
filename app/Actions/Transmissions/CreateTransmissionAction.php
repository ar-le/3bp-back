<?php

namespace App\Actions\Transmissions;

use App\Models\Transmission;

class CreateTransmissionAction
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function execute(array $request)
    {
        return Transmission::create([
            'title' => $request['title'],
            'type' => $request['type'],
            'content' => $request['content']
        ]);

    }
}
