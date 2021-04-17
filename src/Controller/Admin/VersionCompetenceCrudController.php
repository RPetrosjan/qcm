<?php

namespace App\Controller\Admin;

use App\Entity\VersionCompetence;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class VersionCompetenceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return VersionCompetence::class;
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
