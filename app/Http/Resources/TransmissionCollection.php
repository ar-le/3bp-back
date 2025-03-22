<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TransmissionCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */

     public $collects = TransmissionUserResource::class;
    public function toArray(Request $request): array
    {
        return [
            'total' => $this->collection->count(),
            'data' => $this->collection,

        ];
    }
}
