<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240306123519 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE album (id INT AUTO_INCREMENT NOT NULL, album_name VARCHAR(255) NOT NULL, release_date DATE DEFAULT NULL, album_duration INT DEFAULT NULL, producer VARCHAR(255) DEFAULT NULL, img_cover_file VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE album_song (album_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_57E658E11137ABCF (album_id), INDEX IDX_57E658E1A0BDB2F3 (song_id), PRIMARY KEY(album_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE article (id INT AUTO_INCREMENT NOT NULL, img VARCHAR(255) DEFAULT NULL, album_name VARCHAR(255) NOT NULL, release_date INT NOT NULL, songs VARCHAR(255) NOT NULL, album_duration VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist (id INT AUTO_INCREMENT NOT NULL, artist_name VARCHAR(255) NOT NULL, img_artist_file VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist_album (artist_id INT NOT NULL, album_id INT NOT NULL, INDEX IDX_59945E10B7970CF8 (artist_id), INDEX IDX_59945E101137ABCF (album_id), PRIMARY KEY(artist_id, album_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE artist_song (artist_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_8F53683EB7970CF8 (artist_id), INDEX IDX_8F53683EA0BDB2F3 (song_id), PRIMARY KEY(artist_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateform (id INT AUTO_INCREMENT NOT NULL, plateform_name VARCHAR(255) NOT NULL, img_plateform_file VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plateform_song (plateform_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_249A991DCCAA542F (plateform_id), INDEX IDX_249A991DA0BDB2F3 (song_id), PRIMARY KEY(plateform_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sample (id INT AUTO_INCREMENT NOT NULL, audio_sample_file VARCHAR(255) NOT NULL, sample_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sample_song (sample_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_8FDBCCEC1B1FEA20 (sample_id), INDEX IDX_8FDBCCECA0BDB2F3 (song_id), PRIMARY KEY(sample_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE song (id INT AUTO_INCREMENT NOT NULL, song_name VARCHAR(255) NOT NULL, song_duration INT DEFAULT NULL, audio_song_file VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, img_user_file VARCHAR(255) DEFAULT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE album_song ADD CONSTRAINT FK_57E658E11137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE album_song ADD CONSTRAINT FK_57E658E1A0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_album ADD CONSTRAINT FK_59945E10B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_album ADD CONSTRAINT FK_59945E101137ABCF FOREIGN KEY (album_id) REFERENCES album (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_song ADD CONSTRAINT FK_8F53683EB7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE artist_song ADD CONSTRAINT FK_8F53683EA0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plateform_song ADD CONSTRAINT FK_249A991DCCAA542F FOREIGN KEY (plateform_id) REFERENCES plateform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plateform_song ADD CONSTRAINT FK_249A991DA0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sample_song ADD CONSTRAINT FK_8FDBCCEC1B1FEA20 FOREIGN KEY (sample_id) REFERENCES sample (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sample_song ADD CONSTRAINT FK_8FDBCCECA0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album_song DROP FOREIGN KEY FK_57E658E11137ABCF');
        $this->addSql('ALTER TABLE album_song DROP FOREIGN KEY FK_57E658E1A0BDB2F3');
        $this->addSql('ALTER TABLE artist_album DROP FOREIGN KEY FK_59945E10B7970CF8');
        $this->addSql('ALTER TABLE artist_album DROP FOREIGN KEY FK_59945E101137ABCF');
        $this->addSql('ALTER TABLE artist_song DROP FOREIGN KEY FK_8F53683EB7970CF8');
        $this->addSql('ALTER TABLE artist_song DROP FOREIGN KEY FK_8F53683EA0BDB2F3');
        $this->addSql('ALTER TABLE plateform_song DROP FOREIGN KEY FK_249A991DCCAA542F');
        $this->addSql('ALTER TABLE plateform_song DROP FOREIGN KEY FK_249A991DA0BDB2F3');
        $this->addSql('ALTER TABLE sample_song DROP FOREIGN KEY FK_8FDBCCEC1B1FEA20');
        $this->addSql('ALTER TABLE sample_song DROP FOREIGN KEY FK_8FDBCCECA0BDB2F3');
        $this->addSql('DROP TABLE album');
        $this->addSql('DROP TABLE album_song');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE artist');
        $this->addSql('DROP TABLE artist_album');
        $this->addSql('DROP TABLE artist_song');
        $this->addSql('DROP TABLE plateform');
        $this->addSql('DROP TABLE plateform_song');
        $this->addSql('DROP TABLE sample');
        $this->addSql('DROP TABLE sample_song');
        $this->addSql('DROP TABLE song');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
