<?php

namespace App\Controller;


use App\Service\ReportService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ReportController extends AbstractController
{
    public function __construct(private ReportService $reportService)
    {
    }

    #[Route('/report/{name}', name: 'app_report')]
    public function createReport($name): JsonResponse
    {
        $report = $this->reportService->createReport($name);
        return $this->json($report);
    }

}
