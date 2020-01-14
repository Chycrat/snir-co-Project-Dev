<?php

namespace App\Repository;

use App\Entity\MaderaComposant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaComposant|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaComposant|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaComposant[]    findAll()
 * @method MaderaComposant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaComposantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaComposant::class);
    }

    // /**
    //  * @return MaderaComposant[] Returns an array of MaderaComposant objects
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
    public function findOneBySomeField($value): ?MaderaComposant
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
