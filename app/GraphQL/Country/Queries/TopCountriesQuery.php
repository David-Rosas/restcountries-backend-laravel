<?php

namespace App\GraphQL\Country\Queries;

use App\Models\CountryLog;
use App\Services\CountryService;
use Illuminate\Support\Carbon;

class TopCountriesQuery
{
    public function resolve($root, array $args)
    {
        $username = $args['username'];
        $limit = min(max($args['limit'], 1), 50); 

        $service = new CountryService();
        $countries = $service->getTopByDensity($limit);

      $countriesJson = is_string($countries) && json_validate($countries)
        ? $countries
        : json_encode($countries);

        CountryLog::create([
            'username' => $username,
            'request_timestamp' => Carbon::now(),
            'num_countries_returned' => count($countries),
            'countries_details' => $countriesJson,
        ]);

        return $countries;
    }
}
