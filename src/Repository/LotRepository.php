<?php

namespace App\Repository;

use App\Dto\LotDto;
use App\Entity\Lot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\Exception;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Lot>
 *
 * @method Lot|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lot|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lot[]    findAll()
 * @method Lot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LotRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Lot::class);
    }

    /**
     * @param LotDto $dto
     * @return int
     * @throws Exception
     */
    public function save(LotDto $dto): int
    {
        return $this->getEntityManager()->getConnection()->insert('ZINMM_SOF_LOT_H',
            ['konkurs_id_id' => $dto->getKonkursId(),
                'lot_id' => $dto->getLotId(),
                'lot_nr' => $dto->getLotNr(),
                'lot_name' => $dto->getLotName(),
                'ekorg' => $dto->getEkorg(),
                'finan_limit_wvat' => $dto->getFinanLimitWvat(),
                'finan_limit_wovat' => $dto->getFinanLimitWovat(),
                'vat_rate' => $dto->getVatRate(),
                'cals_nds' => $dto->getCalsNds()]);
    }


//    /**
//     * @return Lot[] Returns an array of Lot objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Lot
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
