<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240304150030 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sample_song (sample_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_8FDBCCEC1B1FEA20 (sample_id), INDEX IDX_8FDBCCECA0BDB2F3 (song_id), PRIMARY KEY(sample_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sample_song ADD CONSTRAINT FK_8FDBCCEC1B1FEA20 FOREIGN KEY (sample_id) REFERENCES sample (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sample_song ADD CONSTRAINT FK_8FDBCCECA0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sample_song DROP FOREIGN KEY FK_8FDBCCEC1B1FEA20');
        $this->addSql('ALTER TABLE sample_song DROP FOREIGN KEY FK_8FDBCCECA0BDB2F3');
        $this->addSql('DROP TABLE sample_song');
    }
}
