<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;
use Faker\Factory;
use Faker\Generator;

class ProduitFixtures extends Fixture implements DependentFixtureInterface
{
    private Generator $faker;

    public function __construct(private SluggerInterface $slugger)
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $product1 = new Produit();
        $cat1 = $this->getReference('Classics');
        $fourni = $this->getReference('fourni1');
        $product1->setProNom('Skate GLOBE')
            ->setProDescription('Planche en bois avec 4 roue en plastique.')
            ->setProStock(5)
            ->setPrixAchat('40')
            ->setPrixVente('50')
            ->setImage('skateboard.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product1->getProNom())->lower())
            ->setCategorie($cat1)
            ->setFournisseur($fourni);
        $manager->persist($product1);
        $this->addReference('produit1', $product1);


        $product2 = new Produit();
        $cat5 = $this->getReference('Cruisers');
        $product2->setProNom('Cruiser PENNY')
            ->setProDescription('Petite planche en plastique avec 4 roue en gomme.')
            ->setProStock(5)
            ->setPrixAchat('10')
            ->setPrixVente('20')
            ->setImage('skateboard.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product2->getProNom())->lower())
            ->setCategorie($cat5);
        $manager->persist($product2);

        $product3 = new Produit();
        $cat2 = $this->getReference('Longboards');
        $product3->setProNom('Long LOADED')
            ->setProDescription('Grande planche en bois et 4 roue en gomme.')
            ->setProStock(5)
            ->setPrixAchat('110')
            ->setPrixVente('100')
            ->setImage('skateboard.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product3->getProNom())->lower())
            ->setCategorie($cat2);

        $manager->persist($product3);

        $product4 = new Produit();
        $mainCat2 = $this->getReference('electrique');

        $product4->setProNom('Hover HUMMER')
            ->setProDescription('Grande planche en bois et 4 roue en gomme.')
            ->setProStock(0)
            ->setPrixAchat('210')
            ->setPrixVente('200')
            ->setImage('skateboard.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product4->getProNom())->lower())
            ->setCategorie($mainCat2);

        $manager->persist($product4);

        $product5 = new Produit();
        $mainCat2 = $this->getReference('electrique');

        $product5->setProNom('Onewheel PINT')
            ->setProDescription('Un format pocket qui va vous faire aimer vos déplacements au quotidien. Le Onewheel Pint est un concentré de technologie, léger, réactif et puissant.')
            ->setProStock(5)
            ->setPrixAchat('510')
            ->setPrixVente('500')
            ->setImage('skateboard.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product5->getProNom())->lower())
            ->setCategorie($mainCat2);

        $manager->persist($product5);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategorieFixtures::class
        ];
    }
}
