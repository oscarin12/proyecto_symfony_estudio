<?php

namespace App\Entity;

use App\Repository\ActividadRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=ActividadRepository::class)
 */
class Actividad
{
    /**
     * @Groups({"tareas"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"tareas"})
     * @ORM\Column(type="string", length=255)
     */
    private $titulo;

    /**
     * @Groups({"tareas"})
     * @Assert\NotBlank(message="El descripcion no puede estar vacío")
     * @ORM\Column(type="text", nullable=true)
     */
    private $descripcion;

    /**
     * @Groups({"tareas"})
     * @ORM\Column(type="boolean")
     */
    private $completada;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function isCompletada(): ?bool
    {
        return $this->completada;
    }

    public function setCompletada(bool $completada): self
    {
        $this->completada = $completada;

        return $this;
    }
}
