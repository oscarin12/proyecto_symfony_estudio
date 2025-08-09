<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PaginaController extends AbstractController
{
    /**
     * @Route("/hola", name="hola_mundo")
     */
    public function hola(): Response
    {
        return new Response('¡Hola mundo desde Symfony!');
    }




    /**
     * @Route("/adios", name="adios_mundo")
     */
    public function adios(): Response{
        return new Response('¡Adiós mundo desde Symfony!');
    }
}
