<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230410122805 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_area (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(60) NOT NULL, slug VARCHAR(60) NOT NULL, image VARCHAR(255) NOT NULL, description CLOB NOT NULL, fa_icon VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE customer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, country VARCHAR(60) NOT NULL, description VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) NOT NULL, types CLOB DEFAULT NULL --(DC2Type:simple_array)
        , name VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE business_area');
        $this->addSql('DROP TABLE customer');
    }
}
