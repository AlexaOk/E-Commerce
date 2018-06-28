<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180618141909 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users DROP billing_address, DROP billing_city, DROP billing_state, DROP billing_country, DROP billing_postal_code, CHANGE verify_token verify_token VARCHAR(255) NOT NULL, CHANGE active active TINYINT(1) NOT NULL, CHANGE date date DATETIME NOT NULL, CHANGE discount discount INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE users ADD billing_address VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD billing_city VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD billing_state VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD billing_country VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD billing_postal_code INT DEFAULT NULL, CHANGE verify_token verify_token VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, CHANGE active active TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE date date DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, CHANGE discount discount INT DEFAULT NULL');
    }
}
