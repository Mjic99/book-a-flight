<?php

namespace App\Query\Flights;

use App\Models\Flight;

class EloquentFlights
{
    public function getFlightList()
    {
        return Flight::query()
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
            ->join('cities as dc', 'dc.id', '=', 'd.city_id')
            ->get();
    }
}
