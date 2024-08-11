CREATE DATABASE yourmoment;

USE yourmoment;

CREATE TABLE `paket` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nama` VARCHAR(100) NOT NULL,
  `nohp` VARCHAR(15) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `destination` VARCHAR(100) NOT NULL,
  `tour_package` VARCHAR(50) NOT NULL,
  `number_of_person` INT(11) NOT NULL,
  `departure` DATE NOT NULL,
  `total` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`)
);
