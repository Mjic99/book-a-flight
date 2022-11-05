<?php

namespace App\Http\Controllers\Flights;

use App\Http\Controllers\Controller;
use App\Query\Cities\EloquentCities;
use App\Service\FlightsService;

class FlightsController extends Controller
{
    private FlightsService $flightsService;
    private EloquentCities $eloquentCities;

    public function __construct(
        FlightsService $flightsService,
        EloquentCities $eloquentCities
    )
    {
        $this->flightsService = $flightsService;
        $this->eloquentCities = $eloquentCities;
    }

    public function listFlights()
    {
        return $this->flightsService->getFlightList(request()->query());
    }

    public function search()
    {
        return view('search', [
            'cities' => $this->eloquentCities->getAllCities()
        ]);
    }
}
