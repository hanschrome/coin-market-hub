<?php

namespace CryptoMarketPlaces\Aplication\Prices;

use CryptoMarketPlaces\Domain\Prices\IPricesRepository;
use CryptoMarketPlaces\Domain\Prices\IPricesService;

class LoadPricesFromAPIAction
{
    public function __invoke(
        IPricesService $pricesService,
        IPricesRepository $originRepository
    ): void
    {
        $prices = $originRepository->getPrices();

        $pricesService->savePrices($prices);
    }
}