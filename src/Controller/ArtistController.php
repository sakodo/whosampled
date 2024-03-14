<?php

namespace App\Controller;

use App\Repository\AlbumRepository;
use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtistController extends AbstractController
{
    #[Route('/artist/{id}', name: 'app_artist')]
    
    public function index(ArtistRepository $artistRepositrory, AlbumRepository $albumRepository, int $id): Response
    { 
      
        //dd($songs);
        $artists = $artistRepositrory -> findArtistWithSongsById($id);
        $albums  = $albumRepository   -> getDataAlbum();

       
        return $this->render('artist/index.html.twig', [
            'controller_name' => 'ArtistController',
            'artists'         => $artists,
            'albums'          => $albums ,
        ]);
    }
}
