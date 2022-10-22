<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use App\Repository\SsRubriqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/produit')]
class ProduitController extends AbstractController
{
    #[Route('/', name: 'app_produit_index', methods: ['GET'])]
    public function index(ProduitRepository $produitRepository, SsRubriqueRepository $ssRubriqueRepository): Response
    {
        $allRub = $ssRubriqueRepository->findAll();
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findAll(),
            'allRub' => $allRub,



        ]);
    }

    #[Route('/annonces/{id}', name: 'app_produit_annonces', methods: ['GET'])]
    public function annonces(ProduitRepository $produitRepository, SsRubriqueRepository $ssRubriqueRepository,$id): Response
    {
        $allRub = $ssRubriqueRepository->findAll();
        $listeannonces = $produitRepository->findBy(['rubrique' => $id]);
        // dd($listeannonces);
        return $this->render('produit/annonce.html.twig', [
            'allRub' => $allRub,
            'listeannonces' => $listeannonces,
            // 'produit' => $produit,



        ]);
    }

    #[Route('/details/{id}', name: 'details', methods: ['GET'])]
    public function details(ProduitRepository $produitRepository, SsRubriqueRepository $ssRubriqueRepository,$id): Response
    {
        $allRub = $ssRubriqueRepository->findAll();
        $listeannonces = $produitRepository->findBy(['rubrique' => $id]);
        $produit = $produitRepository->findOneBy(['id'=>$id]);

        return $this->render('produit/details.html.twig', [
            /* $rubrique afficher les rubriques dans la navbar */
            'allRub' => $allRub,
            'listeannonces' => $listeannonces,
            'produit' => $produit,
        ]);
    }
    

    #[Route('/new', name: 'app_produit_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ProduitRepository $produitRepository, SsRubriqueRepository $ssRubriqueRepository): Response
    {
        $allRub = $ssRubriqueRepository->findAll();
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $produitRepository->add($produit, true);

            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produit/new.html.twig', [
            'produit' => $produit,
            'form' => $form,
            'allRub' => $allRub
        ]);
    }

    #[Route('/{id}', name: 'app_produit_show', methods: ['GET'])]
    public function show(Produit $produit, SsRubriqueRepository $ssRubriqueRepository): Response
    {
        $allRub = $ssRubriqueRepository->findAll();

        return $this->render('produit/show.html.twig', [
            'produit' => $produit,
            'allRub' => $allRub,

        ]);
    }

    #[Route('/{id}/edit', name: 'app_produit_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Produit $produit, ProduitRepository $produitRepository): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $produitRepository->add($produit, true);

            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }


    

    #[Route('/{id}', name: 'app_produit_delete', methods: ['POST'])]
    public function delete(Request $request, Produit $produit, ProduitRepository $produitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete' . $produit->getId(), $request->request->get('_token'))) {
            $produitRepository->remove($produit, true);
        }

        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
    }

    

   
}
