<?php

namespace App\Command;

use CryptoMarketPlaces\Aplication\Prices\LoadPricesFromAPIAction;
use CryptoMarketPlaces\Aplication\Prices\SystemPricesService;
use CryptoMarketPlaces\Infrastructure\Binance\BinancePricesRepository;
use CryptoMarketPlaces\Infrastructure\Prices\DatabasePricesRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand(name: 'prices:load-binance')]
class LoadPricesFromBinanceCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $loadPricesFromApiAction = new LoadPricesFromAPIAction();

        $loadPricesFromApiAction(
            new SystemPricesService(
                new DatabasePricesRepository()
            ),
            new BinancePricesRepository()
        );

        return Command::SUCCESS;
    }
}