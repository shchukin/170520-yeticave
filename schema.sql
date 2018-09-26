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

# Вытаскиваем лоты для конкретной категории
CREATE INDEX `index_lot_category_id` ON `lot` (`category_id`);

# Вытаскием лоты конкретного пользователя (например свой профиль)
CREATE INDEX `index_lot_creator_id` ON `lot` (`creator_id`);

# Когда смотрим конкретный лот нужно найти все его ставки, обращаемся к ставкам соответсвтенно
CREATE INDEX `index_bid_lot_id` ON `bid` (`lot_id`);

# Смотрим ставки от конкретного пользователя (например у себя в профиле)
CREATE INDEX `index_bid_user_id` ON `bid` (`user_id`);

# Вытаские пользователя по имейлу при авторизации
CREATE INDEX `index_user_email` ON `user`(`email`);