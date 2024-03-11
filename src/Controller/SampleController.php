<?php

namespace App\Controller;

use App\Entity\Sample;
use App\Repository\SampleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SampleController extends AbstractController
{
    #[Route('/sample/{id}', name: 'app_sample')]
    public function index(int $id, SampleRepository $sampleRepository): Response
    {
        $sample = $sampleRepository->findSampleWithSongsById($id);
        $audioSampleFile = $sample->getAudioSampleFile();
        //dd($audioSampleFile);
        return $this->render('sample/sample.html.twig', [
            'sample' => $sample,
            'audio_sample_file' => $audioSampleFile,
            
        ]);
    }
}