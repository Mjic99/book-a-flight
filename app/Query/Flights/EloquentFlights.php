<?php

namespace App\Query\Flights;

use App\Models\Flight;

class EloquentFlights
{
    public function getFlightList(array $filters)
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
        
        if (isset($filters['origin_city'])) {
            $query = $query->where('oc.id', $filters['origin_city']);
        }

        if (isset($filters['destination_city'])) {
            $query = $query->where('dc.id', $filters['destination_city']);
        }

        if (isset($filters['departure_time'])) {
            $query = $query
                ->where('departure_time', '>', $filters['departure_time'])
                ->whereRaw("departure_time < to_date(?, 'YYY-MM-DD') + interval '1 day'", [$filters['departure_time']]);
        }

        if (isset($filters['arrival_time'])) {
            $query = $query
                ->where('arrival_time', '>', $filters['arrival_time'])
                ->whereRaw("arrival_time < to_date(?, 'YYY-MM-DD') + interval '1 day'", [$filters['arrival_time']]);
        }

        return $query->get();
    }
}
