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
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Song::class);
    }
    public function findByName($query):array
    {
        return $this->createQueryBuilder('s')
                    ->leftJoin('s.artists','a')
                    ->leftJoin('s.albums', 'al')
                    ->addSelect('a','al')
                    ->andWhere('s.song_name LIKE :val')
                    ->setParameter('val', '%'.$query.'%')
                    ->orderBy('s.song_name', 'ASC')
                    ->getQuery()
                    ->getResult()
           ;
    }

    public function findAllsong() {
        
        return $this->createQueryBuilder('s')
                    ->leftJoin('s.albums','al')
                    ->addSelect('al')
                    ->setMaxResults(5)
                    ->getQuery()
                    ->getResult();
    }
    
    public function findSongById(int $id): ?Song
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.albums', 'a') 
            ->addSelect('a') 
            ->andWhere('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findSongByName(string $song_name): ?Song
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.song_name = :song_name')
            ->setParameter('song_name', $song_name)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findSongByAlbumId(int $album_id): ?array
    {
        return $this->createQueryBuilder('s')
            ->innerJoin('s.albums', 'a')
            ->andWhere('a.id = :album_id')
            ->setParameter('album_id', $album_id)
            ->getQuery()
            ->getResult();
    }

    public function findSamplebySongId(int $id): ?Song
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.samples', 'ss')
            ->addSelect('ss') 
            ->andWhere('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    //    /**
    //     * @return Song[] Returns an array of Song objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Song
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

}
