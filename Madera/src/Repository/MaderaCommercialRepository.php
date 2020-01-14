<?php

namespace App\Repository;

use App\Entity\MaderaCommercial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaCommercial|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaCommercial|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaCommercial[]    findAll()
 * @method MaderaCommercial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaCommercialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaCommercial::class);
    }

    // /**
    //  * @return MaderaCommercial[] Returns an array of MaderaCommercial objects
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
    public function findOneBySomeField($value): ?MaderaCommercial
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
