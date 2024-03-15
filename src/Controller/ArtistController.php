<?php

namespace App\Controller;

use App\Form\SearchBarType;
use App\Repository\ArtistRepository;
use App\Repository\SongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;


class ArtistController extends AbstractController
{
    // Définition de la route pour cette méthode
    #[Route('/artist/{id}', name: 'app_artist')]
    // Définition de la méthode index
    public function index(ArtistRepository $artistRepository, SongRepository $songRepository, int $id, Request $request): Response
    {
        // Création du formulaire de recherche
        $form = $this->createForm(SearchBarType::class);
        // Gestion de la requête du formulaire
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupération de la requête de recherche
            $query = $form->getData()['search'];
            // Redirection vers la page de recherche avec la requête en paramètre
            return $this->redirectToRoute('app_search', ['query' => $query]);
        }

        // Récupération de la requête de recherche si elle existe
        $searchTerm = $request->query->get('query');
        // Si la requête existe et est valide
        if ($searchTerm && $this->verifyCaracter($searchTerm)) {
            // Récupération des artistes et des chansons correspondant à la requête
            $artists = $artistRepository->findByName($searchTerm);
            $songs   = $songRepository->findByName($searchTerm);
        } else {
            // Récupération de l'artiste et de ses chansons par son id
            $artists = $artistRepository->findArtistWithSongsById($id);
            // Récupération de toutes les chansons
            $songs   = $songRepository->findAllsong();
        }

        // Rendu de la vue avec les données nécessaires
        return $this->render('artist/artist.html.twig', [
            'form'            => $form->createView(),
            'controller_name' => 'ArtistController',
            'artists'         => $artists,
            'songs'           => $songs,
        ]);
    }

    // Méthode privée pour vérifier les caractères de la requête
    private function verifyCaracter($query)
    {
        // Utilisation d'une expression régulière pour vérifier les caractères autorisés
        return preg_match('/^[a-zA-Z0-9\' -]+$/', $query);
    }
}
