<?php

declare(strict_types=1);

namespace CryptoMarketPrices\Infrastructure\Binance;

class BinanceAPI
{
    public const HOST = 'https://api.binance.com';

    public const TICKER_PRICE_V3 = '/api/v3/ticker/price';
}