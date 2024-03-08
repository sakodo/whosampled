<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Form\SearchBarType;
use App\Repository\ArtistRepository;
use App\Repository\SongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(Request $request, ArtistRepository $artistRepository, SongRepository $songRepository): Response
    {
        $form = $this->createForm(SearchBarType::class);
        $form->handleRequest($request);

        $artists = [];
        $songs = [];
        if($form->isSubmitted()&& $form->isValid()) {
            $searchTerm = $form->get('search')->getData();
            $artists = $artistRepository->findByName($searchTerm);
            $songs = $songRepository->findByName($searchTerm);
            
        }

        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'artists' => $artists,
            'songs' => $songs,
        ]);
    }

    /**
     * Recupération de la recherche de l'utilisateur 
     *
     * @param Request $request
     * @param ArtistRepository $artist
     * @param SongRepository $song
     * @return void
     */
    #[Route('/search/handleSearch', name: "app_handleSearch")]
    public function handleSearch(Request $request, ArtistRepository $artistRepository, SongRepository $songRepository) :Response {

        $form = $this->createForm(SearchBarType::class);
        $form->handleRequest($request);

        $artists = [];
        $songs = [];
        if($form->isSubmitted()&& $form->isValid()) {
            $searchTerm = $form->get('search')->getData();
            $artists = $artistRepository->findByName($searchTerm);
            $songs = $songRepository->findByName($searchTerm);
        }


        /* $query = $request->getContent();
        parse_str(urldecode($query), $decoded);
        $queryName = $decoded['form']['query'];

        if($query) {
            $artists = $artist->findByName($queryName);
            $songs = $song->findByName($queryName);
        } */

        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'artists' => $artists,
            'songs' => $songs
        ]);
    }

    // #[Route('/search/bar', name: 'app_searchBar')]
    // /**
    //  * construction de la barre de recherche
    //  *
    //  * @return barre de recherche
    //  */
    // public function searchBar(): Response {

        
    //     $form = $this->createFormBuilder()
    //         ->setAction($this->generateUrl('app_handleSearch'))
    //         ->add('query', TextType::class,
    //         [
    //             'label' => false,
    //             'attr' => [
    //                 'class' => 'form-control',
    //                 'placeholder' => 'Entrez votre recherche'
    //             ]
    //         ]
    //         )
    //         ->add('recherche', SubmitType::class, [
    //             'attr' => [
    //                 'class' => 'btn btn-primary'
    //             ]
    //         ])
    //         ->getForm();
    //     return $this->render('search/index.html.twig',[
    //         'form' => $form->createView()
    //     ]);
    // }

    // /**
    //  * Recupération de la recherche de l'utilisateur 
    //  *
    //  * @param Request $request
    //  * @param ArtistRepository $artist
    //  * @param SongRepository $song
    //  * @return void
    //  */
    // #[Route('/search/bar/handleSearch', name: "app_handleSearch")]
    // public function handleSearch(Request $request, ArtistRepository $artist, SongRepository $song) :Response {

    //     $query = $request->getContent();
    //     parse_str(urldecode($query), $decoded);
    //     $queryName = $decoded['form']['query'];

    //     if($query) {
    //         $artists = $artist->findArtistByName($queryName);
    //         $songs = $song->findSongByName($queryName);
    //     }
    //     return $this->render('search/search.html.twig', [
            
    //         'artists' => $artists,
    //         'songs' => $songs
    //     ]);
    // }

    
}
