<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class BulletinDto
{
    public function __construct(
        #[Assert\NotBlank(message: 'Параметр не может быть пустым! Blank ')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым! Null')]
        #[Assert\Length(max: 12, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string  $konkursId,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 5, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $stat,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $persId,

        private string             $lifnr,

        #[Assert\Length(max: 1, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $voteRes,
        #[Assert\Length(max: 12, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $voteFinish,
        #[Assert\Length(max: 12, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $voteWin,

        #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'Неверный формат: 2021-09-15')]
        private string $voteDate,
        #[Assert\Regex(pattern: '/^(?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$/', message: 'Неверный формат: 10:00:00')]
        private string $voteTime,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $voteUser
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
    public function getStat(): string
    {
        return $this->stat;
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
    public function getLifnr(): string
    {
        return $this->lifnr;
    }

    /**
     * @return string
     */
    public function getVoteRes(): string
    {
        return $this->voteRes;
    }

    /**
     * @return string
     */
    public function getVoteFinish(): string
    {
        return $this->voteFinish;
    }

    /**
     * @return string
     */
    public function getVoteWin(): string
    {
        return $this->voteWin;
    }

    /**
     * @return string
     */
    public function getVoteDate(): string
    {
        return $this->voteDate;
    }

    /**
     * @return string
     */
    public function getVoteTime(): string
    {
        return $this->voteTime;
    }

    /**
     * @return string
     */
    public function getVoteUser(): string
    {
        return $this->voteUser;
    }


}
