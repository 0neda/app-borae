<?php

namespace App\Entity;

use App\Enum\EnumStatusAprovacao;
use App\Repository\EmpresaRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmpresaRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_CNPJ', fields: ['cnpj'])]
class Empresa implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    #[Assert\NotBlank]
    #[Assert\Length(min: 14, max: 18)]
    #[Assert\Regex(
        pattern: '/^\\d{2}\\.\\d{3}\\.\\d{3}\\/\\d{4}-\\d{2}$/',
        message: 'O CNPJ não é válido. Use o formato 00.000.000/0000-00'
    )]
    private ?string $cnpj = null;

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
    #[Assert\NotBlank]
    private ?string $razaoSocial = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    #[Assert\Email]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank]
    private ?string $telefone = null;

    #[ORM\Column]
    #[Assert\NotNull]
    #[Assert\Type('float')]
    private ?float $saldoAnuncio = null;

    #[ORM\Column]
    private ?\DateTime $criadoEm = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $atualizadoEm = null;

    #[ORM\Column(enumType: EnumStatusAprovacao::class)]
    private ?EnumStatusAprovacao $statusAprovacao = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    public function setCnpj(string $cnpj): static
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->cnpj;
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

    public function getRazaoSocial(): ?string
    {
        return $this->razaoSocial;
    }

    public function setRazaoSocial(string $razaoSocial): static
    {
        $this->razaoSocial = $razaoSocial;

        return $this;
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

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): static
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getSaldoAnuncio(): ?float
    {
        return $this->saldoAnuncio;
    }

    public function setSaldoAnuncio(float $saldoAnuncio): static
    {
        $this->saldoAnuncio = $saldoAnuncio;

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

    public function getStatusAprovacao(): ?EnumStatusAprovacao
    {
        return $this->statusAprovacao;
    }

    public function setStatusAprovacao(EnumStatusAprovacao $statusAprovacao): static
    {
        $this->statusAprovacao = $statusAprovacao;

        return $this;
    }
}
