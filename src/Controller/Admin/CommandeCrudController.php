<?php

namespace App\Controller\Admin;

use App\Controller\Admin\Trait\ReadOnlyTrait;
use App\Entity\Commande;
use App\Entity\Order;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CommandeCrudController extends AbstractCrudController
{
    use ReadOnlyTrait;

    public static function getEntityFqcn(): string
    {
        return Commande::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),
            IdField::new('utilisateur')
                ->setFormTypeOption('disabled', 'disabled'),
            DateField::new('com_date')
                ->setFormTypeOption('disabled', 'disabled'),
            IdField::new('statut'),
            CollectionField::new('com_total'),
            TextField::new('com_adresse'),
            TextField::new('com_ville'),
            TextField::new('com_cp'),
        ];
    }

}
