<?php

namespace App\Service;

use App\Dto\BalanceUnitDto;
use App\Entity\BalanceUnit;
use App\Exception\MyException;
use App\Mapper\MapService;
use App\Repository\BalanceUnitRepository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class BalanceUnitService
{
    public function __construct(private BalanceUnitRepository  $balanceUnitRepository,
                                private EntityManagerInterface $entityManager,
                                private MapService             $mapService)
    {
    }

    /**
     * @throws MyException
     */
    public function findUnitById($id)
    {
        $unit = $this->balanceUnitRepository->findOneBy(['burks' => $id]);
        if ($unit == null) throw new MyException("Неверное значение [burks]");
        return $unit;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(BalanceUnitDto $dto)
    {
        $entity = new BalanceUnit();

        $entity = $this->mapService->mapDtoToEntity($dto, $entity, '-bu');
        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }
}
