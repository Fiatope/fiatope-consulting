<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230410151705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE business_area_business_area_section (business_area_id INTEGER NOT NULL, business_area_section_id INTEGER NOT NULL, PRIMARY KEY(business_area_id, business_area_section_id), CONSTRAINT FK_E54E6E8E03CFBD1 FOREIGN KEY (business_area_id) REFERENCES business_area (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_E54E6E88554B3DF FOREIGN KEY (business_area_section_id) REFERENCES business_area_section (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_E54E6E8E03CFBD1 ON business_area_business_area_section (business_area_id)');
        $this->addSql('CREATE INDEX IDX_E54E6E88554B3DF ON business_area_business_area_section (business_area_section_id)');
        $this->addSql('CREATE TABLE business_area_section (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(500) DEFAULT NULL, components CLOB DEFAULT NULL --(DC2Type:simple_array)
        , image VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE business_area_business_area_section');
        $this->addSql('DROP TABLE business_area_section');
    }
}
