<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241123204457 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE day (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, date DATE NOT NULL, calories_limit INT NOT NULL, proteins_limit INT NOT NULL, fats_limit INT NOT NULL, carbs_limit INT NOT NULL, current_weight DOUBLE PRECISION NOT NULL, INDEX IDX_E5A029909D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, calories_per_100_g INT NOT NULL, proteins_per_100_g INT NOT NULL, fats_per_100_g INT NOT NULL, carbs_per_100_g INT NOT NULL, INDEX IDX_6BAF78709D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meal (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE meal_portion (id INT AUTO_INCREMENT NOT NULL, meal_id_id INT NOT NULL, portion_id_id INT NOT NULL, INDEX IDX_99334F3FC58E7681 (meal_id_id), UNIQUE INDEX UNIQ_99334F3FD0966697 (portion_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE portion (id INT AUTO_INCREMENT NOT NULL, ingredient_id_id INT NOT NULL, portion_mass_g INT NOT NULL, INDEX IDX_E080FD266676F996 (ingredient_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, age INT NOT NULL, height INT NOT NULL, gender VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE day ADD CONSTRAINT FK_E5A029909D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF78709D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE meal_portion ADD CONSTRAINT FK_99334F3FC58E7681 FOREIGN KEY (meal_id_id) REFERENCES meal (id)');
        $this->addSql('ALTER TABLE meal_portion ADD CONSTRAINT FK_99334F3FD0966697 FOREIGN KEY (portion_id_id) REFERENCES portion (id)');
        $this->addSql('ALTER TABLE portion ADD CONSTRAINT FK_E080FD266676F996 FOREIGN KEY (ingredient_id_id) REFERENCES ingredient (id)');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE day DROP FOREIGN KEY FK_E5A029909D86650F');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF78709D86650F');
        $this->addSql('ALTER TABLE meal_portion DROP FOREIGN KEY FK_99334F3FC58E7681');
        $this->addSql('ALTER TABLE meal_portion DROP FOREIGN KEY FK_99334F3FD0966697');
        $this->addSql('ALTER TABLE portion DROP FOREIGN KEY FK_E080FD266676F996');
        $this->addSql('DROP TABLE day');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE meal');
        $this->addSql('DROP TABLE meal_portion');
        $this->addSql('DROP TABLE portion');
        $this->addSql('DROP TABLE `user`');
    }
}
