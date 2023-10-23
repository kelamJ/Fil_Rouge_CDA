<?php

namespace App\Repository;

use App\Entity\Lignedecommande;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lignedecommande>
 *
 * @method Lignedecommande|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lignedecommande|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lignedecommande[]    findAll()
 * @method Lignedecommande[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LignedecommandeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lignedecommande::class);
    }

//    /**
//     * @return Lignedecommande[] Returns an array of Lignedecommande objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Lignedecommande
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
