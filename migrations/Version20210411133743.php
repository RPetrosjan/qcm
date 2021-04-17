<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210411133743 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence DROP FOREIGN KEY FK_94D4687F717BE5F7');
        $this->addSql('DROP INDEX IDX_94D4687F717BE5F7 ON competence');
        $this->addSql('ALTER TABLE competence DROP titlequestion_id');
        $this->addSql('ALTER TABLE title_question ADD competences_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE title_question ADD CONSTRAINT FK_9F6CFCEFA660B158 FOREIGN KEY (competences_id) REFERENCES competence (id)');
        $this->addSql('CREATE INDEX IDX_9F6CFCEFA660B158 ON title_question (competences_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE competence ADD titlequestion_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE competence ADD CONSTRAINT FK_94D4687F717BE5F7 FOREIGN KEY (titlequestion_id) REFERENCES title_question (id)');
        $this->addSql('CREATE INDEX IDX_94D4687F717BE5F7 ON competence (titlequestion_id)');
        $this->addSql('ALTER TABLE title_question DROP FOREIGN KEY FK_9F6CFCEFA660B158');
        $this->addSql('DROP INDEX IDX_9F6CFCEFA660B158 ON title_question');
        $this->addSql('ALTER TABLE title_question DROP competences_id');
    }
}
