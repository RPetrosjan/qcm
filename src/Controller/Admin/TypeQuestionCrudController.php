<?php

namespace App\Controller\Admin;

use App\Entity\TypeQuestion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TypeQuestionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TypeQuestion::class;
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
