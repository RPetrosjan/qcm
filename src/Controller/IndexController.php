<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}", requirements={"_locale" = "%app.locales%"})
 * Class WebController
 * @package App\Controller
 */
class IndexController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }


    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function redirectHome(Request $request) {

        $url = $this->redirectToRoute('homepage', [
            '_locale' => 'fr'
        ])->getTargetUrl();

        return new RedirectResponse($url, 301);
    }
}
