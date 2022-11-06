<?php

namespace App\Service;

use App\DTO\FlightSearchFilters;
use App\Query\Flights\EloquentFlights;

class FlightsService
{
    private EloquentFlights $eloquentFlights;

    public function __construct(
        EloquentFlights $eloquentFlights
    )
    {
        $this->eloquentFlights = $eloquentFlights;
    }

    public function getFlightList(array $filters)
    {
        $departureFilters = new FlightSearchFilters($filters['origin_city'], $filters['destination_city'], $filters['departure_time']);
        $departureFlights = $this->eloquentFlights->getFlightList($departureFilters);

        $returnFilters = new FlightSearchFilters($filters['destination_city'], $filters['origin_city'], $filters['arrival_time']);
        $returnFlights = $this->eloquentFlights->getFlightList($returnFilters);

        return view('flights', [
            'departureDate' => $filters['departure_time'],
            'returnDate' => $filters['arrival_time'],
            'originCity' => $departureFlights[0]->origin_city,
            'destinationCity' => $departureFlights[0]->destination_city,
            'departureFlights' => $departureFlights,
            'returnFlights' => $returnFlights
        ]);
    }
}