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
            'departureFlights' => $departureFlights,
            'returnFlights' => $returnFlights
        ]);
    }
}