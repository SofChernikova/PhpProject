<?php

namespace App\Repository;

use App\Dto\BalanceUnitDto;
use App\Entity\BalanceUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BalanceUnit>
 *
 * @method BalanceUnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method BalanceUnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method BalanceUnit[]    findAll()
 * @method BalanceUnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BalanceUnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BalanceUnit::class);
    }

    /**
     * @throws Exception
     */
    public function save(BalanceUnitDto $dto): int
    {
       return $this->getEntityManager()->getConnection()->insert('T001',
            ['burks' => $dto->getBurks(),
                'butxt' => $dto->getButxt()]);
    }


//    /**
//     * @return BalanceUnit[] Returns an array of BalanceUnit objects
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

//    public function findOneBySomeField($value): ?BalanceUnit
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
