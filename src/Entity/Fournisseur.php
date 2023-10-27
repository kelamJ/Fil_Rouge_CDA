<?php

namespace App\Entity;

use App\Repository\FournisseurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FournisseurRepository::class)]
class Fournisseur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $cp = null;

    #[ORM\Column(length: 255)]
    private ?string $pays = null;

    #[ORM\OneToMany(mappedBy: 'fournisseur_id', targetEntity: Produit::class)]
    private Collection $fournisseur;

    #[ORM\OneToMany(mappedBy: 'fournisseur', targetEntity: Produit::class)]
    private Collection $fourni;

    public function __construct()
    {
        $this->fournisseur = new ArrayCollection();
        $this->fourni = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): static
    {
        $this->cp = $cp;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getFournisseur(): Collection
    {
        return $this->fournisseur;
    }

    public function addFournisseur(Produit $fournisseur): static
    {
        if (!$this->fournisseur->contains($fournisseur)) {
            $this->fournisseur->add($fournisseur);
            $fournisseur->setFournisseurId($this);
        }

        return $this;
    }

    public function removeFournisseur(Produit $fournisseur): static
    {
        if ($this->fournisseur->removeElement($fournisseur)) {
            // set the owning side to null (unless already changed)
            if ($fournisseur->getFournisseurId() === $this) {
                $fournisseur->setFournisseurId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getFourni(): Collection
    {
        return $this->fourni;
    }

    public function addFourni(Produit $fourni): static
    {
        if (!$this->fourni->contains($fourni)) {
            $this->fourni->add($fourni);
            $fourni->setFournisseur($this);
        }

        return $this;
    }

    public function removeFourni(Produit $fourni): static
    {
        if ($this->fourni->removeElement($fourni)) {
            // set the owning side to null (unless already changed)
            if ($fourni->getFournisseur() === $this) {
                $fourni->setFournisseur(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getNom();
    }
}
