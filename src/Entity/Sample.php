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

 

    #[ORM\ManyToMany(targetEntity: Song::class, inversedBy: 'samples')]
    private Collection $songs;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sample_song_origin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sample_artist_origin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $song_name = null;



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

    public function getSampleSongOrigin(): ?string
    {
        return $this->sample_song_origin;
    }

    public function setSampleSongOrigin(?string $sample_song_origin): static
    {
        $this->sample_song_origin = $sample_song_origin;

        return $this;
    }

    public function getSampleArtistOrigin(): ?string
    {
        return $this->sample_artist_origin;
    }

    public function setSampleArtistOrigin(?string $sample_artist_origin): static
    {
        $this->sample_artist_origin = $sample_artist_origin;

        return $this;
    }

    public function getSongName(): ?string
    {
        return $this->song_name;
    }

    public function setSongName(?string $song_name): static
    {
        $this->song_name = $song_name;

        return $this;
    }


   
}
