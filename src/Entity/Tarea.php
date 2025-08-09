<?php

namespace App\Entity;

use App\Repository\TareaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\NoProhibido;
/**
 * @ORM\Entity(repositoryClass=TareaRepository::class)
 */
class Tarea
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
     /**
     * @Assert\NotBlank(message="El título es obligatorio.")
     * @Assert\Length(min=3, max=100)
     * @Assert\NotBlank
     * @NoProhibido
     */
    private $titulo;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(message="La descripción no puede estar vacía.")
     */
    private $descripcion;

    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $creadoEn;

        
    /**
     * @ORM\Column(type="datetime_immutable", nullable=true)
     */
    private $modificadonEn;

    /**
     * @ORM\ManyToOne(targetEntity=Categoria::class, inversedBy="tareas")
     */
    private $categoria;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): self
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

    public function getCreadoEn(): ?\DateTimeImmutable
    {
        return $this->creadoEn;
    }

    public function setCreadoEn(?\DateTimeImmutable $creadoEn): self
    {
        $this->creadoEn = $creadoEn;

        return $this;
    }

    public function getCategoria(): ?Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(?Categoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }
}
