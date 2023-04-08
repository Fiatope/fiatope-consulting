<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230408175226 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__business_area AS SELECT id, name, slug, description, filename FROM business_area');
        $this->addSql('DROP TABLE business_area');
        $this->addSql('CREATE TABLE business_area (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(60) NOT NULL, slug VARCHAR(60) NOT NULL, description CLOB NOT NULL, image VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO business_area (id, name, slug, description, image) SELECT id, name, slug, description, filename FROM __temp__business_area');
        $this->addSql('DROP TABLE __temp__business_area');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__business_area AS SELECT id, name, slug, image, description FROM business_area');
        $this->addSql('DROP TABLE business_area');
        $this->addSql('CREATE TABLE business_area (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(60) NOT NULL, slug VARCHAR(60) NOT NULL, filename VARCHAR(255) NOT NULL, description CLOB NOT NULL, image_name VARCHAR(255) DEFAULT NULL, image_original_name VARCHAR(255) DEFAULT NULL, image_mime_type VARCHAR(255) DEFAULT NULL, image_size INTEGER DEFAULT NULL, image_dimensions CLOB DEFAULT NULL --(DC2Type:simple_array)
        )');
        $this->addSql('INSERT INTO business_area (id, name, slug, filename, description) SELECT id, name, slug, image, description FROM __temp__business_area');
        $this->addSql('DROP TABLE __temp__business_area');
    }
}
