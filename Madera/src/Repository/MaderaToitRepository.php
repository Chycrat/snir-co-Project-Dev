<?php

namespace App\Repository;

use App\Entity\MaderaToit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaToit|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaToit|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaToit[]    findAll()
 * @method MaderaToit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaToitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaToit::class);
    }

    // /**
    //  * @return MaderaToit[] Returns an array of MaderaToit objects
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
    public function findOneBySomeField($value): ?MaderaToit
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
