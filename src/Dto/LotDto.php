<?php

namespace App\Dto;
use Symfony\Component\Validator\Constraints as Assert;
class LotDto
{
    public function __construct(
        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string  $lotId,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string  $konkursId,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 30, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private ?string $lotNr,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 132, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private ?string $lotName,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 4, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private ?string $ekorg,

        //todo тип децимал 6 знаков, 2 после .
        private ?string $finanLimitWvat,
        private ?string $finanLimitWovat,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 2, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private ?string $vatRate,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 1, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private ?string $calsNds,
    )
    {
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
    public function getKonkursId(): string
    {
        return $this->konkursId;
    }

    /**
     * @return string|null
     */
    public function getLotNr(): ?string
    {
        return $this->lotNr;
    }

    /**
     * @return string|null
     */
    public function getLotName(): ?string
    {
        return $this->lotName;
    }

    /**
     * @return string|null
     */
    public function getEkorg(): ?string
    {
        return $this->ekorg;
    }

    /**
     * @return string|null
     */
    public function getFinanLimitWvat(): ?string
    {
        return $this->finanLimitWvat;
    }

    /**
     * @return string|null
     */
    public function getFinanLimitWovat(): ?string
    {
        return $this->finanLimitWovat;
    }

    /**
     * @return string|null
     */
    public function getVatRate(): ?string
    {
        return $this->vatRate;
    }

    /**
     * @return string|null
     */
    public function getCalsNds(): ?string
    {
        return $this->calsNds;
    }
}
