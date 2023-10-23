<?php

namespace App\DataFixtures;

use App\Entity\Paiement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class PaiementFixtures extends Fixture
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $pay1 = new Paiement();
        $pay1->setPMethode('Paypal')
            ->setPDate($this->faker->dateTime)
            ->setPTotal($this->faker->randomFloat(2, 0, 1000));
        $manager->persist($pay1);

        $pay2 = new Paiement();
        $pay2->setPMethode('Mastercard')
            ->setPDate($this->faker->dateTime)
            ->setPTotal($this->faker->randomFloat(2, 0, 1000));
        $manager->persist($pay2);
        $this->addReference('Mastercard', $pay2);

        $pay3 = new Paiement();
        $pay3->setPMethode('Lydia')
            ->setPDate($this->faker->dateTime)
            ->setPTotal($this->faker->randomFloat(2, 0, 1000));
        $manager->persist($pay3);

        $manager->flush();
    }
}
