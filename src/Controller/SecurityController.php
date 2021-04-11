<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\CreateUserFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecurityController
 * @package App\Controller
 */
class SecurityController extends AbstractController
{
    /** @var EntityManagerInterface  */
    private EntityManagerInterface $entityManager;

    /**
     * SecurityController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface  $entityManager) {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("json/login", name="app_login_json")
     */
    public function jslogin()
    {
        return $this->json([
                'user' => $this->getUser() ? $this->getUser()->getId() : null]
        );
    }


    /**
     * @param Request $request
     * @Route("/newuser", name="app_new_user")
     * @return Response
     */
    public function createuser(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
        $createForm = $this->createForm(CreateUserFormType::class);
        $createForm->handleRequest($request);
        if($createForm->isSubmitted() && $createForm->isValid()) {

            /** @var User $user */
            $userEntity = $createForm->getData();
            // Recuperation mot de passe utilisateur
            $password = $userEntity->getPassword();
            // On encode mot de passe pour la securite
            $passwordEncoder = $passwordEncoder->encodePassword($userEntity, $password);

            // On donne nouvelle Role par chaque nouvelle creation de User
            $userEntity->setRoles(['ROLE_USER']);

            // Enregiste nouvelle encode password
            $createForm->getData()->setPassword($passwordEncoder);
            $this->entityManager->persist($createForm->getData());
            $this->entityManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('security/newuser.html.twig', [
           'form' => $createForm->createView(),
        ]);
    }

    /**
     * @Route("/jsonlogin", name="app_login")
     * @return Response
     */
    public function jsonlogin() {
        
    }

    /**
     * @Route("/login", name="app_login")
     * @param AuthenticationUtils $authenticationUtils
     * @param CsrfTokenManagerInterface $csrfTokenManager
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils, CsrfTokenManagerInterface $csrfTokenManager): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }


        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $token = $csrfTokenManager->refreshToken('123456');
        dump($token);

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
