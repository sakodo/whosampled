<?php

namespace App\DataFixtures;


use App\Entity\Song;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SongFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $songs = $this->getSongs();
        foreach ($songs as $song) {
            $song_name = $song['song_name'];
            $song_duration = $song['song_duration'];
            $audio_song_file = $song['audio_song_file'];

            $song = new Song();
            $song->setSongName($song_name);
            $song->setSongDuration($song_duration);
            $song->setAudioSongFile($audio_song_file);
            $manager->persist($song);
        }
        $manager->flush();
    }

    private function getSongs(): array
    {
        return [
            [
                "song_name" => "Da Funk",
                "song_duration" => 300,
                "audio_song_file" => "da_funk.mp3"
            ],
            [
                "song_name" => "Around the World",
                "song_duration" => 420,
                "audio_song_file" => "around_the_world.mp3"
            ],
            [
                "song_name" => "Revolution 909",
                "song_duration" => 360,
                "audio_song_file" => "revolution_909.mp3"
            ],
            [
                "song_name" => "Burnin'",
                "song_duration" => 360,
                "audio_song_file" => "burnin.mp3"
            ],
            [
                "song_name" => "Indo Silver Club",
                "song_duration" => 240,
                "audio_song_file" => "indo_silver_club.mp3"
            ],
            [
                "song_name" => "Alive",
                "song_duration" => 300,
                "audio_song_file" => "alive.mp3"
            ],
            [
                "song_name" => "Funk Ad",
                "song_duration" => 120,
                "audio_song_file" => "funk_ad.mp3"
            ],
            [
                "song_name" => "Veridis Quo",
                "song_duration" => 300,
                "audio_song_file" => "veridis_quo.mp3"
            ],
            [
                "song_name" => "Short Circuit",
                "song_duration" => 180,
                "audio_song_file" => "short_circuit.mp3"
            ],
            [
                "song_name" => "Face to Face",
                "song_duration" => 180,
                "audio_song_file" => "face_to_face.mp3"
            ],
            [
                "song_name" => "Too Long",
                "song_duration" => 600,
                "audio_song_file" => "too_long.mp3"
            ]
        ];
        
            
    }
}