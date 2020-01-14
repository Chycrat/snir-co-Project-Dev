<?php

namespace App\Repository;

use App\Entity\MaderaGamme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaGamme|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaGamme|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaGamme[]    findAll()
 * @method MaderaGamme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaGammeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaGamme::class);
    }

    // /**
    //  * @return MaderaGamme[] Returns an array of MaderaGamme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MaderaGamme
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
