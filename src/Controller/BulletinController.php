<?php

namespace App\Controller;

use App\Dto\BulletinDto;
use App\Service\BulletinService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/bulletin')]
class BulletinController extends AbstractController
{
    public function __construct(private BulletinService $bulletinService)
    {
    }

    #[Route('/save')]
    public function save(#[MapRequestPayload] BulletinDto $dto): JsonResponse
    {
        return $this->json($this->bulletinService->save($dto));
    }
}
