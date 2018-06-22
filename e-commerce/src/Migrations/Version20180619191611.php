<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180619191611 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_details ADD product_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_details ADD CONSTRAINT FK_A3FF103A4584665A FOREIGN KEY (product_id) REFERENCES products (id)');
        $this->addSql('CREATE INDEX IDX_A3FF103A4584665A ON product_details (product_id)');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A287D5809');
        $this->addSql('DROP INDEX IDX_B3BA5A5A287D5809 ON products');
        $this->addSql('ALTER TABLE products DROP product_details_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_details DROP FOREIGN KEY FK_A3FF103A4584665A');
        $this->addSql('DROP INDEX IDX_A3FF103A4584665A ON product_details');
        $this->addSql('ALTER TABLE product_details DROP product_id');
        $this->addSql('ALTER TABLE products ADD product_details_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A287D5809 FOREIGN KEY (product_details_id) REFERENCES product_details (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A287D5809 ON products (product_details_id)');
    }
}
