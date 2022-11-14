<?php

namespace CryptoMarketPlaces\Infrastructure\Prices;

use CryptoMarketPlaces\Domain\Prices\IPrices;
use CryptoMarketPlaces\Domain\Prices\IPricesRepository;
use CryptoMarketPlaces\Domain\Prices\Prices;

class DatabasePricesRepository implements IPricesRepository
{
    public function getPrices(): IPrices
    {
        return new Prices();
    }

    public function savePrices(IPrices $prices): void
    {
        // TODO: Implement savePrices() method.
    }
}