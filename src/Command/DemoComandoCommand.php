<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DemoComandoCommand extends Command
{
    // nombre del comando
    protected static $defaultName = 'app:demo-comando';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('¡Este es un comando personalizado!');
        return Command::SUCCESS;
    }
}
