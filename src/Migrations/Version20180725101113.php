<?php declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20180725101113 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE2C5697D6D FOREIGN KEY (apprenant_id) REFERENCES apprenant (id)');
        $this->addSql('ALTER TABLE resultat ADD CONSTRAINT FK_E7DB5DE289D40298 FOREIGN KEY (exercice_id) REFERENCES exercice (id)');
        $this->addSql('ALTER TABLE exercice ADD cours_id INT NOT NULL');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74D7ECF78B0 FOREIGN KEY (cours_id) REFERENCES cours (id)');
        $this->addSql('CREATE INDEX IDX_E418C74D7ECF78B0 ON exercice (cours_id)');
        $this->addSql('ALTER TABLE cours ADD CONSTRAINT FK_FDCA8C9C59027487 FOREIGN KEY (theme_id) REFERENCES theme (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE cours DROP FOREIGN KEY FK_FDCA8C9C59027487');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74D7ECF78B0');
        $this->addSql('DROP INDEX IDX_E418C74D7ECF78B0 ON exercice');
        $this->addSql('ALTER TABLE exercice DROP cours_id');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE2C5697D6D');
        $this->addSql('ALTER TABLE resultat DROP FOREIGN KEY FK_E7DB5DE289D40298');
    }
}
