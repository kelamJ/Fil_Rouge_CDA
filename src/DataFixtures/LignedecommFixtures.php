<?php

namespace App\DataFixtures;

use App\Entity\Lignedecommande;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LignedecommFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $lignecom1 = new Lignedecommande();
        $product1 = $this->getReference('produit1');
        $commande1 = $this->getReference('commande1');

        $lignecom1->setQuantite(3)
            ->setPrix(150)
            ->setProduit($product1)
            ->setCommande($commande1);
        $manager->persist($lignecom1);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CommandeFixtures::class,
            ProduitFixtures::class
        ];
    }
}
