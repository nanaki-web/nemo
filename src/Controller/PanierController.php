<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use App\Repository\SsRubriqueRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/panier')]
class PanierController extends AbstractController
{
    #[Route('/', name: 'app_panier_index', methods: ['GET'])]
    public function panier_index(SessionInterface $session, SsRubriqueRepository $ssRubriqueRepository,ProduitRepository $produitRepository)
    {
        $allRub = $ssRubriqueRepository->findAll();
        $panier =$session->get('panier', []);

        // On "fabrique" les données
        $dataPanier = [];
        $total = 0;
        $tva = 0.05;
        $ttc = 0;


        foreach($panier as $id => $quantite){
            $produit = $produitRepository->find($id);
            $dataPanier[] = [//on recupere les infos du panier de la session ,et a partir du id ,on recupere le produit entier 
                "produit" => $produit,
                "quantite" => $quantite,
                
            ];
            $total += $produit->getPrix() * $quantite;
            $prixTva = $total * $tva;
            $ttc = $total + $prixTva;
            
        }

        return $this->render('panier.html.twig', [
            'allRub' => $allRub,
            'dataPanier' => $dataPanier,
            'total' => $total,
            'prixTva' => $prixTva,
            'ttc' => $ttc,
            
        ]);
        
    }

    //afficher le prix sur l'entete
    public function panier_entete(SessionInterface $session,ProduitRepository $produitRepository){
        
      return $this->render('_partiels/_entete.html.twig');


    }



    #[Route('/ajouter/{id}', name: 'ajouter')]
    public function ajouter(Produit $Produit, SessionInterface $session)
    {
        /*$session->set("panier",3); 
        dd($session->get("panier"));*/

        //on recupére le panier actuel
        $panier = $session->get("panier", []); //si le panier n'existe pas , je l'initie avec un tableau vide.
        $id = $Produit->getId();//verifier dans l'url si le produit existe

        if (!empty($panier[$id])) {
            $panier[$id]++;
        } else {
            $panier[$id] = 1; 
        }

        // on sauvegarde dans la session
        $session->set("panier",$panier);//sauvegarde la session

        return $this->redirectToRoute("app_panier_index");// et on redirige vers l'index
    }

    #[Route('/oter/{id}', name: 'oter')]
    public function add(Produit $Produit, SessionInterface $session)
    {
        /*$session->set("panier",3); 
        dd($session->get("panier"));*/

        //on recupére le panier actuel
        $panier = $session->get("panier", []); //si le panier n'existe pas , je l'initie avec un tableau vide.
        $id = $Produit->getId();//verifier dans l'url si le produit existe

        if (!empty($panier[$id])) {//si le panier n'existe pas
            if($panier[$id] > 1)
            {
                $panier[$id]--;
            }
            else
            {
                unset($panier[$id]);//détruit la variable
            }
        }

        // on sauvegarde dans la session
        $session->set("panier",$panier);

        return $this->redirectToRoute("app_panier_index");
    }

    #[Route('/supprimer/{id}', name: 'supprimer')]
    public function supprimer(Produit $Produit, SessionInterface $session)
    {
        /*$session->set("panier",3); 
        dd($session->get("panier"));*/

        //on recupére le panier actuel
        $panier = $session->get("panier", []); //si le panier n'existe pas , je l'initie avec un tableau vide.
        $id = $Produit->getId();//verifier dans l'url si le produit existe

        if (!empty($panier[$id])) 
        {//si le panier n'existe pas
            unset($panier[$id]);//détruit la variable
        }

        // on sauvegarde dans la session
        $session->set("panier",$panier);

        return $this->redirectToRoute("app_panier_index");
    }
}
