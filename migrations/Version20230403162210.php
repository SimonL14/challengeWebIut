<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
<<<<<<<< HEAD:migrations/Version20230403162210.php
final class Version20230403162210 extends AbstractMigration
========
final class Version20230313132047 extends AbstractMigration
>>>>>>>> 3244a0f062281ad22ed132d85963cc4d44226fe6:migrations/Version20230313132047.php
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE department (id INT AUTO_INCREMENT NOT NULL, id_school_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_CD1DE18A431FFBC9 (id_school_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE devis (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_event_id INT NOT NULL, accompagnant TINYINT(1) DEFAULT NULL, INDEX IDX_8B27C52B79F37AE5 (id_user_id), INDEX IDX_8B27C52B212C041E (id_event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, id_depart_id INT NOT NULL, name VARCHAR(255) NOT NULL, creator INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, description LONGTEXT NOT NULL, lieu VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_3BAE0AA72E37426C (id_depart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu (id INT AUTO_INCREMENT NOT NULL, evenement_id INT NOT NULL, entree VARCHAR(255) DEFAULT NULL, plat VARCHAR(255) DEFAULT NULL, dessert VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_7D053A93FD02F13 (evenement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE menu_semaine (menu_id INT NOT NULL, semaine_id INT NOT NULL, INDEX IDX_F3969654CCD7E912 (menu_id), INDEX IDX_F3969654122EEC90 (semaine_id), PRIMARY KEY(menu_id, semaine_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options (id INT AUTO_INCREMENT NOT NULL, id_event_id INT NOT NULL, category VARCHAR(255) DEFAULT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, date DATE NOT NULL, INDEX IDX_D035FA87212C041E (id_event_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE options_devis (options_id INT NOT NULL, devis_id INT NOT NULL, INDEX IDX_4A5278883ADB05F1 (options_id), INDEX IDX_4A52788841DEFADA (devis_id), PRIMARY KEY(options_id, devis_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE school (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, mail VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
<<<<<<<< HEAD:migrations/Version20230403162210.php
        $this->addSql('CREATE TABLE semaine (id INT AUTO_INCREMENT NOT NULL, lundi VARCHAR(255) NOT NULL, mardi VARCHAR(255) NOT NULL, mercredi VARCHAR(255) NOT NULL, jeudi VARCHAR(255) NOT NULL, vendredi VARCHAR(255) NOT NULL, samedi VARCHAR(255) NOT NULL, dimanche VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
========
>>>>>>>> 3244a0f062281ad22ed132d85963cc4d44226fe6:migrations/Version20230313132047.php
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_event (user_id INT NOT NULL, event_id INT NOT NULL, INDEX IDX_D96CF1FFA76ED395 (user_id), INDEX IDX_D96CF1FF71F7E88B (event_id), PRIMARY KEY(user_id, event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE department ADD CONSTRAINT FK_CD1DE18A431FFBC9 FOREIGN KEY (id_school_id) REFERENCES school (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B79F37AE5 FOREIGN KEY (id_user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE devis ADD CONSTRAINT FK_8B27C52B212C041E FOREIGN KEY (id_event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA72E37426C FOREIGN KEY (id_depart_id) REFERENCES department (id)');
        $this->addSql('ALTER TABLE menu ADD CONSTRAINT FK_7D053A93FD02F13 FOREIGN KEY (evenement_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE menu_semaine ADD CONSTRAINT FK_F3969654CCD7E912 FOREIGN KEY (menu_id) REFERENCES menu (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE menu_semaine ADD CONSTRAINT FK_F3969654122EEC90 FOREIGN KEY (semaine_id) REFERENCES semaine (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE options ADD CONSTRAINT FK_D035FA87212C041E FOREIGN KEY (id_event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE options_devis ADD CONSTRAINT FK_4A5278883ADB05F1 FOREIGN KEY (options_id) REFERENCES options (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE options_devis ADD CONSTRAINT FK_4A52788841DEFADA FOREIGN KEY (devis_id) REFERENCES devis (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_event ADD CONSTRAINT FK_D96CF1FFA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_event ADD CONSTRAINT FK_D96CF1FF71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE department DROP FOREIGN KEY FK_CD1DE18A431FFBC9');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B79F37AE5');
        $this->addSql('ALTER TABLE devis DROP FOREIGN KEY FK_8B27C52B212C041E');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA72E37426C');
        $this->addSql('ALTER TABLE menu DROP FOREIGN KEY FK_7D053A93FD02F13');
        $this->addSql('ALTER TABLE menu_semaine DROP FOREIGN KEY FK_F3969654CCD7E912');
        $this->addSql('ALTER TABLE menu_semaine DROP FOREIGN KEY FK_F3969654122EEC90');
        $this->addSql('ALTER TABLE options DROP FOREIGN KEY FK_D035FA87212C041E');
        $this->addSql('ALTER TABLE options_devis DROP FOREIGN KEY FK_4A5278883ADB05F1');
        $this->addSql('ALTER TABLE options_devis DROP FOREIGN KEY FK_4A52788841DEFADA');
        $this->addSql('ALTER TABLE user_event DROP FOREIGN KEY FK_D96CF1FFA76ED395');
        $this->addSql('ALTER TABLE user_event DROP FOREIGN KEY FK_D96CF1FF71F7E88B');
        $this->addSql('DROP TABLE department');
        $this->addSql('DROP TABLE devis');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE menu');
        $this->addSql('DROP TABLE menu_semaine');
        $this->addSql('DROP TABLE options');
        $this->addSql('DROP TABLE options_devis');
        $this->addSql('DROP TABLE school');
<<<<<<<< HEAD:migrations/Version20230403162210.php
        $this->addSql('DROP TABLE semaine');
========
>>>>>>>> 3244a0f062281ad22ed132d85963cc4d44226fe6:migrations/Version20230313132047.php
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE user_event');
    }
}
