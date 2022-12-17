<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221217154851 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE fact_block_item_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE fact_block_item (id INT NOT NULL, fact_block_id INT NOT NULL, number INT NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E309C643525657F ON fact_block_item (fact_block_id)');
        $this->addSql('ALTER TABLE fact_block_item ADD CONSTRAINT FK_E309C643525657F FOREIGN KEY (fact_block_id) REFERENCES fact_block (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE fact_block ADD image_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE fact_block ADD updated_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE fact_block_item_id_seq CASCADE');
        $this->addSql('ALTER TABLE fact_block_item DROP CONSTRAINT FK_E309C643525657F');
        $this->addSql('DROP TABLE fact_block_item');
        $this->addSql('ALTER TABLE fact_block DROP image_name');
        $this->addSql('ALTER TABLE fact_block DROP updated_at');
    }
}
