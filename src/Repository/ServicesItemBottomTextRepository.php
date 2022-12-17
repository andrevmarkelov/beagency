<?php

namespace App\Repository;

use App\Entity\ServicesItemBottomText;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ServicesItemBottomText>
 *
 * @method ServicesItemBottomText|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServicesItemBottomText|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServicesItemBottomText[]    findAll()
 * @method ServicesItemBottomText[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServicesItemBottomTextRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServicesItemBottomText::class);
    }

    public function save(ServicesItemBottomText $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ServicesItemBottomText $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ServicesItemBottomText[] Returns an array of ServicesItemBottomText objects
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

//    public function findOneBySomeField($value): ?ServicesItemBottomText
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
