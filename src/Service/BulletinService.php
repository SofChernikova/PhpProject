<?php

namespace App\Service;

use App\Dto\BulletinDto;
use App\Entity\Bulletin;
use App\Entity\Offer;
use App\Mapper\MapService;
use App\Repository\BulletinRepository;
use Doctrine\ORM\EntityManagerInterface;

class BulletinService
{
    public function __construct(private BulletinRepository     $bulletinRepository,
                                private EntityManagerInterface $entityManager,
                                private MapService             $mapService,
                                private OfferService           $offerService,
                                private ProcedureService       $procedureService)
    {
    }

    public function save(BulletinDto $dto)
    {
        $entity = new Bulletin();

        $procedure = $this->procedureService->findById($dto->getKonkursId());
        $entity->setKonkursId($procedure);

        $lot = $this->offerService->findByLifnr($dto->getLifnr());
        $entity->setLifnr($lot);

        $entity->setVoteDate($dto->getVoteDate());
        $entity->setVoteTime($dto->getVoteTime());

        $entity = $this->mapService->mapDtoToEntity($dto, $entity, '-b');
        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }
}
