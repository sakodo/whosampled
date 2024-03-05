<?php

namespace App\Entity;

use App\Repository\SongRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SongRepository::class)]
class Song
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $song_name = null;

    #[ORM\Column(nullable: true)]
    private ?int $song_duration = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $audio_song_file = null;

    #[ORM\ManyToMany(targetEntity: Artist::class, mappedBy: 'songs')]
    private Collection $artists;

    #[ORM\ManyToMany(targetEntity: Album::class, mappedBy: 'songs')]
    private Collection $albums;

    #[ORM\ManyToMany(targetEntity: Sample::class, mappedBy: 'songs')]
    private Collection $samples;

    #[ORM\ManyToMany(targetEntity: Plateform::class, mappedBy: 'songs')]
    private Collection $plateforms;

    public function __construct()
    {
        $this->artists = new ArrayCollection();
        $this->albums = new ArrayCollection();
        $this->samples = new ArrayCollection();
        $this->plateforms = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSongName(): ?string
    {
        return $this->song_name;
    }

    public function setSongName(string $song_name): static
    {
        $this->song_name = $song_name;

        return $this;
    }

    public function getSongDuration(): ?int
    {
        return $this->song_duration;
    }

    public function setSongDuration(?int $song_duration): static
    {
        $this->song_duration = $song_duration;

        return $this;
    }

    public function getAudioSongFile(): ?string
    {
        return $this->audio_song_file;
    }

    public function setAudioSongFile(?string $audio_song_file): static
    {
        $this->audio_song_file = $audio_song_file;

        return $this;
    }

    /**
     * @return Collection<int, Artist>
     */
    public function getArtists(): Collection
    {
        return $this->artists;
    }

    public function addArtist(Artist $artist): static
    {
        if (!$this->artists->contains($artist)) {
            $this->artists->add($artist);
            $artist->addSong($this);
        }

        return $this;
    }

    public function removeArtist(Artist $artist): static
    {
        if ($this->artists->removeElement($artist)) {
            $artist->removeSong($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Album>
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbum(Album $album): static
    {
        if (!$this->albums->contains($album)) {
            $this->albums->add($album);
            $album->addSong($this);
        }

        return $this;
    }

    public function removeAlbum(Album $album): static
    {
        if ($this->albums->removeElement($album)) {
            $album->removeSong($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Sample>
     */
    public function getSamples(): Collection
    {
        return $this->samples;
    }

    public function addSample(Sample $sample): static
    {
        if (!$this->samples->contains($sample)) {
            $this->samples->add($sample);
            $sample->addSong($this);
        }

        return $this;
    }

    public function removeSample(Sample $sample): static
    {
        if ($this->samples->removeElement($sample)) {
            $sample->removeSong($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Plateform>
     */
    public function getPlateforms(): Collection
    {
        return $this->plateforms;
    }

    public function addPlateform(Plateform $plateform): static
    {
        if (!$this->plateforms->contains($plateform)) {
            $this->plateforms->add($plateform);
            $plateform->addSong($this);
        }

        return $this;
    }

    public function removePlateform(Plateform $plateform): static
    {
        if ($this->plateforms->removeElement($plateform)) {
            $plateform->removeSong($this);
        }

        return $this;
    }
}
