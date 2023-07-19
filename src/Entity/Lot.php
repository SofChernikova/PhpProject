<?php

namespace App\Entity;

use App\Repository\LotRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LotRepository::class)]
#[ORM\Table(name: "ZINMM_SOF_LOT_H")]
class Lot
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: 'id')]
    private int $lotLey;

    #[ORM\Column(length: 12)]
    private ?string $lotId;
    #[ORM\ManyToOne(fetch: 'EAGER')]
    #[ORM\JoinColumn(name: 'konkurs_id_id', referencedColumnName: 'konkurs_id', nullable: false)]
    private ?Procedure $konkursId;

    public function __toString(): string
    {
        return $this->lotId;
    }


    #[ORM\Column(length: 30)]
    private ?string $lotNr;

    #[ORM\Column(length: 132)]
    private ?string $lotName;

    #[ORM\Column(length: 4)]
    private ?string $ekorg;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $finanLimitWvat;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $finanLimitWovat;

    #[ORM\Column(length: 2)]
    private ?string $vatRate;

    #[ORM\Column(length: 1)]
    private ?string $calsNds;

    public function __construct()
    {
    }



    public function getId(): int
    {
        return $this->lotLey;
    }

    public function getLotId(): ?string
    {
        return $this->lotId;
    }

    public function setLotId(string $lotId): static
    {
        $this->lotId = $lotId;

        return $this;
    }

    public function getKonkursId(): ?string
    {
        return $this->konkursId->getKonkursId();
    }

    public function setKonkursId(?Procedure $procedure): static
    {
        $this->konkursId = $procedure;
        return $this;
    }

    public function getLotNr(): ?string
    {
        return $this->lotNr;
    }

    public function setLotNr(string $lotNr): static
    {
        $this->lotNr = $lotNr;

        return $this;
    }

    public function getLotName(): ?string
    {
        return $this->lotName;
    }

    public function setLotName(string $lotName): static
    {
        $this->lotName = $lotName;

        return $this;
    }

    public function getEkorg(): ?string
    {
        return $this->ekorg;
    }

    public function setEkorg(string $ekorg): static
    {
        $this->ekorg = $ekorg;

        return $this;
    }

    public function getFinanLimitWvat(): ?string
    {
        return $this->finanLimitWvat;
    }

    public function setFinanLimitWvat(string $finanLimitWvat): static
    {
        $this->finanLimitWvat = $finanLimitWvat;

        return $this;
    }

    public function getFinanLimitWovat(): ?string
    {
        return $this->finanLimitWovat;
    }

    public function setFinanLimitWovat(string $finanLimitWovat): static
    {
        $this->finanLimitWovat = $finanLimitWovat;

        return $this;
    }

    public function getVatRate(): ?string
    {
        return $this->vatRate;
    }

    public function setVatRate(string $vatRate): static
    {
        $this->vatRate = $vatRate;

        return $this;
    }

    public function getCalsNds(): ?string
    {
        return $this->calsNds;
    }

    public function setCalsNds(string $calsNds): static
    {
        $this->calsNds = $calsNds;

        return $this;
    }

}
