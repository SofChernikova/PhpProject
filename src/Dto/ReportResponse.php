<?php

namespace App\Dto;

class ReportResponse
{
    public function __construct(private \DateTimeImmutable $dateTimeImmutable,
    private int $procedureCount,
    private $suppliers,
    private $procedures,
    private $lots,
    private $offers,
    )
    {
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateTimeImmutable(): \DateTimeImmutable
    {
        return $this->dateTimeImmutable;
    }

    /**
     * @param \DateTimeImmutable $dateTimeImmutable
     */
    public function setDateTimeImmutable(\DateTimeImmutable $dateTimeImmutable): void
    {
        $this->dateTimeImmutable = $dateTimeImmutable;
    }

    /**
     * @return int
     */
    public function getProcedureCount(): int
    {
        return $this->procedureCount;
    }

    /**
     * @param int $procedureCount
     */
    public function setProcedureCount(int $procedureCount): void
    {
        $this->procedureCount = $procedureCount;
    }

    /**
     * @return mixed
     */
    public function getSuppliers()
    {
        return $this->suppliers;
    }

    /**
     * @param mixed $suppliers
     */
    public function setSuppliers($suppliers): void
    {
        $this->suppliers = $suppliers;
    }

    /**
     * @return mixed
     */
    public function getProcedures()
    {
        return $this->procedures;
    }

    /**
     * @param mixed $procedures
     */
    public function setProcedures($procedures): void
    {
        $this->procedures = $procedures;
    }

    /**
     * @return mixed
     */
    public function getLots()
    {
        return $this->lots;
    }

    /**
     * @param mixed $lots
     */
    public function setLots($lots): void
    {
        $this->lots = $lots;
    }

    /**
     * @return mixed
     */
    public function getOffers()
    {
        return $this->offers;
    }

    /**
     * @param mixed $offers
     */
    public function setOffers($offers): void
    {
        $this->offers = $offers;
    }
}
