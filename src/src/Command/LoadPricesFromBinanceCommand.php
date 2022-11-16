<?php

namespace App\Command;

use App\Entity\Prices;
use App\Repository\DoctrinePricesRepository;
use CryptoMarketPrices\Aplication\Prices\LoadPricesFromAPIAction;
use CryptoMarketPrices\Infrastructure\Binance\BinancePricesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'prices:load-binance')]
class LoadPricesFromBinanceCommand extends Command
{
    private EntityManagerInterface $entityManager;
    private BinancePricesRepository $binancePricesRepository;
    private DoctrinePricesRepository $doctrinePricesRepository;

    public function __construct(
        EntityManagerInterface  $entityManager,
        BinancePricesRepository $binancePricesRepository,
        DoctrinePricesRepository $doctrinePricesRepository
    )
    {
        parent::__construct('prices:load-binance');
        $this->entityManager = $entityManager;
        $this->binancePricesRepository = $binancePricesRepository;
        $this->doctrinePricesRepository = $doctrinePricesRepository;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $loadPricesFromAPIAction = new LoadPricesFromAPIAction(
            $this->binancePricesRepository,
            $this->doctrinePricesRepository
        );

        $loadPricesFromAPIAction();

        return Command::SUCCESS;
    }
}
