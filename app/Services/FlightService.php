<?php

namespace App\Services;

use App\Exceptions\FlightsNotFoundException;
use App\Models\Airport;
use App\Repositories\FlightRepository;
use Illuminate\Database\Eloquent\Collection;

class FlightService
{
    public function __construct(protected FlightRepository $flightRepository)
    {
    }

    /**
     * @throws FlightsNotFoundException
     */
    public function search(
        Airport $departureAirport,
        Airport $arrivalAirport,
        string  $date
    ): Collection {
        $result = $this
            ->flightRepository
            ->search(
                $departureAirport,
                $arrivalAirport,
                $date
            );

        if ($result->isEmpty()) {
            throw new FlightsNotFoundException();
        }

        return $result;
    }
}
