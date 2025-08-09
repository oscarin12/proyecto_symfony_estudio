<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mime\Email;

class MailerController extends AbstractController
{
    #[Route('/enviar-correo', name: 'enviar_correo')]
    public function enviarCorreo(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('uberoscar45medina@gmail.com')
            ->to('oscar45medina@gmail.com')
            ->subject('Bienvenido funcionalidad de correo')
            ->text('Gracias por registrarte');

        $mailer->send($email);

        return new Response("Correo enviado.");
    }
}
