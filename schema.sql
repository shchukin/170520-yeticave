DROP DATABASE `170520-yeticave`;


CREATE DATABASE `170520-yeticave`
  DEFAULT CHARACTER SET utf8
  DEFAULT COLLATE utf8_general_ci;


CREATE TABLE `category` (
	`category_id` INT AUTO_INCREMENT PRIMARY KEY,
	`name` CHAR(64) UNIQUE,
	`alias` CHAR(64) UNIQUE
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
	`winner_id` INT,
	FOREIGN KEY (`category_id`) REFERENCES `category`(`category_id`),
  FOREIGN KEY (`creator_id`) REFERENCES `user`(`user_id`),
  FOREIGN KEY (`winner_id`) REFERENCES `user`(`user_id`)
);

CREATE TABLE `bid` (
	`bid_id` INT AUTO_INCREMENT PRIMARY KEY,
	`placing_date` DATETIME,
	`value` INT,
	`lot_id` INT,
	`user_id` INT,
	FOREIGN KEY (`lot_id`) REFERENCES `lot`(`lot_id`),
  FOREIGN KEY (`user_id`) REFERENCES `user`(`user_id`)
);
