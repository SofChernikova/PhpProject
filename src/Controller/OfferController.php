<?php

namespace App\Controller;

use App\Dto\OfferDto;
use App\Service\OfferService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/offer')]
class OfferController extends AbstractController
{
    public function __construct(private OfferService $offerService)
    {
    }

    #[Route('/all/{lotId}', name: 'offers lotId')]
    public function findByLotId($lotId): JsonResponse
    {
        return $this->json($this->offerService->findByLotId($lotId));
    }

    #[Route('/{tabix}', name: 'offers by tabix')]
    public function findByTabix($tabix): JsonResponse
    {
        return $this->json($this->offerService->findByTabix($tabix));
    }

   #[Route('/offer/save')]
    public function save(#[MapRequestPayload] OfferDto $dto){
        return $this->json($this->offerService->save($dto));
    }
}
