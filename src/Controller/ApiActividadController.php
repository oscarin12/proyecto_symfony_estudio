<?php

namespace App\Controller;

use App\Entity\Actividad;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ApiActividadController extends AbstractController
{
    /**
     * @Route("/api/actividad", name="app_api_actividad")
     */
    public function index(EntityManagerInterface $em): JsonResponse
    {
        $tareas = $em->getRepository(Actividad::class)->findAll();

        return $this->json($tareas, 200, [], ['groups' => 'tareas']);
    }



    /**
     * @Route("/api/tareas", name="crear_tarea", methods={"POST"})
     */
    public function crear(
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        EntityManagerInterface $em
    ): JsonResponse {
        $data = $request->getContent();

        $tarea = $serializer->deserialize($data, Actividad::class, 'json');

        $errores = $validator->validate($tarea);

        if (count($errores) > 0) {
            return $this->json($errores, Response::HTTP_BAD_REQUEST);
        }

        $em->persist($tarea);
        $em->flush();

        return $this->json($tarea, 201, [], ['groups' => 'tareas']);
    }

    /**
     * @Route("/api/tareas/{id}", name="obtener_tarea", methods={"GET"})
     */
    public function obtenerTarea(int $id, EntityManagerInterface $em): JsonResponse
    {
        $tarea = $em->getRepository(Actividad::class)->find($id);

        if (!$tarea) {
            return $this->json(['error' => 'Tarea no encontrada'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($tarea, 200, [], ['groups' => 'tareas']);
    }
    
    /**
     * @Route("/api/tareas/{id}", name="actualizar_tarea", methods={"PUT"})
     */
    public function actualizar(
        int $id,
        Request $request,
        SerializerInterface $serializer,
        ValidatorInterface $validator,
        EntityManagerInterface $em
    ): JsonResponse {
        $tarea = $em->getRepository(Actividad::class)->find($id);

        if (!$tarea) {
            return $this->json(['error' => 'Tarea no encontrada'], Response::HTTP_NOT_FOUND);
        }

        $data = $request->getContent();
        $serializer->deserialize($data, Actividad::class, 'json', ['object_to_populate' => $tarea]);

        $errores = $validator->validate($tarea);

        if (count($errores) > 0) {
            return $this->json($errores, Response::HTTP_BAD_REQUEST);
        }

        $em->flush();

        return $this->json($tarea, 200, [], ['groups' => 'tareas']);
    }

    /**
     * @Route("/api/tareas/{id}", name="eliminar_tarea", methods={"DELETE"})
     */
    public function eliminar(int $id, EntityManagerInterface $em): JsonResponse
    {
        $tarea = $em->getRepository(Actividad::class)->find($id);

        if (!$tarea) {
            return $this->json(['error' => 'Tarea no encontrada'], Response::HTTP_NOT_FOUND);
        }

        $em->remove($tarea);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
