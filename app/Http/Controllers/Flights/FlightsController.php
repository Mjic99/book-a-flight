<?php

namespace App\Http\Controllers\Flights;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use App\Query\Flights\EloquentFlights;
use Illuminate\Http\Request;

class FlightsController extends Controller
{
    private EloquentFlights $eloquentFlights;

    public function __construct(EloquentFlights $eloquentFlights)
    {
        $this->eloquentFlights = $eloquentFlights;
    }

    public function listFlights()
    {
        return view('flights', [
            'flights' => $this->eloquentFlights->getFlightList()
        ]);
    }
}
