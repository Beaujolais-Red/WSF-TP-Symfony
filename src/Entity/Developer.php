<?php

namespace App\Entity;

use App\Repository\DeveloperRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DeveloperRepository::class)
 */
class Developer
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Country;

    /**
     * @ORM\ManyToMany(targetEntity=Console::class, mappedBy="developer_id")
     */
    private $console_id;

    /**
     * @ORM\OneToMany(targetEntity=Games::class, mappedBy="developer_id", orphanRemoval=true)
     */
    private $game_id;

    public function __construct()
    {
        $this->console_id = new ArrayCollection();
        $this->game_id = new ArrayCollection();
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

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(?string $Country): self
    {
        $this->Country = $Country;

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
            $consoleId->addDeveloperId($this);
        }

        return $this;
    }

    public function removeConsoleId(Console $consoleId): self
    {
        if ($this->console_id->removeElement($consoleId)) {
            $consoleId->removeDeveloperId($this);
        }

        return $this;
    }

    /**
     * @return Collection|Games[]
     */
    public function getGameId(): Collection
    {
        return $this->game_id;
    }

    public function addGameId(Games $gameId): self
    {
        if (!$this->game_id->contains($gameId)) {
            $this->game_id[] = $gameId;
            $gameId->setDeveloperId($this);
        }

        return $this;
    }

    public function removeGameId(Games $gameId): self
    {
        if ($this->game_id->removeElement($gameId)) {
            // set the owning side to null (unless already changed)
            if ($gameId->getDeveloperId() === $this) {
                $gameId->setDeveloperId(null);
            }
        }

        return $this;
    }
}
