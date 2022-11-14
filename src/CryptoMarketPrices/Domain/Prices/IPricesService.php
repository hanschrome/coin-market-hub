<?php

namespace CryptoMarketPlaces\Domain\Prices;

interface IPricesService
{
    public function __construct(IPricesRepository $pricesRepository);

    public function savePrices(IPrices $prices): void;
}