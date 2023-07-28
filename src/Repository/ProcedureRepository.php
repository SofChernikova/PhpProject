<?php

namespace App\Repository;

use App\Dto\ProcedureDto;
use App\Entity\Procedure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;
use function Doctrine\ORM\QueryBuilder;
use function Symfony\Component\ErrorHandler\Tests\testHeader;

/**
 * @extends ServiceEntityRepository<Procedure>
 *
 * @method Procedure|null find($id, $lockMode = null, $lockVersion = null)
 * @method Procedure|null findOneBy(array $criteria, array $orderBy = null)
 * @method Procedure[]    findAll()
 * @method Procedure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProcedureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Procedure::class);
    }

    public function save(ProcedureDto $dto): int
    {
        return $this->getEntityManager()->getConnection()->insert('ZTINMM_TK_H',
            ['burks_id' => $dto->getBurks(),
                'konkurs_id' => $dto->getKonkursId(),
                'konkurs_nr' => $dto->getKonkursNr(),
                'konkurs_name' => $dto->getKonkursName(),
                'org_key' => $dto->getOrgKey(),
                'stat' => $dto->getStat(),
                'crt_date' => $dto->getCrtDate(),
                'crt_time' => $dto->getCrtTime(),
                'crt_user' => $dto->getCrtUser()]);
    }




//    /**
//     * @return Procedure[] Returns an array of Procedure objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Procedure
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
