<?php

namespace App\Controller;

use App\Entity\Produit;

use App\Services\PanierServices;
use App\Repository\ProduitRepository;
use App\Repository\SsRubriqueRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/panier')]
class PanierController extends AbstractController
{
    private $panierServices;
    public function __construct(PanierServices $panierServices)
    {
        $this->panierServices = $panierServices;
        

    }


    #[Route('/', name: 'app_panier_index', methods: ['GET'])]
    public function index(SessionInterface $session,SsRubriqueRepository $ssRubriqueRepository, ProduitRepository $produitRepository): Response
    {
        $allRub = $ssRubriqueRepository->findAll();
        // $this->session = $session;
        //$this->produitRepository = $produitRepository;
        $panier = $this->panierServices->getPanierContenir($session, $produitRepository);
        /*if(!isset($panier['produits'])){
            return $this->redirectToRoute('app_accueil');
        }*/
        return $this->render('panier/index.html.twig',[
            'controller_name' => 'PanierController',
            'panier' => $panier,
            'allRub' => $allRub,
        ]);
    }
    
    #[Route('/ajouter/{id}', name: 'ajouter')]
    public function ajouter($id, SessionInterface $session,ProduitRepository $produitRepository): Response
    {
        $this->panierServices->ajoutPanier($id, $session, $produitRepository);
        return $this->redirectToRoute("app_panier_index");
    }
}
