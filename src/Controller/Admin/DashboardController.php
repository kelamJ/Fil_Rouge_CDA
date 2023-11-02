<?php

namespace App\Controller\Admin;

use App\Entity\Categorie;
use App\Entity\Commande;
use App\Entity\Fournisseur;
use App\Entity\Livraison;
use App\Entity\Paiement;
use App\Entity\Produit;
use App\Entity\Statut;
use App\Entity\Utilisateur;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(UtilisateurCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Sk8')
            ->renderContentMaximized()
            ->setFaviconPath('favicon.svg');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Produits', 'fas fa-book', Produit::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-user-pen', Categorie::class);
        yield MenuItem::linkToCrud('Commandes', 'fas fa-building', Commande::class);
        yield MenuItem::linkToCrud('Paiements', 'fas fa-circle', Paiement::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', Utilisateur::class);
        yield MenuItem::linkToCrud('Fournisseur', 'fas fa-user', Fournisseur::class);
        yield MenuItem::linkToCrud('Statuts', 'fas fa-user', Statut::class);
        yield MenuItem::linkToCrud('Livreurs', 'fas fa-user', Livraison::class);
    }
}
