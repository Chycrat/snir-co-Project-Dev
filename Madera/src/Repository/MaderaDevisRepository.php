<?php

namespace App\Repository;

use App\Entity\MaderaDevis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaDevis|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaDevis|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaDevis[]    findAll()
 * @method MaderaDevis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaDevisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaDevis::class);
    }

    // /**
    //  * @return MaderaDevis[] Returns an array of MaderaDevis objects
    //  */

    public function findByPlanId($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.plan_devis = :val')
            ->setParameter('val', $value)
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?MaderaDevis
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
