<?php

namespace App\Controller;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints\Length;


class HomeController extends AbstractController
{
    // Définition de la route pour cette méthode
    #[Route('/', name: 'app_home')]
    // Définition de la méthode index
    public function index(AlbumRepository $albumRepository, Request $request): Response
    {
        // Création du formulaire de recherche
        $form = $this->createForm(SearchType::class);
        // Gestion de la requête du formulaire
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupération de la requête de recherche
            $query = $form->getData();
            // Redirection vers la page de recherche avec la requête en paramètre
            return $this->redirectToRoute('app_search', ['query' => $query]);
        }

        // Récupération de tous les albums
        $albums = $albumRepository->getDataAlbum();
        // Sélection aléatoire de 4 clés d'albums
        $album_keys = array_rand($albums, 4);

        // Utilisation de array_intersect_key pour obtenir les albums correspondant aux clés sélectionnées
        $array_albums = array_intersect_key($albums, array_flip($album_keys));

        // Rendu de la vue avec les données nécessaires
        return $this->render('home/home.html.twig', [
            'form'            => $form->createView(),
            'controller_name' => 'HomeController',
            'albums'          => $array_albums,
        ]);
    }
}
