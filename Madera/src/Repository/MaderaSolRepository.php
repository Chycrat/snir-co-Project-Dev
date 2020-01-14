<?php

namespace App\Repository;

use App\Entity\MaderaSol;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaSol|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaSol|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaSol[]    findAll()
 * @method MaderaSol[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaSolRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaSol::class);
    }

    // /**
    //  * @return MaderaSol[] Returns an array of MaderaSol objects
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
    public function findOneBySomeField($value): ?MaderaSol
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
