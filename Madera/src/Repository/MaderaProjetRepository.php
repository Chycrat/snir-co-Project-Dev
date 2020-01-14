<?php

namespace App\Repository;

use App\Entity\MaderaProjet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MaderaProjet|null find($id, $lockMode = null, $lockVersion = null)
 * @method MaderaProjet|null findOneBy(array $criteria, array $orderBy = null)
 * @method MaderaProjet[]    findAll()
 * @method MaderaProjet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaderaProjetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MaderaProjet::class);
    }

    // /**
    //  * @return MaderaProjet[] Returns an array of MaderaProjet objects
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
    public function findOneBySomeField($value): ?MaderaProjet
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
