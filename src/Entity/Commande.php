<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 20, unique: true)]
    private $reference;

    #[ORM\ManyToOne(inversedBy: 'statut')]
    private ?Statut $statut = null;

    #[ORM\ManyToOne(inversedBy: 'paiement')]
    private ?Paiement $paiement = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateur')]
    private ?Utilisateur $utilisateur = null;

    #[ORM\ManyToOne(inversedBy: 'livraison')]
    private ?Livraison $livraison = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $com_date = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    #[Assert\Assert\PositiveOrZero(message: 'Le prix ne peut pas être négatif')]
    private ?string $com_total = null;

    #[ORM\Column(length: 255)]
    private ?string $com_adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $com_ville = null;

    #[ORM\Column(length: 255)]
    private ?string $com_cp = null;

    #[ORM\Column(nullable: true)]
    private ?int $reduction = null;

    #[ORM\OneToMany(mappedBy: 'commandeDetails', targetEntity: Lignedecommande::class, cascade: ['persist'])]
    private Collection $detailCommande;

    public function __construct()
    {
        $this->detailCommande = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->statut;
    }

    public function setStatut(?Statut $statut): static
    {
        $this->statut = $statut;

        return $this;
    }

    public function getPaiement(): ?Paiement
    {
        return $this->paiement;
    }

    public function setPaiement(?Paiement $paiement): static
    {
        $this->paiement = $paiement;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getLivraison(): ?Livraison
    {
        return $this->livraison;
    }

    public function setLivraison(?Livraison $livraison): static
    {
        $this->livraison = $livraison;

        return $this;
    }

    public function getComDate(): ?\DateTimeInterface
    {
        return $this->com_date;
    }

    public function setComDate(\DateTimeInterface $com_date): static
    {
        $this->com_date = $com_date;

        return $this;
    }

    public function getComTotal(): ?string
    {
        return $this->com_total;
    }

    public function setComTotal(string $com_total): static
    {
        $this->com_total = $com_total;

        return $this;
    }

    public function getComAdresse(): ?string
    {
        return $this->com_adresse;
    }

    public function setComAdresse(string $com_adresse): static
    {
        $this->com_adresse = $com_adresse;

        return $this;
    }

    public function getComVille(): ?string
    {
        return $this->com_ville;
    }

    public function setComVille(string $com_ville): static
    {
        $this->com_ville = $com_ville;

        return $this;
    }

    public function getComCp(): ?string
    {
        return $this->com_cp;
    }

    public function setComCp(string $com_cp): static
    {
        $this->com_cp = $com_cp;

        return $this;
    }

    public function getReduction(): ?int
    {
        return $this->reduction;
    }

    public function setReduction(?int $reduction): static
    {
        $this->reduction = $reduction;

        return $this;
    }

    /**
     * @return Collection<int, Lignedecommande>
     */
    public function getDetailCommande(): Collection
    {
        return $this->detailCommande;
    }

    public function addDetailCommande(Lignedecommande $detailCommande): static
    {
        if (!$this->detailCommande->contains($detailCommande)) {
            $this->detailCommande->add($detailCommande);
            $detailCommande->setCommandeDetails($this);
        }

        return $this;
    }

    public function removeDetailCommande(Lignedecommande $detailCommande): static
    {
        if ($this->detailCommande->removeElement($detailCommande)) {
            // set the owning side to null (unless already changed)
            if ($detailCommande->getCommandeDetails() === $this) {
                $detailCommande->setCommandeDetails(null);
            }
        }

        return $this;
    }
}
