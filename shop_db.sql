CREATE DATABASE flowervisa;

USE flowervisa;

CREATE TABLE `admins` (
  `id` INT(100) NOT NULL,
  `name` VARCHAR(20) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'yamkela', 'yamkela2002');

CREATE TABLE `cart` (
  `id` INT(100) AUTO_INCREMENT NOT NULL,
  `user_id` INT(100) NOT NULL,
  `pid` INT(100) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `price` INT(10) NOT NULL,
  `quantity` INT(10) NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `messages` (
  `id` INT(100) AUTO_INCREMENT NOT NULL,
  `user_id` INT(100) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `number` VARCHAR(12) NOT NULL,
  `message` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `orders` (
  `id` INT(100) AUTO_INCREMENT  NOT NULL,
  `user_id` INT(100) NOT NULL,
  `name` VARCHAR(20) NOT NULL,
  `number` VARCHAR(10) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `method` VARCHAR(50) NOT NULL,
  `address` VARCHAR(500) NOT NULL,
  `total_products` VARCHAR(1000) NOT NULL,
  `total_price` INT(100) NOT NULL,
  `placed_on` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` VARCHAR(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `products` (
  `id` INT(100) AUTO_INCREMENT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `details` VARCHAR(500) NOT NULL,
  `price` INT(10) NOT NULL,
  `image_01` VARCHAR(100) NOT NULL,
  `image_02` VARCHAR(100) NOT NULL,
  `image_03` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `users` (
  `id` INT(100) AUTO_INCREMENT  NOT NULL,
  `name` VARCHAR(20) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `wishlist` (
  `id` INT(100) AUTO_INCREMENT NOT NULL,
  `user_id` INT(100) NOT NULL,
  `pid` INT(100) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `price` INT(100) NOT NULL,
  `image` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

;

