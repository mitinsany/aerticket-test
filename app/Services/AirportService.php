<?php

namespace App\Services;

use App\Exceptions\AirportNotFoundException;
use App\Models\Airport;
use App\Repositories\AirportRepository;

class AirportService
{
    public function __construct(protected AirportRepository $airportRepository)
    {
    }

    /**
     * @throws AirportNotFoundException
     */
    public function findByIata(string $iata): Airport
    {
        $result = $this->airportRepository->findByIata($iata);

        if (!($result instanceof Airport)) {
            throw new AirportNotFoundException($iata);
        }

        return $result;
    }
}
