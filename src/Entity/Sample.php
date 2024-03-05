<?php

namespace App\Entity;

use App\Repository\SampleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SampleRepository::class)]
class Sample
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $audio_sample_file = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sample_name = null;

    #[ORM\ManyToMany(targetEntity: Song::class, inversedBy: 'samples')]
    private Collection $songs;



    public function __construct()
    {
        $this->songs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAudioSampleFile(): ?string
    {
        return $this->audio_sample_file;
    }

    public function setAudioSampleFile(string $audio_sample_file): static
    {
        $this->audio_sample_file = $audio_sample_file;

        return $this;
    }

    public function getSampleName(): ?string
    {
        return $this->sample_name;
    }

    public function setSampleName(?string $sample_name): static
    {
        $this->sample_name = $sample_name;

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
