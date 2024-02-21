<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240221090441 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE program ADD title VARCHAR(255) NOT NULL, DROP program_id, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE sysnopsis sysnopsis VARCHAR(255) NOT NULL, ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE program MODIFY id INT NOT NULL');
        $this->addSql('DROP INDEX `primary` ON program');
        $this->addSql('ALTER TABLE program ADD program_id INT NOT NULL, DROP title, CHANGE id id INT NOT NULL, CHANGE sysnopsis sysnopsis LONGTEXT NOT NULL');
    }
}
