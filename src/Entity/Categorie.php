<?php

namespace App\Entity;

use App\Entity\Trait\SlugTrait;
use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    use SlugTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $cat_nom = null;

    #[ORM\Column(length: 255)]
    private ?string $cat_description = null;

    #[ORM\Column(length: 255)]
    private ?string $cat_image = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'categories')]
    #[ORM\JoinColumn(onDelete: 'CASCADE')]
    private ?self $cat_sub = null;

    #[ORM\OneToMany(mappedBy: 'cat_sub', targetEntity: self::class)]
    private Collection $categories;

    #[ORM\OneToMany(mappedBy: 'cat', targetEntity: Produit::class)]
    private Collection $produits;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: Produit::class)]
    private Collection $cat;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->produits = new ArrayCollection();
        $this->cat = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCatNom(): ?string
    {
        return $this->cat_nom;
    }

    public function setCatNom(string $cat_nom): static
    {
        $this->cat_nom = $cat_nom;

        return $this;
    }

    public function getCatDescription(): ?string
    {
        return $this->cat_description;
    }

    public function setCatDescription(string $cat_description): static
    {
        $this->cat_description = $cat_description;

        return $this;
    }

    public function getCatImage(): ?string
    {
        return $this->cat_image;
    }

    public function setCatImage(string $cat_image): static
    {
        $this->cat_image = $cat_image;

        return $this;
    }

    public function getCatSub(): ?self
    {
        return $this->cat_sub;
    }

    public function setCatSub(?self $cat_sub): static
    {
        $this->cat_sub = $cat_sub;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(self $category): static
    {
        if (!$this->categories->contains($category)) {
            $this->categories->add($category);
            $category->setCatSub($this);
        }

        return $this;
    }

    public function removeCategory(self $category): static
    {
        if ($this->categories->removeElement($category)) {
            // set the owning side to null (unless already changed)
            if ($category->getCatSub() === $this) {
                $category->setCatSub(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(Produit $produit): static
    {
        if (!$this->produits->contains($produit)) {
            $this->produits->add($produit);
            $produit->setCat($this);
        }

        return $this;
    }

    public function removeProduit(Produit $produit): static
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getCat() === $this) {
                $produit->setCat(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Produit>
     */
    public function getCat(): Collection
    {
        return $this->cat;
    }

    public function addCat(Produit $cat): static
    {
        if (!$this->cat->contains($cat)) {
            $this->cat->add($cat);
            $cat->setCategorie($this);
        }

        return $this;
    }

    public function removeCat(Produit $cat): static
    {
        if ($this->cat->removeElement($cat)) {
            // set the owning side to null (unless already changed)
            if ($cat->getCategorie() === $this) {
                $cat->setCategorie(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return $this->getCatNom();
    }

}
