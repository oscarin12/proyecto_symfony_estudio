<?php
namespace App\Service;

use Psr\Log\LoggerInterface;

class CalculadoraService
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function sumar(int $a, int $b): int
    {
        $resultado = $a + $b;
        $this->logger->info("Suma: $a + $b = $resultado");
        return $resultado;
    }
}
