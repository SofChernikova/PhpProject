<?php

namespace App\Entity;

use App\Repository\ProcedureRepository;
use DateTimeImmutable;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProcedureRepository::class)]
#[ORM\Table(name: "ZTINMM_TK_H")]
class Procedure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 12)]
    private ?string $konkursId;

    #[ORM\Column(length: 40)]
    private ?string $konkursNr;

    #[ORM\Column(length: 255)]
    private ?string $konkursName;
    #[ORM\ManyToOne(fetch: 'EAGER')]
    #[ORM\JoinColumn(referencedColumnName: 'burks', nullable: false)]
    #[ORM\Column(name: 'burks_id', length: 255)]
    private ?string $burks;

    #[ORM\Column(length: 3)]
    private ?string $orgKey;

    #[ORM\Column(length: 5)]
    private ?string $stat;

    #[ORM\Column]
    private ?string $crtDate;

    #[ORM\Column]
    private ?string $crtTime;

    #[ORM\Column(length: 12)]
    private ?string $crtUser;

    public function __toString(): string
    {
        return $this->konkursId;
    }


    public function __construct()
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKonkursId(): ?string
    {
        return $this->konkursId;
    }

    public function setKonkursId(string $konkursId): static
    {
        $this->konkursId = $konkursId;

        return $this;
    }

    public function getKonkursNr(): ?string
    {
        return $this->konkursNr;
    }

    public function setKonkursNr(string $konkursNr): static
    {
        $this->konkursNr = $konkursNr;

        return $this;
    }

    public function getKonkursName(): ?string
    {
        return $this->konkursName;
    }

    public function setKonkursName(string $konkursName): static
    {
        $this->konkursName = $konkursName;

        return $this;
    }

    public function getBurks(): ?string
    {
        return $this->burks;
    }

    public function setBurks(?string $burks): static
    {
        $this->burks = $burks;

        return $this;
    }

    public function getOrgKey(): ?string
    {
        return $this->orgKey;
    }

    public function setOrgKey(string $orgKey): static
    {
        $this->orgKey = $orgKey;

        return $this;
    }

    public function getStat(): ?string
    {
        return $this->stat;
    }

    public function setStat(string $stat): static
    {
        $this->stat = $stat;

        return $this;
    }

    public function getCrtDate(): ?string
    {
        return $this->crtDate;
    }


    public function setCrtDate(string $crtDate): static
    {
//        $date = new \DateTimeImmutable();
//        $formattedDate = $date->format('Y-m-d');

        //todo проверить работоспособность

        $this->crtDate = $crtDate;

        return $this;
    }

    public function getCrtTime(): ?string
    {
        return $this->crtTime;
    }

    public function setCrtTime(string $crtTime): static
    {
        $this->crtTime = $crtTime;

        return $this;
    }

    public function getCrtUser(): ?string
    {
        return $this->crtUser;
    }

    public function setCrtUser(string $crtUser): static
    {
        $this->crtUser = $crtUser;

        return $this;
    }
}
