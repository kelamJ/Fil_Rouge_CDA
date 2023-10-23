<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UtilisateurFixtures extends Fixture
{
    private Generator $faker;

    public function __construct(private readonly UserPasswordHasherInterface $passwordEncoder)
    {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager): void
    {
        $admin = new Utilisateur();
        $admin->setNom('Malek')
            ->setPrenom('Julien')
            ->setEmail('admin@mail.fr')
            ->setPassword($this->passwordEncoder->hashPassword($admin, 'admin'))
            ->setType('ADMIN')
            ->setTelephone('0322329588')
            ->setRoles(['ROLE_ADMIN'])
            ->setUAdresse($this->faker->streetAddress)
            ->setUVille($this->faker->city)
            ->setUCp($this->faker->postcode);
        $manager->persist($admin);

        for ($usr = 0; $usr < 5; ++$usr) {
            $user = new Utilisateur();
            $user->setNom($this->faker->lastName)
                ->setPrenom($this->faker->firstName)
                ->setEmail($this->faker->email)
                ->setPassword($this->passwordEncoder->hashPassword($user, 'password'))
                ->setType($this->faker->randomElement(['Particulier', 'Professionnel', 'Commercial']))
                ->setTelephone($this->faker->phoneNumber)
                ->setRoles(['ROLE_USER'])
                ->setUAdresse($this->faker->streetAddress)
                ->setUVille($this->faker->city)
                ->setUCp($this->faker->postcode);
            $manager->persist($user);
            $this->addReference('user'. $usr, $user);

        }

        $manager->flush();
    }
}
