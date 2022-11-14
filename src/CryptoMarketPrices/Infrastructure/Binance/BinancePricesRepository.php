<?php

namespace CryptoMarketPlaces\Infrastructure\Binance;

use CryptoMarketPlaces\Domain\Prices\IPrices;
use CryptoMarketPlaces\Domain\Prices\IPricesRepository;
use CryptoMarketPlaces\Domain\Prices\Prices;

class BinancePricesRepository implements IPricesRepository
{
    public function getPrices(): IPrices
    {
        return new Prices();
    }

    public function savePrices(IPrices $prices): void
    {
        // do nothing
    }
}