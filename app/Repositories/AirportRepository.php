<?php

namespace App\Repositories;

use App\Models\Airport;

class AirportRepository
{
    public function findByIata(string $name) : ?Airport
    {
        return Airport::query()->where('iata', $name)->first();
    }
}
