<?php

namespace App\Service;

use App\Dto\LotDto;
use App\Exception\MyException;
use App\Repository\LotRepository;
use Doctrine\DBAL\Exception;

class LotService
{
    public function __construct(private LotRepository          $lotRepository,
                                private ProcedureService       $procedureService)
    {
    }

    public function findAllByProcedureId($id)
    {
        $oneBy = $this->lotRepository->findBy(['konkursIdId' => $id]);
        if ($oneBy == null) throw new MyException("Неверное значение [konkursId]");
        return $oneBy;
    }

    public function findById($id)
    {
        $oneBy = $this->lotRepository->findOneBy(['lotId' => $id]);
        if ($oneBy == null) throw new MyException("Неверное значение [lotId]");
        return $oneBy;
    }

    /**
     * @throws Exception
     */
    public function save(LotDto $dto)
    {
        $this->procedureService->findById($dto->getKonkursId());

        $int = $this->lotRepository->save($dto);
        if($int > 0) return 'Успешно';
    }
}
