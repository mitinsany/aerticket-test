<?php

namespace App\Http\Controllers;

use App\Exceptions\AirportNotFoundException;
use App\Exceptions\FlightsNotFoundException;
use App\Exceptions\WrongRequestException;
use App\Http\Requests\SearchRequest;
use App\Http\Resources\SearchResource;
use App\Services\AirportService;
use App\Services\FlightService;
use Illuminate\Http\JsonResponse;

class SearchAction extends Controller
{
    public function __construct(
        protected readonly AirportService $airportService,
        protected readonly FlightService $flightService
    ) {}

    /**
     * @throws AirportNotFoundException
     * @throws FlightsNotFoundException
     * @throws WrongRequestException
     */
    public function __invoke(SearchRequest $request): JsonResponse
    {
        $this->additionalValidateRequest($request);

        $departureAirport = $this->airportService->findByIata($request->searchQuery['departureAirport']);
        $arrivalAirport = $this->airportService->findByIata($request->searchQuery['arrivalAirport']);

        return new JsonResponse(SearchResource::make(
            $this->flightService->search(
                $departureAirport,
                $arrivalAirport,
                $request->searchQuery['departureDate']
            )));
    }

    /**
     * @throws WrongRequestException
     */
    protected function additionalValidateRequest(SearchRequest $request): void
    {
        if ($request->searchQuery['departureAirport'] === $request->searchQuery['arrivalAirport']) {
            throw new WrongRequestException();
        }
    }
}
