<?php

namespace App\DataFixtures;


use App\Entity\Produit,App\Entity\Fournisseur;
use App\Repository\FournisseurRepository;
use Faker\Factory;
use faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Persistence\ObjectManager;

class ProduitsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $fourniRepo = $manager->getRepository(Fournisseur::class);//recupere dans le repository l'objet ?App\Entity\Fournisseur
        $founis = $fourniRepo->findAll();//recupere tout l'objet
        for($i=1;$i<=10;$i++)
        {
            $prod = new Produit();
            $prod->setNom($faker->lastName());
            $prod->setDescription($faker->sentence($nwords = 4, $varaibleNbWords = true));
            $prod->setPrix($faker->randomFloat(2,60,120));
            $prod->setActive($faker->boolean());
            $prod->setStock($faker->numberBetween(10, 100));
            $prod->setCoef(2);
            $prod->setReference($faker->bothify('?????-#####'));
            $prod->setPhoto('photo');
            
            $prod->setFournisseur($founis[mt_rand(0,count($founis)-1)]);//recupere le repository et on compte le nombre de fournisseur et on choisi aléatoirement l'id .
            $manager->persist($prod);
        }

        $manager->flush();
    }
}
