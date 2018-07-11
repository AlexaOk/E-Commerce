<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180711081850 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_details CHANGE photo photo VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD created_at DATETIME NOT NULL, DROP date, DROP billing_address, DROP billing_city, DROP billing_state, DROP billing_country, DROP billing_postal_code, CHANGE verify_token verify_token VARCHAR(255) DEFAULT NULL, CHANGE discount discount INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9F85E0677 ON users (username)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_details CHANGE photo photo LONGTEXT DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:array)\'');
        $this->addSql('DROP INDEX UNIQ_1483A5E9F85E0677 ON users');
        $this->addSql('DROP INDEX UNIQ_1483A5E9E7927C74 ON users');
        $this->addSql('ALTER TABLE users ADD date VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD billing_address VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD billing_city VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD billing_state VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD billing_country VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, ADD billing_postal_code INT NOT NULL, DROP roles, DROP created_at, CHANGE verify_token verify_token VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci, CHANGE discount discount INT NOT NULL');
    }
}
