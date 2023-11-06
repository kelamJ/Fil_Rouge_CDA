<?php

namespace App\DataFixtures;

use App\Entity\Commande;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

class CommandeFixtures extends Fixture implements DependentFixtureInterface
{
    private Generator $faker;

    public function __construct()
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        for ($ord = 0; $ord < 5; ++$ord) {
            $order = new Commande();
            $statut1 = $this->getReference('Valide');
            $pay2 = $this->getReference('Mastercard');
            $user = $this->getReference('user'. $ord);
            $livraison1 = $this->getReference('Colissimo');

            $order->setComDate($this->faker->dateTime)
                ->setComAdresse($this->faker->streetAddress)
                ->setComVille($this->faker->city)
                ->setComCp($this->faker->postcode)
                ->setStatut($statut1)
                ->setReference(uniqid())
                ->setPaiement($pay2)
                ->setUtilisateur($user)
                ->setLivraison($livraison1);
            $manager->persist($order);
            $this->addReference('commande'. $ord , $order);

        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            StatutFixtures::class,
            PaiementFixtures::class,
            UtilisateurFixtures::class
        ];
    }
}
