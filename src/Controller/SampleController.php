<?php

namespace App\Controller;


use App\Repository\SampleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SampleController extends AbstractController
{
    // Définition de la route pour cette méthode
    #[Route('/sample/{id}', name: 'app_sample')]
    public function index(int $id, SampleRepository $sampleRepository, Request $request): Response
    {
        // Création et gestion du formulaire de recherche
        $form = $this->handleSearchForm($request);

        // Récupération de l'échantillon et du fichier audio associé
        $sample = $sampleRepository->findSampleWithSongsById($id);
        $audioSampleFile = $sample->getAudioSampleFile();

        // Rendu de la vue avec les données nécessaires
        return $this->render('sample/sample.html.twig', [
            'form'            => $form->createView(),
            'controller_name' => 'SampleController',
            'sample' => $sample,
            'audio_sample_file' => $audioSampleFile,
        ]);
    }

    // Méthode privée pour créer et gérer le formulaire de recherche
    private function handleSearchForm(Request $request)
    {
        // Création du formulaire de recherche
        $form = $this->createForm(SearchType::class);
        // Gestion de la requête du formulaire
        $form->handleRequest($request);

        // Si le formulaire est soumis et valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupération des données du formulaire
            $query = $form->getData();
            // Redirection vers la page de recherche avec les données du formulaire en paramètre
            return $this->redirectToRoute('app_search', ['query' => $query]);
        }

        return $form;
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
