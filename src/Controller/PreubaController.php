<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PreubaController extends AbstractController
{
    /**
     * @Route("/preuba", name="app_preuba")
     */
    public function index(): Response
    {
        return $this->render('preuba/index.html.twig', [
            'controller_name' => 'PreubaController',
            
        ]);
    }
    
}
