<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PricesController
{
    #[Route('/api/v1/prices')]
    public function get(): Response
    {
        return new JsonResponse([
            'binance' => []
        ]);
    }
}