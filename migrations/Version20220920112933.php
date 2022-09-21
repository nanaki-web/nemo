<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220920112933 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ss_rubrique DROP FOREIGN KEY FK_5654E337727ACA70');
        $this->addSql('DROP INDEX IDX_5654E337727ACA70 ON ss_rubrique');
        $this->addSql('ALTER TABLE ss_rubrique DROP parent_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ss_rubrique ADD parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ss_rubrique ADD CONSTRAINT FK_5654E337727ACA70 FOREIGN KEY (parent_id) REFERENCES ss_rubrique (id)');
        $this->addSql('CREATE INDEX IDX_5654E337727ACA70 ON ss_rubrique (parent_id)');
    }
}