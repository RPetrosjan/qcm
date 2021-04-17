<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210411134721 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE comptence_section (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE title_question ADD comptence_section_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE title_question ADD CONSTRAINT FK_9F6CFCEF39303259 FOREIGN KEY (comptence_section_id) REFERENCES comptence_section (id)');
        $this->addSql('CREATE INDEX IDX_9F6CFCEF39303259 ON title_question (comptence_section_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE title_question DROP FOREIGN KEY FK_9F6CFCEF39303259');
        $this->addSql('DROP TABLE comptence_section');
        $this->addSql('DROP INDEX IDX_9F6CFCEF39303259 ON title_question');
        $this->addSql('ALTER TABLE title_question DROP comptence_section_id');
    }
}
