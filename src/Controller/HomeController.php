<?php

namespace App\Controller;

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
        $albums = $albumRepository->getDataAlbum();
        $album = $albums[array_rand($albums)];
        
       
             
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'album' => $album,
        ]);
    }

    
        
    
}
