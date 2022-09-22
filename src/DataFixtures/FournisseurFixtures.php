<?php

namespace App\DataFixtures;

use App\Entity\Fournisseur;
use Faker\Factory;
use faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class FournisseurFixtures extends Fixture
{
    
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        
        for($i=1;$i<=5;$i++)
        {
            $fourni = new Fournisseur();
            $fourni->setNom($faker->company);/* $faker->sentence($nwords = 2, $varaibleNbWords = true) */
            $fourni->setAdress($faker->streetAddress);
            $fourni->setCodePostal(str_replace(' ','',$faker->postcode));
            $fourni->setTelephone($faker->phoneNumber);
            $fourni->setEmail($faker->email);
            $fourni->setVille($faker->city);
            
            $manager->persist($fourni);

        }


        $manager->flush();
    }
}
