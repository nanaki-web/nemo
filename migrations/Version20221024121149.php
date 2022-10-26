<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221024121149 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit ADD nom_scientifique VARCHAR(255) NOT NULL, ADD nom_commun VARCHAR(255) NOT NULL, ADD origine VARCHAR(255) NOT NULL, ADD famille VARCHAR(255) NOT NULL, ADD ph VARCHAR(255) NOT NULL, ADD temperature VARCHAR(255) NOT NULL, ADD taille VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP nom_scientifique, DROP nom_commun, DROP origine, DROP famille, DROP ph, DROP temperature, DROP taille');
    }
}
