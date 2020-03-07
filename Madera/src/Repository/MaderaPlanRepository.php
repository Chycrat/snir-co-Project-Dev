<?php

namespace App\Repository;

use App\Entity\MaderaPlan;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaPlan|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaPlan|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaPlan[]    findAll()
 * @method MaderaPlan[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaPlanRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaPlan::class);
    }

     /**
      * @return MaderaPlan[] Returns an array of MaderaPlan objects
      */

    public function findByProjetId($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.maderaProjet = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?MaderaPlan
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
