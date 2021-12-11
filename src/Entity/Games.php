<?php

namespace App\Entity;

use App\Repository\GamesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToMany(targetEntity=Console::class, mappedBy="game_id")
     */
    private $console_id;

    /**
     * @ORM\ManyToOne(targetEntity=Developer::class, inversedBy="game_id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $developer_id;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="game_id")
     */
    private $genre_id;

    public function __construct()
    {
        $this->console_id = new ArrayCollection();
        $this->genre_id = new ArrayCollection();
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

    /**
     * @return Collection|Console[]
     */
    public function getConsoleId(): Collection
    {
        return $this->console_id;
    }

    public function addConsoleId(Console $consoleId): self
    {
        if (!$this->console_id->contains($consoleId)) {
            $this->console_id[] = $consoleId;
            $consoleId->addGameId($this);
        }

        return $this;
    }

    public function removeConsoleId(Console $consoleId): self
    {
        if ($this->console_id->removeElement($consoleId)) {
            $consoleId->removeGameId($this);
        }

        return $this;
    }

    public function getDeveloperId(): ?developer
    {
        return $this->developer_id;
    }

    public function setDeveloperId(?developer $developer_id): self
    {
        $this->developer_id = $developer_id;

        return $this;
    }

    /**
     * @return Collection|genre[]
     */
    public function getGenreId(): Collection
    {
        return $this->genre_id;
    }

    public function addGenreId(genre $genreId): self
    {
        if (!$this->genre_id->contains($genreId)) {
            $this->genre_id[] = $genreId;
        }

        return $this;
    }

    public function removeGenreId(genre $genreId): self
    {
        $this->genre_id->removeElement($genreId);

        return $this;
    }
}
