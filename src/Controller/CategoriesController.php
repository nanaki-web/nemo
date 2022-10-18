<?php

namespace App\Controller;

use App\Entity\SsRubrique;
use App\Repository\ProduitRepository;
use App\Repository\SsRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie')]
class CategoriesController extends AbstractController
{
    //je lui donne une route en utilisant le slug
    #[Route('/parent/{slug}', name: 'app_parent', methods: ['GET'])]
    public function parent(SsRubriqueRepository $ssRubriqueRepository,$slug,ProduitRepository $produitRepository): Response
    {
        $allRub = $ssRubriqueRepository->findAll();
        $ssRubriques = $ssRubriqueRepository->findOneBy(['slug' => $slug]);//filtre par le slug
        $enfants = $ssRubriqueRepository->findBy(['rubriqueParent' => $ssRubriques->getId()]);//recupere l'id des rubrique parent
       // $value = $ssRubriqueRepository->findBy(['rubriqueParent' => $idParent]);
        //dd($ssRubriques);
        
$produits = $produitRepository->findByRubParent($ssRubriques->getId());

//dd($produits);

        return $this->render('ssRubrique.html.twig', [
            'Ssrubriques' => $ssRubriques,
            'allRub' => $allRub,
            'enfants' => $enfants,
            'rubprods' => $produits//recupere les produits par rubrique parent
            //'rubriqueParent' => $ssRubriqueRepository->parentId($value)
            
        ]);
    }


    /*#[Route('/eauDouce', name: 'app_eaudouce', methods: ['GET'])]
    public function index(SsRubriqueRepository $ssRubriqueRepository): Response
    {
        return $this->render('eauDouce.html.twig', [
            'Ssrubriques' => $ssRubriqueRepository->findAll(),
            
        ]);
    }*/

    
    
}


