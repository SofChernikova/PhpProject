<?php

namespace App\Dto;

use App\Entity\Lot;
use App\Entity\Procedure;
use Doctrine\DBAL\Types\Types;

class OfferDto
{
    public function __construct(
        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12,
            maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private ?string             $konkursId,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12,
            maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private ?string             $lotId,

        private ?string             $tabix,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 10, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private ?string             $lifnr,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 132, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private ?string             $lifnrName,

        #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'Неверный формат: 2021-09-15')]
        private ?\DateTimeImmutable $orfDate,

        #[Assert\Regex(pattern: '/^(?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$/', message: 'Неверный формат: 10:00:00')]
        private ?\DateTimeImmutable $orfTime,

        private ?string             $priceNds,
        private ?string             $priceWithNds,

        #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'Неверный формат: 2021-09-15')]
        private ?\DateTimeImmutable $deliverDate,

        #[Assert\Regex(pattern: '/^(?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$/', message: 'Неверный формат: 10:00:00')]
        private ?\DateTimeImmutable $deliverTime,

       #[Assert\Length(max: 1, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private ?string             $winFlg
    )
    {
    }

    /**
     * @return string|null
     */
    public function getKonkursId(): ?string
    {
        return $this->konkursId;
    }

    /**
     * @return string|null
     */
    public function getLotId(): ?string
    {
        return $this->lotId;
    }

    /**
     * @return string|null
     */
    public function getTabix(): ?string
    {
        return $this->tabix;
    }

    /**
     * @return string|null
     */
    public function getLifnr(): ?string
    {
        return $this->lifnr;
    }

    /**
     * @return string|null
     */
    public function getLifnrName(): ?string
    {
        return $this->lifnrName;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getOrfDate(): ?\DateTimeImmutable
    {
        return $this->orfDate;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getOrfTime(): ?\DateTimeImmutable
    {
        return $this->orfTime;
    }

    /**
     * @return string|null
     */
    public function getPriceNds(): ?string
    {
        return $this->priceNds;
    }

    /**
     * @return string|null
     */
    public function getPriceWithNds(): ?string
    {
        return $this->priceWithNds;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDeliverDate(): ?\DateTimeImmutable
    {
        return $this->deliverDate;
    }

    /**
     * @return \DateTimeImmutable|null
     */
    public function getDeliverTime(): ?\DateTimeImmutable
    {
        return $this->deliverTime;
    }

    /**
     * @return string|null
     */
    public function getWinFlg(): ?string
    {
        return $this->winFlg;
    }
}
//todo для децимал написать ограничения
