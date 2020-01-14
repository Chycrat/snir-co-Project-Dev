<?php

namespace App\Repository;

use App\Entity\MaderaModule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaModule|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaModule|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaModule[]    findAll()
 * @method MaderaModule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaModuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaModule::class);
    }

    // /**
    //  * @return MaderaModule[] Returns an array of MaderaModule objects
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
    public function findOneBySomeField($value): ?MaderaModule
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
