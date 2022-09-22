<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Client;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class ClientsFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
    ) {}
    public function load(ObjectManager $manager): void
    {
        $user = new Client();
        $user->setEmail('gg@gg.gg');
        $user->setPassword(
            $this->passwordEncoder->hashPassword($user, '123456')
        );
        $user->setRoles(['ROLE_USER']);
        $user->setNom('Wilga');
        $user->setPrenom('Anne');
        $user->setNumero('cl12456');
        $user->setAdress('12 rue de la liberté');
        $user->setCodePostal('80100');
        $user->setVille('Abbeville');
        $user->setTelephone('0236548598');
        $user->setType('client particulier');
        $user->setCoefficient(2);
        $user->setSiret('');

        $manager->persist($user);

        $faker = Factory::create('fr_FR');

        for ($uti = 1; $uti <= 5; $uti++) /*uti= utilisateur */ {
            $user = new Client();
            $user->setEmail($faker->email);
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, 'secret')
            );
            $user->setRoles(['ROLE_USER']);
            $user->setNom($faker->lastname);
            $user->setPrenom($faker->firstName);
            $user->setNumero('cl12456');
            $user->setAdress($faker->streetAddress);
            $user->setCodePostal(str_replace(' ','',$faker->postcode));
            $user->setVille($faker->city);
            $user->setTelephone($faker->serviceNumber);
            $user->setType('client particulier');
            $user->setCoefficient(2);
            
            $manager->persist($user);
            
        }

        for ($uti = 1; $uti <= 5; $uti++) /*uti= utilisateur */ {
            $user = new Client();
            $user->setEmail($faker->email);
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, 'secret')
            );
            $user->setRoles(['ROLE_USER']);
            $user->setNom($faker->lastname);
            $user->setPrenom($faker->firstName);
            $user->setNumero('cl12456');
            $user->setAdress($faker->streetAddress);
            $user->setCodePostal(str_replace(' ','',$faker->postcode));
            $user->setVille($faker->city);
            $user->setTelephone($faker->serviceNumber);
            $user->setType('client professionel');
            $user->setCoefficient(4);
            
            $manager->persist($user);
            
        }

        $manager->flush();
    }
}
