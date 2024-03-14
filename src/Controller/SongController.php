<?php

namespace App\Controller;

use App\Form\SearchBarType;
use App\Repository\SongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/song/{id}', name: 'app_song')]
    public function index(int $id, SongRepository $songRepository , Request $request): Response
    {

         // Création du formulaire de recherche
         $form = $this->createForm(SearchType::class);
         $form->handleRequest($request);
         
         // Vérification si le formulaire a été soumis et est valide
         if($form->isSubmitted() && $form->isValid()) {   
        
             // Récupération des données du formulaire
             $query = $form->getData();
             // Redirection vers la page de recherche avec les données du formulaire en paramètre
             return $this->redirectToRoute('app_search', ['query' => $query]);           
             
         }
        $song = $songRepository->findSongById($id);
        $samples = $songRepository->findSamplebySongId($id);
        //dd($samples);
        // $song = $songRepository->findOneBy(['id' => $id]);
        //dd($song);
        return $this->render('song/song.html.twig', [
            'form'            => $form->createView(),
            'controller_name' => 'SongController',
            'song'            => $song,
            'samples'         => $samples,
        ]);
    }

      /**
     * Permet de verifier si la chaine est correct
     *
     * @param
     * @return return True si les caractères sont autorisés sinon redirige vers la app_search
     */
    function verifyCaracter($query)
    {
        // Utilisation d'une expression régulière pour vérifier les caractères autorisés
        // La regex /^[a-zA-Z0-9' -]+$/ vérifie que la chaîne ne contient que des lettres minuscules, majuscules, chiffres, apostrophes et tirets.
        if (preg_match('/^[a-zA-Z0-9\' -]+$/', $query)) {
            return true; // La chaîne ne contient que des caractères autorisés
        } else {
            return $this->redirectToRoute('app_search'); // La chaîne contient des caractères non autorisés
        }
    }
}
