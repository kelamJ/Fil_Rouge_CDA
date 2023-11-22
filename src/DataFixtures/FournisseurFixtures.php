<?php

namespace App\DataFixtures;

use App\Entity\Fournisseur;
use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class FournisseurFixtures extends Fixture
{
    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($fou = 0; $fou < 8; ++$fou) {
            $fourni = new Fournisseur();
            $fourni->setNom($this->faker->company)
                ->setTelephone($this->faker->phoneNumber)
                ->setAdresse($this->faker->streetAddress)
                ->setVille($this->faker->city)
                ->setCp($this->faker->postcode)
                ->setPays($this->faker->country);
            $manager->persist($fourni);
            $this->addReference('fourni'. $fou, $fourni);

        }

        $manager->flush();
    }
}
