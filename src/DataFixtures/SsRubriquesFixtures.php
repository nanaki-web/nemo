<?php

namespace App\DataFixtures;

use App\Entity\SsRubrique;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SsRubriquesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $ssRubrique = new SsRubrique();
        $ssRubrique->setNom('Informatique');
        $manager->persist($ssRubrique);

        $manager->flush();
    }
}
