<?php

namespace App\Controller\Admin;

use App\Entity\Competence;
use App\Entity\ComptenceSection;
use App\Entity\NewVersion;
use App\Entity\Questions;
use App\Entity\TitleQuestion;
use App\Entity\TypeQuestion;
use App\Entity\User;
use App\Entity\VersionCompetence;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('QCM Admin')
            ->setTitle('<img style="width: 50px;" src="https://lezebre.lu/images/detailed/79/45285-Sticker-Qbikes-Q-logo.png"> QCM')
          //  ->renderSidebarMinimized()
            ;
    }

    public function configureMenuItems(): iterable
    {
        return [
            MenuItem::linkToDashboard('Dashboard', 'fa fa-home'),
            MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fa fa-user', User::class),
            MenuItem::section('qustionconfig'),
            MenuItem::linkToCrud('TitleQuestion', 'fas fa-tasks', TitleQuestion::class),
            MenuItem::linkToCrud('Questions', 'fas fa-comment-dots', Questions::class),
            MenuItem::linkToCrud('TypeQuestion', 'fas fa-check-double', TypeQuestion::class),
            MenuItem::linkToCrud('Competence', 'fab fa-symfony', Competence::class),
            MenuItem::linkToCrud('CompetenceSection', 'fab fa-symfony', ComptenceSection::class),
            MenuItem::linkToCrud('News Version', 'fab fa-symfony', NewVersion::class),
            MenuItem::linkToCrud('Version Competence', 'fas fa-sort-amount-up-alt', VersionCompetence::class),
        ];

    }
}
