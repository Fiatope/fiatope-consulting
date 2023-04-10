<?php

namespace App\Repository;

use App\Entity\BusinessAreaSection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BusinessAreaSection>
 *
 * @method BusinessAreaSection|null find($id, $lockMode = null, $lockVersion = null)
 * @method BusinessAreaSection|null findOneBy(array $criteria, array $orderBy = null)
 * @method BusinessAreaSection[]    findAll()
 * @method BusinessAreaSection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BusinessAreaSectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BusinessAreaSection::class);
    }

    public function save(BusinessAreaSection $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BusinessAreaSection $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return BusinessAreaSection[] Returns an array of BusinessAreaSection objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BusinessAreaSection
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
