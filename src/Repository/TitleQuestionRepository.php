<?php

namespace App\Repository;

use App\Entity\ComptenceSection;
use App\Entity\TitleQuestion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TitleQuestion|null find($id, $lockMode = null, $lockVersion = null)
 * @method TitleQuestion|null findOneBy(array $criteria, array $orderBy = null)
 * @method TitleQuestion[]    findAll()
 * @method TitleQuestion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TitleQuestionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TitleQuestion::class);
    }

    /**
     * @return int|mixed[]|string
     */
    public function getComptenceSectionSymfony() {
        return $this->createQueryBuilder('db')
            ->leftJoin('db.competences', 'competences')
            ->leftJoin('db.comptenceSection', 'comptenceSection')
            ->where('competences.title = :competence')
            ->setParameter('competence','Symfony')
            ->groupBy('comptenceSection.title')
            ->select('comptenceSection.title', 'comptenceSection.id')
            ->getQuery()
            ->getArrayResult()
            ;
    }

    /**
     * @param ComptenceSection $comptenceSection
     * @return int|mixed[]|string
     */
    public function getCompetenceQuestions(ComptenceSection $comptenceSection) {
        return $this->createQueryBuilder('db')
            ->leftJoin('db.competences', 'competences')
            ->leftJoin('db.comptenceSection', 'comptenceSection')
            ->where('competences.title = :competence')
            ->setParameter('competence','Symfony')
            ->andWhere('db.comptenceSection = :comptenceSection')
            ->setParameter('comptenceSection', $comptenceSection)

            ->getQuery()
            ->execute()
            ;
    }

    // /**
    //  * @return TitleQuestion[] Returns an array of TitleQuestion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TitleQuestion
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
