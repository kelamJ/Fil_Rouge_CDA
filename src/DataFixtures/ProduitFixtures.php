<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use App\Entity\Produit;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class ProduitFixtures extends Fixture implements DependentFixtureInterface
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $product1 = new Produit();
        $cat1 = $this->getReference('Skateboard');
        $fourni = $this->getReference('fourni1');
        $product1->setProNom('Skate GLOBE')
            ->setProDescription('Planche en bois avec 4 roue en plastique.')
            ->setPrixAchat('40')
            ->setPrixVente('50')
            ->setProImage('https://picsum.photos/200/300')
            ->setIsActive(1)
            ->setCategorie($cat1)
            ->setFournisseur($fourni);
        $manager->persist($product1);
        $this->addReference('produit1', $product1);


        $product2 = new Produit();
        $cat2 = $this->getReference('Cruiser');
        $product2->setProNom('Cruiser PENNY')
            ->setProDescription('Petite planche en plastique avec 4 roue en gomme.')
            ->setPrixAchat('10')
            ->setPrixVente('20')
            ->setProImage('https://picsum.photos/200/300')
            ->setIsActive(1)
            ->setCategorie($cat2);
        $manager->persist($product2);

        $product3 = new Produit();
        $cat3 = $this->getReference('Longboard');
        $product3->setProNom('Long LOADED')
            ->setProDescription('Grande planche en bois et 4 roue en gomme.')
            ->setPrixAchat('110')
            ->setPrixVente('100')
            ->setProImage('https://picsum.photos/200/300')
            ->setIsActive(1)
            ->setCategorie($cat3);

        $manager->persist($product3);

        $product4 = new Produit();
        $cat4 = $this->getReference('Hoverboard');

        $product4->setProNom('Hover HUMMER')
            ->setProDescription('Grande planche en bois et 4 roue en gomme.')
            ->setPrixAchat('210')
            ->setPrixVente('200')
            ->setProImage('https://picsum.photos/200/300')
            ->setIsActive(1)
            ->setCategorie($cat4);

        $manager->persist($product4);

        $product5 = new Produit();
        $cat5 = $this->getReference('Onewheel');

        $product5->setProNom('Onewheel PINT')
            ->setProDescription('Un format pocket qui va vous faire aimer vos déplacements au quotidien. Le Onewheel Pint est un concentré de technologie, léger, réactif et puissant.')
            ->setPrixAchat('510')
            ->setPrixVente('500')
            ->setProImage('https://picsum.photos/200/300')
            ->setIsActive(1)
            ->setCategorie($cat5);

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
