<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250104214931 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE employe_attraction (employe_id INT NOT NULL, attraction_id INT NOT NULL, INDEX IDX_57CA3C7F1B65292 (employe_id), INDEX IDX_57CA3C7F3C216F9D (attraction_id), PRIMARY KEY(employe_id, attraction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_forfait (reservation_id INT NOT NULL, forfait_id INT NOT NULL, INDEX IDX_DC207F07B83297E7 (reservation_id), INDEX IDX_DC207F07906D5F2C (forfait_id), PRIMARY KEY(reservation_id, forfait_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_experience (reservation_id INT NOT NULL, experience_id INT NOT NULL, INDEX IDX_653A08B7B83297E7 (reservation_id), INDEX IDX_653A08B746E90E27 (experience_id), PRIMARY KEY(reservation_id, experience_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation_attraction (reservation_id INT NOT NULL, attraction_id INT NOT NULL, INDEX IDX_B5A92F0CB83297E7 (reservation_id), INDEX IDX_B5A92F0C3C216F9D (attraction_id), PRIMARY KEY(reservation_id, attraction_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE employe_attraction ADD CONSTRAINT FK_57CA3C7F1B65292 FOREIGN KEY (employe_id) REFERENCES employe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE employe_attraction ADD CONSTRAINT FK_57CA3C7F3C216F9D FOREIGN KEY (attraction_id) REFERENCES attraction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_forfait ADD CONSTRAINT FK_DC207F07B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_forfait ADD CONSTRAINT FK_DC207F07906D5F2C FOREIGN KEY (forfait_id) REFERENCES forfait (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_experience ADD CONSTRAINT FK_653A08B7B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_experience ADD CONSTRAINT FK_653A08B746E90E27 FOREIGN KEY (experience_id) REFERENCES experience (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_attraction ADD CONSTRAINT FK_B5A92F0CB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reservation_attraction ADD CONSTRAINT FK_B5A92F0C3C216F9D FOREIGN KEY (attraction_id) REFERENCES attraction (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE attraction ADD categorie_attraction_id INT NOT NULL');
        $this->addSql('ALTER TABLE attraction ADD CONSTRAINT FK_D503E6B83FEE8ED7 FOREIGN KEY (categorie_attraction_id) REFERENCES categorie_attraction (id)');
        $this->addSql('CREATE INDEX IDX_D503E6B83FEE8ED7 ON attraction (categorie_attraction_id)');
        $this->addSql('ALTER TABLE avis ADD visiteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF07F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id)');
        $this->addSql('CREATE INDEX IDX_8F91ABF07F72333D ON avis (visiteur_id)');
        $this->addSql('ALTER TABLE reservation ADD visiteur_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849557F72333D FOREIGN KEY (visiteur_id) REFERENCES visiteur (id)');
        $this->addSql('CREATE INDEX IDX_42C849557F72333D ON reservation (visiteur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employe_attraction DROP FOREIGN KEY FK_57CA3C7F1B65292');
        $this->addSql('ALTER TABLE employe_attraction DROP FOREIGN KEY FK_57CA3C7F3C216F9D');
        $this->addSql('ALTER TABLE reservation_forfait DROP FOREIGN KEY FK_DC207F07B83297E7');
        $this->addSql('ALTER TABLE reservation_forfait DROP FOREIGN KEY FK_DC207F07906D5F2C');
        $this->addSql('ALTER TABLE reservation_experience DROP FOREIGN KEY FK_653A08B7B83297E7');
        $this->addSql('ALTER TABLE reservation_experience DROP FOREIGN KEY FK_653A08B746E90E27');
        $this->addSql('ALTER TABLE reservation_attraction DROP FOREIGN KEY FK_B5A92F0CB83297E7');
        $this->addSql('ALTER TABLE reservation_attraction DROP FOREIGN KEY FK_B5A92F0C3C216F9D');
        $this->addSql('DROP TABLE employe_attraction');
        $this->addSql('DROP TABLE reservation_forfait');
        $this->addSql('DROP TABLE reservation_experience');
        $this->addSql('DROP TABLE reservation_attraction');
        $this->addSql('ALTER TABLE attraction DROP FOREIGN KEY FK_D503E6B83FEE8ED7');
        $this->addSql('DROP INDEX IDX_D503E6B83FEE8ED7 ON attraction');
        $this->addSql('ALTER TABLE attraction DROP categorie_attraction_id');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF07F72333D');
        $this->addSql('DROP INDEX IDX_8F91ABF07F72333D ON avis');
        $this->addSql('ALTER TABLE avis DROP visiteur_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849557F72333D');
        $this->addSql('DROP INDEX IDX_42C849557F72333D ON reservation');
        $this->addSql('ALTER TABLE reservation DROP visiteur_id');
    }
}
