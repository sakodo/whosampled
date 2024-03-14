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
    // Définition de la route pour la page d'accueil
    #[Route('/', name: 'app_home')]
    public function index(AlbumRepository $albumRepository,Request $request ): Response
    {
        // Création du formulaire de recherche
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);
        
        // Vérification si le formulaire a été soumis et est valide
        if($form->isSubmitted() && $form->isValid()) {   
       
            // Récupération des données du formulaire
            $query = $form->getData();
            // Redirection vers la page de recherche avec les données du formulaire en paramètre
            return $this->redirectToRoute('app_search', ['query' => $query]);           
            
        }

        // Initialisation du tableau qui contiendra les albums
        $array_albums = [];
        // Récupération des albums depuis la base de données
        $albums = $albumRepository->getDataAlbum();
        // Sélection aléatoire de 4 clés du tableau des albums
        $album_key = array_rand($albums, 4);
        
        // Ajout des albums correspondant aux clés sélectionnées dans le tableau des albums
        $array_albums[] = $albums[$album_key[0]] ;
        $array_albums[] = $albums[$album_key[1]] ;
        $array_albums[] = $albums[$album_key[2]] ;
        $array_albums[] = $albums[$album_key[3]] ;
       
        // Rendu de la vue avec les données nécessaires
        return $this->render('home/home.html.twig', [
            'form'            => $form->createView(),
            'controller_name' => 'HomeController',
            'albums'          => $array_albums,
        ]);
    }
}