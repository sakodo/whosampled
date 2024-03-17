<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    // Définition de la route pour cette méthode
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, UserAuthenticatorInterface $userAuthenticator, LoginFormAuthenticator $authenticator): Response
    {
        // Si l'utilisateur est déjà connecté, redirection vers la page d'accueil
        if ($this->getUser()) {
            return $this->redirectToRoute('app_home');
        }

        // Création d'un nouvel utilisateur
        $user = new User();
        // Création du formulaire d'inscription
        $form = $this->createForm(RegistrationFormType::class, $user);
        // Gestion de la requête du formulaire
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Encodage du mot de passe
            $this->encodePassword($user, $form->get('password')->getData(), $userPasswordHasher);
            // Activation de l'utilisateur
            $user->setIsActive(true);
            // Persistance de l'utilisateur dans la base de données
            $entityManager->persist($user);
            // Enregistrement des changements dans la base de données
            $entityManager->flush();

            // Authentification de l'utilisateur et redirection
            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        // Rendu de la vue d'inscription avec le formulaire
        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form,
        ]);
    }

    // Méthode privée pour encoder le mot de passe
    private function encodePassword(User $user, string $plainPassword, UserPasswordHasherInterface $userPasswordHasher): void
    {
        $user->setPassword(
            $userPasswordHasher->hashPassword(
                $user,
                $plainPassword
            )
        );
    }
}
