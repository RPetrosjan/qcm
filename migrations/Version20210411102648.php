<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210411102648 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE questions (id INT AUTO_INCREMENT NOT NULL, title_id INT NOT NULL, typequestion_id INT NOT NULL, question LONGTEXT NOT NULL, INDEX IDX_8ADC54D5A9F87BD (title_id), INDEX IDX_8ADC54D5606FD0E2 (typequestion_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE title_question (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5A9F87BD FOREIGN KEY (title_id) REFERENCES title_question (id)');
        $this->addSql('ALTER TABLE questions ADD CONSTRAINT FK_8ADC54D5606FD0E2 FOREIGN KEY (typequestion_id) REFERENCES type_question (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE questions DROP FOREIGN KEY FK_8ADC54D5A9F87BD');
        $this->addSql('DROP TABLE questions');
        $this->addSql('DROP TABLE title_question');
    }
}
