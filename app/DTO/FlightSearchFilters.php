<?php

namespace App\DTO;

class FlightSearchFilters
{
    private int $originCityId;
    private int $destinationCityId;
    private string $departureTime;

    public function __construct(
        int $originCityId,
        int $destinationCityId,
        string $departureTime
    ) {
        $this->originCityId = $originCityId;
        $this->destinationCityId = $destinationCityId;
        $this->departureTime = $departureTime;
    }

    /**
     * Get the value of departureTime
     */ 
    public function getDepartureTime()
    {
        return $this->departureTime;
    }

    /**
     * Get the value of originCityId
     */ 
    public function getOriginCityId()
    {
        return $this->originCityId;
    }

    /**
     * Get the value of destinationCityId
     */ 
    public function getDestinationCityId()
    {
        return $this->destinationCityId;
    }
}
