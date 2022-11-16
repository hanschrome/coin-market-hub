<?php

namespace CryptoMarketPrices\Infrastructure\Binance;

use App\Entity\Prices;
use CryptoMarketPrices\Domain\Prices\IPrices;
use CryptoMarketPrices\Domain\Prices\IPricesRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class BinancePricesRepository extends ServiceEntityRepository implements IPricesRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prices::class);
    }

    public function getPrices(): IPrices
    {
        return new Prices();
    }

    public function savePrices(IPrices $prices): void
    {
        // do nothing
    }
}