<?php
namespace App\Controller;

use App\Repository\SsRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie')]
class CategoriesController extends AbstractController
{
    #[Route('/parent/{id}', name: 'app_parent', methods: ['GET'])]
    public function parent(SsRubriqueRepository $ssRubriqueRepository,$id): Response
    {
        return $this->render('app_entete.html.twig', [
            'Ssrubrique' => $ssRubriqueRepository->find($id),
            
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


