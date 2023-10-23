<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StatutRepository::class)]
class Statut
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $statut_nom = null;

    #[ORM\OneToMany(mappedBy: 'statut', targetEntity: Commande::class)]
    private Collection $commandes;

    #[ORM\OneToMany(mappedBy: 'statut', targetEntity: Commande::class)]
    private Collection $statut;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->statut = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatutNom(): ?string
    {
        return $this->statut_nom;
    }

    public function setStatutNom(string $statut_nom): static
    {
        $this->statut_nom = $statut_nom;

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setStatut($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getStatut() === $this) {
                $commande->setStatut(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getStatutNom();
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getStatut(): Collection
    {
        return $this->statut;
    }

    public function addStatut(Commande $statut): static
    {
        if (!$this->statut->contains($statut)) {
            $this->statut->add($statut);
            $statut->setStatut($this);
        }

        return $this;
    }

    public function removeStatut(Commande $statut): static
    {
        if ($this->statut->removeElement($statut)) {
            // set the owning side to null (unless already changed)
            if ($statut->getStatut() === $this) {
                $statut->setStatut(null);
            }
        }

        return $this;
    }
}
