<?php

namespace App\Repositories;

use App\Models\Airport;
use App\Models\Flight;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

class FlightRepository
{
    public function search(
        Airport $departureAirport,
        Airport $arrivalAirport,
        string  $date
    ): Collection {
        $flightDayStart = (Carbon
            ::parse($date, $departureAirport->timezone)
            ->setTimezone('UTC')
        );
        $flightDayEnd = (Carbon
            ::parse($date, $departureAirport->timezone)
            ->endOfDay()
            ->setTimezone('UTC')
        );

        return Flight::query()
            ->with('transporter')
            ->where('departure_airport_id', $departureAirport->id)
            ->where('arrival_airport_id', $arrivalAirport->id)
            ->where('departure_at', '>=', $flightDayStart)
            ->where('departure_at', '<=', $flightDayEnd)
            ->orderBy('departure_at')
        ->get()
            ->each(function (Flight $flight) use ($departureAirport, $arrivalAirport) {
                $flight->departureAirport()->associate($departureAirport);
                $flight->arrivalAirport()->associate($arrivalAirport);
            });
    }
}
