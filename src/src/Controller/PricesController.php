<?php

declare(strict_types=1);

namespace App\Controller;

use App\Repository\DoctrinePricesRepository;
use CryptoMarketPrices\Aplication\Prices\GetPricesAction;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\ItemInterface;

class PricesController extends AbstractController
{
    private DoctrinePricesRepository $doctrinePricesRepository;
    private FilesystemAdapter $filesystemAdapter;

    public function __construct(DoctrinePricesRepository $doctrinePricesRepository) {
        $this->doctrinePricesRepository = $doctrinePricesRepository;
        $this->filesystemAdapter = new FilesystemAdapter();
    }

    #[Route('/api/v1/prices')]
    public function get(): Response
    {
        return new JsonResponse(['binance' =>
            $this->filesystemAdapter->get('api_v1_prices_get', function (ItemInterface $item) {
                $item->expiresAfter(60);

                $getPricesAction = new GetPricesAction($this->doctrinePricesRepository);

                return json_decode($getPricesAction()->getRawPrices());
            })
        ]);
    }
}