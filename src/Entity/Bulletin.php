<?php

namespace App\Entity;

use App\Repository\BulletinRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BulletinRepository::class)]
#[ORM\Table(name: "ZTINMM_TK_VOTE")]
class Bulletin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Procedure $konkursId = null;

    #[ORM\Column(length: 5)]
    private ?string $stat = null;

    #[ORM\Column(length: 12)]
    private ?string $persId = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Offer $lifnr = null;
//todo добавить название столбца
    #[ORM\Column(length: 1, nullable: true)]
    private ?string $voteRes = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $voteFinish = null;

    #[ORM\Column(length: 1, nullable: true)]
    private ?string $voteWin = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $voteDate = null;

    #[ORM\Column(type: Types::TIME_IMMUTABLE, nullable: true)]
    private ?\DateTimeImmutable $voteTime = null;

    #[ORM\Column(length: 12)]
    private ?string $voteUser = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKonkursId(): ?Procedure
    {
        return $this->konkursId;
    }

    public function setKonkursId(Procedure $konkursId): static
    {
        $this->konkursId = $konkursId;

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

    public function getPersId(): ?string
    {
        return $this->persId;
    }

    public function setPersId(string $persId): static
    {
        $this->persId = $persId;

        return $this;
    }

    public function getLifnr(): ?Offer
    {
        return $this->lifnr;
    }

    public function setLifnr(Offer $lifnr): static
    {
        $this->lifnr = $lifnr;

        return $this;
    }

    public function getVoteRes(): ?string
    {
        return $this->voteRes;
    }

    public function setVoteRes(string $voteRes): static
    {
        $this->voteRes = $voteRes;

        return $this;
    }

    public function getVoteFinish(): ?string
    {
        return $this->voteFinish;
    }

    public function setVoteFinish(?string $voteFinish): static
    {
        $this->voteFinish = $voteFinish;

        return $this;
    }

    public function getVoteWin(): ?string
    {
        return $this->voteWin;
    }

    public function setVoteWin(?string $voteWin): static
    {
        $this->voteWin = $voteWin;

        return $this;
    }

    public function getVoteDate(): ?\DateTimeImmutable
    {
        return $this->voteDate;
    }

    /**
     * @throws \Exception
     */
    public function setVoteDate(string $voteDate): static
    {
        $date = new \DateTimeImmutable($voteDate);
        $this->voteDate = $date->format('Y-m-d');

        return $this;
    }

    public function getVoteTime(): ?\DateTimeImmutable
    {
        return $this->voteTime;
    }

    public function setVoteTime(string $voteTime): static
    {
        $time = new \DateTimeImmutable($voteTime);
        $this->voteTime = $time->format('H:i:s');

        return $this;
    }

    public function getVoteUser(): ?string
    {
        return $this->voteUser;
    }

    public function setVoteUser(string $voteUser): static
    {
        $this->voteUser = $voteUser;

        return $this;
    }
}
