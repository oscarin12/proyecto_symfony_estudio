<?php

namespace App\Controller;

use App\Entity\Cita;
use App\Form\CitaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CitaController extends AbstractController
{


    /**
     * @Route("/cita", name="cita_index")
     */
      public function index(Request $request): Response
    {
        $cita = new Cita();
        $form = $this->createForm(CitaType::class, $cita);
        $form->handleRequest($request);

        if (($form->isSubmitted() && $form->isValid()) ) {
            
            if ($form->isValid()) {
                // Aquí podrías guardar la cita si quisieras.
                $this->addFlash('success', 'Cita válida después de mediodía.');
            } 
        }

        return $this->render('cita/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
