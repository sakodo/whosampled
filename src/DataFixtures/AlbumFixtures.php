<?php

namespace App\DataFixtures;

use App\Entity\Album;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AlbumFixtures extends Fixture
{
    public function load(ObjectManager $manager):void
    {
      $albums = $this->getAlbums();
      foreach ($albums as $album){
        $album_name = $album['album_name'];
        $release_date = $album['release_date'];
        $album_duration = $album['album_duration'];
        $producer = $album['producer'];
        $img_cover_file = $album['img_cover_file'];
    
        $album = new Album();
        $album->setAlbumName($album_name);
        $album->setReleaseDate(new \DateTime($release_date));
        $album->setAlbumDuration($album_duration);
        $album->setProducer($producer);
        $album->setImgCoverFile($img_cover_file);
        $manager->persist($album);
    }
    $manager->flush();
    
    }

    private function getAlbums(): array
    {
        return [
            [
                "album_name" => "Homework",
                "release_date" => "1997-01-20",
                "album_duration" => 3840,
                "producer" => "Daft Punk",
                "img_cover_file" => "homework_cover.jpg"
            ],
            [
                "album_name" => "Discovery",
                "release_date" => "2001-03-12",
                "album_duration" => 3600,
                "producer" => "Daft Punk",
                "img_cover_file" => "discovery_cover.jpg"
            ],
            [
                "album_name" => "Human After All",
                "release_date" => "2005-03-14",
                "album_duration" => 2700,
                "producer" => "Daft Punk",
                "img_cover_file" => "human_after_all_cover.jpg"
            ],
            [
                "album_name" => "Random Access Memories",
                "release_date" => "2013-05-17",
                "album_duration" => 4500,
                "producer" => "Daft Punk",
                "img_cover_file" => "random_access_memories_cover.jpg"
            ]
        ];
    }
}
