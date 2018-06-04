<?php

namespace App\Repository;

use App\Entity\ImageProject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ImageProject|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageProject|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageProject[]    findAll()
 * @method ImageProject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageProjectRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ImageProject::class);
    }

//    /**
//     * @return ImageProject[] Returns an array of ImageProject objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageProject
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
