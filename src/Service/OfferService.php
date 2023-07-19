<?php

namespace App\Service;

use App\Dto\OfferDto;
use App\Entity\Offer;
use App\Exception\MyException;
use App\Mapper\MapService;
use App\Repository\OfferRepository;
use Doctrine\ORM\EntityManagerInterface;

class OfferService
{
    public function __construct(private OfferRepository $offerRepository,
                                private LotService $lotService,
                                private ProcedureService $procedureService,
                                private EntityManagerInterface $entityManager,
                                private MapService             $mapService)
    {
    }

    public function findByLotId($id){
        $oneBy = $this->offerRepository->findBy(['lotId' => $id]);
        if ($oneBy == null) throw new MyException("Неверное значение [lotId]");
        return $oneBy;
    }

    public function findByTabix($tabix){
        $oneBy = $this->offerRepository->findOneBy(['tabix'=>$tabix]);
        if ($oneBy == null) throw new MyException("Неверное значение [tabix]");
        return $oneBy;
    }
    public function findByLifnr($lifnr){
        $oneBy = $this->offerRepository->findOneBy(['lifnr'=>$lifnr]);
        if ($oneBy == null) throw new MyException("Неверное значение [lifnr]");
        return $oneBy;
    }
    public function save(OfferDto $dto){
        $entity = new Offer();

        $procedure = $this->procedureService->findById($dto->getKonkursId());
        $entity->setKonkursId($procedure);

        $lot = $this->lotService->findById($dto->getLotId());
        $entity->setLotId($lot);

        $entity->setOrfDate($dto->getOrfDate());
        $entity->setOrfTime($dto->getOrfTime());
        $entity->setDeliverDate($dto->getDeliverDate());
        $entity->setDeliverTime($dto->getDeliverTime());

        $entity = $this->mapService->mapDtoToEntity($dto, $entity, '-o');
        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }
}
