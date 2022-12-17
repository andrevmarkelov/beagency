<?php

namespace App\Repository;

use App\Entity\IndexServicesItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<IndexServicesItem>
 *
 * @method IndexServicesItem|null find($id, $lockMode = null, $lockVersion = null)
 * @method IndexServicesItem|null findOneBy(array $criteria, array $orderBy = null)
 * @method IndexServicesItem[]    findAll()
 * @method IndexServicesItem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IndexServicesItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, IndexServicesItem::class);
    }

    public function save(IndexServicesItem $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(IndexServicesItem $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return IndexServicesItem[] Returns an array of IndexServicesItem objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?IndexServicesItem
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
