<?php

namespace App\DataFixtures;


use faker;
use Faker\Factory;
use App\Entity\SsRubrique;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Persistence\ObjectManager;
use App\Repository\FournisseurRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use App\Entity\Produit,App\Entity\Fournisseur;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;


class ProduitsFixtures extends Fixture implements DependentFixtureInterface// DependentFixtureInterface va automatiquement chercher sa methode pavant de charger faker/php
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');
        $fourniRepo = $manager->getRepository(Fournisseur::class);//recupere dans le repository l'objet ?App\Entity\Fournisseur
        $founis = $fourniRepo->findAll();//recupere tout l'objet
        $ssRubriqueRepo = $manager->getRepository(SsRubrique::class);
        $ssRubrique = $ssRubriqueRepo->findAll();
        

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
            $prod->setPhoto('photo.png');
            $prod->setDateCreation($faker->dateTimeBetween('-1 week', '+1 week'));

            
            $prod->setFournisseur($founis[mt_rand(0,count($founis)-1)]);//recupere le repository et on compte le nombre de fournisseur et on choisi aléatoirement l'id .
            
            if($ssRubrique!=null)
            {
                $prod->setRubrique($ssRubrique[mt_rand(0,count($ssRubrique)-1)]);
                
            }
            
            $manager->persist($prod);



        }

        $manager->flush();
    }

    public function getDependencies()//va charger avant ProduitsFixtures.
    {
        return [
            SsRubriqueFixtures::class,
        ];
    }

    public static function getGroups(): array
    {
         return ['ProduitsFixtures'];
    }
}

