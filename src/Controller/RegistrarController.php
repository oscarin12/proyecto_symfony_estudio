<?php

namespace App\Controller;
use App\Entity\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UsuariosType;

class RegistrarController extends AbstractController
{
    /**
     * @Route("/usuario/registrar", name="app_registrar")
     */
   public function registrar(Request $request): Response
{
    $usuario = new Usuario();
    $form = $this->createForm(UsuariosType::class, $usuario);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        // Aquí podrías persistir la entidad
        return new Response("Usuario creado correctamente.");
    }

    return $this->render('registrar/index.html.twig', [
        'form' => $form->createView(),
    ]);
}
}
