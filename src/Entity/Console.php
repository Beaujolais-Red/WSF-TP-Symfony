<?php

namespace App\Entity;

use App\Repository\ConsoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\ManyToMany(targetEntity=Games::class, inversedBy="console_id")
     */
    private $game_id;

    /**
     * @ORM\ManyToMany(targetEntity=Developer::class, inversedBy="console_id")
     */
    private $developer_id;

    public function __construct()
    {
        $this->game_id = new ArrayCollection();
        $this->developer_id = new ArrayCollection();
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

    /**
     * @return Collection|games[]
     */
    public function getGameId(): Collection
    {
        return $this->game_id;
    }

    public function addGameId(games $gameId): self
    {
        if (!$this->game_id->contains($gameId)) {
            $this->game_id[] = $gameId;
        }

        return $this;
    }

    public function removeGameId(games $gameId): self
    {
        $this->game_id->removeElement($gameId);

        return $this;
    }

    /**
     * @return Collection|developer[]
     */
    public function getDeveloperId(): Collection
    {
        return $this->developer_id;
    }

    public function addDeveloperId(developer $developerId): self
    {
        if (!$this->developer_id->contains($developerId)) {
            $this->developer_id[] = $developerId;
        }

        return $this;
    }

    public function removeDeveloperId(developer $developerId): self
    {
        $this->developer_id->removeElement($developerId);

        return $this;
    }
}
