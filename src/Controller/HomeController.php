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
    #[Route('/', name: 'app_home')]
    public function index(AlbumRepository $albumRepository,Request $request ): Response
    {
        $form = $this->createForm(SearchType::class);
        $form->handleRequest($request);
        
        //verifie si il y a un envoi et si c'est valid
        if($form->isSubmitted() && $form->isValid()) {   
       
            $query = $form->getData();
            return $this->redirectToRoute('app_search', ['query' => $query]);           
            
        }

        $array_albums = [];
        $albums = $albumRepository->getDataAlbum();
        $album_key = array_rand($albums, 4);
        
        
        $array_albums[] = $albums[$album_key[0]] ;
        $array_albums[] = $albums[$album_key[1]] ;
        $array_albums[] = $albums[$album_key[2]] ;
        $array_albums[] = $albums[$album_key[3]] ;
       
        

            //dd($array_albums);

        return $this->render('home/home.html.twig', [
            'form'            => $form->createView(),
            'controller_name' => 'HomeController',
            'albums'          => $array_albums,
        ]);
    }

    
        
    
}
