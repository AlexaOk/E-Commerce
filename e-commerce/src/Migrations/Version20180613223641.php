<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180613223641 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE73F96FCC');
        $this->addSql('DROP INDEX IDX_E52FFDEE73F96FCC ON orders');
        $this->addSql('ALTER TABLE orders DROP product_to_orders_id');
        $this->addSql('ALTER TABLE product_details DROP FOREIGN KEY FK_A3FF103A73F96FCC');
        $this->addSql('DROP INDEX IDX_A3FF103A73F96FCC ON product_details');
        $this->addSql('ALTER TABLE product_details DROP product_to_orders_id');
        $this->addSql('ALTER TABLE product_to_orders ADD orders_id INT DEFAULT NULL, ADD product_detail_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_to_orders ADD CONSTRAINT FK_AD5D47FECFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE product_to_orders ADD CONSTRAINT FK_AD5D47FEB670B536 FOREIGN KEY (product_detail_id) REFERENCES product_details (id)');
        $this->addSql('CREATE INDEX IDX_AD5D47FECFFE9AD6 ON product_to_orders (orders_id)');
        $this->addSql('CREATE INDEX IDX_AD5D47FEB670B536 ON product_to_orders (product_detail_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE orders ADD product_to_orders_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE73F96FCC FOREIGN KEY (product_to_orders_id) REFERENCES product_to_orders (id)');
        $this->addSql('CREATE INDEX IDX_E52FFDEE73F96FCC ON orders (product_to_orders_id)');
        $this->addSql('ALTER TABLE product_details ADD product_to_orders_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE product_details ADD CONSTRAINT FK_A3FF103A73F96FCC FOREIGN KEY (product_to_orders_id) REFERENCES product_to_orders (id)');
        $this->addSql('CREATE INDEX IDX_A3FF103A73F96FCC ON product_details (product_to_orders_id)');
        $this->addSql('ALTER TABLE product_to_orders DROP FOREIGN KEY FK_AD5D47FECFFE9AD6');
        $this->addSql('ALTER TABLE product_to_orders DROP FOREIGN KEY FK_AD5D47FEB670B536');
        $this->addSql('DROP INDEX IDX_AD5D47FECFFE9AD6 ON product_to_orders');
        $this->addSql('DROP INDEX IDX_AD5D47FEB670B536 ON product_to_orders');
        $this->addSql('ALTER TABLE product_to_orders DROP orders_id, DROP product_detail_id');
    }
}
