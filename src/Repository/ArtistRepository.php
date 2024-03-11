<?php

namespace App\Repository;

use App\Entity\Artist;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Artist>
 *
 * @method Artist|null find($id, $lockMode = null, $lockVersion = null)
 * @method Artist|null findOneBy(array $criteria, array $orderBy = null)
 * @method Artist[]    findAll()
 * @method Artist[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArtistRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Artist::class);
    }

    public function findByName(string $query): array
       {
           return $this->createQueryBuilder('a') 
                    ->andWhere('a.artist_name LIKE :val')
                    ->setParameter('val', '%'.$query.'%')
                    ->orderBy('a.artist_name', 'ASC')
                    ->orderBy('a.img_artist_file')
                    ->getQuery()
                    ->getResult()
           ;
       }

    public function findArtistWithSongsById(int $id): ?Artist
       {
           return $this->createQueryBuilder('a')
               ->leftJoin('a.songs', 's') 
               ->addSelect('s') 
               ->andWhere('a.id = :id')
               ->setParameter('id', $id)
               ->getQuery()
               ->getOneOrNullResult();
       }


    //    /**
    //     * @return Artist[] Returns an array of Artist objects
    //     */
    //    public function findByExampleField(string $query): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', '%'.$value.'%')
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Artist
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
