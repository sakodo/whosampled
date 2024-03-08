<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240308150300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sample ADD sample_cover_file VARCHAR(255) DEFAULT NULL, CHANGE sample_artist_origin sample_artist_origin VARCHAR(255) DEFAULT NULL, CHANGE song_name song_name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE song DROP album_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sample DROP sample_cover_file, CHANGE sample_artist_origin sample_artist_origin VARCHAR(255) NOT NULL, CHANGE song_name song_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE song ADD album_id INT DEFAULT NULL');
    }
}
