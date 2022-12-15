<?php

namespace CryptoMarketPrices\Domain\Prices;

interface IPrices
{
    public function getId(): int;

    public function getUuid(): string;

    public function getProviderUuid(): string;

    public function getRawPrices(): string;

    public function getCreatedAt(): \DateTime;

    public function setUuid(string $uuid): void;

    public function setProviderUuid(string $providerUuid): void;

    public function setRawPrices(string $rawPrices): void;

    public function setCreatedAt(\DateTime $dateTime): void;
}