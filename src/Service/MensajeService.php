<?php

namespace App\Service;


class MensajeService
{
    public function saludar(string $nombre): string
    {
        return "Hola, $nombre!";
    }
}


