<?php

namespace App\Repository;

use App\Entity\SubscribeBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SubscribeBlock>
 *
 * @method SubscribeBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method SubscribeBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method SubscribeBlock[]    findAll()
 * @method SubscribeBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SubscribeBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SubscribeBlock::class);
    }

    public function save(SubscribeBlock $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SubscribeBlock $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SubscribeBlock[] Returns an array of SubscribeBlock objects
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

//    public function findOneBySomeField($value): ?SubscribeBlock
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
