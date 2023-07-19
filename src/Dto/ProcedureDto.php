<?php

namespace App\Dto;

use Symfony\Component\Validator\Constraints as Assert;

class ProcedureDto
{
    public function __construct(
        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\NotNull(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 12, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        private string             $konkursId,

        #[Assert\NotBlank(message: 'Параметр не может быть пустым!')]
        #[Assert\Length(max: 40, maxMessage: 'Параметр не может быть больше {{ limit }} символов!')]
        #[Assert\Regex(pattern: '/^\d{2}-\d{7}-\d{3}-\d{4}$/',
            message: 'Неверный формат: 11-0000001-100-2023 ->
             11 – константа,  0000001 – счетчик, 100 – код организатора, 2023 – год создания')]
        private string             $konkursNr,

//        #[Assert\NotBlank(message: 'Параметр konkursName не может быть пустым!')]
        #[Assert\Length(max: 255, maxMessage: 'Параметр konkursName не может быть больше {{ limit }} символов!')]
        private string             $konkursName,

        private string             $burks,


        private string             $orgKey,


        private string             $stat,

        #[Assert\Regex(pattern: '/^\d{4}-\d{2}-\d{2}$/', message: 'Неверный формат: 2021-09-15')]
        private string $crtDate,

        #[Assert\Regex(pattern: '/^(?:[01]\d|2[0-3]):[0-5]\d:[0-5]\d$/', message: 'Неверный формат: 10:00:00')]
        private string $crtTime,

        private string             $crtUser,
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
    public function getKonkursNr(): string
    {
        return $this->konkursNr;
    }

    /**
     * @return string
     */
    public function getKonkursName(): string
    {
        return $this->konkursName;
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
    public function getOrgKey(): string
    {
        return $this->orgKey;
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
    public function getCrtDate(): string
    {
        return $this->crtDate;
    }

    /**
     * @return string
     */
    public function getCrtTime(): string
    {
        return $this->crtTime;
    }

    /**
     * @return string
     */
    public function getCrtUser(): string
    {
        return $this->crtUser;
    }

}
