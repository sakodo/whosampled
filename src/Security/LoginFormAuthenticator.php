<?php

namespace App\Security;

// Importation des classes nécessaires
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\RememberMeBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\SecurityRequestAttributes;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

// Définition de la classe LoginFormAuthenticator qui étend AbstractLoginFormAuthenticator
class LoginFormAuthenticator extends AbstractLoginFormAuthenticator
{
    // Utilisation du trait TargetPathTrait
    use TargetPathTrait;

    // Constante pour la route de connexion
    public const LOGIN_ROUTE = 'app_login';

    // Propriété pour le générateur d'URL
    private UrlGeneratorInterface $urlGenerator;

    // Constructeur de la classe
    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    // Méthode pour authentifier l'utilisateur
    public function authenticate(Request $request): Passport
    {
        // Récupération de l'email de l'utilisateur
        $email = $request->request->get('email', '');

        // Stockage du dernier nom d'utilisateur utilisé
        $request->getSession()->set(SecurityRequestAttributes::LAST_USERNAME, $email);

        // Création et retour d'un nouveau Passport pour l'utilisateur
        return new Passport(
            new UserBadge($email),
            new PasswordCredentials($request->request->get('password', '')),
            [
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
                new RememberMeBadge(),
            ]
        );
    }

    // Méthode appelée en cas de succès de l'authentification
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // Si un chemin cible est défini, redirige vers ce chemin
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }

        // Sinon, redirige vers la page d'accueil
        return new RedirectResponse($this->urlGenerator->generate('app_home'));
    }

    // Méthode pour obtenir l'URL de connexion
    protected function getLoginUrl(Request $request): string
    {
        // Génère et retourne l'URL de la route de connexion
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}