<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210411154210 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE version_competence (id INT AUTO_INCREMENT NOT NULL, version VARCHAR(64) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE title_question ADD version_competence_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE title_question ADD CONSTRAINT FK_9F6CFCEFD5C634DD FOREIGN KEY (version_competence_id) REFERENCES version_competence (id)');
        $this->addSql('CREATE INDEX IDX_9F6CFCEFD5C634DD ON title_question (version_competence_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE title_question DROP FOREIGN KEY FK_9F6CFCEFD5C634DD');
        $this->addSql('DROP TABLE version_competence');
        $this->addSql('DROP INDEX IDX_9F6CFCEFD5C634DD ON title_question');
        $this->addSql('ALTER TABLE title_question DROP version_competence_id');
    }
}
