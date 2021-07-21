<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721173809 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loto ADD jour_de_tirage VARCHAR(255) NOT NULL, ADD date_de_tirage DATE NOT NULL, ADD date_de_forclusion DATE NOT NULL, ADD boule_1 INT NOT NULL, ADD boule_2 INT NOT NULL, ADD boule_3 INT NOT NULL, ADD boule_4 INT NOT NULL, ADD boule_5 INT NOT NULL, ADD numero_chance INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE loto DROP jour_de_tirage, DROP date_de_tirage, DROP date_de_forclusion, DROP boule_1, DROP boule_2, DROP boule_3, DROP boule_4, DROP boule_5, DROP numero_chance');
    }
}
