<?php

namespace App\Controller\Admin;

use App\Entity\Statut;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class StatutCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Statut::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
