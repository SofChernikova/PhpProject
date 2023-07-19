<?php

namespace App\Controller;

use App\Dto\ProcedureDto;
use App\Service\ProcedureService;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/procedure')]
class ProcedureController extends AbstractController
{
    public function __construct(private ProcedureService $procedureService)
    {
    }
    #[Route('/procedure/all', name: 'all procedures', methods: 'GET')]
    public function allProcedures(Request $request): JsonResponse
    {
        //todo переделать на свой реквест
        return $this->json($this->procedureService->findAll($request));
    }

    #[Route('/{konkursId}', name: 'procedure by konkursId')]
    public function procedureById($konkursId): JsonResponse
    {
        return $this->json($this->procedureService->findById($konkursId));
    }

    #[Route('/procedure/save', name: 'procedure save', methods: 'POST')]
    public function save(#[MapRequestPayload] ProcedureDto $dto): JsonResponse
    {
        return $this->json($this->procedureService->save($dto));
    }

}
