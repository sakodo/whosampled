<?php

namespace App\Repository;

use App\Entity\Sample;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Sample>
 *
 * @method Sample|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sample|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sample[]    findAll()
 * @method Sample[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SampleRepository extends ServiceEntityRepository
{
    // Constructeur de la classe
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sample::class);
    }

    // Recherche d'un échantillon par ID
    public function findSampleById(int $id): ?Sample
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.songs', 'song') // Jointure avec la table des chansons
            ->addSelect('song') // Sélection des chansons
            ->andWhere('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    // Recherche d'un échantillon avec ses chansons par ID
    public function findSampleWithSongsById(int $id): ?Sample
    {
        return $this->createQueryBuilder('s')
            ->leftJoin('s.songs', 'ss') // Jointure avec la table des chansons
            ->leftJoin('ss.artists', 'a') // Jointure avec la table des artistes
            ->addSelect('ss') // Sélection des chansons
            ->addSelect('a')  // Sélection des artistes
            ->andWhere('s.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    // Cette méthode est commentée, vous pouvez la décommenter si nécessaire
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
}
