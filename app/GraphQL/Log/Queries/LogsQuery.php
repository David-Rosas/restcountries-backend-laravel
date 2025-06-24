<?php

namespace App\GraphQL\Log\Queries;

use App\Models\CountryLog;
use App\Services\LogService;
use Illuminate\Support\Carbon;

class LogsQuery
{
    public function __construct(private LogService $service) {}

    public function resolve($_, array $args)
    {
        return $this->service->get($args['startDate'] ?? null, $args['endDate'] ?? null);
    }
}
