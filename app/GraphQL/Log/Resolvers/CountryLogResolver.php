<?php
namespace App\GraphQL\Log\Resolvers;

class CountryLogResolver
{
    public function countriesDetails($root)
    {
        if (is_string($root->countries_details) && json_validate($root->countries_details)) {
            return json_decode($root->countries_details, true);
        }

        return [];
    }
}