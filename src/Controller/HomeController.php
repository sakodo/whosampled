<?php

namespace App\Controller;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Validator\Constraints\Length;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(AlbumRepository $albumRepository ): Response
    {
        $array_albums = [];
        $albums = $albumRepository->getDataAlbum();
        $album_key = array_rand($albums, 2);
        
        
        $array_albums[] = $albums[$album_key[0]] ;
        $array_albums[] = $albums[$album_key[1]] ;
        

            //dd($array_albums);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'albums' => $array_albums,
        ]);
    }

    
        
    
}
