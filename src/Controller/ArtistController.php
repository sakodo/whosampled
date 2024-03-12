<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArtistController extends AbstractController
{
    #[Route('/artist/{id}', name: 'app_artist')]
    
    public function index(ArtistRepository $artists, int $id): Response
    { 
        $artist = $artists->findArtistWithSongsById($id);
        $songs = $artist->getSongs();
        //dd($songs);
        return $this->render('artist/index.html.twig', [
            'controller_name' => 'ArtistController',
            'artist'=>$artist
        ]);
    }
}
