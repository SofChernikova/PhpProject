<?php

namespace App\Repository;

use App\Dto\BulletinDto;
use App\Entity\Bulletin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bulletin>
 *
 * @method Bulletin|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bulletin|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bulletin[]    findAll()
 * @method Bulletin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BulletinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bulletin::class);
    }

    /**
     * @param BulletinDto $dto
     * @return int
     * @throws Exception
     */
    public function save(BulletinDto $dto): int
    {
        return $this->getEntityManager()->getConnection()->insert('ZTINMM_TK_VOTE',
            ['konkurs_id_id' => $dto->getKonkursId(),
                'lifnr_id' => $dto->getLifnr(),
                'stat' => $dto->getStat(),
                'pers_id' => $dto->getPersId(),
                'vote_res' => $dto->getVoteRes(),
                'vote_finish' => $dto->getVoteFinish(),
                'vote_win' => $dto->getVoteWin(),
                'vote_date' => $dto->getVoteDate(),
                'vote_time' => $dto->getVoteTime(),
                'vote_user' => $dto->getVoteUser()]);
    }

//    /**
//     * @return Bulletin[] Returns an array of Bulletin objects
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

//    public function findOneBySomeField($value): ?Bulletin
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
