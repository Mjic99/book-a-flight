<?php

namespace App\Query\Cities;

use App\Models\City;

class EloquentCities
{
    public function getAllCities()
    {
        return City::query()
            ->select(
                'id',
                'name'
            )->get();
    }
}
