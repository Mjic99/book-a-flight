<?php

namespace App\Query\Flights;

use App\DTO\FlightSearchFilters;
use App\Models\Flight;

class EloquentFlights
{
    public function getFlightList(FlightSearchFilters $filters)
    {
        $query = Flight::query()
            ->select(
                'flights.id',
                'departure_time',
                'arrival_time',
                'ticket_price',
                'o.name as origin_airport',
                'oc.name as origin_city',
                'd.name as destination_airport',
                'dc.name as destination_city'
            )
            ->join('airports as o', 'flights.origin_airport_id', '=', 'o.id')
            ->join('airports as d', 'flights.destination_airport_id', '=', 'd.id')
            ->join('cities as oc', 'oc.id', '=', 'o.city_id')
            ->join('cities as dc', 'dc.id', '=', 'd.city_id');
        
        if ($filters->getOriginCityId()) {
            $query = $query->where('oc.id', $filters->getOriginCityId());
        }

        if ($filters->getDestinationCityId()) {
            $query = $query->where('dc.id', $filters->getDestinationCityId());
        }

        if ($filters->getDepartureTime()) {
            $query = $query
                ->where('departure_time', '>', $filters->getDepartureTime())
                ->whereRaw("departure_time < to_date(?, 'YYY-MM-DD') + interval '1 day'", [$filters->getDepartureTime()]);
        }

        return $query->get();
    }
}
