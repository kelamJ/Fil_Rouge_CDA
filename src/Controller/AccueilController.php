<?php

namespace App\Controller;

use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'accueil')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        return $this->render('accueil/index.html.twig', [
            'categorie' => $categorieRepository->findBy([], ['id' => 'asc'])
        ]);
    }
}
