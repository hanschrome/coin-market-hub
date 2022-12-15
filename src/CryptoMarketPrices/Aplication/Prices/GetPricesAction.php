<?php

declare(strict_types=1);

namespace CryptoMarketPrices\Aplication\Prices;

use App\Repository\DoctrinePricesRepository;
use CryptoMarketPrices\Domain\Prices\IPrices;
use CryptoMarketPrices\Domain\Prices\IPricesRepository;

class GetPricesAction
{
    private IPricesRepository $pricesRepository;

    public function __construct(DoctrinePricesRepository $doctrinePricesRepository)
    {
        $this->pricesRepository = $doctrinePricesRepository;
    }

    public function __invoke(): IPrices
    {
        /** @todo cache it */
        return $this->pricesRepository->getPrices();
    }
}
