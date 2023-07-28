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
        private ProcedureService     $procedureService
    )
    {
    }

    public function save(SpecialistDto $dto)
    {
        $this->procedureService->findById($dto->getKonkursId());

        $int = $this->specialistRepository->save($dto);
        if ($int > 0) return 'Успешно';
    }
}
