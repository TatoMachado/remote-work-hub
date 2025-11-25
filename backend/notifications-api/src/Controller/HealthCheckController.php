<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class HealthCheckController
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'service' => 'notifications-api',
            'status' => 'ok',
            'timestamp' => (new \DateTimeImmutable())->format(DATE_ATOM),
        ]);
    }
}
