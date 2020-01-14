<?php

namespace App\Repository;

use App\Entity\MaderaClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaClient[]    findAll()
 * @method MaderaClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaClientRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaClient::class);
    }

    // /**
    //  * @return MaderaClient[] Returns an array of MaderaClient objects
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
    public function findOneBySomeField($value): ?MaderaClient
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
