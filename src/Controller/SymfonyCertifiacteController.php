<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SymfonyCertifiacteController extends AbstractController
{
    /**
     * @Route("/symfony/certifiacte", name="symfony_certifiacte")
     */
    public function index(): Response
    {
        return $this->render('symfony_certifiacte/index.html.twig', [
            'controller_name' => 'SymfonyCertifiacteController',
        ]);
    }
}
