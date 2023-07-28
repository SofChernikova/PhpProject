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
                                private BalanceUnitService     $balanceUnitService)
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

    public function findByName($name){
        $proc = $this->procedureRepository->findBy(['konkursName' => $name]);
        if ($proc == null) throw new MyException("Неверное значение [konkursName]");
        return $proc;
    }

    public function save(ProcedureDto $dto)
    {
        $this->balanceUnitService->findUnitById($dto->getBurks());

        $int = $this->procedureRepository->save($dto);
        if($int > 0) return 'Успешно';
    }
}
