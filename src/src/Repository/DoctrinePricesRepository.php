<?php

namespace App\Repository;

use App\Entity\Prices;
use CryptoMarketPrices\Domain\Prices\IPrices;
use CryptoMarketPrices\Domain\Prices\IPricesRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

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
        $pricesRepository = $this->managerRegistry->getRepository(Prices::class);

        /** @var IPrices $prices */
        $pricesQuery = $pricesRepository->findBy([], ['created_at' => 'DESC'], 1);

        $prices = new Prices();

        if (empty($pricesQuery)) {
            $prices->setUuid(Uuid::v4());
            $prices->setProviderUuid(Prices::PRICES_PROVIDER_BINANCE);
            $prices->setRawPrices('[]');
            $prices->setCreatedAt(new \DateTime());

            return $prices; // dummy response
        }

        $prices->setUuid($pricesQuery['uuid']);
        $prices->setRawPrices($pricesQuery['prices']);
        $prices->setProviderUuid($pricesQuery['provider_uuid']);
        $prices->setCreatedAt($pricesQuery['created_at']);

        return $prices;
    }

    public function savePrices(IPrices $prices): void
    {
        $manager = $this->managerRegistry->getManager();
        $manager->persist($prices);
        $manager->flush();
    }
}
