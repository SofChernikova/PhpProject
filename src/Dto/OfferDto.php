<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class OfferDto
{
    public function __construct(
        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12,
            maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $konkursId,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12,
            maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $lotId,

        private string             $tabix,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 10, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $lifnr,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 132, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $lifnrName,

        #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'Неверный формат: 2021-09-15')]
        private string $orfDate,

        #[Assert\Regex(pattern: '/^(?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$/', message: 'Неверный формат: 10:00:00')]
        private string $orfTime,

        private string             $priceNds,
        private string             $priceWithNds,

        #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'Неверный формат: 2021-09-15')]
        private string $deliverDate,

        #[Assert\Regex(pattern: '/^(?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$/', message: 'Неверный формат: 10:00:00')]
        private string $deliverTime,

       #[Assert\Length(max: 1, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $winFlg
    )
    {
    }

    /**
     * @return string
     */
    public function getKonkursId(): string
    {
        return $this->konkursId;
    }

    /**
     * @return string
     */
    public function getLotId(): string
    {
        return $this->lotId;
    }

    /**
     * @return string
     */
    public function getTabix(): string
    {
        return $this->tabix;
    }

    /**
     * @return string
     */
    public function getLifnr(): string
    {
        return $this->lifnr;
    }

    /**
     * @return string
     */
    public function getLifnrName(): string
    {
        return $this->lifnrName;
    }

    /**
     * @return string
     */
    public function getOrfDate(): string
    {
        return $this->orfDate;
    }

    /**
     * @return string
     */
    public function getOrfTime(): string
    {
        return $this->orfTime;
    }

    /**
     * @return string
     */
    public function getPriceNds(): string
    {
        return $this->priceNds;
    }

    /**
     * @return string
     */
    public function getPriceWithNds(): string
    {
        return $this->priceWithNds;
    }

    /**
     * @return string
     */
    public function getDeliverDate(): string
    {
        return $this->deliverDate;
    }

    /**
     * @return string
     */
    public function getDeliverTime(): string
    {
        return $this->deliverTime;
    }

    /**
     * @return string
     */
    public function getWinFlg(): string
    {
        return $this->winFlg;
    }



}

