<?php

namespace CryptoMarketPrices\Domain\Prices;

interface IPrices
{
    public function toArray(): array;
}