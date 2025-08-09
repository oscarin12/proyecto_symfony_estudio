<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\NoNumeros;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     
     * @Assert\NotBlank
     * @Assert\Length(min=2, max=255)
     * @NoNumeros
     * 
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Assert\NotBlank(message="El nombre de usuario no puede estar vacío.")
     * @Assert\Length(min=2, max=255)
     * @NoNumeros
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)     
     * 
     * @Assert\Length(min=2, max=255)
     * @NoNumeros
     * 
     */
    private $apellido;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="El correo no puede estar vacío.")
     * @Assert\Email(message="El correo '{{ value }}' no es válido.")
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="La contraseña no puede estar vacía.")
     * @Assert\Length(
     *      min=6,
     *      minMessage="La contraseña debe tener al menos {{ limit }} caracteres."
     * )
     */
    private $password;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];






    public function getRoles(): array
    {
        // guarantee every user at least has ROLE_USER
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
    public function getApellido(): ?string
    {
        return $this->apellido;
    }
    public function setApellido(?string $apellido): self
    {
        $this->apellido = $apellido;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt(): ?string
    {
        // not needed for bcrypt or argon2i
        return null;
    }

    public function eraseCredentials()
    {
        // if you store any temporary, sensitive data on the user, clear it here
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }
}
