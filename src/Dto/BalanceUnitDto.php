<?php

namespace App\Dto;
use Symfony\Component\Validator\Constraints as Assert;

class BalanceUnitDto
{
    public function __construct(
        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 4, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string $burks,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        private string $butxt,)
    {
    }

    /**
     * @return string
     */
    public function getBurks(): string
    {
        return $this->burks;
    }

    /**
     * @return string
     */
    public function getButxt(): string
    {
        return $this->butxt;
    }
}
