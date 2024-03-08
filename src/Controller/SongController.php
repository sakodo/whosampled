<?php

namespace App\Controller;

use App\Entity\Song;
use App\Repository\SongRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends AbstractController
{
    #[Route('/song/{id}', name: 'app_song')]
    public function index(int $id, SongRepository $songRepository): Response
    {
        $song = $songRepository->findSongById($id);
        // $song = $songRepository->findOneBy(['id' => $id]);
        //dd($song);
        return $this->render('song/song.html.twig', [
            'song' => $song,
        ]);
    }
}
