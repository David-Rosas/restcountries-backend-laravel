<?php
namespace App\GraphQL\Log\Mutations;

use App\Models\CountryLog;
use App\Services\LogService;

class UpdateLogMutation
{
     public function __construct(private LogService $service) {}

    public function resolve($_, array $args)
    {
        return $this->service->updateUsername($args['id'], $args['username']);
    }
}