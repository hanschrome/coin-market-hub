<?php

declare(strict_types=1);

namespace CryptoMarketPrices\Aplication\Prices;

use CryptoMarketPrices\Domain\Prices\IPricesRepository;

class LoadPricesFromAPIAction
{
    private IPricesRepository $binancePricesRepository;
    private IPricesRepository $doctrinePricesRepository;

    public function __construct(IPricesRepository $systemPricesService, IPricesRepository $doctrinePricesRepository)
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
