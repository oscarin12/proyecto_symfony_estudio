<?php

namespace App\Service;

class FechaService
{
    public function obtenerFechaActual(): string
    {
        return (new \DateTime())->format('Y-m-d H:i:s');
    }
}
