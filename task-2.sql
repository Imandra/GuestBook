CREATE DATABASE IF NOT EXISTS `catalogue`;
USE `catalogue`;

CREATE TABLE IF NOT EXISTS `product` (
  `id` int not null auto_increment,
  `name` varchar(255) not null,
  `descriptoion` text not null,
  `price` int not null,
  `images` varchar(255) not null,
  `category_id` int not null,
  PRIMARY KEY (`id`)
) COLLATE='utf8_unicode_ci' ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int not null auto_increment,
  `name` varchar(255) not null,
  PRIMARY KEY (`id`)
) COLLATE='utf8_unicode_ci' ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `attribute` (
  `id` int not null auto_increment,
  `name` varchar(255) not null,
  `type` varchar(255) not null,
  PRIMARY KEY (`id`)
) COLLATE='utf8_unicode_ci' ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `attribute_value` (
  `id` int not null auto_increment,
  `product_id` int not null,
  `attribute_id` int not null,
  `value` varchar(255) not null,
  PRIMARY KEY (`id`)
) COLLATE='utf8_unicode_ci' ENGINE=InnoDB;

ALTER TABLE `product` ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categorie` (`id`);
ALTER TABLE `attribute_value` ADD CONSTRAINT `attribute_value_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attribute` (`id`);
ALTER TABLE `attribute_value` ADD CONSTRAINT `attribute_value_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);