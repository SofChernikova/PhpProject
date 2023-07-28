<?php

namespace App\Service;

use App\Dto\OfferDto;
use App\Exception\MyException;
use App\Repository\OfferRepository;


class OfferService
{
    public function __construct(private OfferRepository        $offerRepository,
                                private LotService             $lotService,
                                private ProcedureService       $procedureService)
    {
    }

    public function findAllByProcedureId($id)
    {
        $oneBy = $this->offerRepository->findBy(['konkursId' => $id]);
        if ($oneBy == null) throw new MyException("Неверное значение [konkursId]");
        return $oneBy;
    }
    public function findByLotId($id)
    {
        $oneBy = $this->offerRepository->findBy(['lotId' => $id]);
        if ($oneBy == null) throw new MyException("Неверное значение [lotId]");
        return $oneBy;
    }

    public function findByTabix($tabix)
    {
        $oneBy = $this->offerRepository->findOneBy(['tabix' => $tabix]);
        if ($oneBy == null) throw new MyException("Неверное значение [tabix]");
        return $oneBy;
    }

    public function findByLifnr($lifnr): void
    {
        $oneBy = $this->offerRepository->findOneBy(['lifnr' => $lifnr]);
        if ($oneBy == null) throw new MyException("Неверное значение [lifnr]");
    }

    public function save(OfferDto $dto)
    {
        $this->procedureService->findById($dto->getKonkursId());
        $this->lotService->findById($dto->getLotId());

        $int = $this->offerRepository->save($dto);
        if($int > 0) return 'Успешно';
    }
}
