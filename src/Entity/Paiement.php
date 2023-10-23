<?php

namespace App\Entity;

use App\Repository\PaiementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaiementRepository::class)]
class Paiement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $p_methode = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $p_date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $p_total = null;

    #[ORM\OneToMany(mappedBy: 'paiement', targetEntity: Commande::class)]
    private Collection $commandes;

    #[ORM\OneToMany(mappedBy: 'paiement', targetEntity: Commande::class)]
    private Collection $paiement;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->paiement = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPMethode(): ?string
    {
        return $this->p_methode;
    }

    public function setPMethode(string $p_methode): static
    {
        $this->p_methode = $p_methode;

        return $this;
    }

    public function getPDate(): ?\DateTimeInterface
    {
        return $this->p_date;
    }

    public function setPDate(\DateTimeInterface $p_date): static
    {
        $this->p_date = $p_date;

        return $this;
    }

    public function getPTotal(): ?string
    {
        return $this->p_total;
    }

    public function setPTotal(string $p_total): static
    {
        $this->p_total = $p_total;

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
            $commande->setPaiement($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getPaiement() === $this) {
                $commande->setPaiement(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getPaiement(): Collection
    {
        return $this->paiement;
    }

    public function addPaiement(Commande $paiement): static
    {
        if (!$this->paiement->contains($paiement)) {
            $this->paiement->add($paiement);
            $paiement->setPaiement($this);
        }

        return $this;
    }

    public function removePaiement(Commande $paiement): static
    {
        if ($this->paiement->removeElement($paiement)) {
            // set the owning side to null (unless already changed)
            if ($paiement->getPaiement() === $this) {
                $paiement->setPaiement(null);
            }
        }

        return $this;
    }
}
