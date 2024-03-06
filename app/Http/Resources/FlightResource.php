<?php

namespace App\Http\Resources;

use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{
    protected string $dateTimeFormat = 'Y-m-d H:i';
    public function toArray(Request $request): array
    {
        /** @var Flight $flight */
        $flight = $this->resource;

        return [
            'transporter' => [
                'code' => $flight->transporter->code,
                'name' => $flight->transporter->name,
            ],
            'flightNumber' => $flight->flight_number,
            'departureAirport' => $flight->departureAirport->iata,
            'arrivalAirport' => $flight->arrivalAirport->iata,
            'departureDateTime' => $flight->departure_at
                ->toImmutable()
                ->setTimezone($flight->departureAirport->timezone)
                ->format($this->dateTimeFormat),
            'arrivalDateTime' => $flight->departure_at
                ->toImmutable()
                ->setTimezone($flight->arrivalAirport->timezone)
                ->addMinutes($flight->duration)
                ->format($this->dateTimeFormat),
            'duration' => $flight->duration,
        ];
    }
}
