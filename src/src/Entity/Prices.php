<?php

namespace App\Entity;

use App\Repository\DoctrinePricesRepository;
use CryptoMarketPrices\Domain\Prices\IPrices;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctrinePricesRepository::class)]
class Prices implements IPrices
{
    public const PRICES_PROVIDER_BINANCE = '433eca1e-e4fd-4b77-a00c-6685d7942e55';

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private string $uuid;

    #[ORM\Column]
    private string $providerUuid;

    #[ORM\Column]
    private string $rawPrices;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private \DateTime $created_at;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return string
     */
    public function getProviderUuid(): string
    {
        return $this->providerUuid;
    }

    /**
     * @return string
     */
    public function getRawPrices(): string
    {
        return $this->rawPrices;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param string $uuid
     */
    public function setUuid(string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @param string $providerUuid
     */
    public function setProviderUuid(string $providerUuid): void
    {
        $this->providerUuid = $providerUuid;
    }

    /**
     * @param string $rawPrices
     */
    public function setRawPrices(string $rawPrices): void
    {
        $this->rawPrices = $rawPrices;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }


}