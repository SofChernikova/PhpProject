<?php

namespace App\Service;

use App\Entity\Procedure;
use App\Exception\MyException;
use App\Mapper\MapService;
use App\Repository\ProcedureRepository;
use App\Dto\ProcedureDto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ProcedureService
{
    public function __construct(private ProcedureRepository    $procedureRepository,
                                private EntityManagerInterface $entityManager,
                                private BalanceUnitService     $balanceUnitService,
                                private MapService             $mapService)
    {
    }

    public function findAll(Request $request)
    {
        $procedureRequest = $request->toArray();
        if (count($procedureRequest) == 0) return $this->procedureRepository->findAll();

        if ($procedureRequest['konkursNr'] != null) {
            return $this->procedureRepository->findBy(['konkursNr' => $procedureRequest['konkursNr']]);
        }
        if ($procedureRequest['konkursName'] != null) {
            return $this->procedureRepository->findBy(['konkursName' => $procedureRequest['konkursName']]);
        }
        if ($procedureRequest['burks'] != null) {
            return $this->procedureRepository->findBy(['burks' => $procedureRequest['burks']]);
        }

    }

    public function findById($id)
    {
        $proc = $this->procedureRepository->findOneBy(['konkursId' => $id]);
        if ($proc == null) throw new MyException("Неверное значение [konkursId]");
        return $proc;
    }

    public function save(ProcedureDto $dto)
    {
        $procedure = new Procedure();

        $procedure->setCrtDate($dto->getCrtDate());
        $procedure->setCrtTime($dto->getCrtTime());

        $burks = $this->balanceUnitService->findUnitById($dto->getBurks());
        $procedure->setBurks($burks->getBurks());

        $procedure = $this->mapService->mapDtoToEntity($dto, $procedure, '-p');
        $this->entityManager->persist($procedure);
        $this->entityManager->flush();

        return $procedure;
    }
}
