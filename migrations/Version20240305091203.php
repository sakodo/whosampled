<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305091203 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE plateform_song (plateform_id INT NOT NULL, song_id INT NOT NULL, INDEX IDX_249A991DCCAA542F (plateform_id), INDEX IDX_249A991DA0BDB2F3 (song_id), PRIMARY KEY(plateform_id, song_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plateform_song ADD CONSTRAINT FK_249A991DCCAA542F FOREIGN KEY (plateform_id) REFERENCES plateform (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE plateform_song ADD CONSTRAINT FK_249A991DA0BDB2F3 FOREIGN KEY (song_id) REFERENCES song (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plateform_song DROP FOREIGN KEY FK_249A991DCCAA542F');
        $this->addSql('ALTER TABLE plateform_song DROP FOREIGN KEY FK_249A991DA0BDB2F3');
        $this->addSql('DROP TABLE plateform_song');
    }
}
