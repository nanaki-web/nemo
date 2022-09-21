<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220920123620 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ss_rubrique DROP FOREIGN KEY FK_5654E3375E3003B1');
        $this->addSql('ALTER TABLE ss_rubrique ADD CONSTRAINT FK_5654E3375E3003B1 FOREIGN KEY (ss_rubrique_id) REFERENCES ss_rubrique (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ss_rubrique DROP FOREIGN KEY FK_5654E3375E3003B1');
        $this->addSql('ALTER TABLE ss_rubrique ADD CONSTRAINT FK_5654E3375E3003B1 FOREIGN KEY (ss_rubrique_id) REFERENCES ss_rubrique (id)');
    }
}
