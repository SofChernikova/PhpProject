<?php

namespace App\Controller;

use App\Dto\SpecialistDto;
use App\Service\SpecialistService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;
#[Route('/specialist')]
class SpecialistController extends AbstractController

{
    public function __construct(private SpecialistService $specialistService)
    {
    }

    #[Route('/save', name: 'specialist save')]
    public function save(#[MapRequestPayload] SpecialistDto $dto): JsonResponse
    {
        return $this->json($this->specialistService->save($dto));
    }
}
