<?php

namespace App\Entity;

use App\Repository\LivraisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LivraisonRepository::class)]
class Livraison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $liv_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $liv_url = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $liv_date = null;

    #[ORM\OneToMany(mappedBy: 'livraison', targetEntity: Commande::class)]
    private Collection $commandes;

    #[ORM\ManyToOne(inversedBy: 'livraison')]
    private ?Edite $liv_id = null;

    #[ORM\OneToMany(mappedBy: 'livraison', targetEntity: Edite::class)]
    private Collection $edit_liv_id;

    #[ORM\OneToMany(mappedBy: 'livraison', targetEntity: Commande::class)]
    private Collection $livraison;

    public function __construct()
    {
        $this->commandes = new ArrayCollection();
        $this->edit_liv_id = new ArrayCollection();
        $this->livraison = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLivNom(): ?string
    {
        return $this->liv_nom;
    }

    public function setLivNom(string $liv_nom): static
    {
        $this->liv_nom = $liv_nom;

        return $this;
    }

    public function getLivUrl(): ?string
    {
        return $this->liv_url;
    }

    public function setLivUrl(string $liv_url): static
    {
        $this->liv_url = $liv_url;

        return $this;
    }

    public function getLivDate(): ?\DateTimeInterface
    {
        return $this->liv_date;
    }

    public function setLivDate(\DateTimeInterface $liv_date): static
    {
        $this->liv_date = $liv_date;

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
            $commande->setLivraison($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getLivraison() === $this) {
                $commande->setLivraison(null);
            }
        }

        return $this;
    }

    public function getLivId(): ?Edite
    {
        return $this->liv_id;
    }

    public function setLivId(?Edite $liv_id): static
    {
        $this->liv_id = $liv_id;

        return $this;
    }

    /**
     * @return Collection<int, Edite>
     */
    public function getEditLivId(): Collection
    {
        return $this->edit_liv_id;
    }

    public function addEditLivId(Edite $editLivId): static
    {
        if (!$this->edit_liv_id->contains($editLivId)) {
            $this->edit_liv_id->add($editLivId);
            $editLivId->setLivraison($this);
        }

        return $this;
    }

    public function removeEditLivId(Edite $editLivId): static
    {
        if ($this->edit_liv_id->removeElement($editLivId)) {
            // set the owning side to null (unless already changed)
            if ($editLivId->getLivraison() === $this) {
                $editLivId->setLivraison(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getLivraison(): Collection
    {
        return $this->livraison;
    }

    public function addLivraison(Commande $livraison): static
    {
        if (!$this->livraison->contains($livraison)) {
            $this->livraison->add($livraison);
            $livraison->setLivraison($this);
        }

        return $this;
    }

    public function removeLivraison(Commande $livraison): static
    {
        if ($this->livraison->removeElement($livraison)) {
            // set the owning side to null (unless already changed)
            if ($livraison->getLivraison() === $this) {
                $livraison->setLivraison(null);
            }
        }

        return $this;
    }
}
