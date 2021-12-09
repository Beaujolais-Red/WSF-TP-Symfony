<?php

namespace App\Entity;

use App\Repository\GamesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GamesRepository::class)
 */
class Games
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
     * @ORM\Column(type="integer")
     */
    private $PegiRating;

    /**
     * @ORM\Column(type="integer")
     */
    private $Price;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $Multiplayer;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2, nullable=true)
     */
    private $LastUpdateVersion;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $ESport;

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

    public function getPegiRating(): ?int
    {
        return $this->PegiRating;
    }

    public function setPegiRating(int $PegiRating): self
    {
        $this->PegiRating = $PegiRating;

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

    public function getMultiplayer(): ?bool
    {
        return $this->Multiplayer;
    }

    public function setMultiplayer(?bool $Multiplayer): self
    {
        $this->Multiplayer = $Multiplayer;

        return $this;
    }

    public function getLastUpdateVersion(): ?string
    {
        return $this->LastUpdateVersion;
    }

    public function setLastUpdateVersion(?string $LastUpdateVersion): self
    {
        $this->LastUpdateVersion = $LastUpdateVersion;

        return $this;
    }

    public function getESport(): ?bool
    {
        return $this->ESport;
    }

    public function setESport(?bool $ESport): self
    {
        $this->ESport = $ESport;

        return $this;
    }
}
