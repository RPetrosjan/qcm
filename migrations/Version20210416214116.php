<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210416214116 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE new_version ADD version_id INT NOT NULL, DROP version');
        $this->addSql('ALTER TABLE new_version ADD CONSTRAINT FK_645F802D4BBC2705 FOREIGN KEY (version_id) REFERENCES version_competence (id)');
        $this->addSql('CREATE INDEX IDX_645F802D4BBC2705 ON new_version (version_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE new_version DROP FOREIGN KEY FK_645F802D4BBC2705');
        $this->addSql('DROP INDEX IDX_645F802D4BBC2705 ON new_version');
        $this->addSql('ALTER TABLE new_version ADD version VARCHAR(36) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP version_id');
    }
}
