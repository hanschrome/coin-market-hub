<?php

namespace App\Repository;

use App\Entity\Prices;
use CryptoMarketPrices\Domain\Prices\IPrices;
use CryptoMarketPrices\Domain\Prices\IPricesRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class DoctrinePricesRepository extends ServiceEntityRepository implements IPricesRepository
{
    private ManagerRegistry $managerRegistry;

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prices::class);
        $this->managerRegistry = $registry;
    }

    public function getPrices(): IPrices
    {
        return new Prices();
    }

    public function savePrices(IPrices $prices): void
    {
        $manager = $this->managerRegistry->getManager();
        $manager->persist($prices);
        $manager->flush();
    }
}