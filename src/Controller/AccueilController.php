<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(CategorieRepository $repo): Response
    {
        $categories = $repo->findBy(["parent" => null]);

        return $this->render('accueil/index.html.twig', [
            'categories' => $categories,
        ]);
    }

    #[Route('/categories/{categorie}', name: 'app_categories')]
    public function categories(Categorie $categorie): Response
    {

        return $this->render('catalogue/categories.html.twig', [
            'categorie' => $categorie
        ]);
    }
}
