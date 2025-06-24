<?php
namespace App\GraphQL\Log\Mutations;

use App\Models\CountryLog;
use App\Services\LogService;

class DeleteLogMutation
{
  public function __construct(protected LogService $service) {}

    public function __invoke($_, array $args)
    {
        return $this->service->delete($args['id']);
    }
}