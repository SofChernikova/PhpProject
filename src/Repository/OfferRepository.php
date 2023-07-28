<?php

namespace App\Repository;

use App\Dto\OfferDto;
use App\Entity\Offer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Offer>
 *
 * @method Offer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offer[]    findAll()
 * @method Offer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offer::class);
    }

    public function save(OfferDto $dto): int
    {
        return $this->getEntityManager()->getConnection()->insert('ZTINMM_TK_OFR',
            ['konkurs_id_id' => $dto->getKonkursId(),
                'lot_id_id' => $dto->getLotId(),
                'tabix' => $dto->getTabix(),
                'lifnr' => $dto->getLifnr(),
                'lifnr_name' => $dto->getLifnrName(),
                'orf_date' => $dto->getOrfDate(),
                'orf_time' => $dto->getOrfTime(),
                'price_nds' => $dto->getPriceNds(),
                'price_with_nds' => $dto->getPriceWithNds(),
                'deliver_date' => $dto->getDeliverDate(),
                'deliver_time' => $dto->getDeliverTime(),
                'win_flg' => $dto->getWinFlg()]);
    }

//    /**
//     * @return Offer[] Returns an array of Offer objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Offer
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
