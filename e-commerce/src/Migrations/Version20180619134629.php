<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180619134629 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE international_shippings (id INT AUTO_INCREMENT NOT NULL, country VARCHAR(255) NOT NULL, price_weight VARCHAR(255) NOT NULL, weight VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, status_id INT DEFAULT NULL, international_shipping_id INT DEFAULT NULL, payment_id INT DEFAULT NULL, shipping_id INT DEFAULT NULL, user_id INT DEFAULT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, gift_wrap TINYINT(1) NOT NULL, order_number VARCHAR(255) NOT NULL, order_date DATETIME NOT NULL, UNIQUE INDEX UNIQ_E52FFDEE6BF700BD (status_id), UNIQUE INDEX UNIQ_E52FFDEEB8B5B102 (international_shipping_id), UNIQUE INDEX UNIQ_E52FFDEE4C3A3BB (payment_id), UNIQUE INDEX UNIQ_E52FFDEE4887F3F8 (shipping_id), INDEX IDX_E52FFDEEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE payments (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, date DATETIME NOT NULL, payment_status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_details (id INT AUTO_INCREMENT NOT NULL, photo LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', price INT NOT NULL, stock INT NOT NULL, discount INT DEFAULT NULL, new TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_details_variant_options (product_details_id INT NOT NULL, variant_options_id INT NOT NULL, INDEX IDX_12D4BAD0287D5809 (product_details_id), INDEX IDX_12D4BAD0C85AF964 (variant_options_id), PRIMARY KEY(product_details_id, variant_options_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE products (id INT AUTO_INCREMENT NOT NULL, sub_category_id INT DEFAULT NULL, category_id INT DEFAULT NULL, product_details_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, tags LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', date DATETIME NOT NULL, INDEX IDX_B3BA5A5AF7BFE87C (sub_category_id), INDEX IDX_B3BA5A5A12469DE2 (category_id), INDEX IDX_B3BA5A5A287D5809 (product_details_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product_to_orders (id INT AUTO_INCREMENT NOT NULL, orders_id INT DEFAULT NULL, product_detail_id INT DEFAULT NULL, INDEX IDX_AD5D47FECFFE9AD6 (orders_id), INDEX IDX_AD5D47FEB670B536 (product_detail_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shipping_address (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, ship_address VARCHAR(255) NOT NULL, ship_city VARCHAR(255) NOT NULL, ship_state VARCHAR(255) DEFAULT NULL, ship_country VARCHAR(255) NOT NULL, ship_postal_code INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, payment TINYINT(1) NOT NULL, shipped TINYINT(1) NOT NULL, item_recieved TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sub_categories (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_1638D5A512469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, verify_token VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, date VARCHAR(255) NOT NULL, phone INT NOT NULL, address VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, state VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, postal_code INT NOT NULL, billing_address VARCHAR(255) NOT NULL, billing_city VARCHAR(255) NOT NULL, billing_state VARCHAR(255) NOT NULL, billing_country VARCHAR(255) NOT NULL, billing_postal_code INT NOT NULL, discount INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variant_options (id INT AUTO_INCREMENT NOT NULL, variant_id INT DEFAULT NULL, detail VARCHAR(255) NOT NULL, INDEX IDX_BF90D7C13B69A9AF (variant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variants (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEB8B5B102 FOREIGN KEY (international_shipping_id) REFERENCES international_shippings (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE4C3A3BB FOREIGN KEY (payment_id) REFERENCES payments (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE4887F3F8 FOREIGN KEY (shipping_id) REFERENCES shipping_address (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE product_details_variant_options ADD CONSTRAINT FK_12D4BAD0287D5809 FOREIGN KEY (product_details_id) REFERENCES product_details (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_details_variant_options ADD CONSTRAINT FK_12D4BAD0C85AF964 FOREIGN KEY (variant_options_id) REFERENCES variant_options (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_categories (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A287D5809 FOREIGN KEY (product_details_id) REFERENCES product_details (id)');
        $this->addSql('ALTER TABLE product_to_orders ADD CONSTRAINT FK_AD5D47FECFFE9AD6 FOREIGN KEY (orders_id) REFERENCES orders (id)');
        $this->addSql('ALTER TABLE product_to_orders ADD CONSTRAINT FK_AD5D47FEB670B536 FOREIGN KEY (product_detail_id) REFERENCES product_details (id)');
        $this->addSql('ALTER TABLE sub_categories ADD CONSTRAINT FK_1638D5A512469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE variant_options ADD CONSTRAINT FK_BF90D7C13B69A9AF FOREIGN KEY (variant_id) REFERENCES variants (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A12469DE2');
        $this->addSql('ALTER TABLE sub_categories DROP FOREIGN KEY FK_1638D5A512469DE2');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEB8B5B102');
        $this->addSql('ALTER TABLE product_to_orders DROP FOREIGN KEY FK_AD5D47FECFFE9AD6');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE4C3A3BB');
        $this->addSql('ALTER TABLE product_details_variant_options DROP FOREIGN KEY FK_12D4BAD0287D5809');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A287D5809');
        $this->addSql('ALTER TABLE product_to_orders DROP FOREIGN KEY FK_AD5D47FEB670B536');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE4887F3F8');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE6BF700BD');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AF7BFE87C');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED395');
        $this->addSql('ALTER TABLE product_details_variant_options DROP FOREIGN KEY FK_12D4BAD0C85AF964');
        $this->addSql('ALTER TABLE variant_options DROP FOREIGN KEY FK_BF90D7C13B69A9AF');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE international_shippings');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE payments');
        $this->addSql('DROP TABLE product_details');
        $this->addSql('DROP TABLE product_details_variant_options');
        $this->addSql('DROP TABLE products');
        $this->addSql('DROP TABLE product_to_orders');
        $this->addSql('DROP TABLE shipping_address');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE sub_categories');
        $this->addSql('DROP TABLE users');
        $this->addSql('DROP TABLE variant_options');
        $this->addSql('DROP TABLE variants');
    }
}
