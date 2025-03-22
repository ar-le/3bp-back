<?php

namespace App\Actions\Transmissions;
use App\Models\Transmission;
use Illuminate\Support\Arr;

class UpdateTransmissionAction
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
        $transmission = Transmission::findOrFail($request['id']);
        Arr::forget($request, 'id');
        $transmission->update($request);
        return $transmission;
    }
}
