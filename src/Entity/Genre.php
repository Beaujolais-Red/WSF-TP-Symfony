<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
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
     * @ORM\ManyToMany(targetEntity=Games::class, mappedBy="genre_id")
     */
    private $game_id;

    public function __construct()
    {
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
            $gameId->addGenreId($this);
        }

        return $this;
    }

    public function removeGameId(Games $gameId): self
    {
        if ($this->game_id->removeElement($gameId)) {
            $gameId->removeGenreId($this);
        }

        return $this;
    }
}
