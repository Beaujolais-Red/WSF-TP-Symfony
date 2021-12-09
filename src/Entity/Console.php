<?php

namespace App\Entity;

use App\Repository\ConsoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ConsoleRepository::class)
 */
class Console
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $FreeOnline;

    /**
     * @ORM\Column(type="integer")
     */
    private $Price;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Retrocompability;

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

    public function getFreeOnline(): ?bool
    {
        return $this->FreeOnline;
    }

    public function setFreeOnline(bool $FreeOnline): self
    {
        $this->FreeOnline = $FreeOnline;

        return $this;
    }

    public function getPrice(): ?int
    {
        return $this->Price;
    }

    public function setPrice(int $Price): self
    {
        $this->Price = $Price;

        return $this;
    }

    public function getRetrocompability(): ?bool
    {
        return $this->Retrocompability;
    }

    public function setRetrocompability(?bool $Retrocompability): self
    {
        $this->Retrocompability = $Retrocompability;

        return $this;
    }
}