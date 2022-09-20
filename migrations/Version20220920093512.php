<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220920093512 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande CHANGE date date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE code_postal_factutation code_postal_facturation VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE livraison CHANGE date date DATE DEFAULT \'CURRENT_TIMESTAMP\' NOT NULL');
        $this->addSql('ALTER TABLE ss_rubrique ADD rubrique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ss_rubrique ADD CONSTRAINT FK_5654E3373BD38833 FOREIGN KEY (rubrique_id) REFERENCES ss_rubrique (id)');
        $this->addSql('CREATE INDEX IDX_5654E3373BD38833 ON ss_rubrique (rubrique_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande CHANGE date date DATETIME NOT NULL, CHANGE code_postal_facturation code_postal_factutation VARCHAR(50) NOT NULL');
        $this->addSql('ALTER TABLE livraison CHANGE date date DATE NOT NULL');
        $this->addSql('ALTER TABLE ss_rubrique DROP FOREIGN KEY FK_5654E3373BD38833');
        $this->addSql('DROP INDEX IDX_5654E3373BD38833 ON ss_rubrique');
        $this->addSql('ALTER TABLE ss_rubrique DROP rubrique_id');
    }
}
