<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180604115728 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE about (id INT AUTO_INCREMENT NOT NULL, resume LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, mail VARCHAR(255) NOT NULL, tel VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, country VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, cp INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat_civil (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(100) NOT NULL, last_name VARCHAR(100) NOT NULL, age SMALLINT NOT NULL, nationality VARCHAR(255) NOT NULL, permis VARCHAR(100) NOT NULL, fonction VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE experience (id INT AUTO_INCREMENT NOT NULL, tite VARCHAR(100) NOT NULL, date_of_start DATETIME NOT NULL, date_of_end DATETIME DEFAULT NULL, company LONGTEXT NOT NULL, country VARCHAR(100) NOT NULL, city VARCHAR(100) NOT NULL, body LONGTEXT DEFAULT NULL, fonction VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fromation (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, country VARCHAR(100) NOT NULL, city VARCHAR(100) NOT NULL, year_of_start SMALLINT NOT NULL, year_of_end SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image_project (id INT AUTO_INCREMENT NOT NULL, project_id INT NOT NULL, name LONGTEXT NOT NULL, INDEX IDX_BAA38732166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE link (id INT AUTO_INCREMENT NOT NULL, contact_id INT NOT NULL, title VARCHAR(100) NOT NULL, link VARCHAR(255) NOT NULL, INDEX IDX_36AC99F1E7A1254A (contact_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT NOT NULL, dev_date DATETIME NOT NULL, technology_used LONGTEXT NOT NULL, string VARCHAR(255) DEFAULT NULL, body LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE skill (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, lvl SMALLINT NOT NULL, type_of_skill LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE image_project ADD CONSTRAINT FK_BAA38732166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
        $this->addSql('ALTER TABLE link ADD CONSTRAINT FK_36AC99F1E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE link DROP FOREIGN KEY FK_36AC99F1E7A1254A');
        $this->addSql('ALTER TABLE image_project DROP FOREIGN KEY FK_BAA38732166D1F9C');
        $this->addSql('DROP TABLE about');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE etat_civil');
        $this->addSql('DROP TABLE experience');
        $this->addSql('DROP TABLE fromation');
        $this->addSql('DROP TABLE image_project');
        $this->addSql('DROP TABLE link');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE skill');
    }
}
