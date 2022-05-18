<?php

namespace App\Entity;

use App\Repository\EmployeeRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EmployeeRepository::class)]
class Employee
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $Name;


    #[ORM\Column(type: 'string', length: 255)]
    private ?string $surname;

    #[ORM\Column(type: 'string', length: 255)]
    private ?string $position;

    #[ORM\Column(type: 'date')]
    private ?DateTimeInterface $birth_date;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $vacation_days;

    /**
     * @return DateTimeInterface|null
     */
    public function getBirthDate(): ?DateTimeInterface
    {
        return $this->birth_date;
    }

    /**
     * @param DateTimeInterface|null $birth_date
     */
    public function setBirthDate(?DateTimeInterface $birth_date): void
    {
        $this->birth_date = $birth_date;
    }

    /**
     * @return int|null
     */
    public function getVacationDays(): ?int
    {
        return $this->vacation_days;
    }

    /**
     * @param int|null $vacation_days
     */
    public function setVacationDays(?int $vacation_days): void
    {
        $this->vacation_days = $vacation_days;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getPosition(): ?string
    {
        return $this->position;
    }

    public function setPosition(string $position): self
    {
        $this->position = $position;

        return $this;
    }

}
