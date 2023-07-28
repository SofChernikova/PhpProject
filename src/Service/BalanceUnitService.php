<?php

namespace App\Service;

use App\Dto\BalanceUnitDto;
use App\Exception\MyException;
use App\Repository\BalanceUnitRepository;

use Doctrine\DBAL\Exception;

class BalanceUnitService
{
    public function __construct(private BalanceUnitRepository $balanceUnitRepository)
    {
    }

    /**
     * @throws MyException
     */
    public function findUnitById($id): void
    {
        $unit = $this->balanceUnitRepository->findOneBy(['burks' => $id]);
        if ($unit == null) throw new MyException("Неверное значение [burks]");
    }


    /**
     * @throws Exception
     */
    public function save(BalanceUnitDto $dto)
    {
        $int = $this->balanceUnitRepository->save($dto);
        if($int > 0) return 'Успешно';

    }
}
