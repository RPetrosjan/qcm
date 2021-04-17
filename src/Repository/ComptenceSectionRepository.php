<?php

namespace App\Repository;

use App\Entity\ComptenceSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ComptenceSection|null find($id, $lockMode = null, $lockVersion = null)
 * @method ComptenceSection|null findOneBy(array $criteria, array $orderBy = null)
 * @method ComptenceSection[]    findAll()
 * @method ComptenceSection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ComptenceSectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ComptenceSection::class);
    }

    // /**
    //  * @return ComptenceSection[] Returns an array of ComptenceSection objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ComptenceSection
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
