<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlbumRepository::class)]
class Album
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $album_name = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $release_date = null;

    #[ORM\Column(nullable: true)]
    private ?int $album_duration = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $producer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img_cover_file = null;

    #[ORM\ManyToMany(targetEntity: Artist::class, mappedBy: 'albums')]
    private Collection $artists;

    #[ORM\ManyToMany(targetEntity: Song::class, inversedBy: 'albums')]
    private Collection $songs;

    public function __construct()
    {
        $this->artists = new ArrayCollection();
        $this->songs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAlbumName(): ?string
    {
        return $this->album_name;
    }

    public function setAlbumName(string $album_name): static
    {
        $this->album_name = $album_name;

        return $this;
    }

    public function getReleaseDate(): ?\DateTimeInterface
    {
        return $this->release_date;
    }

    public function setReleaseDate(?\DateTimeInterface $release_date): static
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getAlbumDuration(): ?int
    {
        return $this->album_duration;
    }

    public function setAlbumDuration(?int $album_duration): static
    {
        $this->album_duration = $album_duration;

        return $this;
    }

    public function getProducer(): ?string
    {
        return $this->producer;
    }

    public function setProducer(?string $producer): static
    {
        $this->producer = $producer;

        return $this;
    }

    public function getImgCoverFile(): ?string
    {
        return $this->img_cover_file;
    }

    public function setImgCoverFile(?string $img_cover_file): static
    {
        $this->img_cover_file = $img_cover_file;

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
            $artist->addAlbum($this);
        }

        return $this;
    }

    public function removeArtist(Artist $artist): static
    {
        if ($this->artists->removeElement($artist)) {
            $artist->removeAlbum($this);
        }

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
