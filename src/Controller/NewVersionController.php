<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}", requirements={"_locale" = "%app.locales%"})
 * Class NewVersionController
 * @package App\Controller
 */
class NewVersionController extends AbstractController
{
    /**
     * @Route("/new", name="new_version")
     */
    public function index(): Response
    {
        return $this->render('new_version/index.html.twig', [
            'controller_name' => 'NewVersionController',
        ]);
    }
}
