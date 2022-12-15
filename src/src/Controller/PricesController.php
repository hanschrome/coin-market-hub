<?php

namespace App\Controller;

use App\Repository\DoctrinePricesRepository;
use CryptoMarketPrices\Aplication\Prices\GetPricesAction;
use CryptoMarketPrices\Domain\Prices\IPrices;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PricesController extends AbstractController
{
    private DoctrinePricesRepository $doctrinePricesRepository;

    public function __construct(DoctrinePricesRepository $doctrinePricesRepository)
    {
        $this->doctrinePricesRepository = $doctrinePricesRepository;
    }

    #[Route('/api/v1/prices')]
    public function get(): Response
    {
        $getPricesAction = new GetPricesAction($this->doctrinePricesRepository);

        /** @var IPrices $prices */
        $prices = $getPricesAction();

        return new JsonResponse([
            'binance' => json_decode($prices->getRawPrices())
        ]);
    }
}