<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211122102735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE oferta (id INT AUTO_INCREMENT NOT NULL, descuento DOUBLE PRECISION NOT NULL, nombre VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE plato ADD oferta_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE plato ADD CONSTRAINT FK_914B3E45FAFBF624 FOREIGN KEY (oferta_id) REFERENCES oferta (id)');
        $this->addSql('CREATE INDEX IDX_914B3E45FAFBF624 ON plato (oferta_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE plato DROP FOREIGN KEY FK_914B3E45FAFBF624');
        $this->addSql('DROP TABLE oferta');
        $this->addSql('DROP INDEX IDX_914B3E45FAFBF624 ON plato');
        $this->addSql('ALTER TABLE plato DROP oferta_id');
    }
}
