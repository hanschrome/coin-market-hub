<?php

namespace CryptoMarketPrices\Aplication\Prices;

use App\Repository\DoctrinePricesRepository;
use CryptoMarketPrices\Infrastructure\Binance\BinancePricesRepository;

class LoadPricesFromAPIAction
{
    private BinancePricesRepository $binancePricesRepository;
    private DoctrinePricesRepository $doctrinePricesRepository;

    public function __construct(BinancePricesRepository $systemPricesService, DoctrinePricesRepository $doctrinePricesRepository)
    {
        $this->binancePricesRepository = $systemPricesService;
        $this->doctrinePricesRepository = $doctrinePricesRepository;
    }

    public function __invoke(): void
    {
        $prices = $this->binancePricesRepository->getPrices();

        $this->doctrinePricesRepository->savePrices($prices);
    }
}