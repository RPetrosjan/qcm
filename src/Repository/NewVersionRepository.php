<?php

namespace App\Repository;

use App\Entity\NewVersion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method NewVersion|null find($id, $lockMode = null, $lockVersion = null)
 * @method NewVersion|null findOneBy(array $criteria, array $orderBy = null)
 * @method NewVersion[]    findAll()
 * @method NewVersion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NewVersionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NewVersion::class);
    }

    // /**
    //  * @return NewVersion[] Returns an array of NewVersion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?NewVersion
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
