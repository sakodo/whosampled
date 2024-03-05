<?php

namespace App\Entity;

use App\Repository\PlateformRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlateformRepository::class)]
class Plateform
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $plateform_name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_plateform_file = null;

    #[ORM\ManyToMany(targetEntity: Song::class, inversedBy: 'plateforms')]
    private Collection $songs;

    public function __construct()
    {
        $this->songs = new ArrayCollection();
    }

  

  

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlateformName(): ?string
    {
        return $this->plateform_name;
    }

    public function setPlateformName(string $plateform_name): static
    {
        $this->plateform_name = $plateform_name;

        return $this;
    }

    public function getImgPlateformFile(): ?string
    {
        return $this->img_plateform_file;
    }

    public function setImgPlateformFile(?string $img_plateform_file): static
    {
        $this->img_plateform_file = $img_plateform_file;

        return $this;
    }

    /**
     * @return Collection<int, Song>
     */
    public function getSongs(): Collection
    {
        return $this->songs;
    }

    public function addSong(Song $song): static
    {
        if (!$this->songs->contains($song)) {
            $this->songs->add($song);
        }

        return $this;
    }

    public function removeSong(Song $song): static
    {
        $this->songs->removeElement($song);

        return $this;
    }

 
}
