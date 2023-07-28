<?php

namespace App\Dto;
use Symfony\Component\Validator\Constraints as Assert;

class SpecialistDto
{
    public function __construct(
        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string $konkursId,

        private int    $tabix,
        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 5, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string $persFunc,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string $persId,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 70, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string $persFio
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
     * @return int
     */
    public function getTabix(): int
    {
        return $this->tabix;
    }

    /**
     * @return string
     */
    public function getPersFunc(): string
    {
        return $this->persFunc;
    }

    /**
     * @return string
     */
    public function getPersId(): string
    {
        return $this->persId;
    }

    /**
     * @return string
     */
    public function getPersFio(): string
    {
        return $this->persFio;
    }


}
