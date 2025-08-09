<?php

namespace App\Controller;

use App\Service\FechaService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FechaController extends AbstractController
{
   
       /**
     * @Route("/fecha", name="fecha_actual")
     */
    public function mostrarFecha(FechaService $fechaService): Response
    {
        $fecha = $fechaService->obtenerFechaActual();
        return new Response("La fecha actual es: $fecha");
    }
}
