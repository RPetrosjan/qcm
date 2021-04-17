<?php

namespace App\Controller\Admin;

use App\Entity\NewVersion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class NewVersionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return NewVersion::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('competence'),
            AssociationField::new('version'),
            TextField::new('title'),
            TextareaField::new('description'),
            TextField::new('url')
        ];
    }
}
