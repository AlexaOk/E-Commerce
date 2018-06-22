<?php

namespace App\Repository;

use App\Entity\VariantOptions;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method VariantOptions|null find($id, $lockMode = null, $lockVersion = null)
 * @method VariantOptions|null findOneBy(array $criteria, array $orderBy = null)
 * @method VariantOptions[]    findAll()
 * @method VariantOptions[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VariantOptionsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, VariantOptions::class);
    }

//    /**
//     * @return VariantOptions[] Returns an array of VariantOptions objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VariantOptions
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
