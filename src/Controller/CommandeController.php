<?php

namespace App\Controller;

use App\Entity\Commande;
use App\Entity\Lignedecommande;
use App\Repository\ProduitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/commande', name: 'app_orders_')]
class CommandeController extends AbstractController
{
    #[Route('/ajout', name: 'add')]
    public function add(SessionInterface $session, ProduitRepository $produitRepository, EntityManagerInterface $em): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $panier = $session->get('panier', []);

        if ($panier === []){
            $this->addFlash('message', 'Votre panier est vide');
            return $this->redirectToRoute('accueil');
        }

        // Le panier n'est pas vide, on crée la commande
        $commande = new Commande();

        // On remplit la commande
        $commande->setUtilisateur($this->getUser());
        $commande->setReference(uniqid());
        $commande->setComDate();


        //On parcourt le panier pour créer les détails de commande
        foreach ($panier as $item => $quantite){
            $commandeDetail = new Lignedecommande();

            //on va chercher le produit
            $produit = $produitRepository->find($item);

            $prix = $produit->getPrixVente();

            //On crée le détail de la commande
            $commandeDetail->setProduit($produit);
            $commandeDetail->setPrix($prix);
            $commandeDetail->setQuantite($quantite);

            $commande->addDetailCommande($commandeDetail);
        }

        // On persiste et on flush
        $em->persist($commande);
        $em->flush();

        $session->remove('panier');

        $this->addFlash('message', 'Commande créée avec succès');
        $this->redirectToRoute('accueil');
    }
}
