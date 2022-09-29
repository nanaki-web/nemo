<?php

namespace App\DataFixtures;

use App\Entity\SsRubrique;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\String\Slugger\SluggerInterface;

class SsRubriqueFixtures extends Fixture
{
    
    public function __construct(private SluggerInterface $slugger){} /* le private induit le setter et getter entre {} php8   */
    public function load(ObjectManager $manager): void
    {
        $rubrique = $this->creationRubrique('Eau douce',null ,$manager);/* Paramètre nommé nom: et manger:*/

        $this->creationRubrique('Poissons d\'eau douce', $rubrique, $manager);
        $this->creationRubrique('Crevettes-invertébrés-Tortues', $rubrique, $manager);

        $rubrique = $this->creationRubrique('Eau de mer',null ,$manager);/* Paramètre nommé nom: et manger:*/

        $this->creationRubrique('Poissons marins', $rubrique, $manager);
        $this->creationRubrique('Coraux et invertébrés', $rubrique, $manager);

        $manager->flush();
    }

    /*Création d'une méthode pour créer les sous-catégories */
    public function creationRubrique(string $nom, SsRubrique $rubrique = null, ObjectManager $manager)
    {
        $ssRubrique = new SsRubrique();
        $ssRubrique->setNom($nom);
        $ssRubrique->setSlug($this->slugger->slug($ssRubrique->getNom())->lower());
        $ssRubrique->setSsRubrique($rubrique);
        $manager->persist($ssRubrique);

        return $ssRubrique;
    }

    
}
