<?php
namespace App\Service;
use Psr\Log\LoggerInterface;

class LoggerService     
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function loger(string $nombre): string
    {
        $this->logger->info("Saludando a $nombre");
        return "¡Hola, $nombre!";
    }
}