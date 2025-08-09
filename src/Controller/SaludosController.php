<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SaludosController extends AbstractController
{
    /**
     * @Route("/saludos", name="app_saludos")
     */
    public function index(): Response
    {

        $variable1 = 'valor1';
        $variable2 = [1,2,3];


        return $this->render('saludos/index.html.twig', [
               'nombre' => 'oscar',
                'variable1' => $variable1,
                'variable2' => $variable2


        ]);

        
    }

    



}
