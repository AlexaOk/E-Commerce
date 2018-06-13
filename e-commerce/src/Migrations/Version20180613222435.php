<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180613222435 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEEA76ED395 ON orders (user_id)');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9CFFE9AD6');
        $this->addSql('DROP INDEX IDX_1483A5E9CFFE9AD6 ON users');
        $this->addSql('ALTER TABLE users DROP orders_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED395');
        $this->addSql('DROP INDEX IDX_E52FFDEEA76ED395 ON orders');
        $this->addSql('ALTER TABLE orders DROP user_id');
        $this->addSql('ALTER TABLE users ADD orders_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9CFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E9CFFE9AD6 ON users (orders_id)');
    }
}
