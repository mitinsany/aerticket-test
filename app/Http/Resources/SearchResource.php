<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SearchResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'searchQuery' => $request->all(),
            'searchResults' => FlightResource::collection($this->resource),
        ];
    }
}
