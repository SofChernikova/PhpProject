<?php

namespace App\Entity;

use App\Repository\BalanceUnitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BalanceUnitRepository::class)]
#[ORM\Table(name: "T001")]
class BalanceUnit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 4)]
    private ?string $burks = null;

    #[ORM\Column(length: 25)]
    private ?string $butxt = null;

//    #[ORM\OneToMany(mappedBy: 'burks', targetEntity: Procedure::class)]
//    private Collection $procedures;

    public function __construct()
    {
//        $this->procedures = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBurks(): ?string
    {
        return $this->burks;
    }

    public function __toString(): string
    {
        return $this->burks;
    }

    public function setBurks(string $burks): static
    {
        $this->burks = $burks;

        return $this;
    }

    public function getButxt(): ?string
    {
        return $this->butxt;
    }

    public function setButxt(string $butxt): static
    {
        $this->butxt = $butxt;

        return $this;
    }

//    /**
//     * @return Collection<int, Procedure>
//     */
//    public function getProcedures(): Collection
//    {
//        return $this->procedures;
//    }
//
//    public function addProcedure(Procedure $procedure): static
//    {
//        if (!$this->procedures->contains($procedure)) {
//            $this->procedures->add($procedure);
//            $procedure->setBurks($this);
//        }
//
//        return $this;
//    }
//
//    public function removeProcedure(Procedure $procedure): static
//    {
//        if ($this->procedures->removeElement($procedure)) {
//            // set the owning side to null (unless already changed)
//            if ($procedure->getBurks() === $this) {
//                $procedure->setBurks(null);
//            }
//        }
//
//        return $this;
//    }
}
