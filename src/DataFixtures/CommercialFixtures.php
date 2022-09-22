<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Commercial;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Faker;

class CommercialFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $passwordEncoder,
        private SluggerInterface $slugger
    ) {
    }
    public function load(ObjectManager $manager): void
    {
        $user = new Commercial();
        $user->setEmail('gg@gg.gg');
        $user->setPassword(
            $this->passwordEncoder->hashPassword($user, '123456')
        );
        $user->setRoles(['ROLE_ADMIN']);
        $user->setNom('Wilga');
        $user->setPrenom('Anne');
        $user->setTelephone('0236548598');
        
        
        $manager->persist($user);

        $faker = Factory::create('fr_FR');

        for ($uti = 1; $uti <= 5; $uti++) /*uti= utilisateur */ {
            $user = new Commercial();
            $user->setEmail($faker->email);
            $user->setPassword(
                $this->passwordEncoder->hashPassword($user, 'secret')
            );
            $user->setRoles(['ROLE_COMMERCIAL']);
            $user->setNom($faker->lastname);
            $user->setPrenom($faker->firstName);
            $user->setTelephone($faker->serviceNumber);
            
            $manager->persist($user);
            
        }

        $manager->flush();
    }
}