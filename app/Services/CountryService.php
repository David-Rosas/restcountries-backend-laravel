<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class CountryService
{
    public function fetchAllCountries(): array
    {
        $response = Http::get('https://restcountries.com/v3.1/all?fields=name,area,population');

          if (!$response->successful()) {
            throw new \Exception('Error fetching countries data');
        }


        return $response->json();
    }

    public function getTopByDensity(int $limit): array
    {
        $countries = $this->fetchAllCountries();

        return collect($countries)
            ->filter(
                fn($c) =>
                isset($c['area'], $c['population']) &&
                    $c['area'] > 0 &&
                    isset($c['name']['common'])
            )
            ->map(fn($c) => [
                'name' => $c['name']['common'],
                'area' => $c['area'],
                'population' => $c['population'],
                'density' => round($c['population'] / $c['area'], 2),
            ])
            ->sortByDesc('density')
            ->take($limit)
            ->values()
            ->all();
    }
}
