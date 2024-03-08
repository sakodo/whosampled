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
            $query = $form ->getData()['seach'];
            return $this->redirectToRoute('app_search', ['query' => $query]);
            
        }
       
        $searchTerm = $form->get('search')->getData();
        $artists = $artistRepository->findByName($searchTerm);
         $songs = $songRepository->findByName($searchTerm);
            
        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'artists' => $artists,
            'songs' => $songs,
        ]);
    }

   

    
}



        // if ($form->isSubmitted() && $form->isValid()) {
        //     $query = $form->getData()['search'];
        //     return $this->redirectToRoute('app_search', ['query' => $query]);
        // }

        // if ($search = $request->query->get('query')) {
        //     $albums = $albumRepository->findByTitle($search);
        //     $songs = $songRepository->findByTitle($search);
        // }


