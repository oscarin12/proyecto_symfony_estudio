<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ApiTareasController extends AbstractController
{
    /**
     * @Route("/api/tareas", name="api_tareas", methods={"GET"})
     */
    public function listar(): JsonResponse
    {
        $tareas = [
            ['id' => 1, 'titulo' => 'Lavar la ropa'],
            ['id' => 2, 'titulo' => 'Sacar la basura'],
        ];

        return $this->json($tareas);
    }
}
