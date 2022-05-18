<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Nullable;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 20)]
    private $nip;

    #[ORM\Column(type: 'string', length: 20)]
    private $regon;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'boolean')]
    private $isVatPayer;

    #[ORM\Column(type: 'string', length: 100)]
    private $street;

    #[ORM\Column(type: 'string', length: 10)]
    private $propertyNum;

    #[ORM\Column(type: 'string', length: 10)]
    private $flatNum;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNip(): ?string
    {
        return $this->nip;
    }

    public function setNip(string $nip): self
    {
        $this->nip = $nip;

        return $this;
    }

    public function getRegon(): ?string
    {
        return $this->regon;
    }

    public function setRegon(string $regon): self
    {
        $this->regon = $regon;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function isIsVatPayer(): ?bool
    {
        return $this->isVatPayer;
    }

    public function setIsVatPayer(bool $isVatPayer): self
    {
        $this->isVatPayer = $isVatPayer;

        return $this;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): self
    {
        $this->street = $street;

        return $this;
    }

    public function getPropertyNum(): ?string
    {
        return $this->propertyNum;
    }

    public function setPropertyNum(string $propertyNum): self
    {
        $this->propertyNum = $propertyNum;

        return $this;
    }

    public function getFlatNum(): ?string
    {
        return $this->flatNum;
    }

    public function setFlatNum(string $flatNum): self
    {
        $this->flatNum = $flatNum;

        return $this;
    }
}
