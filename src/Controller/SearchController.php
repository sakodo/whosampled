<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    #[Route('/search/bar', name: 'app_searchBar')]
    /**
     * construction de la barre de recherche
     *
     * @return barre de recherche
     */
    public function searchBar(): Response {

        
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('app_handleSearch'))
            ->add('query', TextType::class,
            [
                'label' => false,
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Entrez votre recherche'
                ]
            ]
            )
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();
        return $this->render('search/search.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * recuperation des données artiste et chanson
     *
     * @param Request $request
     * @param ArtistRepository $artist
     * @param SongRepository $song
     * @return void
     */
    #[Route('/search/bar/handleSearch', name: "app_handleSearch")]
    public function handleSearch(Request $request, ArtistRepository $artist) :Response {
        $query = $request->getContent();
        parse_str(urldecode($query), $decoded);
        $queryName = $decoded['form']['query'];

        if($query) {
            $artists = $artist->findArtistByName($queryName);
            // $songs = $song->findSongByName($query);
           
        }
        return $this->render('search/index.html.twig', [
            'artists' => $artists,
            // 'songs' => $songs
        ]);
    }

    
}
