<?php

namespace App\Service;

use App\Dto\LotDto;
use App\Entity\BalanceUnit;
use App\Entity\Lot;
use App\Exception\MyException;
use App\Mapper\MapService;
use App\Repository\LotRepository;
use Doctrine\ORM\EntityManagerInterface;

class LotService
{
    public function __construct(private LotRepository    $lotRepository,
                                private ProcedureService $procedureService,
                                private EntityManagerInterface $entityManager,
                                private MapService             $mapService)
    {
    }

    public function findAllByProcedureId($id)
    {
        $oneBy = $this->lotRepository->findBy(['konkursId'=>$id]);
        if ($oneBy == null) throw new MyException("Неверное значение [konkursId]");
        return $oneBy;
    }

    public function findById($id)
    {
        $oneBy = $this->lotRepository->findOneBy(['lotId' => $id]);
        if ($oneBy == null) throw new MyException("Неверное значение [lotId]");
        return $oneBy;
    }

    public function save(LotDto $dto)
    {
        $entity = new Lot();

        $procedure = $this->procedureService->findById($dto->getKonkursId());
        $entity->setKonkursId($procedure);

        $entity = $this->mapService->mapDtoToEntity($dto, $entity, '-l');
        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }
}
