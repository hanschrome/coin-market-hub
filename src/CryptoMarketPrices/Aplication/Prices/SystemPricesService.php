<?php

namespace CryptoMarketPlaces\Aplication\Prices;

use CryptoMarketPlaces\Domain\Prices\IPrices;
use CryptoMarketPlaces\Domain\Prices\IPricesRepository;
use CryptoMarketPlaces\Domain\Prices\IPricesService;

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