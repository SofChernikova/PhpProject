<?php

namespace App\Controller;

use App\Dto\BalanceUnitDto;
use App\Dto\LotDto;
use App\Service\LotService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/lot')]
class LotController extends AbstractController
{
    public function __construct(private LotService $lotService)
    {
    }

    #[Route('/all/{konkursId}', name: 'all lots by konkursId')]
    public function findLotsByProcedureId($konkursId): JsonResponse
    {
        return $this->json($this->lotService->findAllByProcedureId($konkursId));
    }

    #[Route('/{lotId}', name: 'lot by lotId')]
    public function findLotById($lotId): JsonResponse
    {
        return $this->json($this->lotService->findById($lotId));
    }

    #[Route('/save/lot')]
    public function save(#[MapRequestPayload] LotDto $dto): JsonResponse
    {
        return $this->json($this->lotService->save($dto));
    }

}
