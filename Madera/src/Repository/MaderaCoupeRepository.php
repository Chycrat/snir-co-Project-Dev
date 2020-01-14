<?php

namespace App\Repository;

use App\Entity\MaderaCoupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaCoupe|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaCoupe|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaCoupe[]    findAll()
 * @method MaderaCoupe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaCoupeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaCoupe::class);
    }

    // /**
    //  * @return MaderaCoupe[] Returns an array of MaderaCoupe objects
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
    public function findOneBySomeField($value): ?MaderaCoupe
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
