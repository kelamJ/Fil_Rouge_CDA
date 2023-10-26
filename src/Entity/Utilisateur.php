<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;


#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Il existe déjà un compte avec cette adresse email.')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    #[Assert\NotBlank(message: 'L\'email ne peut pas être vide.')]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(pattern: '/^[A-Za-z]+$/', message: 'Veuillez saisir un nom valide')]
    #[Assert\Length(min: 3, minMessage: 'Le nom doit faire au minimum 3 caractères')]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(pattern: '/^[A-Za-z]+$/', message: 'Veuillez saisir un prénom valide')]
    #[Assert\Length(min: 3, minMessage: 'Le prénom doit faire au minimum 3 caractères')]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(
        pattern: '/^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$/',
        message: 'Votre numéro de téléphone doit faire 10 chiffres'
)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(pattern: '/^[0-9A-Za-z\s\.,#\'-]+$/', message: 'Veuillez saisir une adresse valide')]
    private ?string $u_adresse = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(pattern: '/^[A-Za-z\s-]+$/', message: 'Veuillez saisir une ville qui existe')]
    private ?string $u_ville = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex(pattern: '/^\d{5}$/', message: 'Le code postal doit se composer de 5 chiffres')]
    private ?string $u_cp = null;

    #[ORM\OneToMany(mappedBy: 'utilisateur', targetEntity: Commande::class)]
    private Collection $utilisateur;

    public function __construct()
    {
        $this->utilisateur = new ArrayCollection();
    }

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
        return (string) $this->prenom . ' ' . $this->nom;
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

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNomComplet(): string
    {
        return $this->prenom. ' '.$this->nom;
    }
    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getUAdresse(): ?string
    {
        return $this->u_adresse;
    }

    public function setUAdresse(string $u_adresse): static
    {
        $this->u_adresse = $u_adresse;

        return $this;
    }

    public function getUVille(): ?string
    {
        return $this->u_ville;
    }

    public function setUVille(string $u_ville): static
    {
        $this->u_ville = $u_ville;

        return $this;
    }

    public function getUCp(): ?string
    {
        return $this->u_cp;
    }

    public function setUCp(string $u_cp): static
    {
        $this->u_cp = $u_cp;

        return $this;
    }

    public function __toString(): string
    {
        return $this->getUserIdentifier();
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getUtilisateur(): Collection
    {
        return $this->utilisateur;
    }

    public function addUtilisateur(Commande $utilisateur): static
    {
        if (!$this->utilisateur->contains($utilisateur)) {
            $this->utilisateur->add($utilisateur);
            $utilisateur->setUtilisateur($this);
        }

        return $this;
    }

    public function removeUtilisateur(Commande $utilisateur): static
    {
        if ($this->utilisateur->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getUtilisateur() === $this) {
                $utilisateur->setUtilisateur(null);
            }
        }

        return $this;
    }
}
