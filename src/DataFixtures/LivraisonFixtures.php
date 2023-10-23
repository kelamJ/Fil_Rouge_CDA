<?php

namespace App\DataFixtures;

use App\Entity\Livraison;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
class LivraisonFixtures extends Fixture
{
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $livraison1 = new Livraison();
        $livraison1->setLivNom('Abeille Rush')
            ->setLivUrl('https://picsum.photos/200/300')
            ->setLivDate($this->faker->dateTime);
        $manager->persist($livraison1);

        $livraison2 = new Livraison();
        $livraison2->setLivNom('FedEx')
            ->setLivUrl('https://picsum.photos/200/300')
            ->setLivDate($this->faker->dateTime);
        $manager->persist($livraison2);

        $livraison3 = new Livraison();
        $livraison3->setLivNom('Colissimo')
            ->setLivUrl('https://picsum.photos/200/300')
            ->setLivDate($this->faker->dateTime);
        $manager->persist($livraison3);
        $this->addReference('Colissimo', $livraison3);


        $manager->flush();
    }
}
