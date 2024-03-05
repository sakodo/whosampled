<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\Repository\RepositoryFactory;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(ArticleRepository $article): Response
    {
        $articles = $article->findAll();
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles'=> $articles
        ]);
        
    }
    #[Route('/showarticle', name: 'app_show_article')]
    public function showarticle(ManagerRegistry $mr): Response
    {
        $articles = $mr->getRepository(Article::class)->findAll();
        return $this->render('article/index.html.twig', [
            'article' => $articles,
        ]);
        
    }
}
