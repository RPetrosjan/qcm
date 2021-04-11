<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class TranslationController
 * @package App\Controller
 */
class TranslationController extends AbstractController
{
    /**
     * @Route("/change_locale/{locale}", name="change_locale", options={"expose":true})
     * @param string $locale
     * @param Request $request
     * @return Response
     */
    public function redirectHome(string $locale, Request $request) {
        // On stocke la langue dans la session
        $request->getSession()->set('_locale', $locale);

        // On revient sur la page précédente
        return $this->redirect($request->headers->get('referer'));
    }
}
