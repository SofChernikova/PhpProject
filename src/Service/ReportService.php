<?php

namespace App\Service;


use App\Dto\ReportResponse;

class ReportService
{
    public function __construct(private ProcedureService $procedureService,
                                private LotService       $lotService,
                                private OfferService     $offerService)
    {
    }

    public function createReport($name)
    {
        $date = new \DateTimeImmutable('now');
        $procedures = $this->procedureService->findByName($name);

        $lots = array($procedures[0]->getKonkursId() => $this->lotService->findAllByProcedureId($procedures[0]->getKonkursId()));
        $offers = array($procedures[0]->getKonkursId() => $this->offerService->findAllByProcedureId($procedures[0]->getKonkursId()));
        $suppliers = array($procedures[0]->getBurks());
        for ($i = 1; $i < count($procedures); $i++) {
            $id = $procedures[$i]->getKonkursId();
            $lots += array($id => $this->lotService->findAllByProcedureId($id));
            $offers += array($id => $this->offerService->findAllByProcedureId($id));
            $suppliers += array($procedures[$i]->getBurks());
        }

        return new ReportResponse($date, count($procedures), $suppliers, $procedures, $lots, $offers);

    }
}
