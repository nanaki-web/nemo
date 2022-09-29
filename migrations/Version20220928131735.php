<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220928131735 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_ss_rubrique DROP FOREIGN KEY FK_284CA7B35E3003B1');
        $this->addSql('ALTER TABLE produit_ss_rubrique DROP FOREIGN KEY FK_284CA7B3F347EFB');
        $this->addSql('DROP TABLE produit_ss_rubrique');
        $this->addSql('ALTER TABLE produit ADD rubrique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC273BD38833 FOREIGN KEY (rubrique_id) REFERENCES ss_rubrique (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC273BD38833 ON produit (rubrique_id)');
        $this->addSql('ALTER TABLE ss_rubrique DROP FOREIGN KEY FK_5654E3375E3003B1');
        $this->addSql('DROP INDEX IDX_5654E3375E3003B1 ON ss_rubrique');
        $this->addSql('ALTER TABLE ss_rubrique CHANGE ss_rubrique_id rubrique_parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ss_rubrique ADD CONSTRAINT FK_5654E3372F69CB4D FOREIGN KEY (rubrique_parent_id) REFERENCES ss_rubrique (id)');
        $this->addSql('CREATE INDEX IDX_5654E3372F69CB4D ON ss_rubrique (rubrique_parent_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_ss_rubrique (produit_id INT NOT NULL, ss_rubrique_id INT NOT NULL, INDEX IDX_284CA7B35E3003B1 (ss_rubrique_id), INDEX IDX_284CA7B3F347EFB (produit_id), PRIMARY KEY(produit_id, ss_rubrique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE produit_ss_rubrique ADD CONSTRAINT FK_284CA7B35E3003B1 FOREIGN KEY (ss_rubrique_id) REFERENCES ss_rubrique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_ss_rubrique ADD CONSTRAINT FK_284CA7B3F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC273BD38833');
        $this->addSql('DROP INDEX IDX_29A5EC273BD38833 ON produit');
        $this->addSql('ALTER TABLE produit DROP rubrique_id');
        $this->addSql('ALTER TABLE ss_rubrique DROP FOREIGN KEY FK_5654E3372F69CB4D');
        $this->addSql('DROP INDEX IDX_5654E3372F69CB4D ON ss_rubrique');
        $this->addSql('ALTER TABLE ss_rubrique CHANGE rubrique_parent_id ss_rubrique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ss_rubrique ADD CONSTRAINT FK_5654E3375E3003B1 FOREIGN KEY (ss_rubrique_id) REFERENCES ss_rubrique (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_5654E3375E3003B1 ON ss_rubrique (ss_rubrique_id)');
    }
}
