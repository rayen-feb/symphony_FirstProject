<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241020153204 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author ADD title VARCHAR(50) NOT NULL, ADD publication_date DATE NOT NULL, ADD enabled TINYINT(1) NOT NULL, ADD author VARCHAR(255) NOT NULL, ADD clear VARCHAR(255) NOT NULL, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE username username VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE author DROP title, DROP publication_date, DROP enabled, DROP author, DROP clear, CHANGE id id INT NOT NULL, CHANGE username username VARCHAR(50) NOT NULL, CHANGE email email VARCHAR(50) NOT NULL');
    }
}
