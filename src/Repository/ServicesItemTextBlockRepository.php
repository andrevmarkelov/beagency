<?php

namespace App\Repository;

use App\Entity\ServicesItemTextBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServicesItemTextBlock>
 *
 * @method ServicesItemTextBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesItemTextBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesItemTextBlock[]    findAll()
 * @method ServicesItemTextBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicesItemTextBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServicesItemTextBlock::class);
    }

    public function save(ServicesItemTextBlock $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ServicesItemTextBlock $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ServicesItemTextBlock[] Returns an array of ServicesItemTextBlock objects
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

//    public function findOneBySomeField($value): ?ServicesItemTextBlock
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
