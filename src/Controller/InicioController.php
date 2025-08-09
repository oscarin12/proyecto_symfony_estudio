<?php

namespace App\Controller;

use App\Service\LoggerService;
use App\Service\MensajeService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class InicioController extends AbstractController
{

    /**
     * @Route("/inicio", name="inicio_ruta")
     */
    public function index(): Response
    {
        return $this->render('inicio/index.html.twig', [
           'controller_name' => 'oscar felipe qlio te amo pero a la vez no ',
            'nombre' => 'oscar',
           
        ]);


    }

    /**
     * @Route("/bienvenidos", name="app_bienvenidos")
     */
    public function bienvenidos(): Response
    {
        return new Response('¡bienvenidos a mi app!');
    }

  
    
    /**
     * @Route("/contacto", name="contacto_ruta")
     */
    public function contacto(): Response
    {
        return $this->render('contacto.html.twig');
    }

      /**
     * @Route("/saludo", name="saludo")
     */
    public function saludo(MensajeService $mensaje): Response
    {
        return new Response($mensaje->saludar("hola oscar"));
    }



       /**
     * @Route("/loger", name="saludo")
     */
    public function loger(LoggerService $mensaje): Response
    {
        return new Response($mensaje->loger("hola oscar"));
    }


}
