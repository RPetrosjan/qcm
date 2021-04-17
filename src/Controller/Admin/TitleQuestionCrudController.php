<?php

namespace App\Controller\Admin;

use App\Entity\TitleQuestion;
use App\Form\QuestionFormType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TitleQuestionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TitleQuestion::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('helpurl'),
            AssociationField::new('competences', 'competence'),
            AssociationField::new('versionCompetence', 'version'),
            AssociationField::new('comptenceSection', 'section'),
            CollectionField::new('question')
                ->onlyOnForms()
                ->setEntryType(QuestionFormType::class)
                ->setEntryIsComplex(false)
                ->allowAdd()
                ->allowDelete()

        ];
    }

}
