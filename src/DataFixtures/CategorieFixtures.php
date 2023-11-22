<?php

namespace App\DataFixtures;

use App\Entity\Categorie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class CategorieFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $mainCat1 = new Categorie();
        $mainCat1->setCatNom('Homme')
            ->setCatDescription('Vêtements hommes')
            ->setCatImage('mannequinHomme.jpg')
            ->setParent(null);
        $manager->persist($mainCat1);

        $mainCat2 = new Categorie();
        $mainCat2->setCatNom('Femme')
            ->setCatDescription('Vêtements femmes')
            ->setCatImage('mannequinFemme.jpg')
            ->setParent(null);;
        $manager->persist($mainCat2);

        $cat1 = new Categorie();
        $cat1->setCatNom('Veste homme')
            ->setCatDescription('Vestes pour les hommes')
            ->setCatImage('vesteHomme.jpg')
            ->setParent($mainCat1);
        $manager->persist($cat1);
        $this->addReference('vesteH' , $cat1);

        $cat2 = new Categorie();
        $cat2->setCatNom('Veste femme')
            ->setCatDescription('Vestes pour les femme')
            ->setCatImage('vesteFemme.jpg')
            ->setParent($mainCat2);
        $manager->persist($cat2);
        $this->addReference('vesteF' , $cat2);

        $cat3 = new Categorie();
        $cat3->setCatNom('Pantalon homme')
            ->setCatDescription('Pantalons pour les hommes')
            ->setCatImage('basHomme.jpg')
            ->setParent($mainCat1);
        $manager->persist($cat3);
        $this->addReference('pantH' , $cat3);


        $cat4 = new Categorie();
        $cat4->setCatNom('Pantalon femme')
            ->setCatDescription('Pantalons pour les femmes')
            ->setCatImage('basFemme.jpg')
            ->setParent($mainCat2);
        $manager->persist($cat4);
        $this->addReference('pantF' , $cat4);

        $cat5 = new Categorie();
        $cat5->setCatNom('T-shirt homme')
            ->setCatDescription('T-shirt pour les hommes')
            ->setCatImage('shirtHomme.jpg')
            ->setParent($mainCat1);
        $manager->persist($cat5);
        $this->addReference('tshirtH' , $cat5);

        $cat6 = new Categorie();
        $cat6->setCatNom('T-shirt femme')
            ->setCatDescription('T-shirt pour les femmes')
            ->setCatImage('shirtFemme.jpg')
            ->setParent($mainCat2);
        $manager->persist($cat6);
        $this->addReference('tshirtF' , $cat6);

        $manager->flush();
    }
}
