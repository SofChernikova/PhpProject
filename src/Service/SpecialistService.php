<?php

namespace App\Service;

use App\Dto\SpecialistDto;
use App\Entity\Specialist;
use App\Mapper\MapService;
use App\Repository\SpecialistRepository;
use Doctrine\ORM\EntityManagerInterface;

class SpecialistService
{
    public function __construct(
        private SpecialistRepository $specialistRepository,
        private EntityManagerInterface $entityManager,
        private MapService $mapService,
        private ProcedureService $procedureService
    )
    {
    }

    public function save(SpecialistDto $dto){
        $entity = new Specialist();

        $procedure = $this->procedureService->findById($dto->getKonkursId());
        $entity->setKonkursId($procedure);

        $entity = $this->mapService->mapDtoToEntity($dto, $entity, '-s');
        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }
}
