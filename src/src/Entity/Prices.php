<?php

namespace App\Entity;

use App\Repository\DoctrinePricesRepository;
use CryptoMarketPrices\Domain\Prices\IPrices;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DoctrinePricesRepository::class)]
class Prices implements IPrices
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private string $id;

    #[ORM\Column]
    private string $uuid;

    #[ORM\Column]
    private string $providerUuid;

    #[ORM\Column]
    private string $rawPrices;

    #[ORM\Column(name: 'created_at', type: 'datetime')]
    private \DateTime $created_at;

    public function toArray(): array
    {
        return [];
    }
}