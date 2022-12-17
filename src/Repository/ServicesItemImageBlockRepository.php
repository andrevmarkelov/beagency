<?php

namespace App\Repository;

use App\Entity\ServicesItemImageBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServicesItemImageBlock>
 *
 * @method ServicesItemImageBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesItemImageBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesItemImageBlock[]    findAll()
 * @method ServicesItemImageBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicesItemImageBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServicesItemImageBlock::class);
    }

    public function save(ServicesItemImageBlock $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ServicesItemImageBlock $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ServicesItemImageBlock[] Returns an array of ServicesItemImageBlock objects
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

//    public function findOneBySomeField($value): ?ServicesItemImageBlock
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
