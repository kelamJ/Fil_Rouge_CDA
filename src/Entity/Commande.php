<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

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
    private ?string $com_total = null;

    #[ORM\Column(length: 255)]
    private ?string $com_adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $com_ville = null;

    #[ORM\Column(length: 255)]
    private ?string $com_cp = null;

    #[ORM\Column(nullable: true)]
    private ?int $reduction = null;

    public function getId(): ?int
    {
        return $this->id;
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
}
