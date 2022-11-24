<?php

namespace CryptoMarketPrices\Infrastructure\Binance;

use App\Entity\Prices;
use CryptoMarketPrices\Domain\Prices\IPrices;
use CryptoMarketPrices\Domain\Prices\IPricesRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Uuid;

class BinancePricesRepository extends ServiceEntityRepository implements IPricesRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prices::class);
    }

    public function getPrices(): IPrices
    {
        // @todo make request to ask prices
        // @todo map them to prices object

        $prices = new Prices();

        $prices->setUuid(Uuid::v4());
        $prices->setProviderUuid(Prices::PRICES_PROVIDER_BINANCE);
        $prices->setCreatedAt(new \DateTime());
        $prices->setRawPrices('{}');

        return $prices;
    }

    public function savePrices(IPrices $prices): void
    {
        // do nothing
    }
}