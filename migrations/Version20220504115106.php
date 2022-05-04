<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220504115106 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name_category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, name_company VARCHAR(255) NOT NULL, activity_type VARCHAR(255) NOT NULL, poste VARCHAR(255) NOT NULL, number_of_contact VARCHAR(255) NOT NULL, name_of_contact VARCHAR(255) NOT NULL, email_of_contact VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE job_offer (id INT AUTO_INCREMENT NOT NULL, client_id INT NOT NULL, category_id INT NOT NULL, job_title VARCHAR(255) NOT NULL, job_type VARCHAR(255) DEFAULT NULL, location VARCHAR(255) DEFAULT NULL, closing_date DATE NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', description VARCHAR(255) DEFAULT NULL, INDEX IDX_288A3A4E19EB6921 (client_id), INDEX IDX_288A3A4E12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE submission (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, offer_id INT DEFAULT NULL, user_name VARCHAR(255) DEFAULT NULL, user_email VARCHAR(255) NOT NULL, offer_title VARCHAR(255) NOT NULL, sociaty_name VARCHAR(255) NOT NULL, contact_name VARCHAR(255) NOT NULL, contact_email VARCHAR(255) NOT NULL, date_of_submission DATE NOT NULL, INDEX IDX_DB055AF3A76ED395 (user_id), INDEX IDX_DB055AF353C674EE (offer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E19EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE job_offer ADD CONSTRAINT FK_288A3A4E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE submission ADD CONSTRAINT FK_DB055AF3A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE submission ADD CONSTRAINT FK_DB055AF353C674EE FOREIGN KEY (offer_id) REFERENCES job_offer (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E12469DE2');
        $this->addSql('ALTER TABLE job_offer DROP FOREIGN KEY FK_288A3A4E19EB6921');
        $this->addSql('ALTER TABLE submission DROP FOREIGN KEY FK_DB055AF353C674EE');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE job_offer');
        $this->addSql('DROP TABLE submission');
    }
}
