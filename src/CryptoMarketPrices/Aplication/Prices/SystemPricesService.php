<?php

namespace CryptoMarketPrices\Aplication\Prices;

use CryptoMarketPrices\Domain\Prices\IPrices;
use CryptoMarketPrices\Domain\Prices\IPricesRepository;
use CryptoMarketPrices\Domain\Prices\IPricesService;

class SystemPricesService implements IPricesService
{
    private IPricesRepository $pricesRepository;

    public function __construct(IPricesRepository $pricesRepository)
    {
        $this->pricesRepository = $pricesRepository;
    }

    public function savePrices(IPrices $prices): void
    {
        $this->pricesRepository->savePrices($prices);
    }
}