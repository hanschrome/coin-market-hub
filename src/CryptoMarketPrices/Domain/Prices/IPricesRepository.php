<?php

namespace CryptoMarketPlaces\Domain\Prices;

interface IPricesRepository
{
    public function getPrices(): IPrices;

    public function savePrices(IPrices $prices): void;
}