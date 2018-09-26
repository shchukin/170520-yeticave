DROP DATABASE `170520-yeticave`;


CREATE DATABASE `170520-yeticave`
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;


CREATE TABLE `category` (
	`category_id` INT AUTO_INCREMENT PRIMARY KEY,
	`name` CHAR(64) UNIQUE,
	`alias` CHAR(64) UNIQUE
);

CREATE TABLE `lot` (
	`lot_id` INT AUTO_INCREMENT PRIMARY KEY,
	`title` CHAR(128),
	`description` TEXT,
	`image` CHAR(128),
	`creation_date` DATETIME,
	`expiry_date` DATETIME,
	`price` INT,
	`step` INT,
	`category_id` INT,
	`creator_id` INT,
	`winner_id` INT
);

CREATE TABLE `bid` (
	`bid_id` INT AUTO_INCREMENT PRIMARY KEY,
	`placing_date` DATETIME,
	`value` INT,
	`lot_id` INT,
	`user_id` INT
);

CREATE TABLE `user` (
	`user_id` INT AUTO_INCREMENT PRIMARY KEY,
	`registration_date` DATE,
	`email` CHAR(64) UNIQUE,
	`name` CHAR(64),
	`password` CHAR(64),
	`avatar` CHAR(128),
	`contacts` TEXT
);


ALTER TABLE `lot` ADD CONSTRAINT `lot_fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `category`(`category_id`);

ALTER TABLE `lot` ADD CONSTRAINT `lot_fk_creator_id` FOREIGN KEY (`creator_id`) REFERENCES `user`(`user_id`);

ALTER TABLE `lot` ADD CONSTRAINT `lot_fk_winner_id` FOREIGN KEY (`winner_id`) REFERENCES `user`(`user_id`);

ALTER TABLE `bid` ADD CONSTRAINT `bid_fk_lot_id` FOREIGN KEY (`lot_id`) REFERENCES `lot`(`lot_id`);

ALTER TABLE `bid` ADD CONSTRAINT `bid_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`);


# Обращаемся к категориям по их алиасам
CREATE INDEX `index_category_alias` ON `category` (`alias`);

# Вытаские пользователя по имейлу при авторизации
CREATE INDEX `index_user_email` ON `user`(`email`);