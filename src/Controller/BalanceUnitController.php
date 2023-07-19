<?php

namespace App\Controller;

use App\Dto\BalanceUnitDto;
use App\Service\BalanceUnitService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/unit')]
class BalanceUnitController extends AbstractController
    /**
    DONE
     */
{
    public function __construct(private BalanceUnitService $balanceUnitService)
    {
    }

    #[Route('/save')]
    public function save(#[MapRequestPayload] BalanceUnitDto $dto): JsonResponse
    {
        return $this->json($this->balanceUnitService->save($dto));
    }
}
