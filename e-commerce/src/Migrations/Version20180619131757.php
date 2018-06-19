<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180619131757 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product_details_variant_options (product_details_id INT NOT NULL, variant_options_id INT NOT NULL, INDEX IDX_12D4BAD0287D5809 (product_details_id), INDEX IDX_12D4BAD0C85AF964 (variant_options_id), PRIMARY KEY(product_details_id, variant_options_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variant_options (id INT AUTO_INCREMENT NOT NULL, variant_id INT DEFAULT NULL, detail VARCHAR(255) NOT NULL, INDEX IDX_BF90D7C13B69A9AF (variant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE variants (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE product_details_variant_options ADD CONSTRAINT FK_12D4BAD0287D5809 FOREIGN KEY (product_details_id) REFERENCES product_details (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_details_variant_options ADD CONSTRAINT FK_12D4BAD0C85AF964 FOREIGN KEY (variant_options_id) REFERENCES variant_options (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE variant_options ADD CONSTRAINT FK_BF90D7C13B69A9AF FOREIGN KEY (variant_id) REFERENCES variants (id)');
        $this->addSql('ALTER TABLE product_details DROP size, DROP weight, DROP color');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE product_details_variant_options DROP FOREIGN KEY FK_12D4BAD0C85AF964');
        $this->addSql('ALTER TABLE variant_options DROP FOREIGN KEY FK_BF90D7C13B69A9AF');
        $this->addSql('DROP TABLE product_details_variant_options');
        $this->addSql('DROP TABLE variant_options');
        $this->addSql('DROP TABLE variants');
        $this->addSql('ALTER TABLE product_details ADD size VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, ADD weight INT DEFAULT NULL, ADD color VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci');
    }
}
