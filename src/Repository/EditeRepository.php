<?php

namespace App\Repository;

use App\Entity\Edite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Edite>
 *
 * @method Edite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Edite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Edite[]    findAll()
 * @method Edite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EditeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Edite::class);
    }

//    /**
//     * @return Edite[] Returns an array of Edite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Edite
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
