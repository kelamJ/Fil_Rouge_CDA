<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cat')]
    private ?Categorie $categorie = null;

    #[ORM\ManyToOne(inversedBy: 'fourni')]
    private ?Fournisseur $fournisseur = null;

    #[ORM\Column(length: 255)]
    private ?string $pro_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $pro_description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix_achat = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $prix_vente = null;

    #[ORM\Column(length: 255)]
    private ?string $pro_image = null;

    #[ORM\Column]
    private ?bool $is_active = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getFournisseur(): ?Fournisseur
    {
        return $this->fournisseur;
    }

    public function setFournisseur(?Fournisseur $fournisseur): static
    {
        $this->fournisseur = $fournisseur;

        return $this;
    }

    public function getProNom(): ?string
    {
        return $this->pro_nom;
    }

    public function setProNom(string $pro_nom): static
    {
        $this->pro_nom = $pro_nom;

        return $this;
    }

    public function getProDescription(): ?string
    {
        return $this->pro_description;
    }

    public function setProDescription(string $pro_description): static
    {
        $this->pro_description = $pro_description;

        return $this;
    }

    public function getPrixAchat(): ?string
    {
        return $this->prix_achat;
    }

    public function setPrixAchat(string $prix_achat): static
    {
        $this->prix_achat = $prix_achat;

        return $this;
    }

    public function getPrixVente(): ?string
    {
        return $this->prix_vente;
    }

    public function setPrixVente(string $prix_vente): static
    {
        $this->prix_vente = $prix_vente;

        return $this;
    }

    public function getProImage(): ?string
    {
        return $this->pro_image;
    }

    public function setProImage(string $pro_image): static
    {
        $this->pro_image = $pro_image;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): static
    {
        $this->is_active = $is_active;

        return $this;
    }

}
