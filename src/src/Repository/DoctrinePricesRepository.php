<?php

namespace App\Repository;

use App\Entity\Prices;
use CryptoMarketPlaces\Domain\Prices\IPrices;
use CryptoMarketPlaces\Domain\Prices\IPricesRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrinePricesRepository extends ServiceEntityRepository implements IPricesRepository
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
        // TODO: Implement savePrices() method.
    }
}