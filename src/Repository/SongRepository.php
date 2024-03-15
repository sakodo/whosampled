<?php

namespace App\Repository;

use App\Entity\Song;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;


/**
 * @extends ServiceEntityRepository<Song>
 *
 * @method Song|null find($id, $lockMode = null, $lockVersion = null)
 * @method Song|null findOneBy(array $criteria, array $orderBy = null)
 * @method Song[]    findAll()
 * @method Song[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SongRepository extends ServiceEntityRepository
{
    // Constructeur de la classe
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Song::class);
    }

    // Recherche des chansons par nom
    public function findByName($query):array
    {
        return $this->createQueryBuilder('s')
                    ->leftJoin('s.artists','a') // Jointure avec la table des artistes
                    ->leftJoin('s.albums', 'al') // Jointure avec la table des albums
                    ->addSelect('a','al') // Sélection des artistes et des albums
                    ->andWhere('s.song_name LIKE :val') // Condition de recherche
                    ->setParameter('val', '%'.$query.'%') // Paramètre de recherche
                    ->orderBy('s.song_name', 'ASC') // Tri par nom de chanson
                    ->getQuery()
                    ->getResult();
    }

    // Récupération de toutes les chansons
    public function findAllsong() {
        
        return $this->createQueryBuilder('s')
                    ->leftJoin('s.albums','al') // Jointure avec la table des albums
                    ->addSelect('al') // Sélection des albums
                    ->setMaxResults(5) // Limite les résultats à 5
                    ->getQuery()
                    ->getResult();
    }
    
    // Recherche d'une chanson par ID
    public function findSongById(int $id): ?Song
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.albums', 'a') // Jointure avec la table des albums
            ->addSelect('a') // Sélection des albums
            ->andWhere('s.id = :id') // Condition de recherche
            ->setParameter('id', $id) // Paramètre de recherche
            ->getQuery()
            ->getOneOrNullResult();
    }

      // Recherche d'une chanson par son nom
      public function findSongByName(string $song_name): ?Song
      {
          return $this->createQueryBuilder('s')
              ->andWhere('s.song_name = :song_name') // Condition de recherche
              ->setParameter('song_name', $song_name) // Paramètre de recherche
              ->getQuery()
              ->getOneOrNullResult(); // Récupère un seul résultat ou null
      }

      // Recherche des chansons par l'ID de l'album
      public function findSongByAlbumId(int $album_id): ?array
      {
          return $this->createQueryBuilder('s')
              ->innerJoin('s.albums', 'a') // Jointure avec la table des albums
              ->andWhere('a.id = :album_id') // Condition de recherche
              ->setParameter('album_id', $album_id) // Paramètre de recherche
              ->getQuery()
              ->getResult(); // Récupère tous les résultats
      }

      // Recherche d'un échantillon par l'ID de la chanson
      public function findSamplebySongId(int $id): ?Song
      {
          return $this->createQueryBuilder('s')
              ->leftJoin('s.samples', 'ss') // Jointure avec la table des échantillons
              ->addSelect('ss') // Sélection des échantillons
              ->andWhere('s.id = :id') // Condition de recherche
              ->setParameter('id', $id) // Paramètre de recherche
              ->getQuery()
              ->getOneOrNullResult(); // Récupère un seul résultat ou null
      }

      // Ces méthodes sont commentées, vous pouvez les décommenter si nécessaire
      // public function findByExampleField($value): array
      // {
      //     return $this->createQueryBuilder('s')
      //         ->andWhere('s.exampleField = :val')
      //         ->setParameter('val', $value)
      //         ->orderBy('s.id', 'ASC')
      //         ->setMaxResults(10)
      //         ->getQuery()
      //         ->getResult();
      // }

      // public function findOneBySomeField($value): ?Song
      // {
      //     return $this->createQueryBuilder('s')
      //         ->andWhere('s.exampleField = :val')
      //         ->setParameter('val', $value)
      //         ->getQuery()
      //         ->getOneOrNullResult();
      // }

  }  


