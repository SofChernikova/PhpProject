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

    #[Route('/all/{lotId}', name: 'all offers by lotId')]
    public function findAllByLotId($lotID): JsonResponse
    {
        return $this->json($this->offerService->findByLotId($lotID));
    }

    #[Route('/{tabix}', name: 'offers by tabix')]
    public function findByTabix($tabix): JsonResponse
    {
        return $this->json($this->offerService->findByTabix($tabix));
    }
   #[Route('/save')]
    public function save(#[MapRequestPayload] OfferDto $dto){
        return $this->json($this->offerService->save($dto));
    }
}
