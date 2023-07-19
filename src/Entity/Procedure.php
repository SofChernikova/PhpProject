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
    #[ORM\ManyToOne(fetch: 'EAGER', inversedBy: 'procedures')]
    #[ORM\JoinColumn(referencedColumnName: 'burks', nullable: false)]
    #[ORM\Column(name: 'burks_id', length: 255)]
    private ?string $burks;

    #[ORM\Column(length: 3)]
    private ?string $orgKey;

    #[ORM\Column(length: 5)]
    private ?string $stat;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $crtDate;

    #[ORM\Column(type: Types::TIME_IMMUTABLE)]
    private ?\DateTimeImmutable $crtTime;

    #[ORM\Column(length: 12)]
    private ?string $crtUser;

//    #[ORM\OneToMany(mappedBy: 'konkursId', targetEntity: Lot::class, fetch: 'EAGER', orphanRemoval: true)]
//    private Collection $lots;

    public function __toString(): string
    {
        return $this->konkursId;
    }

//    #[ORM\OneToMany(mappedBy: 'konkursId', targetEntity: Offer::class, orphanRemoval: true)]
//    private Collection $offers;
//
//    #[ORM\OneToMany(mappedBy: 'konkursId', targetEntity: Specialist::class)]
//    private Collection $specialists;

//    #[ORM\ManyToMany(targetEntity: Specialist::class, mappedBy: 'konkursId')]
//    private Collection $specialists;



    public function __construct()
    {
//        $this->lots = new ArrayCollection();
//        $this->offers = new ArrayCollection();
//        $this->specialists = new ArrayCollection();
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

    public function getCrtDate(): ?\DateTimeImmutable
    {
        return $this->crtDate;
    }

    /**
     * @throws \Exception
     */
    public function setCrtDate(DateTimeImmutable $crtDate): static
    {
//        $date = new \DateTimeImmutable();
//        $formattedDate = $date->format('Y-m-d');

        //todo проверить работоспособность

        $this->crtDate = $crtDate->format('Y-m-d');

        return $this;
    }

    public function getCrtTime(): ?\DateTimeImmutable
    {
        return $this->crtTime;
    }

    public function setCrtTime(DateTimeImmutable $crtTime): static
    {
        $this->crtTime = $crtTime->format('H:i:s');

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

//    /**
//     * @return Collection<int, Lot>
//     */
//    public function getLots(): Collection
//    {
//        return $this->lots;
//    }
//
//    public function addLot(Lot $lot): static
//    {
//        if (!$this->lots->contains($lot)) {
//            $this->lots->add($lot);
//            $lot->setKonkursId($this);
//        }
//
//        return $this;
//    }
//
//    public function removeLot(Lot $lot): static
//    {
//        if ($this->lots->removeElement($lot)) {
//            // set the owning side to null (unless already changed)
//            if ($lot->getKonkursId() === $this) {
//                $lot->setKonkursId(null);
//            }
//        }
//
//        return $this;
//    }
//
//    /**
//     * @return Collection<int, Offer>
//     */
//    public function getOffers(): Collection
//    {
//        return $this->offers;
//    }
//
//    public function addOffer(Offer $offer): static
//    {
//        if (!$this->offers->contains($offer)) {
//            $this->offers->add($offer);
//            $offer->setKonkursId($this);
//        }
//
//        return $this;
//    }
//
//    public function removeOffer(Offer $offer): static
//    {
//        if ($this->offers->removeElement($offer)) {
//            // set the owning side to null (unless already changed)
//            if ($offer->getKonkursId() === $this) {
//                $offer->setKonkursId(null);
//            }
//        }
//
//        return $this;
//    }
//
//    /**
//     * @return Collection<int, Specialist>
//     */
//    public function getSpecialists(): Collection
//    {
//        return $this->specialists;
//    }
//
//    public function addSpecialist(Specialist $specialist): static
//    {
//        if (!$this->specialists->contains($specialist)) {
//            $this->specialists->add($specialist);
//            $specialist->addKonkursId($this);
//        }
//
//        return $this;
//    }
//
//    public function removeSpecialist(Specialist $specialist): static
//    {
//        if ($this->specialists->removeElement($specialist)) {
//            $specialist->removeKonkursId($this);
//        }
//
//        return $this;
//    }
}
