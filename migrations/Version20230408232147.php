<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230408232147 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__customer AS SELECT id, country, description, logo, types FROM customer');
        $this->addSql('DROP TABLE customer');
        $this->addSql('CREATE TABLE customer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, country VARCHAR(60) NOT NULL, description VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) NOT NULL, types CLOB DEFAULT NULL --(DC2Type:simple_array)
        )');
        $this->addSql('INSERT INTO customer (id, country, description, logo, types) SELECT id, country, description, logo, types FROM __temp__customer');
        $this->addSql('DROP TABLE __temp__customer');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__customer AS SELECT id, country, description, logo, types FROM customer');
        $this->addSql('DROP TABLE customer');
        $this->addSql('CREATE TABLE customer (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, country VARCHAR(60) NOT NULL, description VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) NOT NULL, types CLOB NOT NULL --(DC2Type:simple_array)
        )');
        $this->addSql('INSERT INTO customer (id, country, description, logo, types) SELECT id, country, description, logo, types FROM __temp__customer');
        $this->addSql('DROP TABLE __temp__customer');
    }
}
