<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250629230754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE empresa (id INT AUTO_INCREMENT NOT NULL, cnpj VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, razao_social VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telefone VARCHAR(255) NOT NULL, saldo_anuncio DOUBLE PRECISION NOT NULL, criado_em DATETIME NOT NULL, atualizado_em DATETIME DEFAULT NULL, status_aprovacao VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_CNPJ (cnpj), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE empresa');
    }
}
