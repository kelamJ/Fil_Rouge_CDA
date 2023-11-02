<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/produits', name: 'produit_')]
class ProduitController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'produit' => $produitRepository->findBy([], ['id' => 'asc'])
        ]);
    }

    #[Route('/{slug}', name: 'details')]
    public function details(Produit $produit): Response
    {
        return $this->render('produit/details.html.twig', compact('produit'));
    }

//    #[Route('/admin-produits', name: 'admin')]
//    public function admin(ProduitRepository $produitRepository): Response
//    {
//        return $this->render('produit/index.html.twig', [
//            'produit' => $produitRepository->findBy([], ['id' => 'asc'])
//        ]);
//    }
}
