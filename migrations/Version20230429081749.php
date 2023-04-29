<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230429081749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE herd (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(40) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cow ADD herd_id INT NOT NULL, ADD dob DATE DEFAULT NULL, DROP birth');
        $this->addSql('ALTER TABLE cow ADD CONSTRAINT FK_99D43F9CD35A8CCC FOREIGN KEY (herd_id) REFERENCES herd (id)');
        $this->addSql('CREATE INDEX IDX_99D43F9CD35A8CCC ON cow (herd_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cow DROP FOREIGN KEY FK_99D43F9CD35A8CCC');
        $this->addSql('DROP TABLE herd');
        $this->addSql('DROP INDEX IDX_99D43F9CD35A8CCC ON cow');
        $this->addSql('ALTER TABLE cow ADD birth DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP herd_id, DROP dob');
    }
}
