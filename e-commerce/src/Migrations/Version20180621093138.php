<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180621093138 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE products ADD sub_category_id INT DEFAULT NULL, ADD category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5AF7BFE87C FOREIGN KEY (sub_category_id) REFERENCES sub_categories (id)');
        $this->addSql('ALTER TABLE products ADD CONSTRAINT FK_B3BA5A5A12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5AF7BFE87C ON products (sub_category_id)');
        $this->addSql('CREATE INDEX IDX_B3BA5A5A12469DE2 ON products (category_id)');
        $this->addSql('ALTER TABLE product_details DROP size, DROP weight, DROP color');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_details ADD size VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD weight INT DEFAULT NULL, ADD color VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5AF7BFE87C');
        $this->addSql('ALTER TABLE products DROP FOREIGN KEY FK_B3BA5A5A12469DE2');
        $this->addSql('DROP INDEX IDX_B3BA5A5AF7BFE87C ON products');
        $this->addSql('DROP INDEX IDX_B3BA5A5A12469DE2 ON products');
        $this->addSql('ALTER TABLE products DROP sub_category_id, DROP category_id');
    }
}
