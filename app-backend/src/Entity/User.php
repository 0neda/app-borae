<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $nome = null;

    #[ORM\Column(length: 128, nullable: true)]
    private ?string $telefone = null;

    #[ORM\Column]
    private ?bool $emailVerificado = null;

    #[ORM\Column(nullable: true)]
    private ?bool $aceitouTermos = null;

    #[ORM\Column]
    private ?\DateTime $criadoEm = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $atualizadoEm = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): static
    {
        $this->nome = $nome;

        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): static
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function isEmailVerificado(): ?bool
    {
        return $this->emailVerificado;
    }

    public function setEmailVerificado(bool $emailVerificado): static
    {
        $this->emailVerificado = $emailVerificado;

        return $this;
    }

    public function isAceitouTermos(): ?bool
    {
        return $this->aceitouTermos;
    }

    public function setAceitouTermos(?bool $aceitouTermos): static
    {
        $this->aceitouTermos = $aceitouTermos;

        return $this;
    }

    public function getCriadoEm(): ?\DateTime
    {
        return $this->criadoEm;
    }

    public function setCriadoEm(\DateTime $criadoEm): static
    {
        $this->criadoEm = $criadoEm;

        return $this;
    }

    public function getAtualizadoEm(): ?\DateTime
    {
        return $this->atualizadoEm;
    }

    public function setAtualizadoEm(?\DateTime $atualizadoEm): static
    {
        $this->atualizadoEm = $atualizadoEm;

        return $this;
    }
}
