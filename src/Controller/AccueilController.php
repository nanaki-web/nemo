<?php
namespace App\Controller;


use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil', methods: ['GET'])]
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('accueil.html.twig', [
            'produits' => $produitRepository->dernierProduit(),
        ]);
    }
}
