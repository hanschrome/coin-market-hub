<?php

namespace CryptoMarketPrices\Domain\Prices;

interface IPricesService
{
    public function __construct(IPricesRepository $pricesRepository);

    public function savePrices(IPrices $prices): void;
}