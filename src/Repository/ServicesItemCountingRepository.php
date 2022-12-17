<?php

namespace App\Repository;

use App\Entity\ServicesItemCounting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServicesItemCounting>
 *
 * @method ServicesItemCounting|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesItemCounting|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesItemCounting[]    findAll()
 * @method ServicesItemCounting[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicesItemCountingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServicesItemCounting::class);
    }

    public function save(ServicesItemCounting $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ServicesItemCounting $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ServicesItemCounting[] Returns an array of ServicesItemCounting objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ServicesItemCounting
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
