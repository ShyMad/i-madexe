<?php

namespace App\Repository;

use App\Entity\EtatCivil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EtatCivil|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatCivil|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatCivil[]    findAll()
 * @method EtatCivil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatCivilRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EtatCivil::class);
    }

//    /**
//     * @return EtatCivil[] Returns an array of EtatCivil objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EtatCivil
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
