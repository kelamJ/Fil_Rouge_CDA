<?php

namespace App\Entity;

use App\Repository\LignedecommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LignedecommandeRepository::class)]
class Lignedecommande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix = null;

    #[ORM\ManyToOne(inversedBy: 'lignedecommandes')]
    private ?Produit $produit = null;


    #[ORM\ManyToOne(inversedBy: 'detailCommande')]
    private ?Commande $details = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): static
    {
        $this->produit = $produit;

        return $this;
    }


    public function getCommandeDetails(): ?Commande
    {
        return $this->details;
    }

    public function setCommandeDetails(?Commande $commandeDetails): static
    {
        $this->details = $commandeDetails;

        return $this;
    }
}
