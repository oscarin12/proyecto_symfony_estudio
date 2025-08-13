<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiActividadController extends AbstractController
{
    /**
     * @Route("/api/actividad", name="app_api_actividad")
     */
    public function index(): Response
    {
        return $this->render('api_actividad/index.html.twig', [
            'controller_name' => 'ApiActividadController',
        ]);
    }
}
