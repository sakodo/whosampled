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
            $query = $form ->getData()['search'];
             
                return $this->redirectToRoute('app_search', ['query' => $query]);           
            
            
        }
       
        if($searchTerm = $request->query->get('query')){
            if($this->verifyCaracter($searchTerm)){

                $artists = $artistRepository->findByName($searchTerm);
                $songs = $songRepository->findByName($searchTerm);
            }
        };
        
        return $this->render('search/index.html.twig', [
            'form' => $form->createView(),
            'artists' => $artists,
            'songs' => $songs,
        ]);
    }
    /**
     * Permet de verifier si la chaine est correct
     *
     * @param [type] 
     * @return bool
     */
    function verifyCaracter($query) {
        // Utilisation d'une expression régulière pour vérifier les caractères autorisés
        // La regex /^[a-zA-Z0-9' -]+$/ vérifie que la chaîne ne contient que des lettres minuscules, majuscules, chiffres, apostrophes et tirets.
        if (preg_match('/^[a-zA-Z0-9\' -]+$/', $query)) {
            return true; // La chaîne ne contient que des caractères autorisés
        } else {
            return $this->redirectToRoute('app_search'); // La chaîne contient des caractères non autorisés
        }
    }    
}
