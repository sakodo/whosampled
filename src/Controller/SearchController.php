<?php

namespace App\Controller;

use Doctrine\DBAL\Types\TextType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
            ->setAction($this->generateUrl(('handleSearch')))
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
        return $this->render('search/index.html.twig',[
            'form' => $form -> createView()
        ]);
    }

    #[Route('/handleSearch', name: "app_handleSearch")]
    public function handleSearch(Request $request, ArtistRepository $artist, SongRepository $song){
        $query = $request->request->get('form')['query'];
        if($query) {
            $artists = $artist->findArtisteByName($query);
            $songs = $song->findSongByName($query);
        }
    }
}
