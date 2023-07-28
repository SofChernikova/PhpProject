<?php

namespace App\Service;

use App\Dto\BulletinDto;
use App\Entity\Bulletin;
use App\Entity\Offer;
use App\Mapper\MapService;
use App\Repository\BulletinRepository;
use Doctrine\ORM\EntityManagerInterface;

class BulletinService
{
    public function __construct(private BulletinRepository     $bulletinRepository,
                                private OfferService           $offerService,
                                private ProcedureService       $procedureService)
    {
    }

    public function save(BulletinDto $dto)
    {
        $this->procedureService->findById($dto->getKonkursId());
        $this->offerService->findByLifnr($dto->getLifnr());

        $int = $this->bulletinRepository->save($dto);
        if($int > 0) return 'Успешно';
    }
}
