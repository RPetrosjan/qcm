<?php

namespace App\Controller\Admin;

use App\Entity\ComptenceSection;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ComptenceSectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ComptenceSection::class;
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
