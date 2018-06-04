<?php

namespace App\Repository;

use App\Entity\Fromation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fromation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fromation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fromation[]    findAll()
 * @method Fromation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FromationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fromation::class);
    }

//    /**
//     * @return Fromation[] Returns an array of Fromation objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fromation
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
