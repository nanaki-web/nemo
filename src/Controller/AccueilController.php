<?php
namespace App\Controller;


use App\Repository\ProduitRepository;
use App\Repository\SsRubriqueRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/')]
class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil', methods: ['GET'])]
    public function index(ProduitRepository $produitRepository,SsRubriqueRepository $ssRubriqueRepository): Response
    {

        
        $ssRubriques = $ssRubriqueRepository->findAll();
        
       // dd($ssRubriques);
        return $this->render('accueil.html.twig', [
            'produits' => $produitRepository->dernierProduit(),
            'allRub' => $ssRubriques
            
        ]);
    }

    
  
  
    
}
