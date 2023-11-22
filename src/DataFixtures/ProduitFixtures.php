<?php

namespace App\DataFixtures;

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
        $cat1 = $this->getReference('vesteH');
        $fourni = $this->getReference('fourni1');
        $product1->setProNom('Veste gucci')
            ->setProDescription('Jolie veste gucci')
            ->setProStock(5)
            ->setPrixAchat('200')
            ->setPrixVente('250')
            ->setImage('vesteGucci.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product1->getProNom())->lower())
            ->setCategorie($cat1)
            ->setFournisseur($fourni);
        $manager->persist($product1);
        $this->addReference('produit1', $product1);

        $product2 = new Produit();
        $cat1 = $this->getReference('vesteH');
        $fourni = $this->getReference('fourni2');
        $product2->setProNom('Veste RalphLauren')
            ->setProDescription('Grande veste Ralph Lauren')
            ->setProStock(10)
            ->setPrixAchat('100')
            ->setPrixVente('150')
            ->setImage('vesteRalphLauren.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product2->getProNom())->lower())
            ->setCategorie($cat1)
            ->setFournisseur($fourni);
        $manager->persist($product2);

        $product3 = new Produit();
        $cat1 = $this->getReference('vesteH');
        $fourni = $this->getReference('fourni4');
        $product3->setProNom('Veste Lacoste')
            ->setProDescription('Veste a motif Lacoste')
            ->setProStock(5)
            ->setPrixAchat('50')
            ->setPrixVente('80')
            ->setImage('vesteLacoste.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product3->getProNom())->lower())
            ->setCategorie($cat1)
            ->setFournisseur($fourni);
        $manager->persist($product3);

        $product4 = new Produit();
        $cat3 = $this->getReference('pantH');
        $fourni = $this->getReference('fourni1');
        $product4->setProNom('Pantalon gucci')
            ->setProDescription('Jolie pantalon gucci')
            ->setProStock(5)
            ->setPrixAchat('300')
            ->setPrixVente('500')
            ->setImage('pantGucci.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product4->getProNom())->lower())
            ->setCategorie($cat3)
            ->setFournisseur($fourni);
        $manager->persist($product4);
        $manager->flush();

        $product5 = new Produit();
        $cat5 = $this->getReference('tshirtH');
        $fourni = $this->getReference('fourni1');
        $product5->setProNom('T-shirt Gucci')
            ->setProDescription('T-shirt a col rond et a motif Gucci')
            ->setProStock(2)
            ->setPrixAchat('50')
            ->setPrixVente('150')
            ->setImage('tshirtGucci.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product5->getProNom())->lower())
            ->setCategorie($cat5)
            ->setFournisseur($fourni);
        $manager->persist($product5);
        $manager->flush();

        $product6 = new Produit();
        $cat5 = $this->getReference('tshirtH');
        $fourni = $this->getReference('fourni5');
        $product6->setProNom('T-shirt Burberry')
            ->setProDescription('T-shirt a motif brodé Burberry')
            ->setProStock(10)
            ->setPrixAchat('30')
            ->setPrixVente('60')
            ->setImage('tshirtBurberry.jpg')
            ->setIsActive(1)
            ->setSlug($this->slugger->slug($product6->getProNom())->lower())
            ->setCategorie($cat5)
            ->setFournisseur($fourni);
        $manager->persist($product6);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategorieFixtures::class
        ];
    }
}
