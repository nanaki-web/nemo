<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220920112820 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, commercial_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, numero VARCHAR(50) NOT NULL, adress VARCHAR(50) NOT NULL, code_postal VARCHAR(50) NOT NULL, ville VARCHAR(50) NOT NULL, telephone VARCHAR(10) NOT NULL, type VARCHAR(50) NOT NULL, coefficient VARCHAR(50) NOT NULL, siret VARCHAR(15) DEFAULT NULL, UNIQUE INDEX UNIQ_C7440455E7927C74 (email), INDEX IDX_C74404557854071C (commercial_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, livraison_id INT DEFAULT NULL, client_id INT DEFAULT NULL, reglement VARCHAR(50) NOT NULL, numero VARCHAR(50) NOT NULL, total_ht NUMERIC(10, 2) NOT NULL, tva INT NOT NULL, reduction INT NOT NULL, total NUMERIC(10, 2) NOT NULL, total_ttc NUMERIC(10, 2) NOT NULL, date DATETIME NOT NULL, adresse_livraison VARCHAR(50) NOT NULL, code_postal_facturation VARCHAR(50) NOT NULL, ville_facturation VARCHAR(50) NOT NULL, code_postal_livraison VARCHAR(5) NOT NULL, ville_livraison VARCHAR(50) NOT NULL, facture_numero VARCHAR(50) NOT NULL, facture_date DATE DEFAULT NULL, quantite_pro VARCHAR(50) NOT NULL, INDEX IDX_6EEAA67D8E54FB25 (livraison_id), INDEX IDX_6EEAA67D19EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commande_produit (commande_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_DF1E9E8782EA2E54 (commande_id), INDEX IDX_DF1E9E87F347EFB (produit_id), PRIMARY KEY(commande_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commercial (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, telephone VARCHAR(10) NOT NULL, UNIQUE INDEX UNIQ_7653F3AEE7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fournisseur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(50) NOT NULL, adress VARCHAR(50) NOT NULL, code_postal VARCHAR(5) NOT NULL, telephone VARCHAR(10) NOT NULL, email VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livraison (id INT AUTO_INCREMENT NOT NULL, numero VARCHAR(50) NOT NULL, date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, fournisseur_id INT NOT NULL, nom VARCHAR(50) NOT NULL, description VARCHAR(50) NOT NULL, prix NUMERIC(10, 2) NOT NULL, active TINYINT(1) NOT NULL, stock INT NOT NULL, coef NUMERIC(10, 2) NOT NULL, reference VARCHAR(50) NOT NULL, photo VARCHAR(50) DEFAULT NULL, INDEX IDX_29A5EC27670C757F (fournisseur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_ss_rubrique (produit_id INT NOT NULL, ss_rubrique_id INT NOT NULL, INDEX IDX_284CA7B3F347EFB (produit_id), INDEX IDX_284CA7B35E3003B1 (ss_rubrique_id), PRIMARY KEY(produit_id, ss_rubrique_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ss_rubrique (id INT AUTO_INCREMENT NOT NULL, ss_rubrique_id INT DEFAULT NULL, parent_id INT DEFAULT NULL, nom VARCHAR(50) NOT NULL, INDEX IDX_5654E3375E3003B1 (ss_rubrique_id), INDEX IDX_5654E337727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C74404557854071C FOREIGN KEY (commercial_id) REFERENCES commercial (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D8E54FB25 FOREIGN KEY (livraison_id) REFERENCES livraison (id)');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67D19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT FK_DF1E9E8782EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_produit ADD CONSTRAINT FK_DF1E9E87F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27670C757F FOREIGN KEY (fournisseur_id) REFERENCES fournisseur (id)');
        $this->addSql('ALTER TABLE produit_ss_rubrique ADD CONSTRAINT FK_284CA7B3F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_ss_rubrique ADD CONSTRAINT FK_284CA7B35E3003B1 FOREIGN KEY (ss_rubrique_id) REFERENCES ss_rubrique (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE ss_rubrique ADD CONSTRAINT FK_5654E3375E3003B1 FOREIGN KEY (ss_rubrique_id) REFERENCES ss_rubrique (id)');
        $this->addSql('ALTER TABLE ss_rubrique ADD CONSTRAINT FK_5654E337727ACA70 FOREIGN KEY (parent_id) REFERENCES ss_rubrique (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C74404557854071C');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D8E54FB25');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67D19EB6921');
        $this->addSql('ALTER TABLE commande_produit DROP FOREIGN KEY FK_DF1E9E8782EA2E54');
        $this->addSql('ALTER TABLE commande_produit DROP FOREIGN KEY FK_DF1E9E87F347EFB');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27670C757F');
        $this->addSql('ALTER TABLE produit_ss_rubrique DROP FOREIGN KEY FK_284CA7B3F347EFB');
        $this->addSql('ALTER TABLE produit_ss_rubrique DROP FOREIGN KEY FK_284CA7B35E3003B1');
        $this->addSql('ALTER TABLE ss_rubrique DROP FOREIGN KEY FK_5654E3375E3003B1');
        $this->addSql('ALTER TABLE ss_rubrique DROP FOREIGN KEY FK_5654E337727ACA70');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE commande_produit');
        $this->addSql('DROP TABLE commercial');
        $this->addSql('DROP TABLE fournisseur');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_ss_rubrique');
        $this->addSql('DROP TABLE ss_rubrique');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
