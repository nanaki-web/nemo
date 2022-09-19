<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220919140554 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commande_commercial DROP FOREIGN KEY FK_EE91DF487854071C');
        $this->addSql('ALTER TABLE commande_commercial DROP FOREIGN KEY FK_EE91DF4882EA2E54');
        $this->addSql('DROP TABLE commande_commercial');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande_commercial (commande_id INT NOT NULL, commercial_id INT NOT NULL, INDEX IDX_EE91DF4882EA2E54 (commande_id), INDEX IDX_EE91DF487854071C (commercial_id), PRIMARY KEY(commande_id, commercial_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE commande_commercial ADD CONSTRAINT FK_EE91DF487854071C FOREIGN KEY (commercial_id) REFERENCES commercial (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE commande_commercial ADD CONSTRAINT FK_EE91DF4882EA2E54 FOREIGN KEY (commande_id) REFERENCES commande (id) ON DELETE CASCADE');
    }
}
