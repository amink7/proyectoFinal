<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122093611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorias (id INT AUTO_INCREMENT NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plato ADD categoria_id INT NOT NULL');
        $this->addSql('ALTER TABLE plato ADD CONSTRAINT FK_914B3E453397707A FOREIGN KEY (categoria_id) REFERENCES categorias (id)');
        $this->addSql('CREATE INDEX IDX_914B3E453397707A ON plato (categoria_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plato DROP FOREIGN KEY FK_914B3E453397707A');
        $this->addSql('DROP TABLE categorias');
        $this->addSql('DROP INDEX IDX_914B3E453397707A ON plato');
        $this->addSql('ALTER TABLE plato DROP categoria_id');
    }
}
