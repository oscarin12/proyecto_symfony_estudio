<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Tarea;
use App\Form\TareaType;
class NuevaController extends AbstractController
{
/**
 * @Route("/tarea/nueva", name="tarea_nueva")
 */
public function nueva(Request $request): Response
{
    $tarea = new Tarea();
    $form = $this->createForm(TareaType::class, $tarea);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        // Aquí podrías persistir la entidad
        return new Response("Formulario enviado correctamente.");
    }

    return $this->render('nueva/index.html.twig', [
        'formulario' => $form->createView(),
    ]);
}

}
