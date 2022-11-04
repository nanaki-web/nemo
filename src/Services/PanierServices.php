<?php

namespace App\Services;

use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class PanierServices
{
    private $session;
    private $produitRepository;
    private $tva = 0.2;


    //fonction lire le panier
    public function getPanier()
    {
        return $this->session->get('panier', []); //contient dans le tableau tout les produits cliqué,interroge la clé panier dans la session
    }

    //fonction ajout au panier
    public function ajoutPanier($id, Session $session, ProduitRepository $produitRepository)
    {
        $this->session = $session;
        $this->produitRepository = $produitRepository;
        $panier = $this->getPanier(); //appel du panier
        //$id = $Produit->getId();//verifier dans l'url si le produit existe

        if (isset($panier[$id])) {
            //produit déjà dans le panier
            $panier[$id]++;
        } else {
            //si le produit n'est pas dans le panier
            $panier[$id] = 1;
        }
        $this->modifierPanier($panier);
    }

    //fonction mise à jour du panier
    public function modifierPanier($panier)
    {
        $this->session->set('panier', $panier); //clé et variable
        $this->session->set('infoPanier', $this->getPanierContenir($this->session, $this->produitRepository));
    }

    //fonction creer un objet qui contient le panier et la quantité,le montant ht,ttc ... de produit avec une session

    public function getPanierContenir(Session $session, ProduitRepository $produitRepository)
    {
        $this->session = $session;
        $this->produitRepository = $produitRepository;
        $panier = $this->getPanier();
        $infoPanier = [];
        $quantitePanier = 0;
        $sousTotal = 0;
        //dd($panier);
        foreach ($panier as $id => $quantite) {
            $produit = $this->produitRepository->find($id);
            if ($produit) {
                $infoPanier['produits'][] = [
                    "quantite" => $quantite,
                    "produit" => $produit,
                ];
                $quantitePanier += $quantite;
                $sousTotal += $produit->getPrix() * $quantite;
            } else {
                $this->supprimerPanier($id, $this->session, $this->produitRepository);
            }
        }
        $infoPanier['data'] = [
            "quantitePanier" => $quantitePanier,
            "sousTotalHT" => $sousTotal,
            "taxe" => round($sousTotal * $this->tva, 2),
            "sousTotalTTC" => round(($sousTotal + ($sousTotal * $this->tva)), 2)

        ];
        return $infoPanier;
    }

    //fonction qui supprime une unité du panier
    public function oterPanier($id, Session $session, ProduitRepository $produitRepository)
    {
        $this->session = $session;
        $this->produitRepository = $produitRepository;
        $panier = $this->getPanier();
        //produit dans le panier
        if (isset($panier[$id])) { //si le panier n'existe pas
            if ($panier[$id] > 1) { //quantite du produit supérieur
                $panier[$id]--;
            } else {
                unset($panier[$id]); //détruit la variable
            }
            $this->modifierPanier($panier);
        }
    }

    //supprimer un produit entier du panier

    public function supprimerPanier($id, Session $session, ProduitRepository $produitRepository)
    {
        $this->session = $session;
        $this->produitRepository = $produitRepository;
        $panier = $this->getPanier();
        //produit dans le panier
        if (isset($panier[$id])) { //si le panier n'existe pas
            //quantite du produit supérieur
            unset($panier[$id]); //détruit la variable
        }
    }

    //supprimer tout le panier
    public function effacerPanier()
    {
        $this->modifierPanier([]);
    }
}
