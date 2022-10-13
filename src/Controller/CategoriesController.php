<?php

namespace App\Controller;

use App\Entity\SsRubrique;
use App\Repository\SsRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie')]
class CategoriesController extends AbstractController
{
    
    #[Route('/parent/{slug}', name: 'app_parent', methods: ['GET'])]
    public function parent(SsRubriqueRepository $ssRubriqueRepository,$slug): Response
    {
        $allRub = $ssRubriqueRepository->findAll();
        $ssRubriques = $ssRubriqueRepository->findBy(['slug' => $slug]);
//dd($ssRubrique);
        return $this->render('ssRubrique.html.twig', [
            'Ssrubriques' => $ssRubriques,
            'allRub' => $allRub
            
        ]);
    }


    #[Route('/eauDouce', name: 'app_eaudouce', methods: ['GET'])]
    public function index(SsRubriqueRepository $ssRubriqueRepository): Response
    {
        return $this->render('eauDouce.html.twig', [
            'Ssrubriques' => $ssRubriqueRepository->findAll(),
            
        ]);
    }

    
    
}


