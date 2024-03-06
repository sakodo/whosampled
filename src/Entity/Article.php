<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(length: 255)]
    private ?string $album_name = null;

    #[ORM\Column]
    private ?int $release_date = null;

    #[ORM\Column(length: 255)]
    private ?string $songs = null;

    #[ORM\Column(length: 255)]
    private ?string $album_duration = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImage(): ?string
    {
        return $this->img;
    }

    public function setImage(?string $image): static
    {
        $this->img = $image;

        return $this;
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

    public function getReleaseDate(): ?int
    {
        return $this->release_date;
    }

    public function setReleaseDate(int $release_date): static
    {
        $this->release_date = $release_date;

        return $this;
    }

    public function getSongs(): ?string
    {
        return $this->songs;
    }

    public function setSongs(string $songs): static
    {
        $this->songs = $songs;

        return $this;
    }

    public function getAlbumDuration(): ?string
    {
        return $this->album_duration;
    }

    public function setAlbumDuration(string $album_duration): static
    {
        $this->album_duration = $album_duration;

        return $this;
    }
}
