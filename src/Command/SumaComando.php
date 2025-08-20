<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\Input;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;     
 
class SumaComando extends Command
{
    // nombre del comando
    protected static $defaultName = 'app:suma-comando';

    protected function configure(): void
    {
        $this->setDescription('Un comando que suma dos números.')
        ->addArgument('numero1',InputArgument::REQUIRED, 'El primer número')
        ->addArgument('numero2', InputArgument::REQUIRED, 'El segundo número');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {   

        $numero1 = $input->getArgument('numero1');
        $numero2 = $input->getArgument('numero2');
        $suma = $numero1 + $numero2;
      $output->writeln(sprintf('La suma de %s + %s es: %s', $numero1, $numero2, $suma));
        return Command::SUCCESS;
    }
}
