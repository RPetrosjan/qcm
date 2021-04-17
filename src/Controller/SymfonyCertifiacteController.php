<?php

namespace App\Controller;

use App\Entity\ComptenceSection;
use App\Entity\Questions;
use App\Repository\QuestionsRepository;
use App\Repository\TitleQuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}", requirements={"_locale" = "%app.locales%"})
 * Class WebController
 * @package App\Controller
 */
class SymfonyCertifiacteController extends AbstractController
{
    /**
     * @Route("/symfony/certifiacte", name="symfony_certifiacte")
     * @param TitleQuestionRepository $titleQuestionRepository
     * @return Response
     */
    public function index(TitleQuestionRepository  $titleQuestionRepository): Response
    {
        $competenceSection = $titleQuestionRepository->getComptenceSectionSymfony();
        return $this->render('symfony_certifiacte/index.html.twig', [
            'competenceSections' => $competenceSection,
        ]);
    }

    /**
     * @Route("/symfony/certifiacte/section/{id}", name="symfony_certifiacte_section")
     * @param ComptenceSection $comptenceSection
     * @param TitleQuestionRepository $titleQuestionRepository
     * @return Response
     */
    public function certifiacteSection(ComptenceSection $comptenceSection, TitleQuestionRepository  $titleQuestionRepository): Response
    {
        $questions = $titleQuestionRepository->getCompetenceQuestions($comptenceSection);
        dump($questions);
        return $this->render('symfony_certifiacte/symfony_questions.html.twig', [
            'questions' => $questions,
        ]);
    }
}
