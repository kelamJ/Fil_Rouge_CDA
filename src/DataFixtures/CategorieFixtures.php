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
        $mainCat1->setCatNom('Physique')
            ->setCatDescription('Type de planche qui utilise la force du corps pour avancer')
            ->setCatImage('https://picsum.photos/200/300');
        $manager->persist($mainCat1);

        $mainCat2 = new Categorie();
        $mainCat2->setCatNom('Électrique')
            ->setCatDescription('Type de planche qui utilise la force électrique pour avancer')
            ->setCatImage('https://picsum.photos/200/300');
        $manager->persist($mainCat2);

        $cat1 = new Categorie();
        $cat1->setCatNom('Classic')
            ->setCatDescription('Simple skate')
            ->setCatSub($mainCat1)
            ->setCatImage('https://picsum.photos/200/300');
        $manager->persist($cat1);
        $this->addReference('Skateboard', $cat1);

        $cat2 = new Categorie();
        $cat2->setCatNom('Longboard')
            ->setCatDescription('Long skate')
            ->setCatSub($mainCat1)
            ->setCatImage('https://picsum.photos/200/300');
        $manager->persist($cat2);
        $this->addReference('Cruiser', $cat2);

        $cat3 = new Categorie();
        $cat3->setCatNom('Onewheel')
            ->setCatDescription('Une unique roue avec un moteur électrique')
            ->setCatSub($mainCat2)
            ->setCatImage('https://picsum.photos/200/300');
        $manager->persist($cat3);
        $this->addReference('Longboard', $cat3);

        $cat4 = new Categorie();
        $cat4->setCatNom('Hoverboard')
            ->setCatDescription('Board avec 2 roue latéral et un moteur électrique')
            ->setCatSub($mainCat2)
            ->setCatImage('https://picsum.photos/200/300');
        $manager->persist($cat4);
        $this->addReference('Hoverboard', $cat4);

        $cat5 = new Categorie();
        $cat5->setCatNom('Cruiser')
            ->setCatDescription('Une unique roue avec un moteur électrique')
            ->setCatSub($mainCat1)
            ->setCatImage('https://picsum.photos/200/300');
        $manager->persist($cat5);
        $this->addReference('Onewheel', $cat5);

        $manager->flush();
    }
}
