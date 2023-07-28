<?php

namespace App\Entity;

use App\Repository\SpecialistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpecialistRepository::class)]
#[ORM\Table(name: "ZTINMM_TK_PERS")]
class Specialist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(fetch: 'EAGER')]
    #[ORM\JoinColumn(name: 'konkurs_id_id', referencedColumnName: 'konkurs_id', nullable: false)]
    private ?Procedure $konkursId = null;

    #[ORM\Column]
    private ?int $tabix = null;

    #[ORM\Column(length: 5)]
    private ?string $persFunc = null;

    #[ORM\Column(length: 12)]
    private ?string $persId = null;

    #[ORM\Column(length: 70)]
    private ?string $persFio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getKonkursId(): ?Procedure
    {
        return $this->konkursId;
    }

    public function setKonkursId(?Procedure $konkursId): static
    {
        $this->konkursId = $konkursId;

        return $this;
    }

    public function getTabix(): ?int
    {
        return $this->tabix;
    }

    public function setTabix(int $tabix): static
    {
        $this->tabix = $tabix;

        return $this;
    }

    public function getPersFunc(): ?string
    {
        return $this->persFunc;
    }

    public function setPersFunc(string $persFunc): static
    {
        $this->persFunc = $persFunc;

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

    public function getPersFio(): ?string
    {
        return $this->persFio;
    }

    public function setPersFio(string $persFio): static
    {
        $this->persFio = $persFio;

        return $this;
    }
}
