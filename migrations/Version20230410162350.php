<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230410162350 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__business_area_section AS SELECT id, name, description, image FROM business_area_section');
        $this->addSql('DROP TABLE business_area_section');
        $this->addSql('CREATE TABLE business_area_section (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(500) DEFAULT NULL, image VARCHAR(255) NOT NULL, component VARCHAR(60) DEFAULT NULL)');
        $this->addSql('INSERT INTO business_area_section (id, name, description, image) SELECT id, name, description, image FROM __temp__business_area_section');
        $this->addSql('DROP TABLE __temp__business_area_section');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__business_area_section AS SELECT id, name, description, image FROM business_area_section');
        $this->addSql('DROP TABLE business_area_section');
        $this->addSql('CREATE TABLE business_area_section (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(500) DEFAULT NULL, image VARCHAR(255) NOT NULL, components CLOB DEFAULT NULL --(DC2Type:simple_array)
        )');
        $this->addSql('INSERT INTO business_area_section (id, name, description, image) SELECT id, name, description, image FROM __temp__business_area_section');
        $this->addSql('DROP TABLE __temp__business_area_section');
    }
}
