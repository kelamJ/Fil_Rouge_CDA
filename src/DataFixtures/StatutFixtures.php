<?php

namespace App\DataFixtures;

use App\Entity\Statut;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class StatutFixtures extends Fixture
{
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }
    public function load(ObjectManager $manager): void
    {
        $statut1 = new Statut();
        $statut1->setStatutNom('Validée');
        $manager->persist($statut1);
        $this->addReference('Valide', $statut1);

        $statut2 = new Statut();
        $statut2->setStatutNom('En préparation');
        $manager->persist($statut2);

        $statut3 = new Statut();
        $statut3->setStatutNom('Expédiée');
        $manager->persist($statut3);

        $statut4 = new Statut();
        $statut4->setStatutNom('Livrée');
        $manager->persist($statut4);

        $manager->flush();
    }
}
