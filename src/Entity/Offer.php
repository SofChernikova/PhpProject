<?php

namespace App\Entity;

use App\Repository\OfferRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OfferRepository::class)]
#[ORM\Table(name: "ZTINMM_TK_OFR")]
class Offer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\ManyToOne(fetch: 'EAGER')]
    #[ORM\JoinColumn(name: 'konkurs_id_id', referencedColumnName: 'konkurs_id', nullable: false)]
    private ?Procedure $konkursId;

    #[ORM\ManyToOne(fetch: 'EAGER')]
    #[ORM\JoinColumn(name: 'lot_id_id', referencedColumnName: 'lot_id', nullable: false)]
    private ?Lot $lotId;


    public function __toString(): string
    {
        return $this->lifnr;
    }

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $tabix;

    #[ORM\Column(length: 10)]
    private ?string $lifnr;

    #[ORM\Column(length: 132)]
    private ?string $lifnrName;

    #[ORM\Column]
    private ?string $orfDate;

    #[ORM\Column]
    private ?string $orfTime;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $priceNds;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $priceWithNds;

    #[ORM\Column]
    private ?string $deliverDate;

    #[ORM\Column]
    private ?string $deliverTime;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $winFlg;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKonkursId(): ?string
    {
        return $this->konkursId->getKonkursId();
    }

    public function setKonkursId(?Procedure $konkursId): static
    {
        $this->konkursId = $konkursId;

        return $this;
    }


    public function getLotId(): ?string
    {
        return $this->lotId->getLotId();
    }

    public function setLotId(Lot $lotId): static
    {
        $this->lotId = $lotId;

        return $this;
    }

    public function getTabix(): ?string
    {
        return $this->tabix;
    }

    public function setTabix(string $tabix): static
    {
        $this->tabix = $tabix;

        return $this;
    }

    public function getLifnr(): ?string
    {
        return $this->lifnr;
    }

    public function setLifnr(string $lifnr): static
    {
        $this->lifnr = $lifnr;

        return $this;
    }

    public function getLifnrName(): ?string
    {
        return $this->lifnrName;
    }

    public function setLifnrName(string $lifnrName): static
    {
        $this->lifnrName = $lifnrName;

        return $this;
    }

    public function getOrfDate(): ?string
    {
        return $this->orfDate;
    }

    public function setOrfDate(string $orfDate): static
    {
        $this->orfDate = $orfDate;

        return $this;
    }

    public function getOrfTime(): ?string
    {
        return $this->orfTime;
    }

    public function setOrfTime(string $orfTime): static
    {
        $this->orfTime = $orfTime;

        return $this;
    }

    public function getPriceNds(): ?string
    {
        return $this->priceNds;
    }

    public function setPriceNds(string $priceNds): static
    {
        $this->priceNds = $priceNds;

        return $this;
    }

    public function getPriceWithNds(): ?string
    {
        return $this->priceWithNds;
    }

    public function setPriceWithNds(string $priceWithNds): static
    {
        $this->priceWithNds = $priceWithNds;

        return $this;
    }

    public function getDeliverDate(): ?string
    {
        return $this->deliverDate;
    }

    public function setDeliverDate(string $deliverDate): static
    {
        $this->deliverDate = $deliverDate;

        return $this;
    }

    public function getDeliverTime(): ?string
    {
        return $this->deliverTime;
    }

    public function setDeliverTime(string $deliverTime): static
    {
        $this->deliverTime = $deliverTime;

        return $this;
    }

    public function getWinFlg(): ?string
    {
        return $this->winFlg;
    }

    public function setWinFlg(?string $winFlg): static
    {
        $this->winFlg = $winFlg;

        return $this;
    }
}
